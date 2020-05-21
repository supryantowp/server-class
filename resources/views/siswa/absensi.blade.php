@extends('layouts.app')

@push('css')
<link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css">
@endpush

@section('header')
<div class="row">
      <div class="col-sm-12">
            <div class="page-title-box">
                  <h4 class="page-title">Absensi Kehadiran</h4>
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
                        <h4 class="header-title">Chart</h4>
                  </div>
                  <div class="card-body">
                        {!! $chart->container() !!}
                  </div>
            </div>
      </div>
      <div class="col-md-5 col-sm-12">
            <div class="card">
                  <div class="card-header">
                        <h4 class="header-title">Absensi Kehadiran</h4>
                  </div>
                  <div class="card-body">
                        <p>Jangan bolos ya dek</p>

                        @include('vendor._message')

                        <form action="{{route('absensi.store')}}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                    <label for="Photo" class="col-sm-3">photo</label>
                                    <div class="col-sm-9">
                                          <input type="file" name="photo" class="filestyle @error('photo') is-invalid @enderror " data-buttonname="btn-secondary">
                                          @error('photo')
                                          <span class="text-danger" style="font-size: 10px">{{$message}}</span>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label for="keterangan" class="col-sm-3">Ket</label>
                                    <div class="col-sm-9">
                                          <select name="keterangan" class="form-control select2 @error('keterangan') is-invalid @enderror">
                                                <option value="">pilih</option>
                                                <option value="hadir" {{old('hadir') == 'hadir' ? 'selected' : null}}>Hadir</option>
                                                <option value="izin" {{old('izin') == 'izin' ? 'selected' : null}}>Izin</option>
                                                <option value="sakit" {{old('sakit') == 'sakit' ? 'selected' : null}}>Sakit</option>
                                                <option value="alfa" {{old('alfa') == 'alfa' ? 'selected' : null}}>Alfa</option>
                                          </select>
                                          @error('keterangan')
                                          <span class="text-danger" style="font-size: 10px">{{$message}}</span>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label for="alasan" class="col-sm-3">Alasan</label>
                                    <div class="col-sm-9">
                                          <textarea name="alasan" class="form-control @error('alasan') is-invalid @enderror">{{old('alasan')}}</textarea>
                                          @error('alasan')
                                          <span class="text-danger" style="font-size: 10px">{{$message}}</span>
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group d-flex justify-content-end">
                                    <button class="btn btn-primary col-md-4 col-sm-12">simpan</button>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
      <div class="col-md-7 col-sm-12">
            <div class="card">
                  <div class="card-header">
                        <h4 class="header-title">Data Kehadiran</h4>
                  </div>
                  <div class="card-body">
                        <table id="table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                    <tr>
                                          <th>#</th>
                                          <th>Keterangan</th>
                                          <th>Alasan</th>
                                          <th>tanggal / bulan / tahun</th>
                                          <th>Photo</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($abensiss as $absen)
                                    <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>
                                                @if ($absen->keterangan == 'hadir')
                                                <span class="badge-pill badge-success">Hadir</span>
                                                @endif
                                                @if ($absen->keterangan == 'izin')
                                                <span class="badge-pill badge-info">Izin</span>
                                                @endif
                                                @if ($absen->keterangan == 'sakit')
                                                <span class="badge-pill badge-warning">Sakit</span>
                                                @endif
                                                @if ($absen->keterangan == 'alfa')
                                                <span class="badge-pill badge-danger">Alfa</span>
                                                @endif
                                          </td>
                                          <td>{{$absen->alasan}}</td>
                                          <td>{{$absen->tanggal . '/' . $absen->bulan . '/' . $absen->tahun}}</td>
                                          <td>
                                                <a class="image-popup-no-margins" href="{{asset('storage/absensi/' . $absen->photo)}}">
                                                      <img class="img-fluid" alt="" src="{{asset('storage/absensi/' . $absen->photo)}}" width="75">
                                                </a>
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
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}"></script>
<script src="{{asset('plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

{!! $chart->script() !!}

<script>
      $(".select2").select2();
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
