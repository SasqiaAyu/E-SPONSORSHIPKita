<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Major::all();
        return view('major.index', compact(['majors']));
    }

    public function create()
    {
        $faculties = Faculty::all();
        return view('major.create', compact(['faculties']));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'majors' => 'required',
            'faculty' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput()
                ->with('Message Failed', 'Input Gagal !');
        } else {
            $faculty = Faculty::find($request->faculty);
            $majors = $request->majors;
            foreach ($majors as $major) {
                Major::create([
                    'name' => $major,
                    'id_faculty' => $faculty->id
                ]);
            }
            return back()->with('Message Success', 'Input Berhasil !');
        }
    }

    public function edit(Major $major)
    {
        $faculties = Faculty::all();
        return view('major.edit', compact(['major', 'faculties']));
    }

    public function update(Request $request, Major $major)
    {
        $validator = Validator::make($request->all(), [
            'major' => 'required',
            'faculty' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput()
                ->with('Message Failed', 'Input Gagal !');
        } else {
            $faculty = Faculty::find($request->faculty);
            $major->name = $request->major;
            $major->id_faculty = $faculty->id;
            $major->update();
            return back()->with('Message Success', 'Input Berhasil !');
        }
    }

    public function destroy(Major $major)
    {
        $major->delete();
        return back()->with('Message Success',"Data Kategori Berhasil di Hapus : $major->name");
    }
}
