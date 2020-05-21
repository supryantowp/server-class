<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <meta content="{{config('app.name','Laravel')}}" name="description" />

      {{-- <link rel="shortcut icon" href="assets/images/favicon.ico"> --}}

      <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('css/icons.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
</head>

<body>

      <!-- Begin page -->
      <div class="wrapper-page">

            @yield('content')

      </div>

</body>

</html>
