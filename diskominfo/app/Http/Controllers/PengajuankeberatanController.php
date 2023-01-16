<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//tambahkan
use App\Models\Pengajuankeberatan;
use Illuminate\Support\Facades\Validator;

class PengajuankeberatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengajuankeberatan.index');
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
            'tujuan' => 'required',
            'nama1' => 'required',
            'alamat1' => 'required',
            'pekerjaan' => 'required',
            'nomor1' => 'required|numeric',
            'alasan' => 'required',
        ];

        $message = [
            'tujuan.required'        => 'isi terlebih dahulu.',
            'nama1.required'         => 'isi terlebih dahulu.',
            'alamat1.required'     => 'isi terlebih dahulu.',
            'pekerjaan.required'      => 'isi terlebih dahulu.',
            'nomor1.required'      => 'isi terlebih dahulu.',
            'alasan.required'      => 'pilih terlebih dahulu.',
        ];

        //jalankan validasi
        $validator = Validator::make($request->all(), $rules, $message);

        //cek validasi
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $body = [
            'tujuan' => $request->input('tujuan'),
            'nama1' => $request->input('nama1'),
            'alamat1' => $request->input('alamat1'),
            'pekerjaan' => $request->input('pekerjaan'),
            'nomor1' => $request->input('nomor1'),
            'nama2' => $request->input('nama2'),
            'alamat2' => $request->input('alamat2'),
            'nomor2' => $request->input('nomor2'),
            'alasan' => $request->input('alasan'),
        ];

        Pengajuankeberatan::create($body);
        return redirect('/')
        ->with([
            'success' => 'Pengajuan Keberatan berhasil dikirim!',
        ]);
    }
}