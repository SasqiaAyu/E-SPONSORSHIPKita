@extends('layouts.admin')

@section('menu','approval')
@section('submenu','approval.student')
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
                                <th>Foto KTM</th>
                                <th>Approve</th>
                                <th>Reject</th>
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
                                    @if($user->student->foto_nim_sumber)
                                    <a href="{{url('storage/'.$user->student->foto_nim_sumber)}} " target="_blank" rel="noopener noreferrer">link</a>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('approval.student.update',$user->id)}}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="tipe" value=1>
                                        <button class="col-md-12 btn btn-success">Approve</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('approval.student.update',$user->id)}}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="tipe" value=0>
                                        <button class="col-md-12 btn btn-danger">Reject</button>
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
                                <th>Foto KTM</th>
                                <th>Approve</th>
                                <th>Reject</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection