<?php

namespace App\Http\Controllers;

use App\Models\AdminRekrutmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRekrutmenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminRekrutmen'] = AdminRekrutmen::orderByDesc('id')->get();
        return view("admin.adminrekrutmen.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminrekrutmen.create");
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

        $dtadminRekrutmen = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_rekrutmens')->insert($dtadminRekrutmen);

        if ($save) {
            return redirect('/adminrekrutmen-admin')
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
     * @param  \App\Models\AdminRekrutmen  $adminrekrutmen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminRekrutmen  $adminrekrutmen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminRekrutmen'] = AdminRekrutmen::where('id',$id)->first();
        return view('admin.adminrekrutmen.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminRekrutmen  $adminrekrutmen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminRekrutmen = AdminRekrutmen::where('id',$id)->first();

        $changeadminRekrutmen = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_rekrutmens')
        ->where('id', $id)
        ->update($changeadminRekrutmen);

        if ($adminRekrutmen) {
            return redirect('/adminrekrutmen-admin')
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
     * @param  \App\Models\AdminRekrutmen  $adminrekrutmen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminRekrutmen = AdminRekrutmen::where('id',$id)->first();

        if (empty($adminRekrutmen)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $data = AdminRekrutmen::where('id',$id)->delete();

        if ($adminRekrutmen) {
            return redirect('/adminrekrutmen-admin')
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