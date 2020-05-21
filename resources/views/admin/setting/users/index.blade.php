@extends('layouts.app')

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Manajement Users</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Server Class</a></li>
                        <li class="breadcrumb-item active">Manajement Users</li>
                  </ol>
            </div>
      </div>
</div>
@endsection

@section('content')
<div class="row">
      <div class="col-12">
            <div class="card m-b-20">
                  <div class="card-header d-flex justify-content-between">
                        <h4 class="mt-0 header-title">Manajement Users</h4>

                        <a class="btn btn-primary" href="{{route('user_setting.create')}}"><i class="mdi mdi-plus mr-2"></i>tambah</a>
                  </div>
                  <div class="card-body">
                        @include('vendor._message')

                        <button type="button" class="btn btn-primary waves-effect waves-light my-3" data-toggle="modal" data-target="#import">Import Excel</button>

                        <table id="table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                    <tr>
                                          <th>#</th>
                                          <th>Role</th>
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>Email Verified</th>
                                          <th>Action</th>
                                    </tr>
                              </thead>


                              <tbody>
                                    @forelse ($users as $user)
                                    <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>'{{$user->roles[0]->name}}'</td>
                                          <td>{{$user->name}}</td>
                                          <td>{{$user->email}}</td>
                                          <td>{{$user->email_verified_at ? 'true' : 'false'}}</td>
                                          <td>
                                                <div class="d-flex">
                                                      @if($user->hasRole('admin'))
                                                      n/a
                                                      @else
                                                      <a class="btn btn-warning btn-sm mr-1" href="{{route('user_setting.edit', ['user_setting' => $user->id])}}">edit</a>
                                                      <form action="{{route('user_setting.destroy', ['user_setting' => $user->id])}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-delete btn-danger btn-sm">delete</button>
                                                      </form>
                                                      @endif
                                                </div>
                                          </td>
                                    </tr>
                                    @empty

                                    @endforelse
                              </tbody>
                        </table>
                  </div>
            </div>
      </div>

      <div id="import" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="importLabel" aria-hidden="true">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title mt-0" id="importLabel">Import </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                              <form action="{{route('user.import')}}" method="post" enctype="multipart/form-data">
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
