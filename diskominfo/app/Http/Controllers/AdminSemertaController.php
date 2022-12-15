<?php

namespace App\Http\Controllers;

use App\Models\AdminSemerta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSemertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminSemerta'] = AdminSemerta::orderByDesc('id')->get();
        return view("admin.adminsemerta.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminsemerta.create");
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

        $dtadminSemerta = [
            'title' => $request->title,
            'url' => $request->url,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_semertas')->insert($dtadminSemerta);

        if ($save) {
            return redirect('/adminsemerta-admin')
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
     * @param  \App\Models\AdminSemerta  $adminsemerta
     * @return \Illuminate\Http\Response
     */
    public function show(AdminSemerta $adminSemerta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminSemerta  $adminsemerta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminSemerta'] = AdminSemerta::where('id',$id)->first();
        return view('admin.adminsemerta.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminSemerta  $adminsemerta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminSemerta = AdminSemerta::where('id',$id)->first();

        $changeadminSemerta = [
            'title' => $request->title,
            'url' => $request->url,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_semertas')
        ->where('id', $id)
        ->update($changeadminSemerta);

        if ($adminSemerta) {
            return redirect('/adminsemerta-admin')
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
     * @param  \App\Models\AdminSemerta  $adminsemerta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminSemerta = AdminSemerta::where('id',$id)->first();

        if (empty($adminSemerta)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $data = AdminSemerta::where('id',$id)->delete();

        if ($adminSemerta) {
            return redirect('/adminsemerta-admin')
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