<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

<!-- Header Start -->
<div class="container-fluid header bg-primary p-0 mb-5">
    <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
        <div class="col-lg-6 p-5 wow fadeOut" data-wow-delay="0.1s">
            <h2 class="display-4 text-white mb-5">PPID Dinas Kominfo Kab Banyuwangi</h2>
            <a href="/login_pengguna" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Pengajuan
                Permohonan Online >>>></a>
            <!-- <div class="row g-4">
                    <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <h2 class="text-white mb-1" data-toggle="counter-up">123</h2>
                            <p class="text-light mb-0">Expert Doctors</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <h2 class="text-white mb-1" data-toggle="counter-up">1234</h2>
                            <p class="text-light mb-0">Medical Stuff</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <h2 class="text-white mb-1" data-toggle="counter-up">12345</h2>
                            <p class="text-light mb-0">Total Patients</p>
                        </div>
                    </div>
                </div> -->
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
<!-- Header End -->

<!-- Latar Start -->
<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
    @if ($latarBelakang->content != null)
    <h1>Latar Belakang</h1>
    <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
        {!! $latarBelakang->content !!}
    </div>
    @endif
    <!-- Latar End -->

    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($keanggotaans as $data)
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="/upload/keanggotaan/{{ $data->filename_keanggotaans }}">
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
    <!-- Team Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                @if ($susunanKeanggotaanPPID->content != null)
                <h1>Susunan Keanggotaan PPID</h1><br>
                {!! $susunanKeanggotaanPPID->content !!}
                @endif
            </div>
        </div>
    </div> --}}
    <!-- Team End -->

    <!-- Testimonial Start -->
    <!-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Testimonial</p>
                <h1>What Say Our Patients!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="assets/template/img/testimonial-1.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                        <h5 class="mb-1">Patient Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="assets/template/img/testimonial-2.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                        <h5 class="mb-1">Patient Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="assets/template/img/testimonial-3.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                        <h5 class="mb-1">Patient Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Testimonial End -->

    @stop
