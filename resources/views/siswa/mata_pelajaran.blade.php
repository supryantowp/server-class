@extends('layouts.app')

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Mata Pelajaran</h4>
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
                        <h4 class="header-title">Mata Pelajaran</h4>
                  </div>
                  <div class="card-body">
                        <p>Jangan bolos ya dek</p>

                        <table id="table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                    <tr>
                                          <th>#</th>
                                          <th>Mata Pelajaran</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($mata_pelajarans as $mata_pelajaran)
                                    <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>{{$mata_pelajaran->mata_pelajaran}}</td>
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
