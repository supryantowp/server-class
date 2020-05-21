@extends('layouts.auth')

@section('content')

<div class="card">
    <div class="card-body">

        <div class="p-3">
            <h4 class="text-white font-18 m-b-5 text-center">Reset Password</h4>
            <p class="text-white-50 text-center">reset your password{{config('app.name', 'Laravel')}}.</p>

            <form class="form-horizontal m-t-30" action="{{route('password.update')}}" method="POST">

                @csrf

                <input type="hidden" name="token" value="{{$token}}">

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror "
                        placeholder="Enter email" name="email" value="{{$email ?? old('email')}}" required
                        autocomplete="email" autofocus>
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror "
                        placeholder="Enter password" name="password" required autocomplete="new-password" autofocus>
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror "
                        id="password-confirmation" placeholder="Enter confirm password" name="password_confirmation"
                        required autocomplete="new-password" autofocus>

                </div>



                <div class="form-group m-t-10 mb-0 d-flex justify-content-between">
                    <div class=" m-t-20">
                        <a class="btn btn-link" href="{{ route('login') }}">
                            Have a account ?
                        </a>
                    </div>
                    <div class=" m-t-20">
                        <button class="btn btn-primary">Reset</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection