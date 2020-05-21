@extends('layouts.app')

@push('css')
<link href="{{asset('plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css">
@endpush

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Daftar Absensi</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Server Class</a></li>
                        <li class="breadcrumb-item"><a href="{{route('daftar_absensi.index')}}">Daftar Absensi Kehadiran</a></li>
                        <li class="breadcrumb-item active">Show</li>
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
                        <h1 class="header-title mt-0">Show</h1>
                        <a class="btn btn-primary" href="{{route('daftar_absensi.index')}}"> <i class="mdi mdi-arrow-left mr-2"></i> kembali</a>
                  </div>
            </div>
      </div>
</div>

<div class="row">
      <div class="col-md-9 col-sm-12">
            <div class="card">
                  <div class="card-header">
                        <h4 class="header-title">{{$siswa->nama}}</h4>
                  </div>
                  <div class="card-body">

                        @include('vendor._message')

                        <table id="table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                    <tr>
                                          <th>#</th>
                                          <th>Ket</th>
                                          <th>Alasan</th>
                                          <th>Tanggal / bulan / tahun</th>
                                          <th>Photo</th>
                                          <th>Pilihan</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($absensis as $absensi)
                                    <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>
                                                @if ($absensi->keterangan == 'hadir')
                                                <span class="badge-pill badge-primary">Hadir</span>
                                                @endif
                                                @if ($absensi->keterangan == 'izin')
                                                <span class="badge-pill badge-info">Izin</span>
                                                @endif
                                                @if ($absensi->keterangan == 'sakit')
                                                <span class="badge-pill badge-warning">Sakit</span>
                                                @endif
                                                @if ($absensi->keterangan == 'alfa')
                                                <span class="badge-pill badge-danger">Alfa</span>
                                                @endif
                                          </td>
                                          <td>{{$absensi->alasan}}</td>
                                          <td>{{$absensi->tanggal . '/' . $absensi->bulan . '/' . $absensi->tahun}}</td>
                                          <td>
                                                <a class="image-popup-no-margins" href="{{asset('storage/absensi/' . $absensi->photo)}}">
                                                      <img class="img-fluid" alt="" src="{{asset('storage/absensi/' . $absensi->photo)}}" width="75">
                                                </a>
                                          </td>
                                          <td>
                                                <div class="d-flex">
                                                      <a class="btn btn-info btn-sm mr-1" href="{{route('daftar_absensi.edit', ['daftar_absensi' => $absensi->id])}}">edit</a>
                                                      <form method="POST" action="{{route('daftar_absensi.destroy', ['daftar_absensi' => $absensi->id])}}">
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

<script src="{{asset('plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

<script>
      $('.image-popup-no-margins').magnificPopup({
            type: 'image'
            , closeOnContentClick: true
            , closeBtnInside: false
            , fixedContentPos: true
            , mainClass: 'mfp-no-margins mfp-with-zoom'
            , image: {
                  verticalFit: true
            }
            , zoom: {
                  enabled: true
                  , duration: 300
            }
      });

</script>

@endpush
