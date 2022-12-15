<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($anggarans as $data)
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="/upload/anggaran/{{ $data->filename_anggarans }}">
            </div>
            @endforeach
        </div>
    @stop
