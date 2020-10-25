<?php

namespace App\Http\Controllers\ManagementUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Faculty;
use App\Major;
use App\Student;

use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_user = auth()->user()->jenis_user;
        $jenis_user = 1;
        $users = User::where('jenis_user', 3)->get();
        return view('management_user.student', ['users' => $users]);
    }

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
    public function edit(User $user)
    {
        // dd($user->id);
        return view('management_user.student_edit', ['user' => $user, 'faculties' => Faculty::get(), 'majors' => Major::get()]);
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
        $user = User::where('id', $id)->first();

        $validator = Validator::make($request->all(), [
                            'nama' => 'required|string|max:255',
                            'email' => 'sometimes|required|email|unique:users,email,' . $id,
                            'telp' => 'required|string|max:15',
                            'alamat' => 'required|string|max:255',
                            'fakultas' => 'nullable|integer',
                            'jurusan' => 'nullable|integer',
                        ]);
        
        if ($validator->fails()) {
            return redirect(route('management.student.edit', $id))
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
            Student::where('user_id', $id)
                ->update([
                    'faculty_id' => $request->fakultas?$request->fakultas:Student::where('user_id',$id)->first()->faculty_id,
                    'major_id' => $request->jurusan?$request->jurusan:Student::where('user_id',$id)->first()->major_id,
                ]);
            return back()->with('Message Success', 'Edit Berhasil !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect(route('management.student.index'))->with('Message Success', 'Data Mahasiswa Berhasil di Hapus');
    }
}
