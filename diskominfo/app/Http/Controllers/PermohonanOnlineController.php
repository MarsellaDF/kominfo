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
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'jobs' => 'required',
            'telepon' => 'required|numeric',
            'informasi' => 'required',
            'alasan_tujuan' => 'required',
            'cara' => 'required',
            'ktp' => 'mimes:jpg,png,jpeg|image|max:1048',
        ];

        $message = [
            'nik.required'        => 'isi terlebih dahulu.',
            'name.required'         => 'isi terlebih dahulu.',
            'address.required'     => 'isi terlebih dahulu.',
            'email.required'          => 'isi terlebih dahulu.',
            'jobs.required'      => 'isi terlebih dahulu.',
            'telepon.required'      => 'isi terlebih dahulu.',
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

        $imageurl = null;
        $reqImage = $request->ktp;
        if ($request->hasFile('ktp')) {
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/permohonan-online/ktp/', $name);
            $imageurl = $name;
        }

        $body = [
            'nik' => $request->input('nik'),
            'nama' => $request->input('name'),
            'alamat' => $request->input('address'),
            'email' => $request->input('email'),
            'pekerjaan' => $request->input('jobs'),
            'nomor' => $request->input('telepon'),
            'informasi' => $request->input('informasi'),
            'alasan_tujuan' => $request->input('alasan_tujuan'),
            'cara' => $request->input('cara'),
            'ktp' => $imageurl,
        ];

        PermohonanOnlineModel::create($body);
        return redirect('/')
        ->with([
            'success' => 'Permohonan Online berhasil dikirim!',
        ]);
    }
}
