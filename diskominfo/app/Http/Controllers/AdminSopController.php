<?php

namespace App\Http\Controllers;

use App\Models\AdminSop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminSop'] = AdminSop::orderByDesc('id')->get();
        return view("admin.adminsop.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminsop.create");
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
            $reqImage->move(public_path().'/upload/adminsop/', $name);
            $imageurl = $name;
        }

        $dtadminSop = [
            'filename_admin_sops' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_sops')->insert($dtadminSop);

        if ($save) {
            return redirect('/adminsop-admin')
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
     * @param  \App\Models\AdminSop  $adminsop
     * @return \Illuminate\Http\Response
     */
    public function show(AdminSop $adminSop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminSop  $adminsop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminSop'] = AdminSop::where('id',$id)->first();
        return view('admin.adminsop.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminSop  $adminsop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminSop = AdminSop::where('id',$id)->first();
        $imageurl = $adminSop->filename_admin_sops;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminsop/', $name);
            $imageurl = $name;

            $file = 'upload/adminsop/' . $adminSop->filename_admin_sops;
            if ($adminSop->filename_admin_sops != '' && $adminSop->filename_admin_sops != null) {
                unlink($file);
            }
        }

        $changeAdminSop = [
            'filename_admin_sops' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_sops')
        ->where('id', $id)
        ->update($changeAdminSop);

        if ($adminSop) {
            return redirect('/adminsop-admin')
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
     * @param  \App\Models\AdminSop  $adminsop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminSop = AdminSop::where('id',$id)->first();

        if (empty($adminSop)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $file = 'upload/adminsop/' . $adminSop->filename_admin_sops;
        if ($adminSop->filename_admin_sops != '' && $adminSop->filename_adminsops != null) {
            unlink($file);
        }

        $data = AdminSop::where('id',$id)->delete();

        if ($adminSop) {
            return redirect('/adminsop-admin')
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
