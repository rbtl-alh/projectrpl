@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('img/profile.png') }}" alt="">
                        <h5>{{ $user->name }}</h5>
                        <h5>{{ $user->email }}</h5>
                    </div>
                    <div class="col-8">
                        <h3>Perbarui Profil</h3>
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @method('patch')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="name" name="name" class="form-control" id="email"
                                    ">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                aria-describedby="emailHelp"">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>
                            {{-- <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <h3>Info Donor</h3>
                    <div class="row mb-4">
                        @if(count($itemdonor) == 0)
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="position-absolute bottom-0 start-50 translate-middle-x">
                                    <center>
                                        <div>
                                            <div class="card">
                                                    <h4>Data donor tidak ditemukan</h4>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                        @else                            
                        @foreach ($itemdonor as $itemdonor)
                        <div class="col-md-4">
                            <div class="card " style="width: 18rem;">
                                <div class="card-body">
                                    <p>{{ $itemdonor->nama }}</p>
                                    <p>{{ $itemdonor->jenis_kelamin }}</p>
                                    <p>{{ $itemdonor->goldar }}</p>
                                    <p>{{ $itemdonor->usia }}</p>
                                    <p>{{ $itemdonor->alamat }}</p>
                                    <p>{{ $itemdonor->status_vaksin }}</p>
                                </div>
                            </div>
                            <form action="{{ route('donor.destroy', $itemdonor->id) }}" method="post"
                                style="display:inline;">
                                @csrf
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-sm btn-danger mb-2">
                                    Hapus
                                </button>
                            </form>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
