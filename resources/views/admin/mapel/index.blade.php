@extends('layouts.app')

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Mata Pelajaran</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{route('admin')}}">{{config('app.name')}}</a></li>
                        <li class="breadcrumb-item active">Mata Pelajaran</li>
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
                        <h4 class="header-title mt-0">Mata Pelajaran</h4>
                        <a class="btn btn-primary" href="{{route('mata_pelajaran.create')}}"><i class="mdi mdi-plus mr-2"></i>tambah</a>
                  </div>
                  <div class="card-body">
                        @include('vendor._message')

                        <button type="button" class="btn btn-primary waves-effect waves-light my-3" data-toggle="modal" data-target="#import">Import Excel</button>

                        <table id="table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                    <tr>
                                          <th>#</th>
                                          <th>Mata Pelajaran</th>
                                          <th>Pilihan</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($mapels as $mapel)
                                    <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>{{$mapel->mata_pelajaran}}</td>
                                          <td>
                                                <div class="d-flex">
                                                      <a class="btn btn-sm btn-warning mr-1" href="{{route('mata_pelajaran.edit', ['mata_pelajaran' => $mapel->id])}}">edit</a>
                                                      <form action="{{route('mata_pelajaran.destroy', ['mata_pelajaran' => $mapel->id] )}}" method="post">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button class="btn btn-danger btn-sm btn-delete">hapus</button>
                                                      </form>
                                                </div>
                                          </td>
                                    </tr>
                                    @endforeach
                              </tbody>
                        </table>
                  </div>
            </div>
      </div>

      <div id="import" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="importLabel" aria-hidden="true">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title mt-0" id="importLabel">Import</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                              <form action="{{route('mapel.import')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                          <label class="col-sm-3">File</label>
                                          <div class="col-sm-9">
                                                <input type="file" name="file" class="form-control-file @error('file') is-invalid @enderror">
                                                @error('file')
                                                <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
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
</div>
@endsection

@push('js')
@include('vendor._datatable')
@include('vendor._delete_alert')
@endpush
