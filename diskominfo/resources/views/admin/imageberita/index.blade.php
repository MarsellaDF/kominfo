@extends('admin.adminberita.layout')

@section('content')
    <table class="table table-striped table-bordered table-hover" id="table">
        <thead>
            <tr class="users-table-info">
                <th>No</th>
                <th>Judul Berita</th>
                <th>Deskripsi Berita</th>
                <th>Image</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $data)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $data->judul }}</td>
                    <td>{!! Str::limit($data->deskripsi  , 100, $end=" ...")!!}</td>
                    <td>
                        @if ($data->image != null || $data->image != '')
                            <img src="/upload/articles/{{ $data->image }}" width="100">
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
                            action="{{ route('adminberita-admin.destroy', $data->id) }}" method="POST">
                            <a href="{{ route('adminberita-admin.edit', $data->id) }}"
                                class="btn btn-warning">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-mute" colspan="6">Maaf!, Data tidak tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
