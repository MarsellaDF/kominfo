<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            @if ($dasarHukumPembentukan->content != null)
            <h1>DASAR HUKUM PEMBENTUKAN</h1>
            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                {!! $dasarHukumPembentukan->content !!}
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@stop
