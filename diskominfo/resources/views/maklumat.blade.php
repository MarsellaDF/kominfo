<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

    <div class="container-xxl py-5">
        <div class="text-center mx-auto mb-5">
            <h3>Maklumat Pelayanan</h3>
            @foreach ($adminMaklumat as $data)
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="/upload/adminmaklumat/{{ $data->filename_admin_maklumats }}">
            </div>
        @endforeach
        </div>
</div>
    @stop
