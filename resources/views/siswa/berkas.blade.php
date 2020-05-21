@extends('layouts.app')

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Berkas</h4>
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
                        <h4 class="header-title">Berkas</h4>
                  </div>
                  <div class="card-body">
                        <p>Jangan bolos ya dek</p>

                        <table id="table" class="table">
                              <thead>
                                    <tr>
                                          <th>#</th>
                                          <th>Nama</th>
                                          <th>Type</th>
                                          <th>Desckripsi</th>
                                          <th>Tanggal Upload</th>
                                          <th>Pilihan</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($berkass as $berkas)
                                    <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>{{$berkas->nama}}</td>
                                          <td>{{$berkas->type}}</td>
                                          <td>{{$berkas->created_at}}</td>
                                          <td>{{Date('m-d-Y')}}</td>
                                          <td>
                                                <form action="{{route('download', ['id' => $berkas->id])}}" method="post">
                                                      @csrf
                                                      <button class="btn btn-info mr-1 btn-sm">download</button>
                                                </form>
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
