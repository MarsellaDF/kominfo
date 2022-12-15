<?php

namespace App\Http\Controllers;

use App\Models\AdminSesaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSesaatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminSesaat'] = AdminSesaat::orderByDesc('id')->get();
        return view("admin.adminsesaat.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminsesaat.create");
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
            'title' => 'required',
            'url' => 'required'
        ]);

        $dtadminSesaat = [
            'title' => $request->title,
            'url' => $request->url,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_sesaats')->insert($dtadminSesaat);

        if ($save) {
            return redirect('/adminsesaat-admin')
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
     * @param  \App\Models\AdminSesaat  $adminsesaat
     * @return \Illuminate\Http\Response
     */
    public function show(AdminSesaat $adminSesaat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminSesaat  $adminsesaat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminSesaat'] = AdminSesaat::where('id',$id)->first();
        return view('admin.adminsesaat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminSesaat  $adminsesaat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminSesaat = AdminSesaat::where('id',$id)->first();

        $changeadminSesaat = [
            'title' => $request->title,
            'url' => $request->url,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_sesaats')
        ->where('id', $id)
        ->update($changeadminSesaat);

        if ($adminSesaat) {
            return redirect('/adminsesaat-admin')
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
     * @param  \App\Models\AdminSesaat  $adminsesaat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminSesaat = AdminSesaat::where('id',$id)->first();

        if (empty($adminSesaat)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $data = AdminSesaat::where('id',$id)->delete();

        if ($adminSesaat) {
            return redirect('/adminsesaat-admin')
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