<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

    <div class="container-xxl py-5">
        <center>
            <h2>Surat Keputusan Pembentukan</h2>
        </center><br><br>
        <div class="text-center mx-auto mb-5">
            @foreach ($adminSk as $data)
                <td>
                    <iframe class="" width="100%" height="800px" src="/upload/adminsk/{{ $data->image }}"
                        frameborder="0"></iframe>
                </td>
            @endforeach
        </div>
    </div>
@stop
