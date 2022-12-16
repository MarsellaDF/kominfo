<?php

namespace App\Http\Controllers;

use App\Models\AdminKas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminKasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['admin_kas'] = AdminKas::orderByDesc('id')->get();
        return view("admin.adminkas.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminkas.create");
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
            $reqImage->move(public_path().'/upload/adminkas/', $name);
            $imageurl = $name;
        }

        $dtadminKas = [
            'filename_admin_kas' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_kas')->insert($dtadminKas);

        if ($save) {
            return redirect('/adminkas-admin')
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
     * @param  \App\Models\AdminKas  $adminKas
     * @return \Illuminate\Http\Response
     */
    public function show(AdminKas $adminKas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminKas  $adminKas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['admin_kas'] = AdminKas::where('id',$id)->first();
        return view('admin.adminkas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminKas  $adminKas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin_kas = AdminKas::where('id',$id)->first();
        $imageurl = $admin_kas->filename_admin_kas;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminkas/', $name);
            $imageurl = $name;

            $file = 'upload/adminkas/' . $admin_kas->filename_admin_kas;
            if ($admin_kas->filename_admin_kas != '' && $admin_kas->filename_admin_kas != null) {
                unlink($file);
            }
        }

        $changeadminKas = [
            'filename_admin_kas' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_kas')
        ->where('id', $id)
        ->update($changeadminKas);

        if ($admin_kas) {
            return redirect('/adminkas-admin')
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
     * @param  \App\Models\AdminKas  $adminKas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin_kas = AdminKas::where('id',$id)->first();

        if (empty($admin_kas)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $file = 'upload/adminkas/' . $admin_kas->filename_admin_kas;
        if ($admin_kas->filename_admin_kas != '' && $admin_kas->filename_admin_kas != null) {
            unlink($file);
        }

        $data = AdminKas::where('id',$id)->delete();

        if ($admin_kas) {
            return redirect('/adminkas-admin')
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