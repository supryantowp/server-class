@extends('layouts.app')

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Jadwal Pelajaran</h4>
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
                        <h4 class="header-title">Jadwal Pelajaran</h4>
                  </div>
                  <div class="card-body">
                        <p>Jangan bolos ya dek</p>

                        <table id="table" class="table">
                              <thead>
                                    <tr>
                                          <th>#</th>
                                          <th>Senin</th>
                                          <th>Selasa</th>
                                          <th>Rabu</th>
                                          <th>Kamis</th>
                                          <th>Jumat</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <tr>
                                          <td>1</td>
                                          <td>Ujang</td>
                                          <td>Ubed</td>
                                          <td>Willy</td>
                                          <td>Kang Mus</td>
                                          <td>Ce Edoh</td>
                                    </tr>
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
