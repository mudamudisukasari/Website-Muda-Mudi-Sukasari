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
    <h1>Agenda</h1>
    <h2>Jadwal kegiatan terbaru</h2>
@endsection

@section('content')

    <section id="contact">
      <div class="row justify-content-center">
        <div class="col-sm-10">
          <div class="row container">
            <div class="col-sm-9">

              {{-- <div class=" wow fadeInUp">
                <div class="section-header">
                  <h3 class="section-title">Daftar Destinasi</h3>
                  <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>
              </div>
              <div class=" wow fadeInUp">
                <div class="row justify-content-left">
                  @foreach ($destinations as $destination)
                    <div class="col-lg-4 col-md-6">
                      <a href="{{route('destination.show', $destination->slug)}}" class="decoration-none">
                          <div class="row">
                            <div class="col-11 full-img" style="background-image: url({{asset('destinations_image/'.$destination->image)}})"></div>
                          </div>
                          <div class="row">
                            <div class="col px-0 pt-2">
                              <h4 style="color: #666666 !important;">{{$destination->title}}</h4>
                            </div>
                          </div>
                        </a>
                      </div> 
                  @endforeach
                </div>
              </div> --}}

              @if (empty(request()->segment(2)) )
                @component('user.component.all_destination', ['destinations'=> $destinations])
                @endcomponent
              @else
                @component('user.component.single_destination', ['destination'=> $destinations])
                @endcomponent
              @endif


            </div>
            <!-- <div class="col-sm-3 mt-5">
              <form action="{{route('destination')}}" class="mt-5">
                <div class="input-group mb-4 border rounded-pill shadow-lg" style="border-radius:10px; box-shadow: 3px 3px 8px grey;">
                  <input type="text" name="s" value="{{Request::get('s')}}" placeholder="Destinasi lain?" class="form-control bg-none border-0" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                  <div class="input-group-append border-0">
                    <button type="submit" class="btn text-success"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
              <div class="mb-3 font-weight-bold">Other Posts</div>
              @foreach ($other as $item)
                <div>
                    <a href="{{route('destination.show', [$item->slug])}}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> 
                      {{$item->title}}
                    </a>
                    <hr >
                </div>
              @endforeach
            </div> -->
            
          </div>
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