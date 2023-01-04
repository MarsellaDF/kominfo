<?php

namespace App\Http\Controllers;

use App\Models\AdminPejabat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPejabatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['adminPejabat'] = AdminPejabat::orderByDesc('id')->get();
        return view("admin.adminpejabat.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminpejabat.create");
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
            'jabatan' => 'required',
            'nama' => 'required',
            'nip' => 'required',
            'pangkat' => 'required',
            'pendidikan' => 'required',
            'kelamin' => 'required',
            'agama' => 'required',
            'kawin' => 'required',
            'lhkpn' => 'required'
        ]);

        $dtadminPejabat = [
            'jabatan' => $request->jabatan,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'pangkat' => $request->pangkat,
            'pendidikan' => $request->pendidikan,
            'kelamin' => $request->kelamin,
            'agama' => $request->agama,
            'kawin' => $request->kawin,
            'lhkpn' => $request->lhkpn,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('admin_pejabats')->insert($dtadminPejabat);

        if ($save) {
            return redirect('/adminpejabat-admin')
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
     * @param  \App\Models\AdminPejabat  $adminpejabat
     * @return \Illuminate\Http\Response
     */
    public function show(AdminPejabat $adminPejabat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminPejabat  $adminpejabat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['adminPejabat'] = AdminPejabat::where('id',$id)->first();
        return view('admin.adminpejabat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminPejabat  $adminpejabat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminPejabat = AdminPejabat::where('id',$id)->first();

        $changeadminPejabat = [
            'jabatan' => $request->jabatan,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'pangkat' => $request->pangkat,
            'pendidikan' => $request->pendidikan,
            'kelamin' => $request->kelamin,
            'agama' => $request->agama,
            'kawin' => $request->kawin,
            'lhkpn' => $request->lhkpn,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('admin_pejabats')
        ->where('id', $id)
        ->update($changeadminPejabat);

        if ($adminPejabat) {
            return redirect('/adminpejabat-admin')
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
     * @param  \App\Models\AdminPejabat  $adminpejabat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminPejabat = AdminPejabat::where('id',$id)->first();

        if (empty($adminPejabat)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'data tidak ditemukan!',
            ]);
        }

        $data = AdminPejabat::where('id',$id)->delete();

        if ($adminPejabat) {
            return redirect('/adminpejabat-admin')
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