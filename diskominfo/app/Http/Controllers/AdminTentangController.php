<?php

namespace App\Http\Controllers;

use App\Models\AdminTentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminTentangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminTentang'] = AdminTentang::all();
        return view("admin.admintentang.index", $data);
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
     * @param  \App\Models\AdminTentang  $admintentang
     * @return \Illuminate\Http\Response
     */
    public function show(AdminTentang $AdminTentang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminTentang  $admintentang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminTentang'] = AdminTentang::where('id',$id)->first();
        return view('admin.admintentang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminTentang  $admintentang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminTentang = AdminTentang::where('id',$id)->first();
        if($adminTentang->file != null){
            $imageurl = $adminTentang->file;
        } else {
            $imageurl = null;
        }

        if ($request->hasFile('file')) {
            $reqImage = $request->file;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/admintentang/', $name);
            $imageurl = $name;

            $file = 'upload/admintentang/' . $adminTentang->file;
            if ($adminTentang->file != '' && $adminTentang->file != null) {
                unlink($file);
            }
        }

        $changeAdminTentang = [
            'content' => $request->content,
            'file' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_tentangs')
        ->where('id', $id)
        ->update($changeAdminTentang);

        if ($data) {
            return redirect('/admintentang-admin')
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
     * @param  \App\Models\AdminTentang  $admintentang
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminTentang $AdminTentang)
    {
        //
    }
}