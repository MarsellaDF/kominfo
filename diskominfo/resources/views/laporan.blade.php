<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

<div class="container-xxl py-5">
    <div class="text-center mx-auto mb-5">
        <h3>LAPORAN INFORMASI</h3><br>
        <table class="table table-striped table-bordered table-hover" id="table">
            <thead>
                <tr class="users-table-info">
                    <th>No</th>
                    <th>Perihal</th>
                    <th>Lihat Perihal</th>
                </tr>
            </thead>
        <tbody>
        @foreach ($adminLaporan as $data)
    </div>
    <tr>
    <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $data->title }}</td>
            <td>
                @if ($data['image'] != null || $data['image'] != '')
                    <a href="/upload/adminlaporan/{{ $data->image }}" target="_blank" class="btn btn-outline-secondary"> VIEW </a>
                    {{-- <img src="/upload/adminlaporan/{{ $data->filename_admin_laporans }}"> --}}
                @else
                    <span style="color: red">Tidak ada file</span>
                @endif
                    </td>
                </tr>
        {{-- <img class="img-fluid rounded w-500 align-self-end"
            src="/upload/adminlaporan/{{ $data->image }}"> --}}
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@stop
