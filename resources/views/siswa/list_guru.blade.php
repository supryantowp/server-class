@extends('layouts.app')

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Guru</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                              Selamat Datang, {{Auth::user()->name}}
                        </li>
                  </ol>
            </div>
      </div>
</div>
@endsection

@section('content')
<div class="row">
      <div class="col-12">
            <div class="card">
                  <div class="card-header">
                        <h4 class="header-title">Guru</h4>
                  </div>
                  <div class="card-body">
                        <p>Jangan bolos ya dek</p>

                        <table id="table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                    <tr>
                                          <th>#</th>
                                          <th>Nama</th>
                                          <th>Nip</th>
                                          <th>No Telepon</th>
                                          <th>Email</th>
                                          <th>Alamat</th>
                                          <th>Photo</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($gurus as $guru)
                                    <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>{{$guru->nama}}</td>
                                          <td>{{$guru->nip}}</td>
                                          <td>{{$guru->no_telepon}}</td>
                                          <td>{{$guru->email}}</td>
                                          <td>{{$guru->alamat}}</td>
                                          <td>
                                                <img src="{{asset('images/users/default.jpg')}}" alt="">
                                          </td>
                                    </tr>
                                    @endforeach
                              </tbody>
                        </table>
                  </div>
            </div>
      </div>
</div>
@endsection


@push('js')
@include('vendor._datatable')
@endpush
