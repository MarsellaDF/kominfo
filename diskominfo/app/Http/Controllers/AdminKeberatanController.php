<?php

namespace App\Http\Controllers;

use App\Models\AdminKeberatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminKeberatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['admin_keberatans'] = AdminKeberatan::orderByDesc('id')->get();
        return view("admin.adminkeberatan.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminkeberatan.create");
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
            $reqImage->move(public_path().'/upload/adminkeberatan/', $name);
            $imageurl = $name;
        }

        $dtadminkeberatan = [
            'filename_admin_keberatans' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_keberatans')->insert($dtadminkeberatan);

        if ($save) {
            return redirect('/adminkeberatan-admin')
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
     * @param  \App\Models\AdminKeberatan  $AdminKeberatan
     * @return \Illuminate\Http\Response
     */
    public function show(AdminKeberatan $adminkeberatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminKeberatan  $adminkeberatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['admin_keberatans'] = AdminKeberatan::where('id',$id)->first();
        return view('admin.adminkeberatan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminKeberatan  $adminkeberatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin_keberatans = AdminKeberatan::where('id',$id)->first();
        $imageurl = $admin_keberatans->filename_admin_keberatans;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminkeberatan/', $name);
            $imageurl = $name;

            $file = 'upload/adminkeberatan/' . $admin_keberatans->filename_admin_keberatans;
            if ($admin_keberatans->filename_admin_keberatans != '' && $admin_keberatans->filename_admin_keberatans != null) {
                unlink($file);
            }
        }

        $changeAdminKeberatan = [
            'filename_admin_keberatans' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_keberatans')
        ->where('id', $id)
        ->update($changeAdminKeberatan);

        if ($admin_keberatans) {
            return redirect('/adminkeberatan-admin')
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
     * @param  \App\Models\AdminKeberatan  $adminkeberatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin_keberatans = AdminKeberatan::where('id',$id)->first();

        if (empty($admin_keberatans)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $file = 'upload/adminkeberatan/' . $admin_keberatans->filename_admin_keberatans;
        if ($admin_keberatans->filename_admin_keberatans != '' && $admin_keberatans->filename_admin_keberatans != null) {
            unlink($file);
        }

        $data = AdminKeberatan::where('id',$id)->delete();

        if ($admin_keberatans) {
            return redirect('/adminkeberatan-admin')
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