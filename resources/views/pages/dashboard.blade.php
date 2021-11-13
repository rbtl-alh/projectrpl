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
                        <h3>Account Setting</h3>
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @method('patch')
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    aria-describedby="emailHelp" value="{{ $user->email }}">
                                <div id="email" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <h3>Info Donor</h3>
                    @foreach ($itemdonor as $itemdonor)
                        <div class="card " style="width: 18rem">
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
