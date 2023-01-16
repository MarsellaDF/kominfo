{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--JQUERY-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-slim@3.0.0/dist/jquery.slim.min.js"></script>

    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <meta charset="utf-8">
    <title>PPID DISKOMINFO KABUPATEN BANYUWANGI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="/assets/template/img/logo.png" style="object-fit: contain;" rel="icon">
</head> --}}
<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')
    {{-- <body> --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Formulir Keberatan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pengajuankeberatan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tujuan Penggunaan Informasi</label>
                                <input name="tujuan" type="text" class="form-control" value=""
                                    id="exampleFormControlInput1" placeholder="Isi Tujuan Penggunaan Informasi">
                                @error('tujuan')
                                    <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div><br>

                            <h6>--Identitas Pemohon--</h6>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                                <input name="nama1" type="text" class="form-control" value=""
                                    id="exampleFormControlInput1" placeholder="Nama Lengkap Pemohon">
                                @error('nama1')
                                    <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Alamat Lengkap</label>
                                <input name="alamat1" type="text" class="form-control" value=""
                                    id="exampleFormControlInput1" placeholder="Alamat Lengkap Pemohon">
                                @error('alamat1')
                                    <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Pekerjaan</label>
                                <input name="pekerjaan" type="text" class="form-control" value=""
                                    id="exampleFormControlInput1" placeholder="Pekerjaan Pemohon">
                                @error('pekerjaan')
                                    <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nomor Telepon/WhatsApp</label>
                                <input name="nomor1" type="text" class="form-control" maxlength="12" data-minlength="12"
                                    id="exampleFormControlInput1" placeholder="62***********" value="">
                                @error('nomor1')
                                    <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div><br>

                            <h6>--Identitas Kuasa Pemohon--</h6>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                                <input name="nama2" type="text" class="form-control" value=""
                                    id="exampleFormControlInput1" placeholder="Nama Lengkap Kuasa Pemohon">
                                @error('nama2')
                                    <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Alamat Lengkap</label>
                                <input name="alamat2" type="text" class="form-control" value=""
                                    id="exampleFormControlInput1" placeholder="Alamat Lengkap Kuasa Pemohon">
                                @error('alamat2')
                                    <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nomor Telepon/WhatsApp</label>
                                <input name="nomor2" type="text" class="form-control" maxlength="12" data-minlength="12"
                                    id="exampleFormControlInput1" placeholder="62***********" value="">
                                @error('nomor2')
                                    <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div><br>

                            <h6>--Alasan Pengajuan Keberatan--</h6>
                            <div class="mb-3">
                                <select name="alasan" id="informasi" class="form-select">
                                    <option value="">-Pilih</option>
                                    <option value="Permohonan Informasi ditolak"
                                        {{ old('alasan') == 'Permohonan Informasi ditolak' ? 'selected=selected' : '' }}>
                                        Permohonan Informasi ditolak
                                    </option>
                                    <option value="Informasi berkala tidak disediakan"
                                        {{ old('alasan') == 'Informasi berkala tidak disediakan' ? 'selected=selected' : '' }}>
                                        Informasi berkala tidak disediakan
                                    </option>
                                    <option value="Permintaan informasi tidak ditanggapi"
                                        {{ old('alasan') == 'Permintaan informasi tidak ditanggapi' ? 'selected=selected' : '' }}>
                                        Permintaan informasi tidak ditanggapi
                                    </option>
                                    <option value="Permintaan informasi ditanggapi tidak sebagaimana yang diminta"
                                        {{ old('alasan') == 'Permintaan informasi ditanggapi tidak sebagaimana yang diminta' ? 'selected=selected' : '' }}>
                                        Permintaan informasi ditanggapi tidak sebagaimana yang diminta
                                    </option>
                                    <option value="Permintaan informasi tidak dipenuhi"
                                        {{ old('alasan') == 'Permintaan informasi tidak dipenuhi' ? 'selected=selected' : '' }}>
                                        Permintaan informasi tidak dipenuhi
                                    </option>
                                    <option value="Biaya yang dikenakan tidak wajar"
                                        {{ old('alasan') == 'Biaya yang dikenakan tidak wajar' ? 'selected=selected' : '' }}>
                                        Biaya yang dikenakan tidak wajar
                                    </option>
                                    <option value="Informasi disampaikan melebihi jangka waktu yang ditentukan"
                                        {{ old('alasan') == 'Informasi disampaikan melebihi jangka waktu yang ditentukan' ? 'selected=selected' : '' }}>
                                        Informasi disampaikan melebihi jangka waktu yang ditentukan
                                    </option>
                                </select>
                                @error('alasan')
                                    <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit"><i class="bi bi-send"></i>KIRIM</button>
                            </div>
                    </div>
                </div>
                </form>

            </div>
            <!--end card body-->
        </div>
        <!--end card -->
    </div>
    <!--end container-->
    </div>
    </div>
    {{-- </body> --}}
@stop

{{-- </html> --}}
