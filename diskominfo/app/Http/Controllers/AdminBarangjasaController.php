<?php

namespace App\Http\Controllers;

use App\Models\AdminBarangjasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminBarangjasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminBarangjasa'] = AdminBarangjasa::orderByDesc('id')->get();
        return view("admin.adminbarangjasa.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminbarangjasa.create");
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

        $dtadminBarangjasa = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_barangjasas')->insert($dtadminBarangjasa);

        if ($save) {
            return redirect('/adminbarangjasa-admin')
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
     * @param  \App\Models\AdminBarangjasa  $adminbarangjasa
     * @return \Illuminate\Http\Response
     */
    public function show(AdminBarangjasa $adminBarangjasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminBarangjasa  $adminbarangjasa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminBarangjasa'] = AdminBarangjasa::where('id',$id)->first();
        return view('admin.adminbarangjasa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminBarangjasa  $adminbarangjasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminBarangjasa = AdminBarangjasa::where('id',$id)->first();

        $changeadminBarangjasa = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_barangjasas')
        ->where('id', $id)
        ->update($changeadminBarangjasa);

        if ($adminBarangjasa) {
            return redirect('/adminbarangjasa-admin')
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
     * @param  \App\Models\AdminBarangjasa  $adminbarangjasa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminBarangjasa = AdminBarangjasa::where('id',$id)->first();

        if (empty($adminBarangjasa)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $data = AdminBarangjasa::where('id',$id)->delete();

        if ($adminBarangjasa) {
            return redirect('/adminbarangjasa-admin')
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