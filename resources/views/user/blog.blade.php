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
    <h1>Berita</h1>
    <h2>Info dan kabar terkini</h2>
@endsection


@section('content')  
      <!--========================== Article Section ============================-->
      <section id="about">
        <div class="container wow fadeIn">

          <div class="row">
            <div class="col-9">
              
              @if (empty(request()->segment(2)) )
                @component('user.component.all_blog', ['articles'=> $articles])
                @endcomponent
              @else
                @component('user.component.single_blog', ['article'=> $articles])
                @endcomponent
              @endif


            </div>
            <!-- <div class="col-3">
                <form action="{{route('blog')}}" class="mt-5">
                  <div class="input-group mb-4 border rounded-pill shadow-lg" style="border-radius:10px; box-shadow: 3px 3px 8px grey;">
                    <input type="text" name="s" value="{{Request::get('s')}}" placeholder="Apa yang ingin anda cari?" class="form-control bg-none border-0" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                    <div class="input-group-append border-0">
                      <button type="submit" class="btn text-success"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
                <div class="mb-3 font-weight-bold">Recent Posts</div>
                @foreach ($recents as $recent)
                  <div>
                      <a href="{{route('blog.show', [$recent->slug])}}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> 
                        {{$recent->title}}
                      </a>
                      <hr >
                  </div>
                @endforeach
            </div> -->
          </div>

        </div>
      </section><!-- #services -->
  
     
@endsection