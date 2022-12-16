<?php

namespace App\Http\Controllers;

use App\Models\AdminEvakuasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminEvakuasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminEvakuasi'] = AdminEvakuasi::orderByDesc('id')->get();
        return view("admin.adminevakuasi.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminevakuasi.create");
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
            $reqImage->move(public_path().'/upload/adminevakuasi/', $name);
            $imageurl = $name;
        }

        $dtadminEvakuasi = [
            'filename_admin_evakuasis' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_evakuasis')->insert($dtadminEvakuasi);

        if ($save) {
            return redirect('/adminevakuasi-admin')
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
     * @param  \App\Models\AdminEvakuasi  $adminevakuasi
     * @return \Illuminate\Http\Response
     */
    public function show(AdminEvakuasi $adminevakuasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminEvakuasi  $adminevakuasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminEvakuasi'] = AdminEvakuasi::where('id',$id)->first();
        return view('admin.adminevakuasi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminEvakuasi  $adminevakuasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminEvakuasi = AdminEvakuasi::where('id',$id)->first();
        $imageurl = $adminEvakuasi->filename_admin_evakuasis;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminevakuasi/', $name);
            $imageurl = $name;

            $file = 'upload/adminevakuasi/' . $adminEvakuasi->filename_admin_evakuasis;
            if ($adminEvakuasi->filename_admin_evakuasis != '' && $adminEvakuasi->filename_admin_evakuasis != null) {
                unlink($file);
            }
        }

        $changeAdminEvakuasi = [
            'filename_admin_evakuasis' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_evakuasis')
        ->where('id', $id)
        ->update($changeAdminEvakuasi);

        if ($adminEvakuasi) {
            return redirect('/adminevakuasi-admin')
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
     * @param  \App\Models\AdminEvakuasi  $adminevakuasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminEvakuasi = AdminEvakuasi::where('id',$id)->first();

        if (empty($adminEvakuasi)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $file = 'upload/adminevakuasi/' . $adminEvakuasi->filename_admin_evakuasis;
        if ($adminEvakuasi->filename_admin_evakuasis != '' && $adminEvakuasi->filename_admin_evakuasis != null) {
            unlink($file);
        }

        $data = AdminEvakuasi::where('id',$id)->delete();

        if ($adminEvakuasi) {
            return redirect('/adminevakuasi-admin')
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
