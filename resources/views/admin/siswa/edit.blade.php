@extends('layouts.app')

@push('css')
<link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Siswa</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{route('admin')}}">Server Class</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('siswa.index')}}">Siswa</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                  </ol>
            </div>
      </div>
</div>
@endsection

@section('content')
<div class="row">
      <div class="col-12">
            <div class="card">
                  <div class="card-header">
                        <h4 class="header-title">Edit</h4>
                  </div>
                  <div class="card-body">
                        <form action="{{route('siswa.update', ['siswa' => $siswa->id])}}" method="POST">
                              @csrf
                              @method('PUT')

                              <div class="form-group row">
                                    <label class="col-sm-3">Nik</label>
                                    <div class="col-sm-9">
                                          <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{$siswa->nik}}" readonly>
                                          @error('nik')
                                          <span class="invalid-feedback">
                                                {{$message}}
                                          </span>
                                          @enderror
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="col-sm-3">Nama</label>
                                    <div class="col-sm-9">
                                          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$siswa->nama}}">
                                          @error('nama')
                                          <span class="invalid-feedback">
                                                {{$message}}
                                          </span>
                                          @enderror
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="col-sm-3">Email</label>
                                    <div class="col-sm-9">
                                          <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$siswa->email}}">
                                          @error('email')
                                          <span class="invalid-feedback">
                                                {{$message}}
                                          </span>
                                          @enderror
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="col-sm-3">Nisn</label>
                                    <div class="col-sm-9">
                                          <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{$siswa->nisn}}">
                                          @error('nisn')
                                          <span class="invalid-feedback">
                                                {{$message}}
                                          </span>
                                          @enderror
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="col-sm-3">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                          <select name="jenis_kelamin" class="form-control select2 @error('jenis_kelamin') is-invalid @enderror">
                                                <option value="">pilih</option>
                                                <option value="Laki Laki" {{$siswa->jenis_kelamin == 'Laki Laki' ? 'selected' : null}}>Laki Laki</option>
                                                <option value="Perempuan" {{$siswa->jenis_kelamin == 'Perempuan' ? 'selected' : null}}>Perempuan</option>
                                          </select>
                                          @error('nisn')
                                          <span class="invalid-feedback">
                                                {{$message}}
                                          </span>
                                          @enderror
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="col-sm-3">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                          <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{$siswa->tanggal_lahir}}">
                                          @error('tanggal_lahir')
                                          <span class="invalid-feedback">
                                                {{$message}}
                                          </span>
                                          @enderror
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="col-sm-3">Alamat</label>
                                    <div class="col-sm-9">
                                          <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat">{{$siswa->alamat}}</textarea>
                                          @error('alamat')
                                          <span class=" invalid-feedback">
                                                {{$message}}
                                          </span>
                                          @enderror
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="col-sm-3">No Telephon</label>
                                    <div class="col-sm-9">
                                          <input type="number" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{$siswa->no_telepon}}">
                                          @error('no_telepon')
                                          <span class=" invalid-feedback">
                                                {{$message}}
                                          </span>
                                          @enderror
                                    </div>
                              </div>

                              <div class="form-group d-flex justify-content-end">
                                    <button class="btn btn-primary col-md-2 col-sm-12">simpan</button>
                              </div>

                        </form>
                  </div>
            </div>
      </div>
</div>
@endsection

@push('js')
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script>
      $(".select2").select2();

</script>
@endpush
