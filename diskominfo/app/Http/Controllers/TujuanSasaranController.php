<?php

namespace App\Http\Controllers;

use App\Models\TujuanSasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TujuanSasaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tujuanSasaran'] = TujuanSasaran::all();
        return view("admin.tujuansasaran.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TujuanSasaran  $tujuanSasaran
     * @return \Illuminate\Http\Response
     */
    public function show(TujuanSasaran $tujuanSasaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TujuanSasaran  $tujuanSasaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['tujuanSasaran'] = TujuanSasaran::where('id',$id)->first();
        return view('admin.tujuansasaran.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TujuanSasaran  $tujuanSasaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tujuanSasaran = TujuanSasaran::where('id',$id)->first();
        if($tujuanSasaran->file != null){
            $imageurl = $tujuanSasaran->file;
        } else {
            $imageurl = null;
        }

        if ($request->hasFile('file')) {
            $reqImage = $request->file;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/tujuansasaran/', $name);
            $imageurl = $name;

            $file = 'upload/tujuansasaran/' . $tujuanSasaran->file;
            if ($tujuanSasaran->file != '' && $tujuanSasaran->file != null) {
                unlink($file);
            }
        }

        $changeTujuanSasaran = [
            'content' => $request->content,
            'file' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('tujuan_sasarans')
        ->where('id', $id)
        ->update($changeTujuanSasaran);

        if ($data) {
            return redirect('/tujuansasaran-admin')
                ->with([
                    'success' => 'Data Berhasil Diperbarui',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Diperbarui!',
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TujuanSasaran  $tujuanSasaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(TujuanSasaran $tujuanSasaran)
    {
        //
    }
}