<?php

namespace App\Http\Controllers;

use App\Models\AdminRealisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminRealisasi'] = AdminRealisasi::orderByDesc('id')->get();
        return view("admin.adminrealisasi.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminrealisasi.create");
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
            'uraian' => 'required',
            'link' => 'required'
        ]);

        $dtadminRealisasi = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_realisasis')->insert($dtadminRealisasi);

        if ($save) {
            return redirect('/adminrealisasi-admin')
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
     * @param  \App\Models\AdminRealisasi  $adminrealisasi
     * @return \Illuminate\Http\Response
     */
    public function show(AdminRealisasi $adminRealisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminRealisasi  $adminrealisasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminRealisasi'] = AdminRealisasi::where('id',$id)->first();
        return view('admin.adminrealisasi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminRealisasi  $adminrealisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminRealisasi = AdminRealisasi::where('id',$id)->first();

        $changeadminRealisasi = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_realisasis')
        ->where('id', $id)
        ->update($changeadminRealisasi);

        if ($adminRealisasi) {
            return redirect('/adminrealisasi-admin')
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
     * @param  \App\Models\AdminRealisasi  $adminrealisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminRealisasi = AdminRealisasi::where('id',$id)->first();

        if (empty($adminRealisasi)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $data = AdminRealisasi::where('id',$id)->delete();

        if ($adminRealisasi) {
            return redirect('/adminrealisasi-admin')
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