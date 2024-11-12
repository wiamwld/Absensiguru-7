<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class GuruController extends Controller
{    
    
    public function index()
    {
        $guru = Guru::all();

        return response()->json($guru);
    }
     public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'nip'     => 'required',
            'mapel'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $guru = Guru::create([
            'nama'     => $request->nama,
            'nip'     => $request->nip,
            'mapel'   => $request->mapel,
        ]);

        //return response
        return response()->json([
            'success'=>true,
            'mesage'=>'data berhasil ditambahkan',
            'data'  => $guru
        ]);
    }
    public function show($id)
    {
        $guru = Guru::find($id);

        return response()->json([
            'success'=>true,
            'mesage'=>'data berhasil ditampilkan',
            'data'  => $guru
        ]);
    }
}