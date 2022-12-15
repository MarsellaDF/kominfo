<?php

namespace App\Http\Controllers;

use App\Models\AdminSk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminSk'] = AdminSk::orderByDesc('id')->get();
        return view("admin.adminsk.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminsk.create");
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
            'image' => 'mimes:doc,docx,xlsx,pptx,pdf|required'
        ]);

        $reqImage = $request->image;
        if ($request->hasFile('image')) {
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminsk/', $name);
            $imageurl = $name;
        }

        $dtadminSk = [
            'title' => $request->title,
            'image' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_sks')->insert($dtadminSk);

        if ($save) {
            return redirect('/adminsk-admin')
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
     * @param  \App\Models\AdminSk  $adminsk
     * @return \Illuminate\Http\Response
     */
    public function show(AdminSk $adminsk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminSk  $adminsk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminSk'] = AdminSk::where('id',$id)->first();
        return view('admin.adminsk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminSk  $adminsk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dtadminSk = AdminSk::where('id',$id)->first();
        $imageurl = $dtadminSk->image;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminsk/', $name);
            $imageurl = $name;

            $file = 'upload/adminsk/' . $dtadminSk->image;
            if ($dtadminSk->image != '' && $dtadminSk->image != null) {
                unlink($file);
            }
        }

        $changeadminSk = [
            'title' => $request->title,
            'image' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_sks')
        ->where('id', $id)
        ->update($changeadminSk);

        if ($changeadminSk) {
            return redirect('/adminsk-admin')
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
     * @param  \App\Models\AdminSk  $adminsk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminSk = AdminSk::where('id',$id)->first();

        if (empty($adminSk)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $file = 'upload/adminsk/' . $adminSk->image;
        if ($adminSk->image != '' && $adminSk->image != null) {
            unlink($file);
        }

        $data = AdminSk::where('id',$id)->delete();

        if ($adminSk) {
            return redirect('/adminsk-admin')
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