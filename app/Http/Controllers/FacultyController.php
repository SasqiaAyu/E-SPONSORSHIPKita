<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::get();
        return view('faculty.index',['faculties'=>$faculties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculty.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:faculties|string|max:255'
        ]);    
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput()
                        ->with('Message Failed','Input Gagal !');
        }else{
            Faculty::insert([
                        'nama' => $request->nama
                    ]);
            return back()->with('Message Success','Input Berhasil !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        return view('faculty.edit',['faculty'=>$faculty]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:faculties|string|max:255'
        ]);    
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput()
                        ->with('Message Failed','Edit Gagal !');
        }else{
            Faculty::where('id',$faculty->id)
                ->update([
                    'nama' => $request->nama
                ]);
            return back()->with('Message Success','Edit Berhasil !');
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        Faculty::destroy($faculty->id);
        return back()->with('Message Success',"Data Kategori Berhasil di Hapus : $faculty->nama");        
    }
}
