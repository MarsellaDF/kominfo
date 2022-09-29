<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

    <!-- Header Start -->
    <div class="container-fluid header bg-primary p-0 mb-5">
        <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-6 p-5 wow fadeOut" data-wow-delay="0.1s">
                <h2 class="display-4 text-white mb-5">PPID Dinas Kominfo Kab Banyuwangi</h2>
                <a href="/login" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Pengajuan Permohonan Online >>>></a>
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
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="/assets/template/img/start1.jpg"></div>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="/assets/template/img/start2.jpg"></div>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="/assets/template/img/start3.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Latar Start -->
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1>Latar Belakang</h1>
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    <p>Reformasi yang bergulir pada tahun 1998 yang ditandai dengan 3(tiga) tuntutan yaitu; demokratisasi, tranparasi dan supremasi hukum & HAM, telah membawa perubahan mendasar dalam kehidupan bermasyarakat, berbangsa dan benegara. Konsekuensi dari tuntutan reformasi tersebut salah satu diantaranya adalah ditetapkannya UU N0.14 tahun 2008 tentang Keterbukaan Informasi Publik yang bertujuan untuk mewujudkan tata kelola pemerintahan yang baik dan bertanggungjawab (good governance) melalui penerapan prinsip-prinsip akuntabilitas, transparansi dan supremasi hukum serta melibatkan partisipasi masyarakat dalam setiap proses kebijakan publik.</p>
                    <p class="mb-4">Dalam proses keterlibatan masyarakat perlu diakomodasikan dengan cara mempermudah jaminan akses informasi publik berdasarkan pedoman pengelolaan informasi dan dokumentasi. Dalam kaitan ini, pengelolaan informasi dan dokumentasi publik diharapkan tidak sampai mengganggu prinsip kehati-hatian dalam menjaga kelangsungan kehidupan berbangsa dan bernegara untuk kepentingan yang lebih luas.</p>
                    <p class="mb-4">Penerapan prinsip-prinsip good governance ini pada dasarnya sangat tergantung pada persiapan masing-masing Kementerian Komunikasi dan Informatika dalam mengelola informasi dan dokumentasi bagi masyarakat. Untuk itu, sebagai upaya menyamakan persepsi dalam menciptakan dan menjamin kelancaraan dalam pelayanan informasi publik, maka disusun Pedoman Pengelolaan Informasi dan Dokumentasi di lingkungan Kementerian Komunikasi dan Informatika.</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Maksud</p>
                    <p>Pedoman pengelolaan Informasi dan Dokumentasi di lingkungan Kementerian Komunikasi dan Informatika dimaksudkan sebagai acuan bagi setiap Satuan Kerja dalam penyediaan, pengumpulan, pendokumentasian dan pelayanan, serta penetapan Pejabat Pengelola Informasi dan Dokumentasi.</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Tujuan</p>
                    <p>a. Masing-masing Satuan Kerja mampu menyediakan, mengumpulkan, mendokumentasikan dan menyampaikan informasi tentang kegiatan dan produk unit kerjanya secara akurat dan tidak menyesatkan;<br>
                        b. Satuan Kerja mampu menyediakan, mengumpulkan, mendokumentasikan dan menyampaikan bahan dan produk informasi secara cepat dan tepat waktu;<br>
                        c. Pejabat Pengelola Informasi dan Dokumentasi mampu memberikan pelayanan informasi secara cepat dan tepat waktu dengan biaya ringan dan cara sederhana.</p>
                </div>
    <!-- Latar End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h1>Susunan Keanggotaan PPID</h1>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
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
    </div>
    <!-- Testimonial End -->

@stop