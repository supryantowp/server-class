@extends('layouts.app')

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Manajement Users</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Server Class</a></li>
                        <li class="breadcrumb-item "><a href="{{route('user_setting.index')}}">Manajement Users</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                  </ol>
            </div>
      </div>
</div>
@endsection


@section('content')
<div class="row">
      <div class="col-md-7 col-sm-12">
            <div class="card">
                  <div class="card-header d-flex justify-content-between">
                        <h4 class="mt-0 header-title">Edit</h4>
                        <a class="btn btn-primary" href="{{route('user_setting.index')}}"><i class="mdi mdi-arrow-left mr-1"></i>kembali</a>
                  </div>
                  <div class="card-body m-b-20">

                        <form action="{{route('user_setting.update', ['user_setting' => $user->id])}}" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="form-group row">
                                    <label for="nik" class="col-sm-3">Nik</label>
                                    <div class="col-sm-9">
                                          <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{$user->nik}}">
                                          @error('name')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-3">Name</label>
                                    <div class="col-sm-9">
                                          <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" value="{{$user->name}}">
                                          @error('name')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-3">Email</label>
                                    <div class="col-sm-9">
                                          <input type="text" class="form-control @error('email') is-invalid @enderror " name="email" value="{{$user->email}}">
                                          @error('email')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-3">Password</label>
                                    <div class="col-sm-9">
                                          <input type="password" class="form-control @error('password') is-invalid @enderror " name="password" value="">
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
                                          <select name="role" id="role" class="form-control">
                                                <option value="">chosee</option>
                                                @foreach ($roles as $role)
                                                <option value="{{$role->name}}" {{$user->roles[0]->id == $role->id ? 'selected': null}}>{{$role->name}}</option>
                                                @endforeach
                                          </select>
                                    </div>
                              </div>

                              <div class="form-group justify-content-end d-flex">
                                    <button class="btn btn-warning col-md-2 col-sm-12">update</button>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</div>
@endsection
