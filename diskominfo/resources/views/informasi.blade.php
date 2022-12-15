<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

<div class="row gy-4">
    <div class="col-lg-3 col-md-6">
        <div class="count-box">
            <i class="bi bi-file-earmark-richtext">
            </i>
            <div>
                <span data-purecounter-start="0" data-purecounter-end="133" data-purecounter-duration="0"
                    class="purecounter">133 </span>
                <p>Total Permohonan</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="count-box">
            <i class="bi bi-file-earmark-medical" style="color: ee6c20;">
            </i>
            <div>
                <span data-purecounter-start="0" data-purecounter-end="133" data-purecounter-duration="0"
                    class="purecounter">133 </span>
                <p>Permohonan Diproses</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="count-box">
            <i class="bi bi-file-earmark-check" style="color: 15be56;">
            </i>
            <div>
                <span data-purecounter-start="0" data-purecounter-end="133" data-purecounter-duration="0"
                    class="purecounter">133 </span>
                <p>Permohonan Selesai</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="count-box">
            <i class="bi bi-file-earmark-excel" style="color: bb0852;">
            </i>
            <div>
                <span data-purecounter-start="0" data-purecounter-end="133" data-purecounter-duration="0"
                    class="purecounter">133 </span>
                <p>Permohonan Ditolak</p>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <table class="table1">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Permohonan</th>
                        <th>Nama Pemohon</th>
                        <th>Detail Permohonan</th>
                        <th>Status Permohonan</th>
                </table>
            </div>
        </div>
    </div>
    @stop