<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

    <div class="container-xxl py-5">
        <div class="text-center mx-auto mb-5">
            <h3>Prosedur Evakuasi Darurat</h3>
            @foreach ($adminEvakuasi as $data)
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="/upload/adminevakuasi/{{ $data->filename_admin_evakuasis }}">
            </div>
        @endforeach
        </div>
</div>
    @stop
