<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

<div class="container-xxl py-5">
    <div class="text-center mx-auto mb-5">
        <h3>Realisasi Kegiatan</h3><br>
        <table class="table table-striped table-bordered table-hover" id="table">
            <thead>
                <tr class="users-table-info">
                    <th>No</th>
                    <th>Uraian</th>
                    <th>Link</th>
                </tr>
            </thead>
        <tbody>
        @foreach ($adminRealisasi as $data)
    </div>
    <tr>
    <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $data->uraian }}</td>
            <td>
                @if ($data['link'] != null || $data['link'] != '')
                <a href={{ $data->link }} target="_blank" class="btn btn-link">Lihat Disini</a>
                @else
                    <span style="color: red">Tidak ada Link</span>
                @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@stop
