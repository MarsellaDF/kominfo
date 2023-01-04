<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

    <!-- berita -->
    {{-- <div class="section-berita">
        <div class="breadcrumb-berita text-center">
            <h5 class="">Produk Kami</h5>
        </div>
        <div class="container my-4">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="berita-heading-dua text-center">
                        <h6>Jamur Tiram Bondowoso <br> Besar dengan Kepercayaan Pelanggan <br> Tumbuh untuk Kepuasan
                            Pelanggan </h6>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container">
            <div class="row">
                @foreach ($berita as $data)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card shadow p-3 mb-5 bg-body rounded">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $data->nama }}</h5>
                                            <img class="card-img-top" src="{{ $data->gambar }}" alt="Card image cap">
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
                                            <img class="card-img-top" src="{{ $data->gambar }}" alt="Card image cap">
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
