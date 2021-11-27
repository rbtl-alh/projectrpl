<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\Donor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //mengirim data user ke halaman home, untuk ditampilkan pada navbar
        $user = $request->user();
        $data = array(
            'user' => $user,
            'title' => 'Home',
        );
        return view('pages.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //melihat profil user
        $itemuser = $request->user();
        $user = User::findOrFail($id);
        $itemdonor = Donor::where('user_id', $itemuser->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'Profile';
        $data = array(
            'user' => $user,
            'title' => $title,
            'itemdonor' => $itemdonor
        );
        return view('pages.dashboard', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(ChangePasswordRequest $request)
    public function update(Request $request, $id)
    {
        // $old_pssword = auth()->user()->passwrod;
        // $user_id = auth()->user()->id;

        // if(Hash::check($request->input('old_passwrod'), $old_pssword)){

        // }else{
        //     return redirect()->back()->with('failed', 'Passsword lama invalid');
        // }
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
        ],[
            'email.unique' => 'Email telah digunakan',
            'email.required' => 'Email tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong',
        ]
    );

        //update data user
        $user = User::findOrFail($id);
        $inputan = $request->all();
        $inputan['id'] = $id;
        // $request->validate([
            //     'token' => ['required'],
            //     'email' => ['required', 'email'],
            //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // ]);
        // $status = Password::reset(
        //     $request->only('nama', 'email', 'password', 'password_confirmation', 'token'),
        //     function ($user) use ($request) {
        //         $user->forceFill([
        //             'password' => Hash::make($request->password),
        //             'remember_token' => Str::random(60),
        //             ])->save();
                    
        //             event(new PasswordReset($user));
        //         }
        //     );
        $user->update($inputan);
        //         return $status == Password::PASSWORD_RESET
        //     ? redirect()->route('user.show', $id)->with('status', __($status))
        //     : back()->withInput($request->only('email'))
        //     ->withErrors(['email' => __($status)]);
        return redirect()->route('user.show', $id)->with('status', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
}
