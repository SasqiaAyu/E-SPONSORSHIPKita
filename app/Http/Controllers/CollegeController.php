<?php

namespace App\Http\Controllers;

use App\College;
use App\Faculty;
use App\Major;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::all();
        return view('college.index', compact(['colleges']));
    }

    public function create()
    {
        return view('college.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'college' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput()
                ->with('Message Failed', 'Input Gagal !');
        } else {
            $college = new College();
            $college->name = $request->college;
            $college->save();
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

    public function edit(College $college)
    {
        return view('college.edit', compact(['college']));
    }

    public function update(Request $request, College $college)
    {
        $validator = Validator::make($request->all(), [
            'college' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput()
                ->with('Message Failed', 'Input Gagal !');
        } else {
            $college->name = $request->college;
            $college->update();
            return back()->with('Message Success', 'Input Berhasil !');
        }
    }

    public function destroy(College $college)
    {
        $faculties = Faculty::where('id_college', $college->id)->get();
        foreach ($faculties as $faculty) {
            $majors = Major::where('id_faculty', $faculty->id)->get();
            foreach ($majors as $major) {
//                $students = Student::where('')->get();
                $major->delete();
            }
            $faculty->delete();
        }
        $college->delete();
        return back()->with('Message Success',"Data Kategori Berhasil di Hapus : $college->name");
    }
}
