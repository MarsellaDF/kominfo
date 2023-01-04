<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

<div class="container-xxl py-5">
    <div class="text-center mx-auto mb-5">
        @foreach ($adminPedoman as $data)
            <td>
                <img class="img-fluid rounded w-500 align-self-end"
                src="/upload/adminpedoman/{{ $data->image }}">
            </td>
            @endforeach
    </div>
</div>
@stop
