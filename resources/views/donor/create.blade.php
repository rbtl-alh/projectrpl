{{-- @dd($itemuser) --}}
@php
$title = 'Daftar Donor';
$user = $itemuser;
$donor = $itemdonor;
@endphp

@extends('layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col col-lg-7 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center pt-4 mb-10" style="font-size: 3rem; font-weight: 700;">Formulir Donor</h1>
                    </div>
                    <div class="card-body">
                        {{-- bagian error --}}
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-warning">{{ $error }}</div>
                            @endforeach
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-warning">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        {{-- form pendaftaran --}}
                        <form action="/donor" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    placeholder="Nama" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Kontak yang dapat dihubungi</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="kontak" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="" disabled selected>pilih jenis kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="goldar" class="form-label">Golongan Darah</label>
                                {{-- <input type="text" class="form-control @error('goldar') is-invalid @enderror"
                    id="goldar" placeholder="Masukkan golongan darah" name="goldar" value="{{ old('goldar') }}"> --}}
                                <select name="goldar" id="goldar" class="form-control">
                                    <option value="" disabled selected>pilih golongan darah</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                                @error('goldar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="usia" class="form-label">Usia</label>
                                <input type="number" min=18 max=60 class="form-control @error('usia') is-invalid @enderror"
                                    id="usia" placeholder="Masukkan Usia" name="usia" value="{{ old('usia') }}">
                                @error('usia')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>                                
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                    placeholder="masukkan kota/kabupaten domisili" name="alamat" value="{{ old('alamat') }}">
                                @error('alamat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Riwayat Penyakit</label>                                
                                <input type="text" class="form-control @error('riwayat_penyakit') is-invalid @enderror" id="riwayat_penyakit"
                                    placeholder="masukkan riwayat penyakit" name="riwayat_penyakit" value="{{ old('riwayat_penyakit') }}">
                                @error('riwayat_penyakit')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status_vaksin" class="form-label">Status Vaksin</label>
                                <select name="status_vaksin" id="status_vaksin" class="form-control">
                                    <option value=""></option>
                                    <option value="" disabled selected>pilih status vaksin</option>
                                    <option value="Sudah Vaksin Satu">Sudah Vaksin 1</option>
                                    <option value="Sudah Vaksin Dua">Sudah Vaksin 2</option>
                                    <option value="Belum Vaksin">Belum Vaksin</option>
                                </select>
                                @error('status_vaksin')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
