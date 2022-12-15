@extends('admin.adminsesaat.layout')

@section('content')
    <table class="table table-striped table-bordered table-hover" id="table">
        <thead>
            <tr class="users-table-info">
                <th>No</th>
                <th>Judul Informasi</th>
                <th>Jenis Media Yang Memuat Informasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($adminSesaat as $data)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>

                    <td>{{ $data->title }}</td>
                    <td>
                        @if ($data['url'] != null || $data['url'] != '')
                        <a href={{ $data->url }} target="_blank" class="btn btn-link">Lihat Disini</a>
                        @else
                            <span style="color: red">Tidak ada URL</span>
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
                            action="{{ route('adminsesaat-admin.destroy', $data->id) }}" method="POST">
                            <a href="{{ route('adminsesaat-admin.edit', $data->id) }}"
                                class="btn btn-warning">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-mute" colspan="5">Maaf!, Data tidak tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
