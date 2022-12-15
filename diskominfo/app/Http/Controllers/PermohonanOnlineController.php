<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//tambahkan
use App\Models\PermohonanOnlineModel;
use Illuminate\Support\Facades\Validator;

class PermohonanOnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permohonan_online.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi
        $rules = [
            'nik' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'pekerjaan' => 'required',
            'nomor' => 'required|numeric',
            'informasi' => 'required',
            'alasan_tujuan' => 'required',
            'cara' => 'required',
            'ktp' => 'mimes:jpg,png,jpeg|image|max:1048',
        ];

        $message = [
            'nik.required'        => 'isi terlebih dahulu.',
            'nama.required'         => 'isi terlebih dahulu.',
            'alamat.required'     => 'isi terlebih dahulu.',
            'email.required'          => 'isi terlebih dahulu.',
            'pekerjaan.required'      => 'isi terlebih dahulu.',
            'nomor.required'      => 'isi terlebih dahulu.',
            'informasi.required'      => 'isi terlebih dahulu.',
            'alasan_tujuan.required'      => 'isi terlebih dahulu.',
            'cara.required'      => 'isi terlebih dahulu.',
            'ktp.required'      => 'upload foto ktp terlebih dahulu',
        ];

        //jalankan validasi
        $validator = Validator::make($request->all(), $rules, $message);

        //cek validasi
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        PermohonanOnlineModel::create([
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'pekerjaan' => $request->input('pekerjaan'),
            'nomor' => $request->input('nomor'),
            'informasi' => $request->input('informasi'),
            'alasan_tujuan' => $request->input('alasan_tujuan'),
            'cara' => $request->input('cara'),
            'ktp' => $request->input('ktp'),
        ]);

        return redirect()->route('permohonan_online.index')
            ->with('success', 'Permohonan Online berhasil dikirim!');
    }
}