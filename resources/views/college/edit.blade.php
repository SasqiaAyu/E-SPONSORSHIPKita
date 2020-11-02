@extends('layouts.admin')

@section('menu','profile')
@section('submenu','college.index')
@section('content')
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>Edit Perguruan Tinggi</h2>
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
                        <form action="{{ route('college.update', $college) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <div class="">
                                        <label>Nama Perguruan Tinggi</label>
                                        <input type="text"
                                               class="form-control input-sm col-md-4 @error('nama') is-invalid @enderror"
                                               name="college" placeholder="Masukkan nama perguruan tinggi" required
                                               value="{{ $college->name }}">
                                        @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-info" id="btn-submit" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
