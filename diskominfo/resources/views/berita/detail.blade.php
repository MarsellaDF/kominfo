<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

    {{-- <!-- berita -->
    <div class="section-berita">
        <div class="breadcrumb-berita text-center">
            <h5 class="">Produk Kami</h5>
        </div>
        <div class="container my-4">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="berita-heading-dua text-center">
                        <h6>Kami besar dengan kepercayaan pelanggan dan Kami <br> Tumbuh untuk Kepuasan Pelanggan</h6>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <img src="{{ url('' . $berita->gambar) }}" class="card-img-top" alt="">
                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="card">
                        {{-- <div class="card-body shadow-sm p-3 mb-5 bg-body rounded">
                            @if ($berita->status == 'Tersedia')
                                <span class="badge bg-info">Tersedia</span>
                            @else
                                <span class="badge bg-danger">Tidak Tersedia</span>
                            @endif --}}
                            <h5>{{ $berita->nama }}</h4>
                                <p>{{ $berita->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container ">
            <div class="text-center mb-4">
                <h5>Lihat Berita Lainnya</h5>
            </div>

            <div class="row">
                @foreach ($oberita as $data)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card shadow p-3 mb-5 bg-body rounded">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $data->nama }}</h5>
                                            <img class="card-img-top" src="{{ url('' . $data->gambar) }}" alt="Card image cap">
                                            <p class="card-text">{{ $data->deskripsi }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="card">
                                        <div class="card-body text-center mt-4">
                                            <div class="bg-light p-2 mb-3">
                                                <h5 class="card-title">{{ $data->nama }}</h5>
                                            </div>
                                            <img class="card-img-top" src="{{ url('' . $data->gambar) }}" alt="Card image cap">
                                            <p class="card-text">{{ $data->deskripsi }}</p>
                                            <a href="{{ url('berita/detail-berita/' . $data->slug) }}"
                                                class="btn btn-primary mt-4 text-white">Lihat Berita</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@stop
