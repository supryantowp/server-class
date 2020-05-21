@extends('layouts.app')

@push('css')
<link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Jadwal Piket</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{route('admin')}}">{{config('app.name')}}</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('jadwal_piket.index')}}">Jadwal Piket</a></li>
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
                        <h4 class="header-title mt-0">Tambah</h4>
                        <a class="btn btn-primary" href="{{route('jadwal_piket.index')}}"><i class="mdi mdi-arrow-left mr-2"></i>kembali</a>
                  </div>
                  <div class="card-body">
                        <form action="{{route('jadwal_piket.store')}}" method="post" class="mt-3">
                              @csrf
                              <div class="form-group row">
                                    <label class="col-sm-3" for="hari">Hari</label>
                                    <div class="col-sm-9">
                                          <select class="form-control select2 @error('hari') is-invalid @enderror" name="hari">
                                                <option value="">pilih</option>
                                                @foreach ($haris as $hari)
                                                <option value="{{$hari->id}}" {{old('hari') == $hari->id ? 'selected' : null}}>{{$hari->hari}}</option>
                                                @endforeach
                                          </select>
                                          @error('hari')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-3" for="siswa">Siswa</label>
                                    <div class="col-sm-9">
                                          <select class="form-control select2 @error('siswa') is-invalid @enderror" name="siswa">
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
