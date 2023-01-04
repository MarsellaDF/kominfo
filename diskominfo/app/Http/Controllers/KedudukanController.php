<?php

namespace App\Http\Controllers;

use App\Models\Kedudukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KedudukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kedudukan'] = Kedudukan::all();
        return view("admin.kedudukan.index", $data);
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
     * @param  \App\Models\Kedudukan  $kedudukan
     * @return \Illuminate\Http\Response
     */
    public function show(Kedudukan $kedudukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kedudukan  $kedudukan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['kedudukan'] = Kedudukan::where('id',$id)->first();
        return view('admin.kedudukan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kedudukan  $kedudukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kedudukan = Kedudukan::where('id',$id)->first();
        if($kedudukan->file != null){
            $imageurl = $kedudukan->file;
        } else {
            $imageurl = null;
        }

        if ($request->hasFile('file')) {
            $reqImage = $request->file;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/kedudukan/', $name);
            $imageurl = $name;

            $file = 'upload/kedudukan/' . $kedudukan->file;
            if ($kedudukan->file != '' && $kedudukan->file != null) {
                unlink($file);
            }
        }

        $changeKedudukan = [
            'content' => $request->content,
            'file' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('kedudukans')
        ->where('id', $id)
        ->update($changeKedudukan);

        if ($data) {
            return redirect('/kedudukan-admin')
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
     * @param  \App\Models\Kedudukan  $kedudukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kedudukan $kedudukan)
    {
        //
    }
}
