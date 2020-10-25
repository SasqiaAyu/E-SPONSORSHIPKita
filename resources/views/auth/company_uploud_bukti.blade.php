@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Uploud Bukti Pembayaran</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('verifyCompanyUploud',$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">Nama</label>
                            <div class="col-md-6">
                                <input class="form-control" value="{{$user->nama}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">Foto (JPG/PNG)</label>
                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror"
                                    name="foto" value="{{ old('foto') }}" required autocomplete="foto">
                                @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Uploud') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/theme-notika/js/vendor/jquery-1.12.4.min.js"></script>
<script>
    $(function() {
        $(".div-company").hide();
        $(".div-student").hide();

        $("#jenis_user").change(function(){
            if($(this).val() == 2){
                $(".div-company").show();
                $(".div-student").hide();
                $(".input-company").attr("disabled",false);
                $(".input-student").attr("disabled",true);
            }else{
                $(".div-company").hide();
                $(".div-student").show();
                $(".input-company").attr("disabled",true);
                $(".input-student").attr("disabled",false);
            }
        });
        
        if('{{old('jenis_user')}}'=='2' || '{{old('jenis_user')}}'=='3')
            $("#jenis_user").trigger('change');

    })
</script>
@endsection