<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminLangsung;
use App\Models\AdminPermohonan;
use App\Models\AdminKeberatan;

class LangsungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['mekanismePermohonanInformasiPublik'] = AdminLangsung::where("title", "Mekanisme Permohonan Informasi Publik")->first();
        $data['jangkaWaktuPenyelesaian'] =  AdminLangsung::where("title", "Jangka Waktu Penyelesaian")->first();
        $data['biaya'] =  AdminLangsung::where("title", "Biaya/Tarif")->first();
        $data['adminPermohonan'] = AdminPermohonan::where('status', true)->orderByDesc('id')->get();
        $data['adminKeberatan'] = AdminKeberatan::where('status', true)->orderByDesc('id')->get();
        return view('langsung', $data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}