<?php

namespace App\Http\Controllers\Api;

use App\Models\Guru;
use App\Http\Controllers\Controller;
use App\Http\Resources\GuruResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all gurus
        $gurus = Guru::latest()->paginate(5);

        //return collection of gurus as a resource
        return new GuruResource(true, 'List Data Gurus', $gurus);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:gurus|max:20',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create guru
        $guru = Guru::create($request->all());

        //return response
        return new GuruResource(true, 'Data Guru Berhasil Ditambahkan!', $guru);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //get guru by id
        $guru = Guru::find($id);

        //return response
        return new GuruResource(true, 'Data Guru', $guru);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //get guru by id
        $guru = Guru::find($id);

        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|required|string|max:255',
            'nip' => 'sometimes|required|string|max:20|unique:gurus,nip,' . $guru->id,
            'jenis_kelamin' => 'sometimes|required|in:laki-laki,perempuan',
            'alamat' => 'sometimes|required|string',
            'no_hp' => 'sometimes|required|string|max:15',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update guru
        $guru->update($request->all());

        //return response
        return new GuruResource(true, 'Data Guru Berhasil Diupdate!', $guru);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //get guru by id
        $guru = Guru::find($id);

        //delete guru
        $guru->delete();

        //return response
        return new GuruResource(true, 'Data Guru Berhasil Dihapus!');
    }
}