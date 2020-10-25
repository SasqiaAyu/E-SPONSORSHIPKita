@extends('layouts.admin')

@section('menu','management')    
@section('submenu','management.student')
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
                    <form action="{{route('management.student.update',$user->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
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
                            <label>Fakultas</label>
                            <div class="nk-int-st">
                                <select id="fakultas" class="form-control " name="fakultas" autocomplete="fakultas">
                                    <option disabled selected>{{$user->student->faculty->nama}}</option>
                                    @foreach ($faculties as $faculty)
                                        @if ($faculty->id != $user->student->faculty->id)
                                            <option value="{{$faculty->id}}">{{$faculty->nama}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('fakultas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <div class="nk-int-st">
                                <select id="jurusan" class="form-control " name="jurusan" autocomplete="jurusan">
                                    <option disabled selected>{{$user->student->major->nama}}</option>
                                    @foreach ($majors as $major)
                                        @if ($major->id != $user->student->major->id)
                                            <option value="{{$major->id}}">{{$major->nama}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('jurusan')
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