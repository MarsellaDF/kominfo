<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

    <div class="container-xxl py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            @if ($mekanismePermohonanInformasiPublik->content != null)
                <h3>Mekanisme Permohonan Informasi Publik</h3><br>
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    {!! $mekanismePermohonanInformasiPublik->content !!}
                </div>
            @endif
        </div>

        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            @if ($jangkaWaktuPenyelesaian->content != null)
                <h3>Jangka Waktu Penyelesaian</h3><br>
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    {!! $jangkaWaktuPenyelesaian->content !!}
                </div>
            @endif
        </div>

        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            @if ($biaya->content != null)
                <h3>Biaya / Tarif</h3><br>
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    {!! $biaya->content !!}
                </div>
            @endif
        </div>

        <div class="container-xxl py-5">
            <div class="text-center mx-auto mb-5">
                <h3 id="permohonan">Alur Permohonan Informasi</h3>
                @foreach ($adminPermohonan as $data)
            </div>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid rounded w-500 align-self-end"
                    src="/upload/adminpermohonan/{{ $data->filename_admin_permohonans }}"><br>
            </div>
            @endforeach
        </div>

        <div class="container-xxl py-5">
            <div class="text-center mx-auto mb-5">
                <h3 id="keberatan">Alur Pengajuan Keberatan</h3>
                @foreach ($adminKeberatan as $data)
            </div>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid rounded w-500 align-self-end"
                    src="/upload/adminkeberatan/{{ $data->filename_admin_keberatans }}"><br>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>
@stop
