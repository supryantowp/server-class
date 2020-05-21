@extends('layouts.app')

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Jadwal Pelajaran</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{route('admin')}}">Server Class</a></li>
                        <li class="breadcrumb-item active">Jadwal Pelajaran</li>
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
                        <h4 class="mt-0 header-title">Jadwal Pelajaran</h4>

                        @role('admin')
                        <a class="btn btn-icon btn-primary" href="{{route('jadwal_pelajaran.create')}}"><i class="mdi mdi-plus mr-2"></i>tambah</a>
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
                              <div class="tab-pane active p-3" id="senin" role="tabpanel">
                                    <h5 class="header-title">Senin</h5>
                                    <div class="table-responsive">
                                          <table class="table table-striped">
                                                <thead>
                                                      <tr>
                                                            <th>Mata Pelajaran</th>
                                                            <th>Waktu</th>
                                                            @role('admin')
                                                            <th>Pilihan</th>
                                                            @endrole
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @forelse($hari_senin as $mapel)
                                                      <tr>
                                                            <td>{{$mapel->mapel->mata_pelajaran}}</td>
                                                            <td>{{$mapel->start}} - {{$mapel->end}}</td>
                                                            @role('admin')
                                                            <td>
                                                                  <div class="d-flex">
                                                                        <a class="btn btn-warning btn-sm mr-1" href="{{route('jadwal_pelajaran.edit', ['jadwal_pelajaran' => $mapel->id])}}">edit</a>
                                                                        <form action="{{route('jadwal_pelajaran.destroy', ['jadwal_pelajaran' => $mapel->id])}}" method="post">
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
                              <div class="tab-pane p-3" id="selasa" role="tabpanel">
                                    <h5 class="header-title">Selasa</h5>
                                    <div class="table-responsive">
                                          <table class="table table-striped">
                                                <thead>
                                                      <tr>
                                                            <th>Mata Pelajaran</th>
                                                            <th>Waktu</th>
                                                            @role('admin')
                                                            <thead>Pilihan</thead>
                                                            @endrole
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @forelse ($hari_selasa as $mapel)
                                                      <tr>
                                                            <td>{{$mapel->mapel->mata_pelajaran}}</td>
                                                            <td>{{$mapel->start}} - {{$mapel->end}}</td>
                                                            @role('admin')
                                                            <td>
                                                                  <div class="d-flex">
                                                                        <a class="btn btn-warning btn-sm mr-1" href="{{route('jadwal_pelajaran.edit', ['jadwal_pelajaran' => $mapel->id])}}">edit</a>
                                                                        <form action="{{route('jadwal_pelajaran.destroy', ['jadwal_pelajaran' => $mapel->id])}}" method="post">
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
                              <div class="tab-pane p-3" id="rabu" role="tabpanel">
                                    <h5 class="header-title">Rabu</h5>
                                    <div class="table-responsive">
                                          <table class="table table-striped">
                                                <thead>
                                                      <tr>
                                                            <th>Mata Pelajaran</th>
                                                            <th>Waktu</th>
                                                            @role('admin')
                                                            <thead>Pilihan</thead>
                                                            @endrole
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @forelse ($hari_rabu as $mapel)
                                                      <tr>
                                                            <td>{{$mapel->mapel->mata_pelajaran}}</td>
                                                            <td>{{$mapel->start}} - {{$mapel->end}}</td>
                                                            @role('admin')
                                                            <td>
                                                                  <div class="d-flex">
                                                                        <a class="btn btn-warning btn-sm mr-1" href="{{route('jadwal_pelajaran.edit', ['jadwal_pelajaran' => $mapel->id])}}">edit</a>
                                                                        <form action="{{route('jadwal_pelajaran.destroy', ['jadwal_pelajaran' => $mapel->id])}}" method="post">
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
                              <div class="tab-pane p-3" id="kamis" role="tabpanel">
                                    <h5 class="header-title">Kamis</h5>
                                    <div class="table-responsive">
                                          <table class="table table-striped">
                                                <thead>
                                                      <tr>
                                                            <th>Mata Pelajaran</th>
                                                            <th>Waktu</th>
                                                            @role('admin')
                                                            <thead>Pilihan</thead>
                                                            @endrole
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @forelse ($hari_kamis as $mapel)
                                                      <tr>
                                                            <td>{{$mapel->mapel->mata_pelajaran}}</td>
                                                            <td>{{$mapel->start}} - {{$mapel->end}}</td>
                                                            @role('admin')
                                                            <td>
                                                                  <div class="d-flex">
                                                                        <a class="btn btn-warning btn-sm mr-1" href="{{route('jadwal_pelajaran.edit', ['jadwal_pelajaran' => $mapel->id])}}">edit</a>
                                                                        <form action="{{route('jadwal_pelajaran.destroy', ['jadwal_pelajaran' => $mapel->id])}}" method="post">
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
                              <div class="tab-pane p-3" id="jumat" role="tabpanel">
                                    <h5 class="header-title">Jumat</h5>
                                    <div class="table-responsive">
                                          <table class="table table-striped">
                                                <thead>
                                                      <tr>
                                                            <th>Mata Pelajaran</th>
                                                            <th>Waktu</th>
                                                            @role('admin')
                                                            <thead>Pilihan</thead>
                                                            @endrole
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @forelse ($hari_jumat as $mapel)
                                                      <tr>
                                                            <td>{{$mapel->mapel->mata_pelajaran}}</td>
                                                            <td>{{$mapel->start}} - {{$mapel->end}}</td>
                                                            @role('admin')
                                                            <td>
                                                                  <div class="d-flex">
                                                                        <a class="btn btn-warning btn-sm mr-1" href="{{route('jadwal_pelajaran.edit', ['jadwal_pelajaran' => $mapel->id])}}">edit</a>
                                                                        <form action="{{route('jadwal_pelajaran.destroy', ['jadwal_pelajaran' => $mapel->id])}}" method="post">
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
</div>
@endsection

@push('js')
@include('vendor._datatable')
@include('vendor._delete_alert')
@endpush
