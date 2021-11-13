<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use App\Models\User;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //mengirim data ke lihat data donor
        $itemuser = $request->user();
        $itemdonor = Donor::all();
        $data = array(
            'itemuser' => $itemuser,
            'itemdonor' => $itemdonor
        );
        return view('donor.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //mengarahkan ke halaman form donor
        $itemuser = $request->user();
        $itemdonor = Donor::all();
        $data = array(
            'itemuser' => $itemuser,
            'itemdonor' => $itemdonor
        );
        return view('donor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //mengambil data yang sudah user isi pada form donor
        $this->validate($request, [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'goldar' => 'required',
            'usia' => 'required|numeric',
            'alamat' => 'required',
            'status_vaksin' => 'required',
        ]);
        $itemuser = $request->user();
        $inputan = $request->all();
        $inputan['user_id'] = $itemuser->id;
        // $itemproduk = Donor::create($inputan);

        return redirect('/donor')->with('status', 'Data Donor Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //melihat data donor yang telah user buat
        //(setiap user akan dapat melihat data donor yang telah di upload)
        $itemuser = $request->user();
        $itemdonor = Donor::findOrFail($id);
        $data = array(
            'itemuser' => $itemuser,
            'itemdonor' => $itemdonor
        );
        return view('pages.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function edit(Donor $donor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donor $donor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donor $donor, $id)
    {
        //menghapus data donor
        //(data donor hanya dapat dihapus pada akun user masing-masing)
        Donor::destroy($donor->id);
        return redirect('/user/', $id)->with('status', 'Data Donor Berhasil Dihapus!');
    }
}
