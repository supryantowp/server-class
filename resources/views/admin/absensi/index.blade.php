@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="{{asset('plugins/chartist/css/chartist.min.css')}}">
@endpush

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Daftar Absensi</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{route('admin')}}">{{config('app.name')}}</a></li>
                        <li class="breadcrumb-item active">Daftar Absensi Kehadiran</li>
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
                        <h4 class="mt-0 header-title">Daftar Absensi</h4>
                        <a href="{{route('daftar_absensi.create')}}" class="btn btn-primary"><i class="mdi mdi-plus mr-2"></i>tambah</a>
                  </div>
            </div>
      </div>
      <div class="col-md-9 col-sm-12">
            <div class="card">
                  <div class="card-header">
                        <h4 class="header-title">Data </h4>
                  </div>
                  <div class="card-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, nemo.</p>

                        @include('vendor._message')

                        <table id="table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                    <tr>
                                          <th>#</th>
                                          <th>Nama</th>
                                          <th>Hadir</th>
                                          <th>Izin</th>
                                          <th>Sakit</th>
                                          <th>Alfa</th>
                                          <th>Pilihan</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($siswas as $siswa)
                                    {{-- <tr>
                                          <td>{{$loop->iteration}}</td>
                                    <td>{{$absensi->siswa->nama }}</td>
                                    <td>{{$absensi->hadir()}}</td>
                                    <td>{{$absensi->izin()}}</td>
                                    <td>{{$absensi->sakit()}}</td>
                                    <td>{{$absensi->alfa()}}</td>
                                    <td>
                                          <div class="d-flex">
                                                <a class="btn btn-info btn-sm mr-1" href="{{route('daftar_absensi.show', ['daftar_absensi' => $absensi->id])}}">info</a>
                                                <a class="btn btn-warning btn-sm mr-1 " href="{{route('daftar_absensi.edit', ['daftar_absensi' => $absensi->id])}}">edit</a>
                                                <form action="{{route('daftar_absensi.destroy', ['daftar_absensi' => $absensi->id])}}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button class="btn btn-danger btn-sm btn-delete">hapus</button>
                                                </form>
                                          </div>
                                    </td>
                                    </tr> --}}

                                    <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>{{$siswa->nama}}</td>
                                          <td>{{$siswa->hadir()}}</td>
                                          <td>{{$siswa->izin()}}</td>
                                          <td>{{$siswa->sakit()}}</td>
                                          <td>{{$siswa->alfa()}}</td>
                                          <td>
                                                <div class="d-flex">
                                                      <a class="btn btn-info btn-sm mr-1" href="{{route('daftar_absensi.show', ['daftar_absensi' => $siswa->id])}}">info</a>
                                                </div>
                                          </td>
                                    </tr>
                                    @endforeach
                              </tbody>
                        </table>
                  </div>
            </div>
      </div>
      <div class="col-md-3 col-sm-12">
            <div class="card m-b-20">
                  <div class="card-header">
                        <h4 class="mt-0 header-title">Chart</h4>
                  </div>
                  <div class="card-body">
                        <div class="row text-center">
                              <div class="col-4">
                                    <h5 class="">{{App\Model\Absensi::where('keterangan', 'izin')->count()}}</h5>
                                    <p class="text-white-50">Izin</p>
                              </div>
                              <div class="col-4">
                                    <h5 class="">{{App\Model\Absensi::where('keterangan', 'sakit')->count()}}</h5>
                                    <p class="text-white-50">Sakit</p>
                              </div>
                              <div class="col-4">
                                    <h5 class="">{{App\Model\Absensi::where('keterangan', 'alfa')->count()}}</h5>
                                    <p class="text-white-50">Alfa</p>
                              </div>
                        </div>

                        <div>
                              {!! $chart->container() !!}
                        </div>
                        {{-- <div id="simple-pie" class="ct-chart ct-golden-section simple-pie-chart-chartist"></div> --}}
                  </div>
            </div>
      </div>
</div>
@endsection

@push('js')
@include('vendor._datatable')
@include('vendor._delete_alert')

<script src="{{asset('plugins/chartist/js/chartist.min.js')}}"></script>
<script src="{{asset('plugins/chartist/js/chartist-plugin-tooltip.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{!! $chart->script() !!}
@endpush
