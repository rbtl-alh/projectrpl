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
        $user = $request->user();
        $itemdonor = Donor::all();
        $data = array(
            'title' => 'Lihat Donor',
            'user' => $user,
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
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'goldar' => 'required',
            'usia' => 'required|numeric',
            'alamat' => 'required',
            'status_vaksin' => 'required',
        ]);
        $itemuser = $request->user();
        $inputan = $request->all();
        $inputan['user_id'] = $itemuser->id;
        $itemdonor = Donor::create($inputan);

        if($itemuser->id == $request->user_id){                    
            return back()->with('failed', 'Gagal');
        }else{
            // return view('pages.bukanadmin');
            return redirect('/donor')->with('status', 'Data Donor Berhasil Ditambahkan!');
        }

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
    public function destroy($id)
    {
        //menghapus data donor
        //(data donor hanya dapat dihapus pada akun user masing-masing)
        $itemdonor = Donor::findOrFail($id);//cari berdasarkan id = $id, 
        // kalo ga ada error page not found 404
        if ($itemdonor->delete()) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data gagal dihapus');
        }
    }

    public function search(Request $request)
    {
        $request->validate([
            'search'=>'required|min:2'
         ]);

         $user = $request->user();
         $search_text = $request->input('search');
         $itemdonor = Donor::where('alamat','LIKE','%'.$search_text.'%')
                    // ->where('cart_id', $itemcart->id)
                  //   ->orWhere('SurfaceArea','<', 10)
                  //   ->orWhere('LocalName','like','%'.$search_text.'%')
                    ->first();
        $data = array('itemdonor' => $itemdonor,
                    'user' => $user);
        return view('donor.index', $data);
    }
}
