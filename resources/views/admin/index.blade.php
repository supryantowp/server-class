@extends('layouts.app')

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Dashboard</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                              Welcome to Server Class Dashboard
                        </li>
                  </ol>
            </div>
      </div>
</div>
@endsection

@section('content')
<div class="row">
      <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                  <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                              <i class="mdi mdi-account-multiple float-right"></i>
                        </div>
                        <div class="text-white">
                              <h6 class="text-uppercase mb-3">Siswa</h6>
                              <h4 class="mb-4">{{App\Model\Siswa::count()}}</h4>
                        </div>
                  </div>
            </div>
      </div>
      <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                  <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                              <i class="mdi mdi-account-network float-right"></i>
                        </div>
                        <div class="text-white">
                              <h6 class="text-uppercase mb-3">Guru</h6>
                              <h4 class="mb-4">{{App\Model\Guru::count()}}</h4>
                        </div>
                  </div>
            </div>
      </div>
      <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                  <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                              <i class="mdi mdi-book float-right"></i>
                        </div>
                        <div class="text-white">
                              <h6 class="text-uppercase mb-3">Mata Pelajaran</h6>
                              <h4 class="mb-4">{{App\Model\MataPelajaran::count()}}</h4>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection
