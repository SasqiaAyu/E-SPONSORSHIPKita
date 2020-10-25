@extends('layouts.admin')

@section('menu','profile')
@section('submenu','parameter.index')
@section('content')
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <div class="form-element-list">
                    <div class="basic-tb-hd">
                        <h2>Parameter</h2>
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
                    <form action="{{route('parameter.update', 1)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @foreach ($parameters as $parameter)
                            @php
                                $kode = implode(' ',array_map('ucfirst',preg_split('/(?=[A-Z])/',$parameter->kode)));
                            @endphp
                            <div class="form-group">
                                <label>{{$kode}}</label>
                                <div class="nk-int-st">
                                    <input type="number" class="form-control input-sm @error('{{$kode}}') is-invalid @enderror"
                                    name="kode[{{$parameter->kode}}]" placeholder="Masukkan {{$kode}}"
                                        value="{{ old("kode[$kode]")?old("kode[$kode]"):$parameter->nilai }}">
                                    @error('kode[{{$kode}}]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>                            
                        @endforeach
                        <button class="btn btn-info" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection