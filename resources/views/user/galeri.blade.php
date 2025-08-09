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
    <h1>Galeri</h1>
    <h2>Dokumentasi kegiatan visual</h2>
@endsection

@section('content')

    <section id="category">
        <div class="container wow fadeInUp">
          <div class="section-header">
            <h3 class="section-title">Galeri</h3>
            <p class="section-description"></p>
          </div>
          <div class="row">
  
          <div class="row" id="galeri-wrapper">
    @foreach ($galeri as $galeri)
        <div class="col-md-4 col-sm-12 galeri-item mb-4">
            <a href="">
                <img src="{{ asset('galeri_image/' . $galeri->image) }}" class="img-fluid galeri-img mx-auto d-block" alt="{{ $galeri->name }}">
                <div class="details text-center mt-2">
                    <h4>{{ $galeri->name }}</h4>
                    <span>{{ $galeri->description }}</span>
                </div>
            </a>
        </div>
    @endforeach  
</div>
  
        </div>
      </section>

    {{-- @if (empty(request()->segment(2)) )
    @component('user.component.all_destination', ['destinations'=> $destinations])
    @endcomponent
    @else
    @component('user.component.single_destination', ['destination'=> $destinations])
    @endcomponent
    @endif --}}

@endsection