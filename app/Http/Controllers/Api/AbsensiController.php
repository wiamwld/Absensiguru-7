<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class AbsensiController extends Controller
{    
    
    public function index()
    {
        $guru = Absensi::all();

        return response()->json($absensi);
    }
     public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'guru_id'     => 'required',
            'tanggal'     => 'required',
            'status'   => 'required',
            'keterangan' => 'required',
        
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $absensi = Absensi::create([
            'guru_id'     => $request->nama,
            'tanggal'     => $request->nip,
            'status'   => $request->mapel,
            'keterangan'   => $request->mapel,
        ]);

        //return response
        return response()->json([
            'success'=>true,
            'mesage'=>'data berhasil ditambahkan',
            'data'  => $absensi
        ]);
    }
    public function show($id)
    {
        $absensi = Absensi::find($id);

        return response()->json([
            'success'=>true,
            'mesage'=>'data berhasil ditampilkan',
            'data'  => $absensi
        ]);
    }
}