<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($adminAnggaran as $data)
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="/upload/adminanggaran/{{ $data->filename_admin_anggarans }}">
            </div>
            @endforeach
        </div>
    @stop
