<?php

namespace App\Http\Controllers;

use App\Models\AdminNeraca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminNeracaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['admin_neracas'] = AdminNeraca::orderByDesc('id')->get();
        return view("admin.adminneraca.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminneraca.create");
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
            $reqImage->move(public_path().'/upload/adminneraca/', $name);
            $imageurl = $name;
        }

        $dtadminNeraca = [
            'filename_admin_neracas' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_neracas')->insert($dtadminNeraca);

        if ($save) {
            return redirect('/adminneraca-admin')
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
     * @param  \App\Models\AdminNeraca  $adminneraca
     * @return \Illuminate\Http\Response
     */
    public function show(AdminNeraca $adminNeraca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminNeraca  $adminneraca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['admin_neracas'] = AdminNeraca::where('id',$id)->first();
        return view('admin.adminneraca.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminNeraca  $adminneraca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin_neracas = AdminNeraca::where('id',$id)->first();
        $imageurl = $admin_neracas->filename_admin_neracas;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminneraca/', $name);
            $imageurl = $name;

            $file = 'upload/adminneraca/' . $admin_neracas->filename_admin_neracas;
            if ($admin_neracas->filename_admin_neracas != '' && $admin_neracass->filename_admin_neracas != null) {
                unlink($file);
            }
        }

        $changeadminNeraca = [
            'filename_admin_neracas' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_neracas')
        ->where('id', $id)
        ->update($changeadminNeraca);

        if ($admin_neracas) {
            return redirect('/adminneraca-admin')
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
     * @param  \App\Models\AdminNeraca  $adminneraca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin_neracas = AdminNeraca::where('id',$id)->first();

        if (empty($admin_neracas)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $file = 'upload/adminneraca/' . $admin_neracas->filename_admin_neracas;
        if ($admin_neracas->filename_admin_neracas != '' && $admin_neracas->filename_admin_neracas != null) {
            unlink($file);
        }

        $data = AdminNeraca::where('id',$id)->delete();

        if ($admin_neracas) {
            return redirect('/adminneraca-admin')
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