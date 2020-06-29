<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('css/black-route.css') }}" rel="stylesheet">
  
</head>

<body class="">
  <div class="wrapper ">
    @include('layouts.components.sidebar')
    <div class="main-panel">
      @include('layouts.components.navbar')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            @yield('content')
          </div>
        </div>
      </div>
      @include('layouts.components.footer')
    </div>
  </div>

  
  {{-- @include('layouts.components.sidebar-config') --}}
  @include('layouts.components.js-plugins')
  
</body>

@yield('scripts_after_body')



</html>