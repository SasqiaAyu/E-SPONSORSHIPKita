<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Faculty;
use App\Major;
use App\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function foto(){
        // header('Content-Type:images/jpeg');
        // echo('a');
        // echo(chunk_split(base64_encode(auth()->user()->foto)));
        return response(auth()->user()->foto, 200)
        ->header('Content-Type', 'image/jpeg');
    }
    public function index()
    {
        // dd(auth()->user()->foto);

        if (Auth()->user()->jenis_user == 1)
            return view('profile.sa');
        elseif (Auth()->user()->jenis_user == 2)
            return view('profile.company',['categories'=>Category::get()]);
        elseif (Auth()->user()->jenis_user == 3)
            return view('profile.student',['faculties' => Faculty::get(),'majors' => Major::get()]);
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
        if (auth()->user()->jenis_user == 1) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'email' => 'sometimes|required|email|unique:users,email,' . $id,
                'telp' => 'required|string|max:15',
                'alamat' => 'required|string|max:255',
                'password' => 'nullable|string|min:8|confirmed',
                'foto' => 'nullable|mimes:jpeg,jpg,png'
                ]);
        } elseif (auth()->user()->jenis_user == 2) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'email' => 'sometimes|required|email|unique:users,email,' . $id,
                'telp' => 'required|string|max:15',
                'alamat' => 'required|string|max:255',
                'kategori_company' => 'nullable|integer',
                'nama_owner' => 'required|string|max:25',
                'deskripsi' => 'required|string|max:255',
                'password' => 'nullable|string|min:8|confirmed',
            ]);
        } elseif (auth()->user()->jenis_user == 3) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'email' => 'sometimes|required|email|unique:users,email,' . $id,
                'telp' => 'required|string|max:15',
                'alamat' => 'required|string|max:255',
                'fakultas' => 'nullable|integer',
                'jurusan' => 'nullable|integer',
                'password' => 'nullable|string|min:8|confirmed',
            ]);
        }
        if ($validator->fails()) {
            return redirect(route('profile.index', $id))
                ->withErrors($validator)
                ->withInput()
                ->with('Message Failed', 'Edit Gagal !');
        } else {
            User::where('id', $id)
                ->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'telp' => $request->telp,
                    'alamat' => $request->alamat
                ]);
            if(isset($request->foto)){
                User::where('id', $id)
                    ->update([
                        'foto_sumber' => substr($request->foto->store('public'),7),
                        'foto_nama' => $request->foto->getClientOriginalName(),
                        'foto_tipe' => $request->foto->getClientMimeType()
                    ]);
            }
            if ($request->password) {
                User::where('id', $id)
                    ->update([
                        'password' => Hash::make($request->password),
                    ]);
            }
            if (auth()->user()->jenis_user == 2) {
                Company::where('user_id',$id)
                ->update([
                    'category_id' => $request->kategori_company,
                    'nama_owner' => $request->nama_owner,
                    'deskripsi' => $request->deskripsi,
                ]);
            } elseif (auth()->user()->jenis_user == 3) {
                Student::where('user_id',$id)
                ->update([
                    'faculty_id' => $request->fakultas?$request->fakultas:auth()->user()->student->faculty->id,
                    'major_id' => $request->jurusan?$request->jurusan:auth()->user()->student->major->id,
                ]);
            }
            return back()->with('Message Success', 'Edit Berhasil !');
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
