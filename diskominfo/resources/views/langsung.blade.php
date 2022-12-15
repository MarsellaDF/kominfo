<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

<div class="container-xxl py-5">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
        @if ($mekanismePermohonanInformasiPublik->content != null)
        <h1>MEKANISME PERMOHONAN INFORMASI PUBLIK</h1><br>
        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
        {!! $mekanismePermohonanInformasiPublik->content !!}
        @endif
    </div>

    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
        @if ($jangkaWaktuPenyelesaian->content != null)
        <h1>JANGKA WAKTU PENYELESAIAN</h1><br>
        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
        {!! $jangkaWaktuPenyelesaian->content !!}
        @endif
    </div>

    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
        @if ($biaya->content != null)
        <h1>BIAYA/TARIF</h1><br>
        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
        {!! $biaya->content !!}
        @endif
    </div>

    <div class="container-xxl py-5">
        <div class="text-center mx-auto mb-5">
            <h3 id="permohonan">ALUR PERMOHONAN INFORMASI</h3>
            @foreach ($adminPermohonan as $data)
        </div>
            <img class="img-fluid rounded w-500 align-self-end"
                src="/upload/adminpermohonan/{{ $data->filename_admin_permohonans }}"><br>
        </div>
        @endforeach
    </div>

    <div class="container-xxl py-5">
        <div class="text-center mx-auto mb-5">
            <h3 id="keberatan">ALUR PENGAJUAN KEBERATAN</h3>
            @foreach ($adminKeberatan as $data)
        </div>
            <img class="img-fluid rounded w-500 align-self-end"
                src="/upload/adminkeberatan/{{ $data->filename_admin_keberatans }}"><br>
        </div>
        @endforeach
    </div>
</div>
</div>
    @stop
