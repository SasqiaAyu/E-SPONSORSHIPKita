@extends('layouts.admin')

@section('menu','management')
@section('submenu','management.company')
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
                                <th>Nama Perusahaan</th>
                                <th>Email</th>
                                <th>Telpon</th>
                                <th>Kategori</th>
                                <th>Supervisor</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->nama}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->telp}}</td>
                                <td>{{$user->company->category->nama}}</td>
                                <td>{{$user->company->nama_owner}}</td>
                                <td>{{$user->company->deskripsi}}</td>

                                <td>
                                    <form action="{{route('management.company.edit',$user->id)}}" method="get">
                                        <button class="col-md-12 btn btn-info">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('management.company.destroy',$user->id)}}" method="post">
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
                                <th>Nama Perusahaan</th>
                                <th>Email</th>
                                <th>Telpon</th>
                                <th>Kategori</th>
                                <th>Supervisor</th>
                                <th>Deskripsi</th>
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