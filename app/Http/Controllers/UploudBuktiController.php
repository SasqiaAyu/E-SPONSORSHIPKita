<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\User;
use App\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UploudBuktiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function edit(Request $request)
    {

        try {
            Auth::logout();
            $decrypted = Crypt::decryptString($request->data);
            $user = User::find($decrypted);
            return view('auth.company_uploud_bukti', ['user' => $user]);
        } catch (DecryptException $e) {
            return redirect(route('landing_page'));
        }
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
        if ($id) {
            $validator = Validator::make($request->all(), [
                'foto' => 'nullable|mimes:jpeg,jpg,png'
            ]);
        }
        // dd($validator->fails());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('Message Failed', 'Uploud Gagal !');
        } else {
            Company::where('user_id', $id)
                ->update([
                    'foto_bukti_sumber' => substr($request->foto->store('public/bukti/'), 7),
                    'foto_bukti_nama' => $request->foto->getClientOriginalName(),
                    'foto_bukti_tipe' => $request->foto->getClientMimeType()
                ]);
            return redirect(route('login'))->with('Message Success', 'Uploud Berhasil, Silahkan tunggu approval SuperAdmin !');
        }
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
