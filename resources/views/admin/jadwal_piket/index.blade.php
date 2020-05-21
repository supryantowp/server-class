@extends('layouts.app')

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Jadwal Piket</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{route('admin')}}">{{config('app.name')}}</a></li>
                        <li class="breadcrumb-item active">Jadwal Piket</li>
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
                        <h4 class="header-title mt-0">Jadwal Piket</h4>
                        @role('admin')
                        <a class="btn btn-primary" href="{{route('jadwal_piket.create')}}"> <i class="mdi mdi-arrow-left mr-2"></i> tambah</a>
                        @endrole
                  </div>
                  <div class="card-body">
                        <p>Jangan bolos ya dek</p>

                        @include('vendor._message')

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                              <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#senin" role="tab">
                                          <span class="d-block d-sm-none"><i class="mdi mdi-format-header-1"></i></span>
                                          <span class="d-none d-sm-block">Senin</span>
                                    </a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#selasa" role="tab">
                                          <span class="d-block d-sm-none"><i class="mdi mdi-format-header-2"></i></span>
                                          <span class="d-none d-sm-block">Selasa</span>
                                    </a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#rabu" role="tab">
                                          <span class="d-block d-sm-none"><i class="mdi mdi-format-header-3"></i></span>
                                          <span class="d-none d-sm-block">Rabu</span>
                                    </a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kamis" role="tab">
                                          <span class="d-block d-sm-none"><i class="mdi mdi-format-header-4"></i></span>
                                          <span class="d-none d-sm-block">Kamis</span>
                                    </a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#jumat" role="tab">
                                          <span class="d-block d-sm-none"><i class="mdi mdi-format-header-5"></i></span>
                                          <span class="d-none d-sm-block">Jumat</span>
                                    </a>
                              </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                              <div class="tab-pane active p-3" id="senin">
                                    <h5 class="header-title">Senin</h5>
                                    <table class="table table-striped">
                                          <thead>
                                                <tr>
                                                      <th>#</th>
                                                      <th>Nama</th>
                                                      @role('admin')
                                                      <th>Pilihan</th>
                                                      @endrole
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @forelse ($hari_senin as $senin)
                                                <tr>
                                                      <td>{{$loop->iteration}}</td>
                                                      <td>{{$senin->siswa->nama}}</td>
                                                      @role('admin')
                                                      <td>
                                                            <div class="d-flex">
                                                                  <a class="btn btn-warning btn-sm mr-1" href="{{route('jadwal_piket.edit', ['jadwal_piket' => $senin->id])}}">edit</a>
                                                                  <form action="{{route('jadwal_piket.destroy', ['jadwal_piket' => $senin->id])}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-danger btn-sm btn-delete">hapus</button>
                                                                  </form>
                                                            </div>
                                                      </td>
                                                      @endrole
                                                </tr>
                                                @empty
                                                <td colspan="3">tidak ada</td>
                                                @endforelse
                                          </tbody>
                                    </table>
                              </div>
                              <div class="tab-pane p-3" id="selasa">
                                    <h5 class="header-title">Selasa</h5>
                                    <table class="table table-striped">
                                          <thead>
                                                <tr>
                                                      <th>#</th>
                                                      <th>Nama</th>
                                                      @role('admin')
                                                      <th>Pilihan</th>
                                                      @endrole
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @forelse ($hari_selasa as $senin)
                                                <tr>
                                                      <td>{{$loop->iteration}}</td>
                                                      <td>{{$senin->siswa->nama}}</td>
                                                      @role('admin')
                                                      <td>
                                                            <div class="d-flex">
                                                                  <a class="btn btn-warning btn-sm mr-1" href="{{route('jadwal_piket.edit', ['jadwal_piket' => $senin->id])}}">edit</a>
                                                                  <form action="{{route('jadwal_piket.destroy', ['jadwal_piket' => $senin->id])}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-danger btn-sm btn-delete">hapus</button>
                                                                  </form>
                                                            </div>
                                                      </td>
                                                      @endrole
                                                </tr>
                                                @empty
                                                <td colspan="3">tidak ada</td>
                                                @endforelse
                                          </tbody>
                                    </table>
                              </div>
                              <div class="tab-pane p-3" id="rabu">
                                    <h5 class="header-title">Rabu</h5>
                                    <table class="table table-striped">
                                          <thead>
                                                <tr>
                                                      <th>#</th>
                                                      <th>Nama</th>
                                                      @role('admin')
                                                      <th>Pilihan</th>
                                                      @endrole
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @forelse ($hari_rabu as $senin)
                                                <tr>
                                                      <td>{{$loop->iteration}}</td>
                                                      <td>{{$senin->siswa->nama}}</td>
                                                      @role('admin')
                                                      <td>
                                                            <div class="d-flex">
                                                                  <a class="btn btn-warning btn-sm mr-1" href="{{route('jadwal_piket.edit', ['jadwal_piket' => $senin->id])}}">edit</a>
                                                                  <form action="{{route('jadwal_piket.destroy', ['jadwal_piket' => $senin->id])}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-danger btn-sm btn-delete">hapus</button>
                                                                  </form>
                                                            </div>
                                                      </td>
                                                      @endrole
                                                </tr>
                                                @empty
                                                <td colspan="3">tidak ada</td>
                                                @endforelse
                                          </tbody>
                                    </table>
                              </div>
                              <div class="tab-pane p-3" id="kamis">
                                    <h5 class="header-title">Kamis</h5>
                                    <table class="table table-striped">
                                          <thead>
                                                <tr>
                                                      <th>#</th>
                                                      <th>Nama</th>
                                                      @role('admin')
                                                      <th>Pilihan</th>
                                                      @endrole
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @forelse ($hari_kamis as $senin)
                                                <tr>
                                                      <td>{{$loop->iteration}}</td>
                                                      <td>{{$senin->siswa->nama}}</td>
                                                      @role('admin')
                                                      <td>
                                                            <div class="d-flex">
                                                                  <a class="btn btn-warning btn-sm mr-1" href="{{route('jadwal_piket.edit', ['jadwal_piket' => $senin->id])}}">edit</a>
                                                                  <form action="{{route('jadwal_piket.destroy', ['jadwal_piket' => $senin->id])}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-danger btn-sm btn-delete">hapus</button>
                                                                  </form>
                                                            </div>
                                                      </td>
                                                      @endrole
                                                </tr>
                                                @empty
                                                <td colspan="3">tidak ada</td>
                                                @endforelse
                                          </tbody>
                                    </table>
                              </div>
                              <div class="tab-pane p-3" id="jumat">
                                    <h5 class="header-title">Jumat</h5>
                                    <table class="table table-striped">
                                          <thead>
                                                <tr>
                                                      <th>#</th>
                                                      <th>Nama</th>
                                                      @role('admin')
                                                      <th>Pilihan</th>
                                                      @endrole
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @forelse ($hari_jumat as $senin)
                                                <tr>
                                                      <td>{{$loop->iteration}}</td>
                                                      <td>{{$senin->siswa->nama}}</td>
                                                      @role('admin')
                                                      <td>
                                                            <div class="d-flex">
                                                                  <a class="btn btn-warning btn-sm mr-1" href="{{route('jadwal_piket.edit', ['jadwal_piket' => $senin->id])}}">edit</a>
                                                                  <form action="{{route('jadwal_piket.destroy', ['jadwal_piket' => $senin->id])}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-danger btn-sm btn-delete">hapus</button>
                                                                  </form>
                                                            </div>
                                                      </td>
                                                      @endrole
                                                </tr>
                                                @empty
                                                <td colspan="3">tidak ada</td>
                                                @endforelse
                                          </tbody>
                                    </table>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection

@push('js')
@include('vendor._delete_alert')
@endpush
