<?php

namespace App\Http\Controllers;

use App\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::get();
        return view('major.index',['majors'=>$majors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('major.create');
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
            'nama' => 'required|unique:majors|string|max:255'
        ]);    
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput()
                        ->with('Message Failed','Input Gagal !');
        }else{
            Major::insert([
                        'nama' => $request->nama
                    ]);
            return back()->with('Message Success','Input Berhasil !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $major)
    {
        return view('major.edit',['major'=>$major]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Major $major)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:majors|string|max:255'
        ]);    
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput()
                        ->with('Message Failed','Edit Gagal !');
        }else{
            Major::where('id',$major->id)
                ->update([
                    'nama' => $request->nama
                ]);
            return back()->with('Message Success','Edit Berhasil !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        Major::destroy($major->id);
        return back()->with('Message Success',"Data Kategori Berhasil di Hapus : $major->nama");
    }
}
