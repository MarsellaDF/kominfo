<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
    @if ($sejarah->content != null)
    <h1>Sejarah</h1>
    <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
        {!! $sejarah->content !!}
    </div>
    @endif

    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
        @if ($ruangLingkup->content != null)
        <h1>Ruang Lingkup Kegiatan</h1>
        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
            {!! $ruangLingkup->content !!}
        </div>
        @endif

        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            @if ($visiMisi->content != null)
            <h1>Visi dan Misi</h1>
            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                {!! $visiMisi->content !!}
            </div>
            @endif
    </div>
</div>
</div>
    @stop
