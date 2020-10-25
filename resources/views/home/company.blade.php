@extends('layouts.admin')

@section('menu','home')
@section('content')
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">{{$request}}</span></h2>
                        <p>Jumlah<br>Pengajuan</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">{{$requestApprove}}</span></h2>
                        <p>Jumlah<br>Pengajuan di Approve</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">{{$fakultas}}</span></h2>
                        <p>Jumlah<br>Fakultas</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">{{$student}}</span></h2>
                        <p>Jumlah<br>Mahasiswa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="post col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-tb-10">
                <h3 class="text-center mg-tb-30">List Proposal</h3>
                <table id="data-table-basic" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            <th>nomor telepon</th>
                            <th>Proposal</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proposal as $proposal)
                            @if ($proposal->approve != 2)
                                <tr>
                                    <td>{{$proposal->student->user->nama}}</td>
                                    <td>{{$proposal->student->faculty->nama}}</td>
                                    <td>{{$proposal->student->major->nama}}</td>
                                    <td>{{$proposal->student->user->telp}}</td>
                                    @if ($proposal->file_sumber != null)
                                        <td><a href="{{(url('storage/'.$proposal->file_sumber))}} " target="_blank" rel="noopener noreferrer">link</a></td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>
                                        @if ($proposal->approve == null)
                                            belum di proses
                                        @elseif ($proposal->approve == 1)
                                            Approved
                                        @elseif ($proposal->approve == 3)
                                            Rejected
                                        @endif
                                    </td>
                                    <td>
                                        @if ($proposal->approve == null)
                                            <button class="col-md-5 btn btn-success" style="margin: 4px 4px 4px 4px" onclick="approve('{{$proposal->id}}')">Approve</button>
                                            <button class="col-md-5 btn btn-danger" style="margin: 4px 4px 4px 4px" onclick="reject('{{$proposal->id}}')">Rejects</button>
                                        @endif
                                    </td>

                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <th>nomor telepon</th>
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            <th>Proposal</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $( document ).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('input[name=_token]').val()
            }
        });
    });

    function approve(proposal_id){
        if(confirm("Apa Anda Yakin Akan Approve Proposal ini?")){
            var _url = '{{ url("/")}}/approveProposal';
            $.ajax({
                type : "POST",
                url  : _url,
                dataType : "JSON",
                data :{
                    proposal_id: proposal_id,
                },
                beforeSend: function() {
                // waitingDialog.show();
                },
                success : function(data){

                window.location.reload();
                },
                afterSend: function() {
                // waitingDialog.show();
                },
            });
        }else{
            return false;
        }
    }

    function reject(proposal_id){
        if(confirm("Apa Anda Yakin Akan Mereject Proposal ini?")){
            var _url = '{{ url("/")}}/rejectProposal';
            $.ajax({
                type : "POST",
                url  : _url,
                dataType : "JSON",
                data :{
                    proposal_id: proposal_id,
                },
                beforeSend: function() {
                // waitingDialog.show();
                },
                success : function(data){
                    
                window.location.reload();
                },
                afterSend: function() {
                // waitingDialog.show();
                },
            });
        }else{
            return false;
        }  
    }
</script>
@endsection