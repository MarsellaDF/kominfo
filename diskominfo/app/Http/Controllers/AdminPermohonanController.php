<?php

namespace App\Http\Controllers;

use App\Models\AdminPermohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['admin_permohonans'] = AdminPermohonan::orderByDesc('id')->get();
        return view("admin.adminpermohonan.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminpermohonan.create");
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
            $reqImage->move(public_path().'/upload/adminpermohonan/', $name);
            $imageurl = $name;
        }

        $dtadminpermohonan = [
            'filename_admin_permohonans' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_permohonans')->insert($dtadminpermohonan);

        if ($save) {
            return redirect('/adminpermohonan-admin')
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
     * @param  \App\Models\AdminPermohonan  $adminpermohonan
     * @return \Illuminate\Http\Response
     */
    public function show(AdminPermohonan $adminpermohonan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminPermohonan  $adminpermohonan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['admin_permohonans'] = AdminPermohonan::where('id',$id)->first();
        return view('admin.adminpermohonan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminPermohonan  $adminpermohonan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin_permohonans = AdminPermohonan::where('id',$id)->first();
        $imageurl = $admin_permohonans->filename_admin_permohonans;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminpermohonan/', $name);
            $imageurl = $name;

            $file = 'upload/adminpermohonan/' . $admin_permohonans->filename_admin_permohonans;
            if ($admin_permohonans->filename_admin_permohonans != '' && $admin_permohonans->filename_admin_permohonans != null) {
                unlink($file);
            }
        }

        $changeAdminPermohonan = [
            'filename_admin_permohonans' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_permohonans')
        ->where('id', $id)
        ->update($changeAdminPermohonan);

        if ($admin_permohonans) {
            return redirect('/adminpermohonan-admin')
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
     * @param  \App\Models\AdminPermohonan  $adminpermohonan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin_permohonans = AdminPermohonan::where('id',$id)->first();

        if (empty($admin_permohonans)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $file = 'upload/adminpermohonan/' . $admin_permohonans->filename_admin_permohonans;
        if ($admin_permohonans->filename_admin_permohonans != '' && $admin_permohonans->filename_admin_permohonans != null) {
            unlink($file);
        }

        $data = AdminPermohonan::where('id',$id)->delete();

        if ($admin_permohonans) {
            return redirect('/adminpermohonan-admin')
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