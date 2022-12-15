<!DOCTYPE html>
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
    <link href="/assets/template/img/logo.png" rel="icon">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Formulir Permohonan Informasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('permohonan_online.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nomor Induk
                                            Kependudukan</label>
                                        <input name="nik" type="text" class="form-control" maxlength="16"
                                            data-minlength="16" id="exampleFormControlInput1"
                                            placeholder="35**************" value="{{ $dataPengguna->nik }}">
                                        @error('nik')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                                        <input name="name" type="text" class="form-control"
                                            value="{{ $dataUser->name }}" id="exampleFormControlInput1"
                                            placeholder="Nama Lengkap Anda">
                                        @error('nama')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Alamat Lengkap</label>
                                        <input name="address" type="text" class="form-control"
                                            value="{{ $dataPengguna->address }}" id="exampleFormControlInput1"
                                            placeholder="Isikan Alamat Lengkap Anda">
                                        @error('alamat')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <input name="email" type="text" class="form-control"
                                            value="{{ $dataPengguna->email }}" id="exampleFormControlInput1"
                                            placeholder="Isikan Email Anda">
                                        @error('email')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Pekerjaan</label>
                                        <input name="jobs" type="text" class="form-control"
                                            value="{{ $dataPengguna->jobs }}" id="exampleFormControlInput1"
                                            placeholder="Isikan Pekerjaan Anda">
                                        @error('pekerjaan')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nomor
                                            Telepon/WhatsApp</label>
                                        <input name="telepon" type="text" class="form-control" maxlength="13"
                                            data-minlength="13" id="exampleFormControlInput1"
                                            placeholder="62***********" value="{{ $dataPengguna->telepon }}">
                                        @error('nomor')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">Universitas</label>
                                                <input name="universitas" type="text" class="form-control"
                                                    value="{{ old('universitas') }}" id="exampleFormControlInput1"
                                                    placeholder="nama universitas kamu studi">
                                                @error('universitas')
                                                    <div class="text-danger">* {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div> -->

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Informasi Yang
                                            Dibutuhkan</label>
                                        <input name="informasi" type="text" class="form-control"
                                            value="{{ old('informasi') }}" id="exampleFormControlInput1"
                                            placeholder="Isikan informasi yang sedang anda butuhkan">
                                        @error('informasi')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Alasan dan Tujuan
                                            Penggunaan Informasi</label>
                                        <input name="alasan_tujuan" type="text" class="form-control"
                                            value="{{ old('alasan_tujuan') }}" id="exampleFormControlInput1"
                                            placeholder="Isikan alasan dan tujuan anda dalam penggunaan informasi">
                                        @error('alasan_tujuan')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Cara Mendapatkan
                                            Informasi</label>
                                        <select name="cara" id="informasi" class="form-select">
                                            <option value="">-Pilih</option>
                                            <option value="Email"
                                                {{ old('cara') == 'Email' ? 'selected=selected' : '' }}>Dikirimkan
                                                Melalui Email
                                            </option>
                                            <option value="WhatsApp"
                                                {{ old('cara') == 'Nomor' ? 'selected=selected' : '' }}>Dikirimkan
                                                Melalui Nomor WhatsApp
                                            </option>
                                        </select>
                                        @error('cara')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Foto KTP</label>
                                        <input name="ktp" type="file" class="form-control" value="{{ old('ktp') }}"
                                            id="exampleFormControlInput1" accept="image/*"
                                            placeholder="Upload Foto KTP terlebih dahulu">
                                        @error('informasi')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Angkatan</label>
                                        <input name="angkatan" type="text" class="form-control" maxlength="4"
                                            value="{{ old('angkatan') }}" data-minlength="4"
                                            id="exampleFormControlInput1" placeholder="contoh: 2020">
                                        @error('angkatan')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Dapat info Kami
                                            dari mana?</label>
                                        <select name="info" id="info" class="form-select">
                                            <option value="">-Pilih</option>
                                            <option value="IG"
                                                {{ old('info') == 'IG' ? 'selected=selected' : '' }}>IG
                                            </option>
                                            <option value="FB"
                                                {{ old('info') == 'FB' ? 'selected=selected' : '' }}>FB
                                            </option>
                                            <option value="WA"
                                                {{ old('info') == 'WA' ? 'selected=selected' : '' }}>WA
                                            </option>
                                            <option value="WEBSITE"
                                                {{ old('info') == 'WEBSITE' ? 'selected=selected' : '' }}>WEBSITE
                                            </option>
                                            <option value="EMAIL"
                                                {{ old('info') == 'EMAIL' ? 'selected=selected' : '' }}>EMAIL
                                            </option>
                                            <option value="TEMAN"
                                                {{ old('info') == 'TEMAN' ? 'selected=selected' : '' }}>TEMAN
                                            </option>
                                            <option value="SAUDARA"
                                                {{ old('info') == 'SAUDARA' ? 'selected=selected' : '' }}>SAUDARA
                                            </option>
                                            <option value="KIOS"
                                                {{ old('info') == 'KIOS' ? 'selected=selected' : '' }}>KIOS
                                            </option>
                                        </select>
                                        @error('info')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Judul
                                            Penelitian</label>
                                        <input name="judul_penelitian" type="text" class="form-control"
                                            id="exampleFormControlInput1" value="{{ old('judul_penelitian') }}"
                                            placeholder="contoh: sistem informasi absensi berbasis android">
                                        @error('judul_penelitian')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Kritik dan
                                            saran</label>
                                        <textarea name="kds" class="form-control kds" id="kds" rows="3"
                                            placeholder="Kritik dan saran kamu buat takolah selaku penyedia layanan">{{ old('kds') }}</textarea>
                                        @error('kds')
                                            <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div> -->
                                    <div class="mb-3">
                                        <button class="btn btn-success" type="submit"><i class="bi bi-send"></i>
                                            KIRIM</button>
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
</body>

</html>