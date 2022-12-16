<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($adminNeraca as $data)
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="/upload/adminneraca/{{ $data->filename_admin_neracas }}">
            </div>
            @endforeach
        </div>
    @stop
