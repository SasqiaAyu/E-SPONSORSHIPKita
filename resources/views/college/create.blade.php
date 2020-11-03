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
                            <h2>Tambah Perguruan Tinggi</h2>
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
                        <form action="{{ route('college.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <div class="">
                                        <label>Nama Perguruan Tinggi</label>
                                        <input type="text"
                                               class="form-control input-sm col-md-4 @error('nama') is-invalid @enderror"
                                               name="college" placeholder="Masukkan nama perguruan tinggi" required
                                               value="{{ old('name')?old('name'):'' }}">
                                        @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Nama Fakultas </label>
                                <div class="form row">
                                    <div class="form-group mt-3 col-md-4">
                                        <input type="text" name="faculties[]" class="form-control input-sm mt-3"
                                               placeholder="Masukan nama fakultas" required>
                                    </div>
                                    <button class="btn btn-primary btn-sm ml-2 btn-add" type="button">Tambah</button>
                                </div>
                            </div>
                            <button class="btn btn-info" id="btn-submit" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const form = document.querySelector('.form');
        const btnAdd = document.querySelector('.btn-add');
        btnAdd.addEventListener('click', function () {
            const div = document.createElement('div');
            div.innerHTML = `<div class="row">
                <div class="form-group mt-3 col-md-4">
                    <input type="text" name="faculties[]" class="form-control input-sm mt-3" placeholder="Masukan nama fakultas" required>
                </div>
                    <button class="btn btn-danger btn-sm" type="button" onclick="btnRemove(this)">Hapus</button>
            </div>`;
            form.parentNode.insertBefore(div, form.nextSibling);
        });

        function btnRemove(el) {
            const parent = el.parentNode;
            parent.remove()
        }
    </script>
@endsection
