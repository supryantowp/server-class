@extends('layouts.app')

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Profle</h4>
                  <ol class="breadcrumb">
                        @role('admin')
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">{{config('app.name')}}</a></li>
                        @else
                        <li class="breadcrumb-item"><a href="{{route('siswa')}}">{{config('app.name')}}</a></li>
                        @endrole
                        <li class="breadcrumb-item active">Profile</li>
                  </ol>
            </div>
      </div>
</div>
@endsection


@section('content')
<div class="row">
      <div class="col-md-5 col-sm-12">
            <div class="card m-b-20">
                  <div class="card-header">
                        <h4 class="header-title">Profile</h4>
                  </div>
                  <div class="card-body">
                        <div class="row">
                              <div class="col-md-4 col-sm-12">
                                    <img class="mr-2 mb-0" src="{{asset('images/users/default.jpg')}}" alt="">
                              </div>
                              <div class="col-md-7 offset-1 col-sm-12">
                                    <h5 class="header-title">{{$profile->name}}</h5>
                                    <span class="text-secondary">{{$profile->roles[0]->name}}</span>
                                    <p>{{$profile->email}}</p>
                              </div>
                        </div>

                        <nav class="nav flex-column p-3">
                              <a class="nav-link menu-link active" href="{{route('me')}}">Profile</a>
                              <a class="nav-link " href="{{route('password')}}">Change Password</a>
                        </nav>

                  </div>
            </div>
      </div>

      <div class="col-md-7 col-sm-12">
            <div class="card m-b-20">
                  <div class="card-header">
                        <h4 class="header-title">Update Profile </h4>
                  </div>
                  <div class="card-body">
                        <form action="{{route('profile_update', ['id' => $profile->id])}}" method="post">
                              @csrf
                              <div class="form-group row">
                                    <label class="col-sm-3" for="name">Name</label>
                                    <div class="col-sm-9">
                                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$profile->name}}">
                                          @error('name')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-3" for="email">Email</label>
                                    <div class="col-sm-9">
                                          <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$profile->email}}">
                                          @error('email')
                                          <div class="invalid-feedback">
                                                {{$message}}
                                          </div>
                                          @enderror
                                    </div>
                              </div>

                              <div class="form-group d-flex justify-content-end ">
                                    <button class="btn btn-primary col-md-3 col-sm-12">update</button>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</div>
@endsection
