@extends('layouts.admin')

@section('title', 'sejarah')

@section('breadcrumbs', 'sejarah')

@section('second-breadcrumb')
    <li> Overview sejarah</li>
@endsection

@section('content')
  <!-- table  -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
              
            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                
            @endif
            
            <h3 class="text-center mt-3 mb-5">View sejarah</h3>
            
            <div class="row">
              <div class="col-3">
                <div class="card shadow" >
                  <img src="{{asset('sejarah_image/'.$sejarahs[0]->image)}}" class="card-img-top" alt="image">
                </div>
              </div>
              <div class="col-9">
                <p class="font-weight-bold">Caption:</p>
                <p> {!!$sejarahs[0]->caption!!} </p>
                <a href="{{route('sejarahs.edit', [$sejarahs[0]->id])}}" class="btn btn-warning text-light"><i class="fa fa-pencil"></i> Edit Profile</a>
              </div>
            </div>
              
          </div>
        </div>
      </div>
    </div>
  <!-- /table -->
@endsection