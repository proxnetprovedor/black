<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <title>
    Black Route
  </title>
  <!-- Fonts -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('css/black-route.css') }}" rel="stylesheet">
</head>

<body class="off-canvas-sidebar">
  <div id="app">

    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
      <div class="container">

        <div class="navbar-wrapper">
          <a class="navbar-brand" href="javascript:;">{{$page ?? 'Black Route'}}</a>
        </div><button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="{{ route('site.home') }}" class="nav-link">
                <i class="material-icons">dashboard</i>
                Planos
                <div class="ripple-container"></div></a>
            </li>
            <li class="nav-item  {{isset($page) && $page == 'Cadastro' ? 'active' : ''}} ">
              <a href="{{route('admin.register.show')}}" class="nav-link">
                <i class="material-icons">person_add</i>
                Cadastre-se
              </a>
            </li>
            <li class="nav-item {{isset($page) && $page == 'Login' ? 'active' : ''}} "">
                            <a href=" {{route('admin.login.show')}}" class="nav-link">
              <i class="material-icons">fingerprint</i>
              Entrar
              </a>
            </li>
            {{-- <li class="nav-item ">
                            <a href="../pages/lock.html" class="nav-link">
                                <i class="material-icons">lock_open</i>
                                Lock
                            </a>
                        </li> --}}
          </ul>
        </div>
      </div>
    </nav>

    <div class="wrapper wrapper-full-page">
      <div class="{{$class ?? ''}}" filter-color="black"
        style="background-image: url('{{$url ?? ''}}'); background-size: cover; background-position: top center;">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="container">
          <div class="row">
            @yield('content')
          </div>
        </div>
        <footer class="footer">
          <div class="container">

            <div class="copyright float-right" style="font-size: 10px">
              &copy;2020 - BlackRoute

            </div>
          </div>
        </footer>
      </div>
    </div>
    <!--   Core JS Files   -->
    @include('layouts.components.js-plugins')

  </div>
  <script>
    $(document).ready(function() {
          $().ready(function() {
            $sidebar = $('.sidebar');
    
            $sidebar_img_container = $sidebar.find('.sidebar-background');
    
            $full_page = $('.full-page');
    
            $sidebar_responsive = $('body > .navbar-collapse');
    
            window_width = $(window).width();
    
            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
    
            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
              if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                $('.fixed-plugin .dropdown').addClass('open');
              }
    
            }
    
            $('.fixed-plugin a').click(function(event) {
              // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
              if ($(this).hasClass('switch-trigger')) {
                if (event.stopPropagation) {
                  event.stopPropagation();
                } else if (window.event) {
                  window.event.cancelBubble = true;
                }
              }
            });
    
            $('.fixed-plugin .active-color span').click(function() {
              $full_page_background = $('.full-page-background');
    
              $(this).siblings().removeClass('active');
              $(this).addClass('active');
    
              var new_color = $(this).data('color');
    
              if ($sidebar.length != 0) {
                $sidebar.attr('data-color', new_color);
              }
    
              if ($full_page.length != 0) {
                $full_page.attr('filter-color', new_color);
              }
    
              if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.attr('data-color', new_color);
              }
            });
    
            $('.fixed-plugin .background-color .badge').click(function() {
              $(this).siblings().removeClass('active');
              $(this).addClass('active');
    
              var new_color = $(this).data('background-color');
    
              if ($sidebar.length != 0) {
                $sidebar.attr('data-background-color', new_color);
              }
            });
    
            $('.fixed-plugin .img-holder').click(function() {
              $full_page_background = $('.full-page-background');
    
              $(this).parent('li').siblings().removeClass('active');
              $(this).parent('li').addClass('active');
    
    
              var new_image = $(this).find("img").attr('src');
    
              if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                $sidebar_img_container.fadeOut('fast', function() {
                  $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                  $sidebar_img_container.fadeIn('fast');
                });
              }
    
              if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
    
                $full_page_background.fadeOut('fast', function() {
                  $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                  $full_page_background.fadeIn('fast');
                });
              }
    
              if ($('.switch-sidebar-image input:checked').length == 0) {
                var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
    
                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              }
    
              if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
              }
            });
    
            $('.switch-sidebar-image input').change(function() {
              $full_page_background = $('.full-page-background');
    
              $input = $(this);
    
              if ($input.is(':checked')) {
                if ($sidebar_img_container.length != 0) {
                  $sidebar_img_container.fadeIn('fast');
                  $sidebar.attr('data-image', '#');
                }
    
                if ($full_page_background.length != 0) {
                  $full_page_background.fadeIn('fast');
                  $full_page.attr('data-image', '#');
                }
    
                background_image = true;
              } else {
                if ($sidebar_img_container.length != 0) {
                  $sidebar.removeAttr('data-image');
                  $sidebar_img_container.fadeOut('fast');
                }
    
                if ($full_page_background.length != 0) {
                  $full_page.removeAttr('data-image', '#');
                  $full_page_background.fadeOut('fast');
                }
    
                background_image = false;
              }
            });
    
            $('.switch-sidebar-mini input').change(function() {
              $body = $('body');
    
              $input = $(this);
    
              if (md.misc.sidebar_mini_active == true) {
                $('body').removeClass('sidebar-mini');
                md.misc.sidebar_mini_active = false;
    
                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();
    
              } else {
    
                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');
    
                setTimeout(function() {
                  $('body').addClass('sidebar-mini');
    
                  md.misc.sidebar_mini_active = true;
                }, 300);
              }
    
              // we simulate the window Resize so the charts will get updated in realtime.
              var simulateWindowResize = setInterval(function() {
                window.dispatchEvent(new Event('resize'));
              }, 180);
    
              // we stop the simulation of Window Resize after the animations are completed
              setTimeout(function() {
                clearInterval(simulateWindowResize);
              }, 1000);
    
            });
          });
        });
  </script>
  <script>
    $(document).ready(function() {
          md.checkFullPageBackgroundImage();
          setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
          }, 700);
        });
  </script>
</body>

</html>