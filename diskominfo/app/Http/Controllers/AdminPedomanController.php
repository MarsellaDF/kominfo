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
        $data['adminPedoman'] = AdminPedoman::orderByDesc('id')->get();
        return view("admin.adminpedoman.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminpedoman.create");
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
            'title' => 'required',
            'image' => 'mimes:doc,docx,xlsx,pptx,pdf|required'
        ]);

        $reqImage = $request->image;
        if ($request->hasFile('image')) {
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminpedoman/', $name);
            $imageurl = $name;
        }

        $dtadminPedoman = [
            'title' => $request->title,
            'image' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_pedomen')->insert($dtadminPedoman);

        if ($save) {
            return redirect('/adminpedoman-admin')
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
     * @param  \App\Models\AdminPedoman  $adminpedoman
     * @return \Illuminate\Http\Response
     */
    public function show(AdminPedoman $adminpedoman)
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
        $dtadminPedoman = AdminPedoman::where('id',$id)->first();
        $imageurl = $dtadminPedoman->image;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/adminpedoman/', $name);
            $imageurl = $name;

            $file = 'upload/adminpedoman/' . $dtadminPedoman->image;
            if ($dtadminPedoman->image != '' && $dtadminPedoman->image != null) {
                unlink($file);
            }
        }

        $changeadminPedoman = [
            'title' => $request->title,
            'image' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_pedomen')
        ->where('id', $id)
        ->update($changeadminPedoman);

        if ($changeadminPedoman) {
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
    public function destroy($id)
    {
        $adminPedoman = AdminPedoman::where('id',$id)->first();

        if (empty($adminPedoman)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $file = 'upload/adminpedoman/' . $adminPedoman->image;
        if ($adminPedoman->image != '' && $adminPedoman->image != null) {
            unlink($file);
        }

        $data = AdminPedoman::where('id',$id)->delete();

        if ($adminPedoman) {
            return redirect('/adminpedoman-admin')
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