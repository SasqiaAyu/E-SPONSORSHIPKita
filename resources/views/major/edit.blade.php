@extends('layouts.admin')

@section('menu','profile')
@section('submenu','major.index')
@section('content')
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <div class="form-element-list">
                    <div class="basic-tb-hd">
                        <h2>Edit Jurusan</h2>
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
                    <form action="{{route('major.update', $major)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Perguruan Tinggi dan Fakultas</label>
                                    <select class="form-control input-sm" id="" name="faculty" required>
                                        @foreach($faculties as $faculty)
                                            <option value="{{ $faculty->id }}"
                                            @if($faculty->id === $major->id_faculty) selected @endif>
                                                {{ $faculty->college->name }} - {{ $faculty->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="" style="margin-top: 1.5rem">
                                <label>Nama Jurusan </label>
                                <div class="form row">
                                    <div class="form-group mt-3 col-md-4">
                                        <input type="text" name="major" class="form-control input-sm mt-3"
                                               placeholder="Masukan nama jurusan" value="{{ $major->name }}" required>
                                    </div>
                                    </button>
                                </div>
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
