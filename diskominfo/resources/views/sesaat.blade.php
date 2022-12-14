<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

<div class="container-xxl py-5">
    <div class="text-center mx-auto mb-5">
        <h3>Daftar Informasi Setiap Saat (DIP)</h3><br>
        <table class="table table-striped table-bordered table-hover" id="table">
            <thead>
                <tr class="users-table-info">
                    <th>No</th>
                    <th>Ringkasan Informasi</th>
                    <th>Penguasa Informasi</th>
                    <th>Penanggung Jawab</th>
                    <th>Tempat dan Waktu</th>
                    <th>Retensi Arsip</th>
                </tr>
            </thead>
        <tbody>
        @foreach ($adminSesaat as $data)
    </div>
    <tr>
    <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $data->ringkasan }}</td>
        <td>{{ $data->penguasa }}</td>
        <td>{{ $data->penanggungjawab }}</td>
        <td>{{ $data->waktu }}</td>
        <td>{{ $data->arsip }}</td>
            {{-- <td>
                @if ($data['url'] != null || $data['url'] != '')
                <a href={{ $data->url }} target="_blank" class="btn btn-link">Lihat Disini</a>
                @else
                    <span style="color: red">Tidak ada URL</span>
                @endif
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@stop
