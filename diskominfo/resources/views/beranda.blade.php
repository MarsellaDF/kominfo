<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

    <div class="container-fluid header bg-primary p-0 mb-5">
        <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-6 p-5 wow fadeOut" data-wow-delay="0.1s">
                <h2 class="display-6 text-white mb-3">DINAS KOMUNIKASI, INFORMATIKA DAN PERSANDIAN KABUPATEN BANYUWANGI</h2>
            </div>

            <div class="col-lg-6 wow fadeOut" data-wow-delay="0.5s">
                <div class="owl-carousel header-carousel">
                    @foreach ($banners as $data)
                        <div class="owl-carousel-item position-relative">
                            <img class="img-fluid" style="height:500px ; object-fit: cover;"
                                src="/upload/banner/{{ $data->filename_banners }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
        @if ($tujuanSasaran->content != null)
            <h1>Tujuan dan Sasaran</h1>
            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                {!! $tujuanSasaran->content !!}
            </div>
        @endif
    </div>

    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
        @if ($kedudukan->content != null)
            <h1>Kedudukan, Tugas, Dan Fungsi</h1>
            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                {!! $kedudukan->content !!}
            </div>
        @endif
    </div>

    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h2>Berita</h2>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="/berita">Selengkapnya >>></a>
                </li>
            </ul>
            <center>
                <div class="card-group" style="width: 1000px">
                    @if (!$adminBerita->isEmpty())
                        @foreach ($adminBerita as $data)
                            <div class="card">
                                <img class="card-img-top" src="/upload/adminBerita/{{ $data->image }}"
                                    style="height: 200px; background-size: cover; background-repeat: no-repeat;"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data->judul }}</h5>
                                    {{-- <p class="card-text">{!! strip_tags(Str::limit($data->deskripsi, 100, $end = ' ...')) !!}.</p> --}}
                                    <a href="/detail-berita/{{ $data->id }}" class="btn btn-primary">Lihat
                                        Berita</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted"> {{ $data->created_at->format('d F Y') }}</small>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </center>
        </div>
    </div>
@stop
