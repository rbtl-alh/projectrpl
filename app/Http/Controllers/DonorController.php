<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use App\Models\User;

class DonorController extends Controller
{
    public function index(Request $request)
    {        
        $user = $request->user();
        $itemdonor = Donor::all();
        $data = array(
            'title' => 'Lihat Donor',
            'user' => $user,
            'itemdonor' => $itemdonor
        );
        return view('donor.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    public function create(Request $request)
    {        
        $itemuser = $request->user();
        $itemdonor = Donor::all();
        $data = array(
            'itemuser' => $itemuser,
            'itemdonor' => $itemdonor
        ); 
        return view('donor.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'goldar' => 'required',
            'usia' => 'required|numeric',
            'alamat' => 'required',
            'status_vaksin' => 'required',
            'riwayat_penyakit' => 'required',
        ]);
        $itemuser = $request->user();
        $inputan = $request->all();
        $inputan['user_id'] = $itemuser->id;
        $itemdonor = Donor::create($inputan);

        return redirect('/donor')->with('status', 'Data Donor Berhasil Ditambahkan!');  
    }

    public function show(Request $request, $id)
    {
        $itemuser = $request->user();
        $itemdonor = Donor::findOrFail($id);
        $data = array(
            'itemuser' => $itemuser,
            'itemdonor' => $itemdonor
        );
        return view('pages.index', $data);
    }

    public function destroy($id)
    {        
        $itemdonor = Donor::findOrFail($id);    
        if ($itemdonor->delete()) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data gagal dihapus');
        }
    }

}





