@extends('layouts.app')

@push('css')
<link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Berkas</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{route('admin')}}">Server Class</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('berkas.index')}}">Berkas</a></li>
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
                        <a href="{{route('berkas.index')}}" class="btn btn-primary"><i class="mdi mdi-arrow-left mr-2"></i>kembali</a>
                  </div>
                  <div class="card-body">
                        <form action="{{route('berkas.update', ['berka' => $berkas->id])}}" method="post" class="mt-3" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="form-group row">
                                    <label for="nama" class="col-sm-3">Nama</label>
                                    <div class="col-sm-9">
                                          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$berkas->nama}}">
                                          @error('nama')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="deskripsi" class="col-sm-3">Deskripsi</label>
                                    <div class="col-sm-9">
                                          <textarea name="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{$berkas->deskripsi}}</textarea>
                                          @error('deskripsi')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="type" class="col-sm-3">Type</label>
                                    <div class="col-sm-9">
                                          <select name="type" class="form-control select2 @error('type') is-invalid @enderror">
                                                <option value="">pilih</option>
                                                <option value="pdf" {{$berkas->type == 'pdf' ? 'selected' : null}}>pdf</option>
                                                <option value="word" {{$berkas->type == 'word' ? 'selected' : null}}>word</option>
                                                <option value="image" {{$berkas->type == 'image' ? 'selected' : null}}>image</option>
                                          </select>
                                          @error('type')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label class="col-sm-3" for="filename">File</label>
                                    <div class="col-sm-9">
                                          <input type="file" name="filename" class="filestyle @error('filename') is-invalid @enderror " data-buttonname="btn-secondary">
                                          @error('filename')
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
