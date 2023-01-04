<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

    <section class="content">
        <div class="container-fluid p-0">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-3"><strong>Berita</strong></h1>
                <a href="{{ route('berita.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> + Tambah Data Baru</a>
            </div>
            <!-- Main content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Data Berita</h4>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('Berhasil'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Berita</th>
                                            <th>Gambar Berita</th>
                                            <th>Deskripsi Berita</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($berita as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>
                                                    <a data-toggle="modal" class="showDetailData"
                                                        data-target=".modal-show-detail"
                                                        data-image=" {{ url('' . $data->gambar) }}">
                                                        <img src="{{ url('' . $data->gambar) }}"
                                                            alt=" {{ $data->name }}" width="200" height="200">
                                                    </a>
                                                    {{ $data->name }}
                                                </td>
                                                <td>{{ $data->deskripsi }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div>
                                                            <a href="{{ route('berita.edit', $data->id_berita) }}"
                                                                class="btn btn-success mr-2" title="Edit"
                                                                data-toggle="tooltip">
                                                                <i class="align-middle" data-feather="edit"></i> <span
                                                                    class="align-middle"></span> </a>

                                                        </div>
                                                        <div class="px-2">
                                                            <form
                                                                action="{{ route('berita.destroy', $data->id_berita) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="button" class="btn btn-danger" title="Hapus"
                                                                    data-toggle="tooltip"
                                                                    onclick="confirm('{{ __('Apakah anda yakin ingin menghapus ?') }}')? this.parentElement.submit() : ''">
                                                                    <i class="align-middle" data-feather="trash-2"></i>
                                                                    <span class="align-middle"></span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
