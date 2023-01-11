@extends('admin.adminpejabat.layout')

@section('content')
    <table class="table table-striped table-bordered table-hover" style="overflow-y: scroll; overflow-x: hidden; height: 100px; width: 50%" id="table">
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
                    <th>Status</th>
                    <th>Aksi</th>
            </tr>
        </thead>
        <tbody style="overflow-y: scroll; overflow-x: hidden; height: 100px; width: 70%">
            @forelse ($adminPejabat as $data)
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
                    <td>
                        @if ($data->status == true)
                            <div class="badge badge-success">Aktif</div>
                        @else
                            <div class="badge badge-danger">Tidak Aktif</div>
                        @endif
                    </td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('adminpejabat-admin.destroy', $data->id) }}" method="POST">
                            <a href="{{ route('adminpejabat-admin.edit', $data->id) }}"
                                class="btn btn-warning">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-mute" colspan="12">Maaf!, Data tidak tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
