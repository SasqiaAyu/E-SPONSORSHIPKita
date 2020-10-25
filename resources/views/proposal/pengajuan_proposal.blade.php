@extends('layouts.admin')

@section('menu','pengajuan')
@section('content')
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">{{$company->count()}}</span></h2>
                        <p>Total<br>Perusahaan</p>
                    </div>
                    {{-- <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">{{$proposal->count()}}</span></h2>
                        <p>Total<br>Pengajuan Proposal</p>
                    </div>
                    {{-- <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">0</span></h2>
                        <p>Jumlah<br>Proposal Disetujui</p>
                    </div>
                    {{-- <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">0</span></h2>
                        <p>Jumlah<br>Proposal Ditolak</p>
                    </div>
                    {{-- <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  mg-tb-30 sm-res-mg-t-0 dasboard_card" >
                <h3 class="text-center mg-tb-30">List Proposal</h3>
                
                <table id="data-table-basic" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <th>nomor telepon</th>
                            <th>Proposal</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proposal as $proposal)
                            <tr>
                                <td>{{$proposal->company->user->nama}}</td>
                                <td>{{$proposal->company->user->telp}}</td>
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
                                    @elseif ($proposal->approve == 2)
                                        Batal di Ajukan
                                    @endif
                                </td>
                                <td>
                                    @if ($proposal->approve == null)
                                        <button class="col-md-5s btn btn-danger" style="margin: 4px 4px 4px 4px" onclick="batal('{{$proposal->id}}')">Batalkan<br>Pengajuan</button>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <th>nomor telepon</th>
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

{{-- Modal --}}

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

    function batal(proposal_id){
        if(confirm("Apa Anda Yakin Akan Membatalkan Pengajuan Proposal ini?")){
            var _url = '{{ url("/")}}/batalProposal';
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

