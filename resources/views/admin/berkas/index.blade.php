@extends('layouts.app')

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Berkas</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{route('admin')}}">Server Class</a></li>
                        <li class="breadcrumb-item active">Berkas</li>
                  </ol>
            </div>
      </div>
</div>
@endsection

@section('content')
<div class="row">
      <div class="col-12">
            <div class="card">
                  <div class="card-header d-flex justify-content-between">
                        <h4 class="header-title mt-0">Berkas</h4>
                        <a class="btn btn-primary" href="{{route('berkas.create')}}"><i class="mdi mdi-plus mr-2"></i>tambah</a>
                  </div>
                  <div class="card-body">
                        <p>Jangan bolos ya dek</p>

                        @include('vendor._message')

                        <table id="table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                    <tr>
                                          <th>#</th>
                                          <th>Nama</th>
                                          <th>Deskripsi</th>
                                          <th>Type</th>
                                          <th>Pilihan</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($berkas as $item)
                                    <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>{{$item->nama}}</td>
                                          <td>{{$item->deskripsi}}</td>
                                          <td>{{$item->type}}</td>
                                          <td>
                                                <div class="d-flex">
                                                      <form action="{{route('download', ['id' => $item->id])}}" method="post">
                                                            @csrf
                                                            <button class="btn btn-info mr-1 btn-sm">download</button>
                                                      </form>
                                                      <a class="btn btn-warning btn-sm mr-1" href="{{route('berkas.edit', ['berka' => $item->id])}}">edit</a>
                                                      <form action="{{route('berkas.destroy', ['berka' => $item->id])}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm btn-delete">hapus</button>
                                                      </form>
                                                </div>
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
@include('vendor._delete_alert')
@endpush
