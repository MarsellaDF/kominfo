<style>
    .grid-container {
        display: grid;
        width: 60%;
        grid-template-columns: auto auto auto;
        padding: 10px;
    }

    .grid-item {
        background-color: rgba(255, 255, 255, 1);
        border: 1px solid rgba(223, 223, 223, 0.8);
        padding: 20px;
        font-size: 30px;
        text-align: center;
    }
</style>
<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

    <div class="container-xxl py-5">
        <div class="text-center mx-auto mb-5">
            <h3>Neraca</h3> <br>

            <center>
                <div class="grid-container">
                    @foreach ($adminNeraca as $data)
                    <div class="grid-item">
                        <div class="owl-carousel-item position-relative">
                            <img class="img-fluid" style="object-fit: contain;"
                            src="/upload/adminneraca/{{ $data->filename_admin_neracas }}">
                        </div>
                    </div>
                    @endforeach
                </div>
            </center>

        </div>
    </div>
@stop
