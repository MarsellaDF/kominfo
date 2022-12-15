<?php

namespace App\Http\Controllers;

use App\Models\AdminProdukhukum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminProdukhukumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminProdukhukum'] = AdminProdukhukum::orderByDesc('id')->get();
        return view("admin.adminprodukhukum.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminprodukhukum.create");
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

        $dtadminProdukhukum = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_produkhukums')->insert($dtadminProdukhukum);

        if ($save) {
            return redirect('/adminprodukhukum-admin')
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
     * @param  \App\Models\AdminProdukhukum  $adminprodukhukum
     * @return \Illuminate\Http\Response
     */
    public function show(AdminProdukhukum $adminProdukhukum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminProdukhukum  $adminprodukhukum
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminProdukhukum'] = AdminProdukhukum::where('id',$id)->first();
        return view('admin.adminprodukhukum.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminProdukhukum  $adminprodukhukum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminProdukhukum = AdminProdukhukum::where('id',$id)->first();

        $changeadminProdukhukum = [
            'uraian' => $request->uraian,
            'link' => $request->link,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_produkhukums')
        ->where('id', $id)
        ->update($changeadminProdukhukum);

        if ($adminProdukhukum) {
            return redirect('/adminprodukhukum-admin')
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
     * @param  \App\Models\AdminProdukhukum  $adminprodukhukum
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminProdukhukum = AdminProdukhukum::where('id',$id)->first();

        if (empty($adminProdukhukum)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $data = AdminProdukhukum::where('id',$id)->delete();

        if ($adminProdukhukum) {
            return redirect('/adminprodukhukum-admin')
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