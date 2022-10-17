@extends('layouts.app')

@section('title','All Categories')

@section('content')
<div class="py-3 py-md-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="mb-4">Our Categories</h4>
      </div>
      @foreach ($category as $cat)
      <div class="col-6 col-md-3">
        <div class="category-card">
          <a href="{{url('collections/'.$cat->slug)}}">
            <div class="category-card-img">
              <img src="{{url($cat->image)}}" class="w-100" style="height: 200px;" alt="Laptop">
            </div>
            <div class="category-card-body">
              <h5>{{$cat->name}}</h5>
            </div>
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection