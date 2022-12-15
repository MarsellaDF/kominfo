@extends('admin.admindashum.layout')

@section('content')
    <table class="table table-striped table-bordered table-hover" id="table">
        <thead>
            <tr class="users-table-info">
                <th>No</th>
                <th>Title</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($adminDashum as $data)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>
                        {{ $data->title }}
                    </td>
                    <td>
                        @if ($data->status == true)
                            <div class="badge badge-success">Aktif</div>
                        @else
                            <div class="badge badge-danger">Tidak Aktif</div>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admindashum-admin.edit', $data->id) }}"
                            class="btn btn-warning">EDIT</a>
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
