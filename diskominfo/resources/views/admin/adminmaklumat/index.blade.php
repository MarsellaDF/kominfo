@extends('admin.adminmaklumat.layout')

@section('content')
    <table class="table table-striped table-bordered table-hover" id="table">
        <thead>
            <tr class="users-table-info">
                <th>No</th>
                <th>Image</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($adminMaklumat as $data)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>
                        @if ($data['filename_admin_maklumats'] != null || $data['filename_admin_maklumats'] != '')
                            <img src="/upload/adminmaklumat/{{ $data->filename_admin_maklumats }}" width="300">
                        @else
                            <span style="color: red">Tidak ada gambar</span>
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
                            action="{{ route('adminmaklumat-admin.destroy', $data->id) }}" method="POST">
                            <a href="{{ route('adminmaklumat-admin.edit', $data->id) }}"
                                class="btn btn-warning">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-mute" colspan="4">Maaf!, Data tidak tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
