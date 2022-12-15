<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DateTime;

class RegisterPenggunaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegisterPengguna;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function index()
    {
        return view('auth.register-pengguna');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function store(Request $data)
    {
        $data['dataUser'] = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 0,
        ]);

        $idUser = $data['dataUser']->id;

        $dt = new DateTime();
        $six_digit_random_number = random_int(1000, 9999);
        $id_pengguna = "";

        $pengguna = Pengguna::orderBy('created_at', 'desc')->get();

        if ($pengguna->count() > 0) {
            $id_pengguna = $pengguna[0]->no_register;
            $last_increment = substr($id_pengguna, 8);

            $id_pengguna = str_pad($last_increment + 1, 6, '0', STR_PAD_LEFT);
            $id_pengguna = 'PM-' . $six_digit_random_number . '-' . $id_pengguna;
        } else {
            $id_pengguna = 'PM-' . $six_digit_random_number . '-000001';
        };

        $data['dataPengguna'] = Pengguna::create([
            'no_register' => $id_pengguna,
            'id_user' => $idUser,
            'nik' => $data['nik'],
            'address' => $data['address'],
            'telepon' => $data['telepon'],
            'email' => $data['email'],
            'jobs' => $data['jobs'],
            'status' => false,
            'created_at' => now(),
        ]);

        return view("permohonan_online.index", $data);
    }
}