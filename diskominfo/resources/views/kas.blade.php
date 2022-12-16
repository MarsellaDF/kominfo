<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($adminKas as $data)
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="/upload/adminkas/{{ $data->filename_admin_kas }}">
            </div>
            @endforeach
        </div>
    @stop
