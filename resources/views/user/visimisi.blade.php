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
    <h1>Visi Misi</h1>
    <h2>Tujuan dan arah kami</h2>
    <a href="#about" class="btn-get-started">Get Started</a>
@endsection


@section('content')
    <!--========================== visimisi Section ============================-->
    <section id="about">
        <div class="container">
            <div class="row about-container">

                <div class="col-lg-7 content order-lg-1 order-2">
                    <h2 class="title">Visi & Misi Kami</h2>
                    <p> {!!$visimisi[0]->caption!!}</p>
                </div>

                <div class="col-lg-5 background order-lg-2 order-1 wow fadeInRight"
          style="background: url('{{asset('visimisi_image/' . $visimisi[0]->image)}}') center top no-repeat; background-size: cover;">
          </div>
            </div>

        </div>
    </section>

    </section>
    <!-- #services -->


@endsection