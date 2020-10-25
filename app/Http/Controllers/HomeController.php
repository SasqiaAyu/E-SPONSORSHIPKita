<?php

namespace App\Http\Controllers;

use App\Company;
use App\Faculty;
use App\Student;
use App\User;
use App\Proposal;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jenis_user = auth()->user()->jenis_user;
        // $jenis_user = 1;
        if($jenis_user == 1){            
            return view('home.sa',[
                'studentActive' => User::where('jenis_user',3)->where('approve',1)->count(),
                'companyActive' => User::where('jenis_user',2)->where('approve',1)->count(),
                'studentRequest' => User::where('jenis_user',3)->where('approve',null)->count(),
                'companyRequest' => User::where('jenis_user',2)->where('approve',null)->count(),
            ]);
        }elseif($jenis_user == 2){
            return view('home.company',[
                'request' => Proposal::where('company_id',auth()->user()->company->id)->count(),
                'requestApprove' => Proposal::where('company_id',auth()->user()->company->id)->where('approve',1)->count(),
                'fakultas' => count(Faculty::select('nama')->distinct()->get()),
                'student' => User::where('jenis_user',3)->where('approve',null)->count(),
                'proposal' => Proposal::where('company_id',auth()->user()->company->id)->get()

            ]);
        }elseif($jenis_user == 3){
            return view('home.student',[
                'company' => User::where('jenis_user',2)->where('approve',1)->get(),
                'proposal' => Proposal::where('student_id',auth()->user()->student->id)->get(),
                'kategori' => Category::get(),
            ]);
        }
    }
}
