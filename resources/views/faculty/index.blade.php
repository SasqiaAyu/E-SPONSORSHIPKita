@extends('layouts.admin')

@section('menu','profile')
@section('submenu','faculty.index')
@section('content')
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                @if(session()->has('Message Success'))
                <div class="alert alert-success">
                    {{ session()->get('Message Success') }}
                </div>
                @endif
                <div class="form-element-list">
                    <div class="col-md-12" style="margin-bottom:20px">
                        <a href="{{ route('faculty.create') }}" type="button" class="btn btn-success pull-right">Tambah</a>
                    </div>
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Fakultas</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Fakultas</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($faculties as $faculty)
                            <tr>
                                <td> <b>{{ $faculty->college->name }}</b> - {{ $faculty->name }}</td>
                                <td>
                                    <form action="{{ route('faculty.edit', $faculty) }}" method="get">
                                        <button class="col-md-12 btn btn-info">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('faculty.destroy', $faculty) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="col-md-12 btn btn-danger"
                                                onclick="return confirm('Apakah anda yakin menghapus data {{ $faculty->name }}? Aksi ini akan menghapus seluruh data jurusan dalam {{ $faculty->name }}');"
                                        >Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
