<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Library;
use App\Models\Keanggotaan;
use Illuminate\Http\Request;

class PPIDController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['banners'] = Banner::where('status', true)->orderByDesc('id')->get();
        $data['latarBelakang'] =  Library::where("title", "Latar Belakang")->first();
        $data['keanggotaans'] = Keanggotaan::where('status', true)->orderByDesc('id')->get();
        return view('beranda', $data);
    }
}