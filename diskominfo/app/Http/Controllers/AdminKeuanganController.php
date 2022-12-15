<?php

namespace App\Http\Controllers;

use App\Models\AdminKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminKeuangan'] = AdminKeuangan::orderByDesc('id')->get();
        return view("admin.adminkeuangan.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminkeuangan.create");
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

        $dtadminKeuangan = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_keuangans')->insert($dtadminKeuangan);

        if ($save) {
            return redirect('/adminkeuangan-admin')
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
     * @param  \App\Models\AdminKeuangan  $adminkeuangan
     * @return \Illuminate\Http\Response
     */
    public function show(AdminKeuangan $adminKeuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminKeuangan  $adminkeuangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminKeuangan'] = AdminKeuangan::where('id',$id)->first();
        return view('admin.adminkeuangan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminKeuangan  $adminkeuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminKeuangan = AdminKeuangan::where('id',$id)->first();

        $changeadminKeuangan = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_keuangans')
        ->where('id', $id)
        ->update($changeadminKeuangan);

        if ($adminKeuangan) {
            return redirect('/adminkeuangan-admin')
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
     * @param  \App\Models\AdminKeuangan  $adminkeuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminKeuangan = AdminKeuangan::where('id',$id)->first();

        if (empty($adminKeuangan)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $data = AdminKeuangan::where('id',$id)->delete();

        if ($adminKeuangan) {
            return redirect('/adminkeuangan-admin')
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