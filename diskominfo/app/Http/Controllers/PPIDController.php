<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class PPIDController extends Controller
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
        $data['latarBelakang'] =  Library::where("title", "Latar Belakang")->first();
        return view('ppid', $data);
    }
}