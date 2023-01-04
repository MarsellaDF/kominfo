<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

<div class="container-xxl py-5">
    <div class="text-center mx-auto mb-5">
        <h3>Laporan Realisasi Anggaran</h3>
            @foreach ($adminAnggaran as $data)
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="/upload/adminanggaran/{{ $data->filename_admin_anggarans }}">
            </div>
            @endforeach
        </div>
    </div>
    @stop
