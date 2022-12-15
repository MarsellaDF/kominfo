<?php

namespace App\Http\Controllers;

use App\Models\AdminLaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminLaporan'] = AdminLaporan::orderByDesc('id')->get();
        return view("admin.adminlaporan.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminlaporan.create");
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
            $reqImage->move(public_path().'/upload/adminlaporan/', $name);
            $imageurl = $name;
        }

        $dtadminLaporan = [
            'title' => $request->title,
            'image' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_laporans')->insert($dtadminLaporan);

        if ($save) {
            return redirect('/adminlaporan-admin')
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
     * @param  \App\Models\AdminLaporan  $adminlaporan
     * @return \Illuminate\Http\Response
     */
    public function show(AdminLaporan $adminlaporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminLaporan  $adminlaporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminLaporan'] = AdminLaporan::where('id',$id)->first();
        return view('admin.adminlaporan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminLaporan  $adminlaporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminLaporan = AdminLaporan::where('id',$id)->first();
        $imageurl = $adminLaporan->image;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminlaporan/', $name);
            $imageurl = $name;

            $file = 'upload/adminlaporan/' . $adminLaporan->image;
            if ($adminLaporan->image != '' && $adminLaporan->image != null) {
                unlink($file);
            }
        }

        $changeadminLaporan = [
            'title' => $request->title,
            'image' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_laporans')
        ->where('id', $id)
        ->update($changeadminLaporan);

        if ($adminLaporan) {
            return redirect('/adminlaporan-admin')
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
     * @param  \App\Models\AdminLaporan  $adminlaporan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminLaporan = AdminLaporan::where('id',$id)->first();

        if (empty($adminLaporan)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $file = 'upload/adminlaporan/' . $adminLaporan->image;
        if ($adminLaporan->image != '' && $adminLaporan->image != null) {
            unlink($file);
        }

        $data = AdminLaporan::where('id',$id)->delete();

        if ($adminLaporan) {
            return redirect('/adminlaporan-admin')
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