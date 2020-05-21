@extends('layouts.app')

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Manajement Users</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Server Class</a></li>
                        <li class="breadcrumb-item"><a href="{{route('user_setting.index')}}">Manajement Users</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                  </ol>
            </div>
      </div>
</div>
@endsection

@section('content')
<div class="row">
      <div class="col-12">
            <div class="card">
                  <div class="card-body m-b-20">
                        <h4 class="header-title">Detail</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, facere.</p>

                        <div class="col-md-6 col-sm-12">
                              <div class="form-group row">
                                    <label class="col-sm-3">Name :</label>
                                    <div class="col-sm-9">
                                          <p>supryanto</p>
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-3">Email :</label>
                                    <div class="col-sm-9">
                                          <p>supryanto</p>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection
