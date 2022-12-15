<?php

namespace App\Http\Controllers;

use App\Models\AdminDashum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminDashum'] = AdminDashum::all();
        return view("admin.admindashum.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminDashum  $admindashum
     * @return \Illuminate\Http\Response
     */
    public function show(AdminDashum $adminDashum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminDashum  $admindashum
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminDashum'] = AdminDashum::where('id',$id)->first();
        return view('admin.admindashum.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminDashum  $admindashum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminDashum = AdminDashum::where('id',$id)->first();
        if($adminDashum->file != null){
            $imageurl = $adminDashum->file;
        } else {
            $imageurl = null;
        }

        if ($request->hasFile('file')) {
            $reqImage = $request->file;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/admindashum/', $name);
            $imageurl = $name;

            $file = 'upload/admindashum/' . $admindashum->file;
            if ($adminDashum->file != '' && $adminDashum->file != null) {
                unlink($file);
            }
        }

        $changeadminDashum = [
            'content' => $request->content,
            'file' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_dashums')
        ->where('id', $id)
        ->update($changeadminDashum);

        if ($data) {
            return redirect('/admindashum-admin')
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
     * @param  \App\Models\AdminDashum  $admindashum
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminDashum $adminDashum)
    {
        //
    }
}
