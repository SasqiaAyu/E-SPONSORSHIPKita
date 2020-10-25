<?php

namespace App\Http\Controllers\ManagementUser;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Company;

use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('jenis_user',2)->get();
        return view('management_user.company',['users'=>$users]);
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
       return view('management_user.company_edit',['user'=>$user,'categories'=> Category::get()]);
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
        $validator = Validator::make($request->all(), [
                                        'nama' => 'required|string|max:255',
                                        'email' => 'sometimes|required|email|unique:users,email,'.$id,
                                        'telp' => 'required|string|max:15',
                                        'alamat' => 'required|string|max:255',
                                        'kategori_company' => 'nullable|integer',
                                        'nama_owner' => 'required|string|max:25',
                                        'deskripsi' => 'required|string|max:255',
                                    ]);
        
        if ($validator->fails()) {
            return redirect(route('management.company.edit',$id))
                        ->withErrors($validator)
                        ->withInput()
                        ->with('Message Failed','Edit Gagal !');
        }else{
            User::where('id',$id)
                ->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'telp' => $request->telp,
                    'alamat' => $request->alamat
                ]);
            Company::where('user_id',$id)
                    ->update([
                        'category_id' => $request->kategori_company?$request->kategori_company:Company::where('user_id',$id)->first()->category_id,
                        'nama_owner' => $request->nama_owner,
                        'deskripsi' => $request->deskripsi,
                    ]);
            return back()->with('Message Success','Edit Berhasil !');
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
        return redirect(route('management.company.index'))->with('Message Success','Data Company Berhasil di Hapus');
    }
}
