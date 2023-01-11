<?php

namespace App\Http\Controllers;

use App\Models\AdminDokdigital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminDokdigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminDokdigital'] = AdminDokdigital::orderByDesc('id')->get();
        return view("admin.admindokdigital.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.admindokdigital.create");
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

        $dtadminDokdigital = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_dokdigitals')->insert($dtadminDokdigital);

        if ($save) {
            return redirect('/admindokdigital-admin')
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
     * @param  \App\Models\AdminDokdigital  $admindokdigital
     * @return \Illuminate\Http\Response
     */
    public function show(AdminDokdigital $adminDokdigital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminDokdigital  $admindokdigital
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminDokdigital'] = AdminDokdigital::where('id',$id)->first();
        return view('admin.admindokdigital.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminDokdigital  $admindokdigital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminDokdigital = AdminDokdigital::where('id',$id)->first();

        $changeadminDokdigital = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_dokdigitals')
        ->where('id', $id)
        ->update($changeadminDokdigital);

        if ($adminDokdigital) {
            return redirect('/admindokdigital-admin')
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
     * @param  \App\Models\AdminDokdigital  $admindokdigital
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminDokdigital = AdminDokdigital::where('id',$id)->first();

        if (empty($adminDokdigital)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $data = AdminDokdigital::where('id',$id)->delete();

        if ($adminDokdigital) {
            return redirect('/admindokdigital-admin')
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
