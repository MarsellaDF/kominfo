<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

    @if ($errors->any())
        <div class=" alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid p-0">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-3"><strong>Berita</strong></h1>
                <a href="{{ route('berita.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i>Lihat Semua Data</a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Edit Berita</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('berita.update', $berita->id_berita) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama">Nama Berita</label>
                                    <input type="text" class="form-control mb-3" id="nama" value="{{ $berita->nama }}"
                                        name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi berita</label>
                                    <textarea type="text" class="form-control mb-3" id="deskripsi" name="deskripsi">{{ $berita->deskripsi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar berita</label>
                                    <input type="file" class="form-control-file mb-3" id="gambar" name="gambar"
                                        value="{{ $berita->gambar }}"><br>
                                    <div class="d-flex align-items-start mb-3">
                                        <img width="100px" height="100px" src="{{ url('' . $berita->gambar) }}"
                                            alt=" {{ $berita->name }}">
                                    </div>
                                </div>
                                <input type="submit" value="simpan" class="btn btn-primary"></td>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
