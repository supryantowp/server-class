@extends('layouts.app')

@push('css')
<link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Daftar Absensi</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{route('admin')}}">Server Class</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('daftar_absensi.index')}}">Daftar Absensi</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                  </ol>
            </div>
      </div>
</div>
@endsection


@section('content')
<div class="row">
      <div class="col-12">
            <div class="card">
                  <div class="card-header d-flex justify-content-between">
                        <h1 class="header-title mt-0">Tambah</h1>
                        <a class="btn btn-primary" href="{{route('daftar_absensi.index')}}"> <i class="mdi mdi-arrow-left mr-2"></i> kembali</a>
                  </div>
                  <div class="card-body">
                        <form action="{{route('daftar_absensi.store')}}" class="mt-3" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                    <label for="siswa" class="col-sm-3">Siswa</label>
                                    <div class="col-sm-9">
                                          <select name="siswa" class="form-control @error('siswa') is-invalid @enderror select2">
                                                <option value="">pilih</option>
                                                @foreach ($siswas as $siswa)
                                                <option value="{{$siswa->id}}" {{old('siswa') == $siswa->id ? 'selected' : null}}>{{$siswa->nama}}</option>
                                                @endforeach
                                          </select>
                                          @error('siswa')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label for="keterangan" class="col-sm-3">Keterangan</label>
                                    <div class="col-sm-9">
                                          <select name="keterangan" class="form-control @error('keterangan') is-invalid @enderror select2">
                                                <option value="">pilih</option>
                                                <option value="hadir" {{old('keterangan') == 'hadir' ? 'selected' : null}}>Hadir</option>
                                                <option value="izin" {{old('keterangan') == 'izin' ? 'selected' : null}}>Izin</option>
                                                <option value="sakit" {{old('keterangan') == 'sakit' ? 'selected' : null}}>Sakit</option>
                                                <option value="alfa" {{old('keterangan') == 'alfa' ? 'selected' : null}}>Alfa</option>
                                          </select>
                                          @error('keterangan')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-3" for="alasan">Alasan</label>
                                    <div class="col-sm-9">
                                          <textarea name="alasan" class="form-control @error('alasan') is-invalid @enderror">{{old('alasan')}}</textarea>
                                          @error('keterangan')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-3" for="photo">Photo</label>
                                    <div class="col-sm-9">
                                          <input type="file" name="photo" class="filestyle @error('photo') is-invalid @enderror " data-buttonname="btn-secondary">
                                          @error('photo')
                                          <span class="text-danger" style="font-size: 10px">{{$message}}</span>
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
<script src="{{asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}"></script>
<script>
      $(".select2").select2();

</script>
@endpush
