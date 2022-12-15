<?php

namespace App\Http\Controllers;

use App\Models\AdminAset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminAset'] = AdminAset::orderByDesc('id')->get();
        return view("admin.adminaset.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminaset.create");
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
            'uraian' => 'required',
            'link' => 'required'
        ]);

        $dtadminAset = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_asets')->insert($dtadminAset);

        if ($save) {
            return redirect('/adminaset-admin')
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
     * @param  \App\Models\AdminAset  $adminaset
     * @return \Illuminate\Http\Response
     */
    public function show(AdminAset $adminAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminAset  $adminaset
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminAset'] = AdminAset::where('id',$id)->first();
        return view('admin.adminaset.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminAset  $adminaset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminAset = AdminAset::where('id',$id)->first();

        $changeadminAset = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_asets')
        ->where('id', $id)
        ->update($changeadminAset);

        if ($adminAset) {
            return redirect('/adminaset-admin')
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
     * @param  \App\Models\AdminAset  $adminaset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminAset = AdminAset::where('id',$id)->first();

        if (empty($adminAset)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $data = AdminAset::where('id',$id)->delete();

        if ($adminAset) {
            return redirect('/adminaset-admin')
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