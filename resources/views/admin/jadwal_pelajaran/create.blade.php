@extends('layouts.app')

@push('css')
<link href="{{asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Jadwal Pelajaran</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{route('admin')}}">Server Class</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('jadwal_pelajaran.index')}}">Jadwal Pelajaran</a></li>
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
                        <h4 class="mt-0 header-title">Tambah</h4>

                        <a class="btn btn-icon btn-primary" href="{{route('jadwal_pelajaran.index')}}"><i class="mdi mr-2 mdi-arrow-left"></i>kembali</a>
                  </div>
                  <div class="card-body">
                        <form action="{{route('jadwal_pelajaran.store')}}" class="mt-3" method="POST">
                              @csrf
                              <div class="form-group row">
                                    <label class="col-sm-3" for="hari">Hari</label>
                                    <div class="col-sm-9">
                                          <select name="hari" class="form-control select2 @error('hari') is-invalid @enderror ">
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
                                    <label class="col-sm-3" for="mata pelajaran">Mata Pelajaran</label>
                                    <div class="col-sm-9">
                                          <select name="mata_pelajaran" class="form-control select2 @error('mata_pelajaran') is-invalid @enderror">
                                                <option value="">pilih</option>
                                                @foreach ($mata_pelajarans as $mata_pelajaran)
                                                <option value="{{$mata_pelajaran->id}}" {{old('mata_pelajaran') == $mata_pelajaran->id ? 'selected' : null}}>{{$mata_pelajaran->mata_pelajaran}}</option>
                                                @endforeach
                                          </select>
                                          @error('mata_pelajaran')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label for="waktu" class="col-sm-3">Waktu</label>
                                    <div class="col-sm-9">
                                          <div>
                                                <div class="input-daterange input-group" id="date-range">
                                                      <input type="text" class="form-control" name="start" />
                                                      <input type="text" class="form-control" name="end" />
                                                </div>
                                          </div>
                                    </div>
                                    @error('waktu')
                                    <div class="invalid-feedback">
                                          {{$message}}
                                    </div>
                                    @enderror
                              </div>
                              <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary col-md-2 col-sm-12">simpan</button>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</div>
@endsection


@push('js')
<script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script>
      jQuery('#date-range').datepicker();
      $(".select2").select2();

</script>
@endpush
