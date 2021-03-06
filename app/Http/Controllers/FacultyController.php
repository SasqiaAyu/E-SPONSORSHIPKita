<?php

namespace App\Http\Controllers;

use App\College;
use App\Faculty;
use App\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::all();
        return view('faculty.index', compact(['faculties']));
    }

    public function create()
    {
        $colleges = College::all();
        return view('faculty.create', compact(['colleges']));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'college' => 'required',
            'faculties' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput()
                ->with('Message Failed', 'Input Gagal !');
        } else {
            $college = College::find($request->college);
            $faculties = $request->faculties;
            foreach ($faculties as $faculty) {
                Faculty::create([
                    'name' => $faculty,
                    'id_college' => $college->id
                ]);
            }
            return back()->with('Message Success', 'Input Berhasil !');
        }
    }

    public function edit(Faculty $faculty)
    {
        $colleges = College::all();
        return view('faculty.edit', compact(['faculty', 'colleges']));
    }

    public function update(Request $request, Faculty $faculty)
    {
        $validator = Validator::make($request->all(), [
            'college' => 'required',
            'faculty' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput()
                ->with('Message Failed', 'Input Gagal !');
        } else {
            $college = College::find($request->college);
            $faculty->name = $request->faculty;
            $faculty->id_college = $college->id;
            $faculty->update();
            return back()->with('Message Success', 'Input Berhasil !');
        }
    }

    public function destroy(Faculty $faculty)
    {
        $majors = Major::where('id_faculty', $faculty->id)->get();
        foreach ($majors as $major) {
            $major->delete();
        }
        return back()->with('Message Success',"Data Kategori Berhasil di Hapus : $faculty->name");
    }
}
