<?php

namespace App\Http\Controllers;

use App\Models\AdminMaklumat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMaklumatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminMaklumat'] = AdminMaklumat::orderByDesc('id')->get();
        return view("admin.adminmaklumat.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminmaklumat.create");
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
            $reqImage->move(public_path().'/upload/adminmaklumat/', $name);
            $imageurl = $name;
        }

        $dtadminMaklumat = [
            'filename_admin_maklumats' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_maklumats')->insert($dtadminMaklumat);

        if ($save) {
            return redirect('/adminmaklumat-admin')
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
     * @param  \App\Models\AdminMaklumat  $adminmaklumat
     * @return \Illuminate\Http\Response
     */
    public function show(AdminMaklumat $adminmaklumat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminMaklumat  $adminmaklumat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminMaklumat'] = AdminMaklumat::where('id',$id)->first();
        return view('admin.adminmaklumat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminMaklumat  $adminmaklumat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminMaklumat = AdminMaklumat::where('id',$id)->first();
        $imageurl = $adminMaklumat->filename_admin_maklumats;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminmaklumat/', $name);
            $imageurl = $name;

            $file = 'upload/adminmaklumat/' . $adminMaklumat->filename_admin_maklumats;
            if ($adminMaklumat->filename_admin_maklumats != '' && $adminMaklumat->filename_admin_maklumats != null) {
                unlink($file);
            }
        }

        $changeAdminMaklumat = [
            'filename_admin_maklumats' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_maklumats')
        ->where('id', $id)
        ->update($changeAdminMaklumat);

        if ($adminMaklumat) {
            return redirect('/adminmaklumat-admin')
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
     * @param  \App\Models\AdminMaklumat  $adminmaklumat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminMaklumat = AdminMaklumat::where('id',$id)->first();

        if (empty($adminMaklumat)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $file = 'upload/adminmaklumat/' . $adminMaklumat->filename_admin_maklumats;
        if ($adminMaklumat->filename_admin_maklumats != '' && $adminMaklumat->filename_admin_maklumats != null) {
            unlink($file);
        }

        $data = AdminMaklumat::where('id',$id)->delete();

        if ($adminMaklumat) {
            return redirect('/adminmaklumat-admin')
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