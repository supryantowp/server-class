@extends('layouts.auth')

@section('content')

<div class="card">
    <div class="card-body">

        <div class="p-3">
            <h4 class="text-white font-18 mb-3 text-center">Reset Password</h4>

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>

            @else
            <div class="alert alert-info" role="alert">
                Enter your Email and instructions will be sent to you!
            </div>
            @endif

            <form class="form-horizontal m-t-30" method="POST" action="{{ route('password.email') }}">

                @csrf

                <div class="form-group">
                    <label for="useremail">Email</label>
                    <input type="email" class="form-control" id="useremail" placeholder="Enter email" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group d-flex justify-content-between m-t-20">
                    <div class="m-t-10">
                        <p>Remember It ? <a href="{{route('login')}}" class=" text-primary"> Sign In Here </a> </p>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>

@endsection