@extends('layouts.auth')

@section('content')
<div class="card">
      <div class="card-body">

            <div class="p-3">
                  <h4 class="text-white font-18 m-b-5 text-center">Welcome Back !</h4>
                  <p class="text-white-50 text-center">Sign in to continue to {{config('app.name', 'Laravel')}}.</p>

                  <form class="form-horizontal m-t-30" action="{{route('login')}}" method="POST">

                        @csrf

                        <div class="form-group">
                              <label>Nik / Email</label>
                              <input id="identity" type="text" class="form-control @error('identity') is-invalid @enderror" name="identity" value="{{ old('identity') }}" placeholder="Enter nik / email" />

                              @error('identity')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                        </div>


                        <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control @error('password') is-invalid @enderror " placeholder="Enter password" name="password">
                              @error('password')
                              <div class="invalid-feedback">
                                    {{$message}}
                              </div>
                              @enderror
                        </div>

                        <div class="form-group row m-t-20">
                              <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input">
                                          <label class="custom-control-label">Remember me</label>
                                    </div>
                              </div>
                              <div class="col-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                              </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 d-flex justify-content-between">
                              <div class=" m-t-20">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                          Forgot Your Password?
                                    </a>
                              </div>
                              <div class=" m-t-20">
                                    <a href="{{route('register')}}" class="btn btn-link"> Signup Now </a>
                              </div>
                        </div>
                  </form>
            </div>

      </div>
</div>
@endsection
