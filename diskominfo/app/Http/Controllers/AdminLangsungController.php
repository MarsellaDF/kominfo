<?php

namespace App\Http\Controllers;

use App\Models\AdminLangsung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLangsungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminLangsung'] = AdminLangsung::all();
        return view("admin.adminlangsung.index", $data);
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
     * @param  \App\Models\AdminLangsung  $adminlangsung
     * @return \Illuminate\Http\Response
     */
    public function show(AdminLangsung $adminLangsung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminLangsung  $adminlangsung
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminLangsung'] = AdminLangsung::where('id',$id)->first();
        return view('admin.adminlangsung.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminLangsung  $adminlangsung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminLangsung = AdminLangsung::where('id',$id)->first();
        if($adminLangsung->file != null){
            $imageurl = $adminLangsung->file;
        } else {
            $imageurl = null;
        }

        if ($request->hasFile('file')) {
            $reqImage = $request->file;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminlangsung/', $name);
            $imageurl = $name;

            $file = 'upload/adminlangsung/' . $adminLangsung->file;
            if ($adminLangsung->file != '' && $adminLangsung->file != null) {
                unlink($file);
            }
        }

        $changeAdminLangsung = [
            'content' => $request->content,
            'file' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_langsungs')
        ->where('id', $id)
        ->update($changeAdminLangsung);

        if ($data) {
            return redirect('/adminlangsung-admin')
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
     * @param  \App\Models\AdminLangsung  $adminlangsung
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminLangsung $adminLangsung)
    {
        //
    }
}