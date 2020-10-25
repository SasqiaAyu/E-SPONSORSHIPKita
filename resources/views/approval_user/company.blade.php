@extends('layouts.admin')

@section('menu','approval')
@section('submenu','approval.company')
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
                    {{-- <input type="text" value="" id="cari" class=""> --}}
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>Email</th>
                                <th>Telpon</th>
                                <th>Kategori</th>
                                <th>Supervisor</th>
                                <th>Deskripsi</th>
                                <th>Bukti Pembayaran</th>
                                <th>Approve</th>
                                <th>Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->nama}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->telp}}</td>
                                <td>{{$user->company->kategori}}</td>
                                <td>{{$user->company->nama_owner}}</td>
                                <td>{{$user->company->deskripsi}}</td>
                                <td>
                                    @if($user->company->foto_bukti_sumber)
                                    <a href="{{url('storage/'.$user->company->foto_bukti_sumber)}} " target="_blank" rel="noopener noreferrer">link</a>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('approval.company.destroy',$user->id)}}" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="tipe" value=1>
                                        <button class="col-md-12 btn btn-success">Approve</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('approval.company.destroy',$user->id)}}" method="post">
                                        @method('put')
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
                                <th>Nama Perusahaan</th>
                                <th>Email</th>
                                <th>Telpon</th>
                                <th>Kategori</th>
                                <th>Supervisor</th>
                                <th>Deskripsi</th>
                                <th>Bukti Pembayaran</th>
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