<?php

namespace App\Http\Controllers;

use App\Models\AdminTatakerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminTatakerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminTatakerja'] = AdminTatakerja::orderByDesc('id')->get();
        return view("admin.admintatakerja.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.admintatakerja.create");
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
            $reqImage->move(public_path().'/upload/admintatakerja/', $name);
            $imageurl = $name;
        }

        $dtadminTatakerja = [
            'title' => $request->title,
            'image' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_tatakerjas')->insert($dtadminTatakerja);

        if ($save) {
            return redirect('/admintatakerja-admin')
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
     * @param  \App\Models\AdminTatakerja  $admintatakerja
     * @return \Illuminate\Http\Response
     */
    public function show(AdminTatakerja $admintatakerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminTatakerja  $admintatakerja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminTatakerja'] = AdminTatakerja::where('id',$id)->first();
        return view('admin.admintatakerja.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminTatakerja  $admintatakerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dtadminTatakerja = AdminTatakerja::where('id',$id)->first();
        $imageurl = $dtadminTatakerja->image;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/admintatakerja/', $name);
            $imageurl = $name;

            $file = 'upload/admintatakerja/' . $dtadminTatakerja->image;
            if ($dtadminTatakerja->image != '' && $dtadminTatakerja->image != null) {
                unlink($file);
            }
        }

        $changeadminTatakerja = [
            'title' => $request->title,
            'image' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_tatakerjas')
        ->where('id', $id)
        ->update($changeadminTatakerja);

        if ($changeadminTatakerja) {
            return redirect('/admintatakerja-admin')
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
     * @param  \App\Models\AdminTatakerja  $admintatakerja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminTatakerja = AdminTatakerja::where('id',$id)->first();

        if (empty($adminTatakerja)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $file = 'upload/admintatakerja/' . $adminTatakerja->image;
        if ($adminTatakerja->image != '' && $adminTatakerja->image != null) {
            unlink($file);
        }

        $data = AdminTatakerja::where('id',$id)->delete();

        if ($adminTatakerja) {
            return redirect('/admintatakerja-admin')
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