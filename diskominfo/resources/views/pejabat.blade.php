<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

<div class="container-xxl py-5">
    <div class="text-center mx-auto mb-5">
        <h3>Pejabat Struktural</h3><br>
        <table class="table table-striped table-bordered table-hover" id="table">
            <thead>
                <tr class="users-table-info">
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Pangkat/Golongan Ruang</th>
                    <th>Pendidikan Terakhir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Status Perkawinan</th>
                    <th>LHKPN</th>
                </tr>
            </thead>
        <tbody>
        @foreach ($adminPejabat as $data)
    </div>
    <tr>
    <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $data->jabatan }}</td>
        <td>{{ $data->nama }}</td>
        <td>{{ $data->nip }}</td>
        <td>{{ $data->pangkat }}</td>
        <td>{{ $data->pendidikan }}</td>
        <td>{{ $data->kelamin }}</td>
        <td>{{ $data->agama }}</td>
        <td>{{ $data->kawin }}</td>
            <td>
                @if ($data['lhkpn'] != null || $data['lhkpn'] != '')
                <a href={{ $data->lhkpn }} target="_blank" class="btn btn-link">Lihat Disini</a>
                @else
                    <span style="color: red">Tidak ada LHKPN</span>
                @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@stop
