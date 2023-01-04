@extends('admin.adminpedoman.layout')

@section('content')
    <table class="table table-striped table-bordered table-hover" id="table">
        <thead>
            <tr class="users-table-info">
                <th>No</th>
                <th>Title</th>
                <th>File</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($adminPedoman as $data)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>

                    <td>{{ $data->title }}</td>
                    <td>
                        @if ($data['image'] != null || $data['image'] != '')
                        <a href="/upload/adminpedoman/{{ $data->image }}" target="_blank" class="btn btn-outline-primary"> VIEW </a>
                            {{-- <img src="/upload/adminpedoman/{{ $data->filename_admin_laporans }}"> --}}
                        @else
                            <span style="color: red">Tidak ada file</span>
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
                            action="{{ route('adminpedoman-admin.destroy', $data->id) }}" method="POST">
                            <a href="{{ route('adminpedoman-admin.edit', $data->id) }}"
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
