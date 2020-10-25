
@extends('layouts.auth')

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">ESponsorship</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
             
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('/default')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="jenis_user" class="col-md-4 col-form-label text-md-right">{{ __('Jenis User') }}</label>

                            <div class="col-md-6">
                                <select id="jenis_user" class="form-control @error('jenis_user') is-invalid @enderror" name="jenis_user" required autocomplete="jenis_user" autofocus>
                                    <option disabled selected>Pilih Jenis User</option>
                                    <option value="2" {{old('jenis_user')==2?'selected':''}}>Perusahaan</option>
                                    <option value="3" {{old('jenis_user')==3?'selected':''}}>Mahasiswa</option>
                                </select>

                                @error('jenis_user')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group div-general row div-company">
                            <label for="nama_company" class="col-md-4 col-form-label text-md-right">{{ __('Nama Perusahaan') }}</label>

                            <div class="col-md-6">
                                <input id="nama_company" type="text" class="form-control input-company @error('nama_company') is-invalid @enderror" name="nama_company" value="{{ old('nama_company') }}" required autocomplete="nama_company" autofocus>

                                @error('nama_company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group div-general row div-company">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">{{ __('Kategori Perusahaan') }}</label>

                            <div class="col-md-6">
                                <select id="kategori" class="form-control " name="kategori" autocomplete="kategori" autofocus>
                                    <option disabled selected>Pilih Kategori</option>
                                    @foreach (Config::get('categories') as $category)
                                        <option value="{{$category->id}}">{{$category->nama}}</option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group div-general row div-company">
                            <label for="nama_owner" class="col-md-4 col-form-label text-md-right">{{ __('Supervisor') }}</label>

                            <div class="col-md-6">
                                <input id="nama_owner" type="text" class="form-control input-company @error('nama_owner') is-invalid @enderror" name="nama_owner" value="{{ old('nama_owner') }}" required autocomplete="nama_owner" autofocus>

                                @error('nama_owner')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group div-general row div-company">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

                            <div class="col-md-6">
                                <textarea id="deskripsi" type="text" class="form-control input-company @error('deskripsi') is-invalid @enderror" name="deskripsi" required autocomplete="deskripsi" autofocus>{{ old('deskripsi') }}</textarea>

                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group div-general row div-student">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control input-student @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group div-general row div-student">
                            <label for="fakultas" class="col-md-4 col-form-label text-md-right">{{ __('Fakultas') }}</label>
                            <div class="col-md-6">
                                <select id="fakultas" class="form-control " name="fakultas" autocomplete="fakultas" autofocus>
                                    <option disabled selected>Pilih Fakultas</option>
                                    @foreach (Config::get('faculties') as $faculty)
                                        <option value="{{$faculty->id}}">{{$faculty->nama}}</option>
                                    @endforeach
                                </select>
                                @error('fakultas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group div-general row div-student">
                            <label for="jurusan" class="col-md-4 col-form-label text-md-right">{{ __('Jurusan') }}</label>
                            <div class="col-md-6">
                                <select id="jurusan" class="form-control " name="jurusan" autocomplete="jurusan" autofocus>
                                    <option disabled selected>Pilih Jarusan</option>
                                    @foreach (Config::get('majors') as $major)
                                        <option value="{{$major->id}}">{{$major->nama}}</option>
                                    @endforeach
                                </select>
                                @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group div-general row div-student">
                            <label for="foto_nim" class="col-md-4 col-form-label text-md-right">{{ __('Foto KTM (JPG/PNG)') }}</label>

                            <div class="col-md-6">
                                <input id="foto_nim" type="file" class="form-control input-student @error('foto_nim') is-invalid @enderror" name="foto_nim" value="{{ old('foto_nim') }}" required autocomplete="foto_nim">

                                @error('foto_nim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group div-general row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>

                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group div-general row">
                            <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('Telpon') }}</label>

                            <div class="col-md-6">
                                <input id="telp" type="text" maxlength="13" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" onkeypress="return validateAngka(event)"  title="masukan nomor telephone!" required autocomplete="telp" autofocus>

                                @error('telp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group div-general row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group div-general div-company row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto Perusahaan (JPG/PNG)') }}</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control input-company @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" required autocomplete="foto">

                                @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group div-general row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group div-general row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group div-general row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
        $(".div-general").hide();

        $("#jenis_user").change(function() {
            $(".div-general").show();
            if ($(this).val() == 2) {
                $(".div-company").show();
                $(".div-student").hide();
                $(".input-company").attr("disabled", false);
                $(".input-student").attr("disabled", true);
            } else {
                $(".div-company").hide();
                $(".div-student").show();
                $(".input-company").attr("disabled", true);
                $(".input-student").attr("disabled", false);
            }
        });

        if ('{{old('jenis_user')}}' == '2' || '{{old('jenis_user')}}' == '3')
            $("#jenis_user").trigger('change');

    })

    
</script>
<script>
    function validateAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
        return true;
        // body...
    }
</script>
@endsection