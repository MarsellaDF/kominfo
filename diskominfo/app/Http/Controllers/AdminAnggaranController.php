<?php

namespace App\Http\Controllers;

use App\Models\AdminAnggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['admin_anggarans'] = AdminAnggaran::orderByDesc('id')->get();
        return view("admin.adminanggaran.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminanggaran.create");
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
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $reqImage = $request->image;
        if ($request->hasFile('image')) {
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminanggaran/', $name);
            $imageurl = $name;
        }

        $dtadminAnggaran = [
            'filename_admin_anggarans' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_anggarans')->insert($dtadminAnggaran);

        if ($save) {
            return redirect('/adminanggaran-admin')
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
     * @param  \App\Models\AdminAnggaran  $adminanggaran
     * @return \Illuminate\Http\Response
     */
    public function show(AdminAnggaran $adminAnggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminAnggaran  $adminanggaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['admin_anggarans'] = AdminAnggaran::where('id',$id)->first();
        return view('admin.adminanggaran.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminAnggaran  $adminnggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin_anggarans = AdminAnggaran::where('id',$id)->first();
        $imageurl = $admin_anggarans->filename_admin_anggarans;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminanggaran/', $name);
            $imageurl = $name;

            $file = 'upload/adminanggaran/' . $admin_anggarans->filename_admin_anggarans;
            if ($admin_anggarans->filename_admin_anggarans != '' && $admin_anggarans->filename_admin_anggarans != null) {
                unlink($file);
            }
        }

        $changeadminAnggaran = [
            'filename_admin_anggarans' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_anggarans')
        ->where('id', $id)
        ->update($changeadminAnggaran);

        if ($admin_anggarans) {
            return redirect('/adminanggaran-admin')
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
     * @param  \App\Models\AdminAnggaran  $adminanggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin_anggarans = AdminAnggaran::where('id',$id)->first();

        if (empty($admin_anggarans)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $file = 'upload/adminanggaran/' . $admin_anggarans->filename_admin_anggarans;
        if ($admin_anggarans->filename_admin_anggarans != '' && $admin_anggarans->filename_admin_anggarans != null) {
            unlink($file);
        }

        $data = AdminAnggaran::where('id',$id)->delete();

        if ($admin_anggarans) {
            return redirect('/adminanggaran-admin')
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