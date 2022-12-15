<?php

namespace App\Http\Controllers;

use App\Models\AdminPedoman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPedomanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminPedoman'] = AdminPedoman::all();
        return view("admin.adminpedoman.index", $data);
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
     * @param  \App\Models\AdminPedoman  $adminpedoman
     * @return \Illuminate\Http\Response
     */
    public function show(AdminPedoman $adminPedoman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminPedoman  $adminpedoman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminPedoman'] = AdminPedoman::where('id',$id)->first();
        return view('admin.adminpedoman.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminPedoman  $adminpedoman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminPedoman = AdminPedoman::where('id',$id)->first();
        if($adminPedoman->file != null){
            $imageurl = $adminPedoman->file;
        } else {
            $imageurl = null;
        }

        if ($request->hasFile('file')) {
            $reqImage = $request->file;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminpedoman/', $name);
            $imageurl = $name;

            $file = 'upload/adminpedoman/' . $adminPedoman->file;
            if ($adminPedoman->file != '' && $adminPedoman->file != null) {
                unlink($file);
            }
        }

        $changeadminPedoman = [
            'content' => $request->content,
            'file' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_pedomen')
        ->where('id', $id)
        ->update($changeadminPedoman);

        if ($data) {
            return redirect('/adminpedoman-admin')
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
     * @param  \App\Models\AdminPedoman  $adminpedoman
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminPedoman $adminPedoman)
    {
        //
    }
}
