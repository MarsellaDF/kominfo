<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

<div class="container-fluid header bg-primary p-0 mb-5">
    <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
        <div class="col-lg-6 p-5 wow fadeOut" data-wow-delay="0.1s">
            <h2 class="display-6 text-white mb-3">DINAS KOMUNIKASI INFORMATIKA DAN PERSANDIAN KAB BANYUWANGI</h2>
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

<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
    @if ($kedudukan->content != null)
    <h1>Kedudukan, Tugas, Dan Fungsi</h1>
    <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
        {!! $kedudukan->content !!}
    </div>
    @endif

<div class="container">
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="/berita">Selengkapnya >>></a>
          </li>
    </ul>
    <div class="card-group">
        <div class="card">
          <img class="card-img-top" src=".../100px180/" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <a href="#" class="btn btn-primary">Lihat Berita</a>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src=".../100px180/" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Lihat Berita</a>
        </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
        <div class="card">
            <img class="card-img-top" src=".../100px180/" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Lihat Berita</a>
          </div>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        <div class="card">
          <img class="card-img-top" src=".../100px180/" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <a href="#" class="btn btn-primary">Lihat Berita</a>
        </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
      </div>
    </div>
</div>
    @stop
