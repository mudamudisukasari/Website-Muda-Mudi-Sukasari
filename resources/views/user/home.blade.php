@extends('layouts.user')

@section('header')
    <style>
        .full-img {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 180px;
        }

        #hero {
            background: url('{{ asset('user/images/Sampull.png') }}') center center no-repeat;
            background-size: cover;
            width: 100%;
            height: 100vh; /* menyesuaikan tinggi layar */
        }

        .image-center {
            display: block;
            margin-left: 6.5px;
            margin-right: 6.5px;
            width: 100%;
        }

        @media (max-width: 768px) {
            #hero {
                height: 50vh; /* di HP tidak perlu setinggi layar penuh */
            }
        }
    </style>
@endsection

@section('hero')
  <h1>Muda Mudi Sukasari</h1>
  <h2>Bergerak, Berkarya, Berarti.</h2>
  <a href="#about" class="btn-get-started">Get Started</a>
@endsection


@section('content')

<div class="titler text-center ">
<p>______________________</p>
</div>
  <!--========================== About Us Section ============================-->
  <section id="about">
    <div class="container">
    <div class="row about-container">

      <div class="col-lg-7 content order-lg-1 order-2">
      <h2 class="title">Sambutan Ketua</h2>
      <p> {!!$about[0]->caption!!}</p>
      </div>

      <div class="col-lg-5 background order-lg-2 order-1 wow fadeInRight"
      style="background: url('{{asset('about_image/' . $about[0]->image)}}') center top no-repeat; background-size: cover;">
      </div>
    </div>

    </div>
  </section>

  <!--========================== Services Section ============================-->
  <section id="services">
    <div class="container wow fadeIn">
    <div class="section-header">
      <h3 class="section-title">Tentang Kami</h3>
      <p class="title"></p>
    </div>
    <div class="Tentang Kami text-center">
      <p> {!!$tentang[0]->caption !!}</p>
    </div>


    <!-- <div class="row">
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
          <div class="box">
          <div class="icon"><i class="fa fa-shield"></i></div>
          <h4 class="title">Keamanan Berkendara</h4>
          <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
          <div class="box">
          <div class="icon"><i class="fa fa-money"></i></div>
          <h4 class="title">Harga Ekonomis</h4>
          <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
          <div class="box">
          <div class="icon"><i class="fa fa-thumbs-up"></i></div>
          <h4 class="title">Kenyamanan Pelanggan</h4>
          <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
        </div>
        </div> -->

    </div>
  </section><!-- #services -->

  <!--========================== Call To Action Section ============================-->
  <section id="call-to-action">
    <div class="container wow fadeIn">
    <!-- <div class="row">
        <div class="col-lg-9 text-center text-lg-left">
          <p class="cta-text text-center">Quotes Inspiratif</p>
          <h3 class="cta-title">"muda bukan hanya soal usia, tetapi tentang semangat yang tak pernah padam untuk peduli, bergerak, dan terus berkarya demi sesuatu yang berarti."</h3>
          <p class="cta-text">— Ketua Muda Mudi Sukasari</p>
        </div>
        <div class="col-lg-3 cta-btn-container text-center">
          <a class="cta-btn align-middle" href="#">Contact</a>
        </div>
        </div> -->

    <div class="section-header">
      <h3 class="cta-title text-center">KUTIPAN</h3>
      <p class="title"></p>
    </div>

    <div class=" cta-text text-center">
      <p> {!!$quote[0]->caption !!}</p>
    </div>

    </div>
  </section>

  <!--========================== category Section ============================-->
  <section id="category">
    <div class="container wow fadeInUp">
    <div class="section-header">
      <h3 class="section-title">Blog Kami</h3>
      <p class="section-description"></p>
    </div>
    <div class="row">

      <div class="row" id="category-wrapper">
      @foreach ($categories as $category)
      <div class="col-md-4 col-sm-12 category-item center filter-app">
      <a href="blog">
      <img src="{{asset('category_image/' . $category->image)}}" class="image-center">
      <div class="details">
        <h4>{{$category->name}}</h4>
        <span>{{$category->description}}</span>
      </div>
      </a>
      </div>
    @endforeach
      </div>

    </div>
  </section>

  <!--========================== Gallery Section ============================-->
<style>
    .full-img {
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 180px;
        margin: 10px 0;
        border: 3px solid #ddd; /* frame tipis */
        border-radius: 8px; /* sudut membulat */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* efek bayangan */
    }
</style>

  <section id="contact" style="padding-bottom:85px">
    <div class="container wow fadeInUp">
    <div class="section-header">
      <h3 class="section-title">Galeri</h3>
      <p class="section-description"></p>
    </div>
    </div>

    <div class="container wow fadeInUp">
    <div class="row justify-content-center">

      <div class="col-lg-12 col-md-4">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 full-img"
        style="background-image: url({{asset('user/images/gallery/foto1.png')}})">
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 full-img"
        style="background-image: url({{asset('user/images/gallery/foto2.png')}})">
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 full-img"
        style="background-image: url({{asset('user/images/gallery/foto3.png')}})">
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 full-img"
        style="background-image: url({{asset('user/images/gallery/foto4.png')}})">
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 full-img"
        style="background-image: url({{asset('user/images/gallery/foto5.png')}})">
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 full-img"
        style="background-image: url({{asset('user/images/gallery/foto6.png')}})">
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 full-img"
        style="background-image: url({{asset('user/images/gallery/foto7.png')}})">
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 full-img"
        style="background-image: url({{asset('user/images/gallery/foto8.png')}})">
        </div>
      </div>
      </div>

    </div>

    </div>
  </section>
@endsection