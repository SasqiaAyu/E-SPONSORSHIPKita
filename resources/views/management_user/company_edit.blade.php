@extends('layouts.admin')

@section('menu','management')
@section('submenu','management.company')
@section('content')
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <div class="form-element-list">
                    <div class="basic-tb-hd">
                        <h2>Detail Mahasiswa</h2>
                    </div>
                    @if(session()->has('Message Success'))
                    <div class="alert alert-success">
                        {{ session()->get('Message Success') }}
                    </div>
                    @endif
                    @if(session()->has('Message Failed'))
                    <div class="alert alert-danger">
                        {{ session()->get('Message Failed') }}
                    </div>
                    @endif
                    <form action="{{route('management.company.update',$user->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <div class="nk-int-st">
                                <input type="text" class="form-control input-sm @error('nama') is-invalid @enderror"
                                    name="nama" placeholder="Masukkan Nama"
                                    value="{{ old('nama')?old('nama'):$user->nama }}">
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="nk-int-st">
                                <input type="text" class="form-control input-sm" name="email"
                                    placeholder="Masukkan Email" value="{{old('email')?old('email'):$user->email}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                            </div>
                        </div>
                        <div class="form-group">
                            <label>Telpon</label>
                            <div class="nk-int-st">
                                <input type="text" class="form-control input-sm" name="telp"
                                    placeholder="Masukkan Telpon" value="{{old('telp')?old('telp'):$user->telp}}">
                                @error('telp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <div class="nk-int-st">
                                <input type="text" class="form-control input-sm" name="alamat"
                                    placeholder="Masukkan Alamat" value="{{old('alamat')?old('alamat'):$user->alamat}}">
                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <div class="nk-int-st">
                                <select id="kategori_company" class="form-control " name="kategori_company" autocomplete="kategori_company">
                                    <option disabled selected>{{$user->company->category->nama}}</option>
                                    @foreach ($categories as $category)
                                        @if ($category->id != $user->company->category->id)
                                            <option value="{{$category->id}}">{{$category->nama}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('kategori_company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                            </div>
                        </div>
                        <div class="form-group">
                            <label>Supervisor</label>
                            <div class="nk-int-st">
                                <input type="text" class="form-control input-sm" name="nama_owner"
                                    placeholder="Masukkan Nama Owner"
                                    value="{{old('nama_owner')?old('nama_owner'):$user->company->nama_owner}}">
                                @error('nama_owner')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <div class="nk-int-st">
                                <textarea type="text" class="form-control input-sm" name="deskripsi"
                                    placeholder="Masukkan Deskripsi">{{old('deskripsi')?old('deskripsi'):$user->company->deskripsi}}</textarea>
                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                        <button class="btn btn-info" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection