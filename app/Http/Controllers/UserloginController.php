<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserloginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Login User';
        return view('depan/login_user', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function action(Request $request)
    {

        $username = $request->username;
        $password = $request->password;
        $data = Klien::where([
            'username' => $username,
            'password' => $password,
        ]);

        if ($data->count() > 0) {
            $aall =  Session([
                'client_id' => $data->first()->id,
                'username' => $data->first()->username,
                'password' => $data->first()->password
            ]);

            dd($aall);
            return redirect()->intended(route('dashboarduser'));
        } else {
            session()->flash('ket', 'Username dan password salah !');
            return redirect()->intended(route('user.login'));
        }
    }


    public function logouteuser()
    {
        Session::flush();
        session()->flash('ket', 'Logout berhasil !');
        return redirect()->intended(route('user.login'));
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
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
