@extends('layouts.admin')

@section('menu','management')
@section('submenu','management.student')
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
                                <th>Name</th>
                                <th>Fakultas</th>
                                <th>Jurusan</th>
                                <th>Telpon</th>
                                <th>Email</th>
                                <th>Aksi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->nama}}</td>
                                <td>{{$user->student->faculty->nama}}</td>
                                <td>{{$user->student->major->nama}}</td>
                                <td>{{$user->telp}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <form action="{{route('management.student.edit',$user->id)}}" method="get">
                                        <button class="col-md-12 btn btn-info">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('management.student.destroy',$user->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="col-md-12 btn btn-danger">Delete</button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Fakultas</th>
                                <th>Jurusan</th>
                                <th>Telpon</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection