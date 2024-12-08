<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Models\Jadwalpelajaran;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class JadwalpelajaranController extends Controller
{    
    
    public function index()
    {
        $Jadwalpelajaran = Jadwalpelajaran::all();

        return response()->json($Jadwalpelajaran);
    }
     public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'mapel'     => 'required',
            'nama_guru'     => 'required',
            'ruang_kelas'   => 'required',
            'waktu_mulai'   => 'required',
            'waktu_selesai'   => 'required',
            'tanggal'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $jadwalpelajaran = Jadwalpelajaran::create([
            'mapel'     => $request->mapel,
            'nama_guru'     => $request->nama_guru,
            'ruang_kelas'   => $request->ruang_kelas,
            'waktu_mulai'   => $request->waktu_mulai,
            'waktu_selesai'   => $request->waktu_selesai,
            'tanggal'   => $request->tanggal,
        ]);

        //return response
        return response()->json([
            'success'=>true,
            'mesage'=>'data berhasil ditambahkan',
            'data'  => $jadwalpelajaran
        ]);
    }
    public function show($id)
    {
        $jadwalpelajaran = Jadwalpelajaran::find($id);

        return response()->json([
            'success'=>true,
            'mesage'=>'data berhasil ditampilkan',
            'data'  => $jadwalpelajaran
        ]);
    }
}