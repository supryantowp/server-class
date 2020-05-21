@extends('layouts.auth')

@section('content')

<div class="card">
      <div class="card-body">

            <div class="p-3">
                  <h4 class="text-white font-18 m-b-5 text-center">Free Register</h4>
                  <p class="text-white-50 text-center">Get your free {{config('app.name' , 'Laravel')}} account now.</p>

                  <form class="form-horizontal m-t-30" action="{{route('register')}}" method="POST">

                        @csrf
                        <div class="form-group">
                              <label for="name">Nik</label>
                              <input type="text" class="form-control @error('nik') is-invalid @enderror " id="nik" placeholder="Enter nik" name="nik" value="{{old('nik')}}">

                              @error('nik')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                        </div>

                        <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" placeholder="Enter name" name="name" value="{{old('name')}}">

                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                        </div>

                        <div class="form-group">
                              <label for="useremail">Email</label>
                              <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail" placeholder="Enter email" name="email" value="{{old('email')}}">

                              @error('email')
                              <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                        </div>

                        <div class="form-group">
                              <label for="useremail">Jenis Kelamin</label>
                              <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="">pilih</option>
                                    <option value="Laki Laki" {{old('jenis_kelamin') == 'Laki Laki' ? 'selected' : null}}>Laki</option>
                                    <option value="Perempuan" {{old('jenis_kelamin') == 'Perempuan' ? 'selected' : null}}>Perempuan</option>
                              </select>

                              @error('jenis_kelamin')
                              <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                        </div>

                        <div class="form-group">
                              <label for="userpassword">Password</label>
                              <input type="password" class="form-control @error('password') is-invalid @enderror " id="userpassword" placeholder="Enter password" name="password" value="{{old('password')}}">
                              @error('password')
                              <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                        </div>

                        <div class="form-group">
                              <label for="password-confirm">Confirm Password</label>
                              <input type="password" class="form-control @error('password_confirmaion') is-invalid @enderror" id="password-confirm" placeholder="Enter confirm password" name="password_confirmation" autocomplete="new-password">

                              @error('password_confirmation')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                        </div>

                        <div class="form-group row m-t-20">
                              <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                              </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                              <div class="col-12 m-t-20">
                                    <p class=" text-white-50 mb-0">By registering you agree to the Lexa <a href="#" class="text-primary">Terms of Use</a></p>
                              </div>
                        </div>
                  </form>
            </div>

      </div>
</div>


@endsection
