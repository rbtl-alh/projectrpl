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
        //
        // $itemdonor = Donor::all();
        // return view('pages.index', compact('itemdonor'));
        $itemuser = $request->user();
        $itemdonor = Donor::all();
        $data = array('itemuser' => $itemuser,
                'itemdonor' => $itemdonor);
        return view('donor.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('donor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $itemproduk = Donor::create($inputan);
        
        return redirect('/')->with('status', 'Data Donor Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $itemuser = $request->user();
        $itemdonor = Donor::findOrFail($id);
        $data = array(
                'itemuser' => $itemuser,
                'itemdonor' => $itemdonor);
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
    public function destroy(Donor $donor)
    {
        //
    }
}
