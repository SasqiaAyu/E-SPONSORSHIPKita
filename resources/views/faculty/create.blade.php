@extends('layouts.admin')

@section('menu','profile')
@section('submenu','faculty.index')
@section('content')
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <div class="form-element-list">
                    <div class="basic-tb-hd">
                        <h2>Tambah Fakultas</h2>
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
                    <form action="{{route('faculty.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Perguruan Tinggi</label>
                                    <select class="form-control input-sm" id="" name="college" required>
                                        <option value="">-- Pilih Perguruan Tinggi --</option>
                                        @foreach($colleges as $college)
                                            <option value="{{ $college->id }}">{{ $college->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="" style="margin-top: 1.5rem">
                                <label>Nama Fakultas </label>
                                <div class="form row">
                                    <div class="form-group mt-3 col-md-4">
                                        <input type="text" name="faculties[]" class="form-control input-sm mt-3"
                                               placeholder="Masukan nama fakultas" required>
                                    </div>
                                    <button class="btn btn-primary btn-sm ml-2 btn-add" type="button">Tambah
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
<script type="text/javascript">
    const form = document.querySelector('.form');
    const btnAdd = document.querySelector('.btn-add');
    btnAdd.addEventListener('click', function () {
        const div = document.createElement('div');
        div.innerHTML = `<div class="row">
                <div class="form-group mt-3 col-md-4">
                    <input type="text" name="fakulties[]" class="form-control input-sm mt-3" placeholder="Masukan nama fakultas" required>
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
