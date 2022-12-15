<?php

namespace App\Http\Controllers;

use App\Models\Keanggotaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeanggotaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['keanggotaans'] = Keanggotaan::orderByDesc('id')->get();
        return view("admin.keanggotaan.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.keanggotaan.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $reqImage = $request->image;
        if ($request->hasFile('image')) {
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/keanggotaan/', $name);
            $imageurl = $name;
        }

        $dtkeanggotaan = [
            'filename_keanggotaans' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('keanggotaans')->insert($dtkeanggotaan);

        if ($save) {
            return redirect('/keanggotaan-admin')
                ->with([
                    'success' => 'Data Berhasil Ditambah',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Ditambah!',
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keanggotaan  $keanggotaan
     * @return \Illuminate\Http\Response
     */
    public function show(Keanggotaan $keanggotaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keanggotaan  $keanggotaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['keanggotaans'] = Keanggotaan::where('id',$id)->first();
        return view('admin.keanggotaan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keanggotaan  $keanggotaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $keanggotaans = Keanggotaan::where('id',$id)->first();
        $imageurl = $keanggotaans->filename_keanggotaans;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/keanggotaan/', $name);
            $imageurl = $name;

            $file = 'upload/keanggotaan/' . $keanggotaans->filename_keanggotaans;
            if ($keanggotaans->filename_keanggotaans != '' && $keanggotaans->filename_keanggotaans != null) {
                unlink($file);
            }
        }

        $changeKeanggotaan = [
            'filename_keanggotaans' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('keanggotaans')
        ->where('id', $id)
        ->update($changeKeanggotaan);

        if ($keanggotaans) {
            return redirect('/keanggotaan-admin')
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
     * @param  \App\Models\Keanggotaan  $keanggotaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keanggotaans = Keanggotaan::where('id',$id)->first();

        if (empty($keanggotaans)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $file = 'upload/keanggotaan/' . $keanggotaans->filename_keanggotaans;
        if ($keanggotaans->filename_keanggotaans != '' && $keanggotaans->filename_keanggotaans != null) {
            unlink($file);
        }

        $data = Keanggotaan::where('id',$id)->delete();

        if ($keanggotaans) {
            return redirect('/keanggotaan-admin')
                ->with([
                    'success' => 'Data Berhasil Dihapus',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Dihapus!',
                ]);
        }
    }
}