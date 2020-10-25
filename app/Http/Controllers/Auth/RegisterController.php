<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Student;
use App\Company;
use App\Faculty;
use App\Major;
use App\Category;
use App\Mail\ActivationEmail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

        Config::set('categories',Category::get());
        Config::set('faculties',Faculty::get());
        Config::set('majors',Major::get());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['jenis_user'] = (int)$data['jenis_user'];
        $validation_email = User::where('email',$data['email'])
                            ->where('approve',1)
                            ->count();
        if($validation_email == 0){
            if($data['jenis_user'] == 2){ // company
                return Validator::make($data, [
                    'alamat' => 'required|string|max:255|',
                    'telp' => 'required|string|max:15|',
                    'password' => 'required|string|min:8|confirmed',
                    'jenis_user' => 'required|integer|min:2|max:3',
                    'foto' => 'required|mimes:jpeg,jpg,png'
                ]);
            }
            if($data['jenis_user'] == 3){ // student
                return Validator::make($data, [
                    'alamat' => 'required|string|max:255|',
                    'telp' => 'required|string|max:15|',
                    'password' => 'required|string|min:8|confirmed',
                    'jenis_user' => 'required|integer|min:2|max:3',
                ]);
            }
        }else{
            if($data['jenis_user'] == 2){ // company
                return Validator::make($data, [
                    'alamat' => 'required|string|max:255|',
                    'telp' => 'required|string|max:15|',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:8|confirmed',
                    'jenis_user' => 'required|integer|min:2|max:3',
                    'foto' => 'required|mimes:jpeg,jpg,png'
                ]);
            }
            if($data['jenis_user'] == 3){ // student
                return Validator::make($data, [
                    'alamat' => 'required|string|max:255|',
                    'telp' => 'required|string|max:15|',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:8|confirmed',
                    'jenis_user' => 'required|integer|min:2|max:3',
                ]);
            }
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if($data['jenis_user'] == 2){
            $user = User::create([
                'nama' => $data['nama_company'],
                'alamat' => $data['alamat'],
                'telp' => $data['telp'],
                'jenis_user' => $data['jenis_user'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'foto_sumber' => substr($data['foto']->store('public'),7),
                'foto_nama' => $data['foto']->getClientOriginalName(),
                'foto_tipe' => $data['foto']->getClientMimeType()
            ]);

            Company::create([
                'user_id' => $user->id,
                'category_id' => $data['kategori'],
                'nama_owner' => $data['nama_owner'],
                'deskripsi' => $data['deskripsi']
            ]);
            Mail::to($user->email)->send(new ActivationEmail($user));
        }elseif($data['jenis_user'] == 3){
            $user = User::create([
                'nama' => $data['nama'],
                'alamat' => $data['alamat'],
                'telp' => $data['telp'],
                'jenis_user' => $data['jenis_user'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);
            
            Student::create([
                'user_id' => $user->id,
                'major_id' => $data['jurusan'],
                'faculty_id' => $data['fakultas'],
                'foto_nim_sumber' => substr($data['foto_nim']->store('public'),7),
                'foto_nim_nama' => $data['foto_nim']->getClientOriginalName(),
                'foto_nim_tipe' => $data['foto_nim']->getClientMimeType()
            ]);
        }
        return redirect(route('verify')); 
    }
}
