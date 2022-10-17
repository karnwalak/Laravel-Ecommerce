@extends('layouts.app')

@section('title','Home Page')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    @foreach ($slider as $ke => $slide)
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$ke}}" class="{{$ke == '0' ? 'active' : ''}}" aria-current="true" aria-label="Slide 1"></button>
    @endforeach
  </div>
  <div class="carousel-inner">
    @foreach ($slider as $key => $slide)
    <div class="carousel-item {{$key == '0' ? 'active' : ''}}">
      <img src="{{url($slide->image)}}" class="d-block w-100" style="height: 600px;" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <div class="custom-carousel-content">
            <h1>
              {{$slide->title}}
            </h1>
            <p>
              {{$slide->description}}
            </p>
            <div>
                <a href="#" class="btn btn-slider">
                    Get Now
                </a>
            </div>
        </div>
    </div>
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

@endsection