<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('category.index',['categories'=>$categories]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');    
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
            'nama' => 'required|unique:categories|string|max:255'
        ]);    
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput()
                        ->with('Message Failed','Input Gagal !');
        }else{
            Category::insert([
                        'nama' => $request->nama
                    ]);
            return back()->with('Message Success','Input Berhasil !');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:categories|string|max:255'
        ]);    
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput()
                        ->with('Message Failed','Edit Gagal !');
        }else{
            Category::where('id',$category->id)
                ->update([
                    'nama' => $request->nama
                ]);
            return back()->with('Message Success','Edit Berhasil !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return back()->with('Message Success',"Data Kategori Berhasil di Hapus : $category->nama");    
    }
}
