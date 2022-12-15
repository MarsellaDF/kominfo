<?php

namespace App\Http\Controllers;

use App\Models\AdminPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminPengaduan'] = AdminPengaduan::orderByDesc('id')->get();
        return view("admin.adminpengaduan.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminpengaduan.create");
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

        $dtadminPengaduan = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_pengaduans')->insert($dtadminPengaduan);

        if ($save) {
            return redirect('/adminpengaduan-admin')
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
     * @param  \App\Models\AdminPengaduan  $adminpengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(AdminPengaduan $adminPengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminPengaduan  $adminpengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminPengaduan'] = AdminPengaduan::where('id',$id)->first();
        return view('admin.adminpengaduan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminPengaduan  $adminpengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminPengaduan = AdminPengaduan::where('id',$id)->first();

        $changeadminPengaduan = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_pengaduans')
        ->where('id', $id)
        ->update($changeadminPengaduan);

        if ($adminPengaduan) {
            return redirect('/adminpengaduan-admin')
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
     * @param  \App\Models\AdminPengaduan  $adminpengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminPengaduan = AdminPengaduan::where('id',$id)->first();

        if (empty($adminPengaduan)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $data = AdminPengaduan::where('id',$id)->delete();

        if ($adminPengaduan) {
            return redirect('/adminpengaduan-admin')
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