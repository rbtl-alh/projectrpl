{{-- @dd($itemdonor) --}}
{{-- @php
$title = 'Lihat Donor';
$user = $itemuser;
$donor = $itemdonor;
@endphp --}}

@extends('layouts.main')
@section('container')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    
    @if(count($itemdonor) > 0)
    <div class="row g-3 align-item-center justify-content-sm-center">
        <div class="col-4">            
            <div class="form-group">                
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="bi bi-search"></i>
                    &nbsp;
                    &nbsp;
                  </div>
                  <input onkeyup="myFunction()" id="myInput" name="search" class="form-control border-danger" type="search" placeholder="masukkan lokasi" aria-label="Search">
                </div>
              </div>
        </div>
    </div>


    
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Golongan Darah</th>
                <th scope="col">Usia</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Riwayat Penyakit</th>
                <th scope="col">Status Vaksin</th>
                <th scope="col">Kontak</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($itemdonor as $donor)
        <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $donor->nama }}</td>
            <td>{{ $donor->jenis_kelamin }}</td>
            <td>{{ $donor->goldar }}</td>
            <td>{{ $donor->usia }}</td>
            <td>{{ $donor->alamat }}</td>
            <td>{{ $donor->riwayat_penyakit }}</td>
            <td>{{ $donor->status_vaksin }}</td>
            <td>{{ $donor->email }}</td>
        </tr>
        @endforeach
        {{-- @foreach ($user as $itemuser)
            
            @endforeach --}}
            
            
        </tbody>
    </table>
    @else
        <div class="row">
            <div class="col-12">
                <div class="position-absolute top-50 start-50 translate-middle">
                    <center>
                        <div class="card">
                            <div class="card-body">
                                <h4>Maaf, data donor belum tersedia :(</h4>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    @endif


    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[5];
                console.log(td);
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";                
                        }
                    }
            }

        }
    </script>

</body>
</html>

    </ol>

    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script> --}}
@endsection
