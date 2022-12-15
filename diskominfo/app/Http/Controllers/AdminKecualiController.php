<?php

namespace App\Http\Controllers;

use App\Models\adminkecuali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminkecualiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminKecuali'] = AdminKecuali::orderByDesc('id')->get();
        return view("admin.adminkecuali.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminkecuali.create");
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
            'url' => 'required'
        ]);

        $dtadminKecuali = [
            'title' => $request->title,
            'url' => $request->url,
            // 'image' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_kecualis')->insert($dtadminKecuali);

        if ($save) {
            return redirect('/adminkecuali-admin')
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
     * @param  \App\Models\AdminKecuali  $adminkecuali
     * @return \Illuminate\Http\Response
     */
    public function show(AdminKecuali $adminKecuali)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminKecuali  $adminkecuali
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminKecuali'] = AdminKecuali::where('id',$id)->first();
        return view('admin.adminkecuali.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminKecuali  $adminkecuali
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminKecuali = AdminKecuali::where('id',$id)->first();

        $changeadminKecuali = [
            'title' => $request->title,
            'url' => $request->url,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_kecualis')
        ->where('id', $id)
        ->update($changeadminKecuali);

        if ($adminKecuali) {
            return redirect('/adminkecuali-admin')
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
     * @param  \App\Models\AdminKecuali  $adminkecuali
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminKecuali = AdminKecuali::where('id',$id)->first();

        if (empty($adminKecuali)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $data = AdminKecuali::where('id',$id)->delete();

        if ($adminKecuali) {
            return redirect('/adminkecuali-admin')
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