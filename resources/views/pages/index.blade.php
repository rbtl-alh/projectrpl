@extends('layouts.main')

@section('container')
    <div class="info">
        <h1 class="red">DoRa <br> Donor Darah</h1>
        <a class='btn btn-danger btn-lg' href='/donor/create'><i class="bi bi-plus-lg"></i> Donor Sekarang</a>

    </div>
    <hr>
    <ul>
        <li>Usia 18-60 tahun</li>
        <li>Berat badan ≥ 55kg</li>
        <li>Diutamakan pria, apabila perempuan belum pernah hamil</li>
        <li>Pernah terkonfirmasi COVID-19 dengan Surat keterangan sembuh dari dokter yang merawat</li>
        <li>Bebas keluhan minimal 14 hari</li>
        <li>Tidak menerima transfusi darah selama 6 bulan terakhir</li>
        <li>Lebih diutamakan yang pernah mendonorkan darah</li>
    </ul>

@endsection
