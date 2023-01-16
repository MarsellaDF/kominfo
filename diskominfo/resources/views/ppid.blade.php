<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

<div class="container-fluid header bg-primary p-0 mb-5">
    <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
        <center>
            <div class="col-lg-12 p-5 wow fadeOut" data-wow-delay="0.1s">
                <h1 class="display-6 text-white mb-5" style="font-size: 60px">PPID</h1>
                <h1 class="display-6 text-white mb-5">Dinas Komunikasi, Informatika dan Pesandian Kabupaten Banyuwangi</h1>
                <a href="/permohonan_online"  class="btn btn-outline-light py-md-3 px-md-2 animated slideInRight">Pengajuan Permohonan Online >>>></a>
            </div>
        </center>
    </div>
</div>

<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
    @if ($latarBelakang->content != null)
    <h3>Latar Belakang</h3>
    <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
        {!! $latarBelakang->content !!}
    </div>
    @endif
    </div>
</div>
</div>
    @stop
