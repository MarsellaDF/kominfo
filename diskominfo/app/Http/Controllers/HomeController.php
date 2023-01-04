<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\TujuanSasaran;
use App\Models\Kedudukan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['banners'] = Banner::where('status', true)->orderByDesc('id')->get();
        $data['tujuanSasaran'] =  TujuanSasaran::where("title", "Tujuan Sasaran")->first();
        $data['kedudukan'] =  Kedudukan::where("title", "Kedudukan")->first();
        return view('beranda', $data);
    }
}