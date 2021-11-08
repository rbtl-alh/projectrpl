<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
          <div class="col col-lg-6 col-md-6">
            <div class="card">
              <div class="card-header">
                
              </div>
              <div class="card-body">
                @if(count($errors) > 0)
                @foreach($errors->all() as $error)
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
                <form action="/donor" method="post" enctype="multipart/form-data">
                  @csrf
            
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                    id="nama" placeholder="Nama" name="nama" value="{{ old('nama') }}">
                    @error('nama')
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
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="O">O</option>
                      <option value="AB">AB</option>
                    </select>
                    @error('goldar')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="usia" class="form-label">Usia</label>
                    <input type="number" min=10 class="form-control @error('usia') is-invalid @enderror" 
                    id="usia" placeholder="Masukkan Usia" name="usia" value="{{ old('usia') }}">
                    @error('usia')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" 
                    id="alamat" placeholder="Masukkan Alamat" name="alamat" value="{{ old('alamat') }}">
                    @error('alamat')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="status_vaksin" class="form-label">Status Vaksin</label>
                    <select name="status_vaksin" id="status_vaksin" class="form-control">    
                      <option value=""></option>               
                      <option value="" disabled selected>pilih status vaksin</option>   
                      <option value="Vaksin Satu">Vaksin 1</option>
                      <option value="Vaksin Dua">Vaksin 2</option>
                      <option value="Belum">Belum</option>
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
      
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>


