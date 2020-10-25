@extends('layouts.admin')

@section('menu','home')
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
<div class="notika-status-area" style="margin-top:15px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="{{route('testimoni.store')}}" method="post">
                    @csrf
                    <div class="form-group col-md-10" style="background-color: white;padding:30px 0px 30px 30px">
                        <div class="row">
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
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="hrzn-fm">Testimoni</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="nk-int-st">
                                    <textarea type="text" name="pesan" class="form-control input-sm" placeholder="Jika ada Testimoni (Kritik dan saran) silahkan di sampaikan"></textarea>
                                    @error('pesan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2" style="background-color: white;padding:30px">
                        <button class="btn btn-info col-md-12" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  mg-tb-30 sm-res-mg-t-0 dasboard_card" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " >
                    <label for="" class="col-md-1">Search </label>
                    <input id="cari" type="text" class="form-control col-md-11 sm-res-mg-t-0" name="cari" value="" style="width:15%" style="padding-right:20%">
                    <br>
                    <br>
                    <label for="" class="col-md-1">Kategori </label>
                    <select id="kategori" class="form-control col-md-11"
                    name="kategori" required autocomplete="kategori" autofocus style="width:15%">
                        <option selected value="">Pilih Semua</option>
                        @foreach ($kategori as $key1 => $value1)
                            <option value="{{$value1->id}}">{{$value1->nama}}</option>
                        @endforeach
                    </select>
                </div>
                @foreach ($company->skip(0)->take(10) as $key => $value)
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-tb-30 sm-res-mg-t-0 card" >
                        <div class="animation-single-int" >
                            <div class="animation-ctn-hd" style="">
                                <h2>{{$value->nama}}</h2>
                            </div>
                            <div class="animation-img mg-b-15" style="text-align:center">
                                <img class="animate-one" src="{{url('storage/'.$value->foto_sumber)}}" alt="" style="width: 100%;height: 200px;" />
                            </div>
                            <div class="animation-action">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="animation-btn">
                                            <button class="btn ant-nk-st bounce-ac" onclick="profilePerusahaan('{{$value->company->id}}')">Lihat Profil</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="animation-btn sm-res-mg-t-10 tb-res-mg-t-10 dk-res-mg-t-10">
                                            <button class="btn ant-nk-st flash-ac" onclick="pengajuan('{{$value->company->id}}')">Ajukan Proposal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 button-icon-btn button-icon-btn-rd mg-t-30 butt-mg-t-20" style="text-align:center">
                {{-- button-icon-btn button-icon-btn-rd mg-t-30 butt-mg-t-20 --}}
                <button class="btn btn-default btn-icon-notika waves-effect" id="back"><i class="notika-icon notika-left-arrow"></i></button>
                <input type="hidden" id="page" value="1">
                <label for="" id="number_page" style="margin:8px 8px 8px 8px">1</label>
                {{ csrf_field() }}                  
                <button class="btn btn-default btn-icon-notika waves-effect" id="forward"><i class="notika-icon notika-right-arrow"></i></button>
            </div>

        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="myModalPengajuan" role="dialog">
    <div class="modal-dialog modal-sm">
        <form method="POST" action="{{ route('pengajuan') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2>Ajukan proposal</h2>
                    <input type="hidden" id="company_id" name="company_id" value="">
                    {{-- <input type="hidden" id="student_id" value=""> --}}
                    <input type="file" accept=".pdf,.word,.doc,.docs" id="proposal" name="proposal">
                    <label for="" style="font-size:12px">Masukan file dengan type: pdf, doc, docs</label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Ajukan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="myModalProfilePerusahaan" role="dialog">
    <div class="modal-dialog modals-default">
        <form method="POST" action="{{ route('pengajuan') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2 style="font-size:20px">Profile Perusahaan</h2>
                    <div class="profile_perusahaan" id="profile_perusahaan">
                        {{-- <img class="animate-one" src="{{url('storage/'.$value->foto_sumber)}}" alt="" style="width: 100%;height: 200px;" />
                        <table>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th style="5%">:</th>
                                <th>bla</th>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <th style="5%">:</th>
                                <th>bla</th>
                            </tr>
                            <tr>
                                <th>Nama Owner</th>
                                <th style="5%">:</th>
                                <th>bla</th>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <th style="5%">:</th>
                                <th>bla</th>
                            </tr>
                        </table> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    function pengajuan(company_id){
        $("#myModalPengajuan").modal('show');
        $("#company_id").val(company_id);
    }

    function profilePerusahaan(company_id){
        $("#myModalProfilePerusahaan").modal('show');
        var _url = '{{ url("/")}}/profilePerusahaan';
        $.ajax({
                type : "POST",
                url  : _url,
                dataType : "JSON",
                data :{
                    company_id: company_id,
                },
                beforeSend: function() {
                // waitingDialog.show();
                },
                success : function(data){
                    $(".profile_perusahaan").empty();
                    console.log(data.company.nama);
                    $(".profile_perusahaan").append(
                        "<img class='animate-one' src='{{ url('/')}}/storage/"+data.user.foto_sumber+"' alt='' style='width: 100%;height: 200px;' />"+
                        "<table style='width:100%;font-size:20px'>"+
                            "<tr><th style='width:30%'>Nama Perusahaan</th><th style='width:5%'>:</th><th>"+data.user.nama+"</th></tr>"+
                            "<tr><th>Kategori</th><th style='5%'>:</th><th>"+data.kategori+"</th></tr>"+
                            "<tr><th>Nama Owner</th><th style='5%'>:</th><th>"+data.company.nama_owner+"</th></tr>"+
                            "<tr><th>Deskripsi</th><th style='5%'>:</th><th>"+data.company.deskripsi+"</th></tr>"+
                            "<tr><th>Alamat</th><th style='5%'>:</th><th>"+data.user.alamat+"</th></tr>"+
                            "<tr><th>no. Telp</th><th style='5%'>:</th><th>"+data.user.telp+"</th></tr>"+
                        "</table>"
                    );
                // window.location.reload();
                },
                afterSend: function() {
                // waitingDialog.show();
                },
            });
    }

    $( document ).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('input[name=_token]').val()
            }
        });
        
        $('#forward').click(function(){
            var _url = '{{ url("/")}}/forward';
            var page = $("#page").val();
            $.ajax({
                type : "POST",
                url  : _url,
                dataType : "JSON",
                data :{
                    page: page,
                    cari:$("#cari").val(),
                    kategori:$("#kategori").val(),
                },
                beforeSend: function() {
                // waitingDialog.show();
                },
                success : function(data){
                    $(".card").remove();
                    if (data.data != null) {
                        for($i = 0 ; $i < data.data.length ; $i++){
                            $(".dasboard_card").append(
                                "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-tb-30 sm-res-mg-t-0 card' style='height:40%'>"+
                                    "<div class='animation-single-int' >"+
                                        "<div class='animation-ctn-hd' style=''>"+
                                            "<h2>"+data.data[$i]['name']+"</h2>"+
                                        "</div>"+
                                        "<div class='animation-img mg-b-15' style='text-align:center'>"+
                                            "<img class='animate-one' src='{{ url('/')}}/storage/"+data.data[$i]['img']+"' alt='' style='width: 100%;height: 200px;' />"+
                                        "</div>"+
                                        "<div class='animation-action'>"+
                                            "<div class='row'>"+
                                                "<div class='col-lg-6'>"+
                                                    "<div class='animation-btn'>"+
                                                        "<button class='btn ant-nk-st bounce-ac'>Lihat Profil</button>"+
                                                    "</div>"+
                                                "</div>"+
                                                "<div class='col-lg-6'>"+
                                                    "<div class='animation-btn sm-res-mg-t-10 tb-res-mg-t-10 dk-res-mg-t-10'>"+
                                                        "<button class='btn ant-nk-st flash-ac' onclick='pengajuan("+ data.data[$i]['company_id'] +")'>Ajukan Proposal</button>"+
                                                    "</div>"+
                                                "</div>"+
                                            "</div>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>"
                            );
                        }
                    }
                    $("#page").val(data.page);
                    $("#number_page").text(data.page);

                // window.location.reload();
                },
                afterSend: function() {
                // waitingDialog.show();
                },
                
            });
        });

        $('#back').click(function(){
            var _url = '{{ url("/")}}/back';
            var page = $("#page").val();
            if(page > 1){
                $.ajax({
                    type : "POST",
                    url  : _url,
                    dataType : "JSON",
                    data :{
                        page: page,
                        cari:$("#cari").val(),
                        kategori:$("#kategori").val(),
                    },
                    beforeSend: function() {
                    // waitingDialog.show();
                    },
                    success : function(data){
                        $(".card").remove();
                        if (data.data != null) {
                            for($i = 0 ; $i < data.data.length ; $i++){
                                $(".dasboard_card").append(
                                    "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-tb-30 sm-res-mg-t-0 card' style='height:40%'>"+
                                        "<div class='animation-single-int' >"+
                                            "<div class='animation-ctn-hd' style=''>"+
                                                "<h2>"+data.data[$i]['name']+"</h2>"+
                                            "</div>"+
                                            "<div class='animation-img mg-b-15' style='text-align:center'>"+
                                                "<img class='animate-one' src='{{ url('/')}}/storage/"+data.data[$i]['img']+"' alt='' style='width: 100%;height: 200px;' />"+
                                            "</div>"+
                                            "<div class='animation-action'>"+
                                                "<div class='row'>"+
                                                    "<div class='col-lg-6'>"+
                                                        "<div class='animation-btn'>"+
                                                            "<button class='btn ant-nk-st bounce-ac'>Lihat Profil</button>"+
                                                        "</div>"+
                                                    "</div>"+
                                                    "<div class='col-lg-6'>"+
                                                        "<div class='animation-btn sm-res-mg-t-10 tb-res-mg-t-10 dk-res-mg-t-10'>"+
                                                            "<button class='btn ant-nk-st flash-ac' onclick='pengajuan("+ data.data[$i]['company_id'] +")'>Ajukan Proposal</button>"+
                                                        "</div>"+
                                                    "</div>"+
                                                "</div>"+
                                            "</div>"+
                                        "</div>"+
                                    "</div>"
                                );
                            }
                        }
                        $("#page").val(data.page);
                        $("#number_page").text(data.page);
                    // window.location.reload();
                    },
                    afterSend: function() {
                    // waitingDialog.show();
                    },
                    
                });
            }
        });

        $('#cari').keyup(function(){
            // console.log($(this).val());
            var _url = '{{ url("/")}}/cari';
            var page = $("#page").val();
                $.ajax({
                    type : "POST",
                    url  : _url,
                    dataType : "JSON",
                    data :{
                        page: 1,
                        cari:$(this).val(),
                        kategori:$("#kategori").val(),
                    },
                    beforeSend: function() {
                    // waitingDialog.show();
                    },
                    success : function(data){
                        console.log(data);
                        $(".card").remove();
                        if (data.data != null) {
                            console.log(data.data.length );
                            for($i = 0 ; $i < data.data.length ; $i++){
                                $(".dasboard_card").append(
                                    "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-tb-30 sm-res-mg-t-0 card' style='height:40%'>"+
                                        "<div class='animation-single-int' >"+
                                            "<div class='animation-ctn-hd' style=''>"+
                                                "<h2>"+data.data[$i]['name']+"</h2>"+
                                            "</div>"+
                                            "<div class='animation-img mg-b-15' style='text-align:center'>"+
                                                "<img class='animate-one' src='{{ url('/')}}/storage/"+data.data[$i]['img']+"' alt='' style='width: 100%;height: 200px;' />"+
                                            "</div>"+
                                            "<div class='animation-action'>"+
                                                "<div class='row'>"+
                                                    "<div class='col-lg-6'>"+
                                                        "<div class='animation-btn'>"+
                                                            "<button class='btn ant-nk-st bounce-ac'>Lihat Profil</button>"+
                                                        "</div>"+
                                                    "</div>"+
                                                    "<div class='col-lg-6'>"+
                                                        "<div class='animation-btn sm-res-mg-t-10 tb-res-mg-t-10 dk-res-mg-t-10'>"+
                                                            "<button class='btn ant-nk-st flash-ac' onclick='pengajuan("+ data.data[$i]['company_id'] +")'>Ajukan Proposal</button>"+
                                                        "</div>"+
                                                    "</div>"+
                                                "</div>"+
                                            "</div>"+
                                        "</div>"+
                                    "</div>"
                                );
                            }
                        }
                        $("#page").val(data.page);
                        $("#number_page").text(data.page);
                    // window.location.reload();
                    },
                    afterSend: function() {
                    // waitingDialog.show();
                    },
                    
                });
        });


        $('#kategori').change(function(){
            // console.log($(this).val());
            var _url = '{{ url("/")}}/kategori';
            var page = $("#page").val();
                $.ajax({
                    type : "POST",
                    url  : _url,
                    dataType : "JSON",
                    data :{
                        page: 1,
                        cari:$("#cari").val(),
                        kategori:$(this).val(),
                    },
                    beforeSend: function() {
                    // waitingDialog.show();
                    },
                    success : function(data){
                        console.log(data);
                        $(".card").remove();
                        if (data.data != null) {
                            console.log(data.data.length );
                            for($i = 0 ; $i < data.data.length ; $i++){
                                $(".dasboard_card").append(
                                    "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-tb-30 sm-res-mg-t-0 card' style='height:40%'>"+
                                        "<div class='animation-single-int' >"+
                                            "<div class='animation-ctn-hd' style=''>"+
                                                "<h2>"+data.data[$i]['name']+"</h2>"+
                                            "</div>"+
                                            "<div class='animation-img mg-b-15' style='text-align:center'>"+
                                                "<img class='animate-one' src='{{ url('/')}}/storage/"+data.data[$i]['img']+"' alt='' style='width: 100%;height: 200px;' />"+
                                            "</div>"+
                                            "<div class='animation-action'>"+
                                                "<div class='row'>"+
                                                    "<div class='col-lg-6'>"+
                                                        "<div class='animation-btn'>"+
                                                            "<button class='btn ant-nk-st bounce-ac'>Lihat Profil</button>"+
                                                        "</div>"+
                                                    "</div>"+
                                                    "<div class='col-lg-6'>"+
                                                        "<div class='animation-btn sm-res-mg-t-10 tb-res-mg-t-10 dk-res-mg-t-10'>"+
                                                            "<button class='btn ant-nk-st flash-ac' onclick='pengajuan("+ data.data[$i]['company_id'] +")'>Ajukan Proposal</button>"+
                                                        "</div>"+
                                                    "</div>"+
                                                "</div>"+
                                            "</div>"+
                                        "</div>"+
                                    "</div>"
                                );
                            }
                        }
                        $("#page").val(data.page);
                        $("#number_page").text(data.page);
                    // window.location.reload();
                    },
                    afterSend: function() {
                    // waitingDialog.show();
                    },
                    
                });
        });

        

    });


</script>
@endsection

