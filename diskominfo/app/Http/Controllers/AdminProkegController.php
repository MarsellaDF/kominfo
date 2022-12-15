<?php

namespace App\Http\Controllers;

use App\Models\AdminProkeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProkegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminProkeg'] = AdminProkeg::orderByDesc('id')->get();
        return view("admin.adminprokeg.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminprokeg.create");
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
            'program' => 'required',
            'kegiatan' => 'required',
            'link' => 'required'
        ]);

        $dtadminProkeg = [
            'program' => $request->program,
            'kegiatan' => $request->kegiatan,
            'link' => $request->link,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_prokegs')->insert($dtadminProkeg);

        if ($save) {
            return redirect('/adminprokeg-admin')
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
     * @param  \App\Models\AdminProkeg  $adminprokeg
     * @return \Illuminate\Http\Response
     */
    public function show(AdminProkeg $adminProkeg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminProkeg  $adminprokeg
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminProkeg'] = AdminProkeg::where('id',$id)->first();
        return view('admin.adminprokeg.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminProkeg  $adminprokeg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminProkeg = AdminProkeg::where('id',$id)->first();

        $changeadminProkeg = [
            'program' => $request->program,
            'kegiatan' => $request->kegiatan,
            'link' => $request->link,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_prokegs')
        ->where('id', $id)
        ->update($changeadminProkeg);

        if ($adminProkeg) {
            return redirect('/adminprokeg-admin')
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
     * @param  \App\Models\AdminProkeg  $adminprokeg
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminProkeg = AdminProkeg::where('id',$id)->first();

        if (empty($adminProkeg)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $data = AdminProkeg::where('id',$id)->delete();

        if ($adminProkeg) {
            return redirect('/adminprokeg-admin')
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