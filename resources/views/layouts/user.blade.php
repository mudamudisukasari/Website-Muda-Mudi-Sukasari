<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Muda Mudi Sukasari</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{asset('user/images/logo.png')}}" rel="icon">
  <link href="{{asset('user/images/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
    rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('user/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('user/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/lib/animate/animate.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('user/css/style.css')}}" rel="stylesheet">

  @yield('header')


</head>

<body>

  @php
  $url = request()->segment(1);
  @endphp

  <!--========================== Header ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero">
          <img src="{{asset('user/images/logo3.png')}}" style="margin-right:5px" /></img>
          <!-- <h2 class="d-inline text-light">Jogja-Travel</h2> -->
        </a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="{{$url == 'home' ? 'menu-active' : ''}}"><a href="{{url('home')}}">Home</a></li>
          <!-- <li class="{{ $url == '' ? 'menu-active dropdown' : 'dropdown' }}">
            <a href="">Profil</a>
            <ul class="submenu">
              <li><a href="{{ url('sejarah') }}">Sejarah</a></li>
              <li><a href="{{ url('visimisi') }}">Visi - Misi</a></li>
              <li><a href="{{ url('struktur') }}">Struktur Organisasi</a></li>
              <li><a href="{{ url('logo') }}">Logo dan Makna</a></li>
            </ul>
          </li> -->
          <li
            class="dropdown {{ request()->is('sejarah*') || request()->is('visimisi*') || request()->is('struktur*') || request()->is('logo*') ? 'menu-active' : '' }}">
            <a href="javascript:void(0);" onclick="toggleDropdown(this)">
              Profil <i class="fa fa-caret-down"></i>
            </a>
            <ul class="submenu" style="display: none;">
              <li><a href="{{ url('sejarah') }}">Sejarah</a></li>
              <li><a href="{{ url('visimisi') }}">Visi - Misi</a></li>
              <li><a href="{{ url('struktur') }}">Struktur Organisasi</a></li>
              <li><a href="{{ url('logo') }}">Logo dan Makna</a></li>
            </ul>
          </li>
          <li class="{{$url == '' ? 'menu-active' : 'destination'}}"><a href="{{url('destination')}}">Agenda</a></li>
          <li class="{{$url == 'blog' ? 'menu-active' : ''}}"><a href="{{url('blog')}}">Berita</a></li>
          <!-- <li class="{{$url=='destination'?'menu-active':''}}"><a href="{{url('destination')}}">destination</a></li> -->
          <li class="{{$url == 'galeri' ? 'menu-active' : ''}}"><a href="{{url('galeri')}}">Galeri</a></li>
          <li class="{{$url == 'contact' ? 'menu-active' : ''}}"><a href="{{url('contact')}}">Contact </a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <script>
    function toggleDropdown(element) {
      const submenu = element.nextElementSibling;
      submenu.style.display = submenu.style.display === "block" ? "none" : "block";
    }

    // Optional: Close dropdown if clicked outside
    document.addEventListener('click', function (event) {
      const dropdowns = document.querySelectorAll('.submenu');
      dropdowns.forEach(menu => {
        if (!menu.parentElement.contains(event.target)) {
          menu.style.display = 'none';
        }
      });
    });
  </script>


  <!--========================== Hero Section ============================-->
  <section id="hero">
    <div class="hero-container">
      @yield('hero')
    </div>
  </section>

  <main id="main">

    @yield('content')

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Muda Mudi Sukasari</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{asset('user/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('user/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('user/lib/wow/wow.min.js')}}"></script>

  <script src="{{asset('user/lib/superfish/superfish.min.js')}}"></script>

  <!-- Contact Form JavaScript File -->
  {{--
  <script src="{{asset('user/contactform/contactform.js')}}"></script> --}}

  <!-- Template Main Javascript File -->
  <script src="{{asset('user/js/main.js')}}"></script>

</body>

</html>