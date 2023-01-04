<?php

namespace App\Http\Controllers;

use App\Models\AdminTentang;
use App\Models\Keanggotaan;
use Illuminate\Http\Request;

class TentangController extends Controller
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
        $data['sejarah'] =  AdminTentang::where("title", "Sejarah")->first();
        $data['ruangLingkup'] =  AdminTentang::where("title", "Ruang Lingkup")->first();
        $data['visiMisi'] =  AdminTentang::where("title", "Visi Misi")->first();
        $data['keanggotaans'] = Keanggotaan::where('status', true)->orderByDesc('id')->get();
        return view('tentang', $data);
    }
}