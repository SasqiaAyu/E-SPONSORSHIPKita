@extends('layouts.admin')

@section('menu','testimoni')
@section('submenu','testimoni.index')
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

                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Fakultas</th>
                                <th>Jurusan</th>
                                <th>Testimoni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonies as $testimoni)
                            <tr>
                                <td>{{$testimoni->user->nama}}</td>
                                <td>{{$testimoni->user->student->faculty->nama}}</td>
                                <td>{{$testimoni->user->student->major->nama}}</td>
                                <td>{{$testimoni->pesan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>User</th>
                                <th>Fakultas</th>
                                <th>Jurusan</th>
                                <th>Testimoni</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection