@extends('layouts.app')

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Manajement Users</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Server Class</a></li>
                        <li class="breadcrumb-item"><a href="{{route('user_setting.index')}}">Manajement User</a></li>
                        <li class="breadcrumb-item active">Add</li>
                  </ol>
            </div>
      </div>
</div>
@endsection


@section('content')
<div class="row">
      <div class="col-md-7 col-sm-12">
            <div class="card m-b-20">
                  <div class="card-header d-flex justify-content-between">
                        <h4 class="mt-0 header-title">Tambah</h4>
                        <a class="btn btn-primary" href="{{route('user_setting.index')}}"><i class="mdi mdi-arrow-left mr-1"></i>kembali</a>
                  </div>
                  <div class="card-body">
                        <form action="{{route('user_setting.store')}}" method="POST">
                              @csrf
                              <div class="form-group row">
                                    <label for="nik" class="col-sm-3">Nik</label>
                                    <div class="col-sm-9">
                                          <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" placeholder="Enter nik" value="{{old('nik')}}">
                                          @error('nik')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label for="name" class="col-sm-3">Name</label>
                                    <div class="col-sm-9">
                                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name" value="{{old('name')}}">
                                          @error('name')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label for="email" class="col-sm-3">Email</label>
                                    <div class="col-sm-9">
                                          <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email" value="{{old('email')}}">
                                          @error('email')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label for="password" class="col-sm-3">Password</label>
                                    <div class="col-sm-9">
                                          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password" value="{{old('password')}}">
                                          @error('password')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label for="role" class="col-sm-3">Role</label>
                                    <div class="col-sm-9">
                                          <select name="role" id="role" class="form-control @error('role') is-invalid @enderror ">
                                                <option value="">chosee</option>
                                                @foreach ($roles as $role)
                                                <option value="{{$role->name}}">{{$role->name}}</option>
                                                @endforeach
                                          </select>
                                          @error('role')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group justify-content-end d-flex">
                                    <button class="btn btn-primary col-md-2 col-sm-12">tambah</button>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</div>
@endsection
