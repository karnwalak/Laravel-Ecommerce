@extends('layouts.app')

@section('title','Products')

@section('content')
<div class="py-3 py-md-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="mb-4">Our Products</h4>
      </div>
      @forelse ($product as $pp)
      <div class="col-md-3">
        <div class="product-card">
          <div class="product-card-img">
            @if($pp->quantity > 0)
            <label class="stock bg-success">In Stock</label>
            @else
            <label class="stock bg-danger">Out Of Stock</label>
            @endif
            <img src="{{asset($pp->images[0]->image)}}" alt="{{$pp->brand}}">
          </div>
          <div class="product-card-body">
            <p class="product-brand">{{$pp->brand}}</p>
            <h5 class="product-name">
              <a href="{{url('product-view').'/'.$pp->id}}">
                {{$pp->name}}
              </a>
            </h5>
            <div>
              <span class="selling-price">${{$pp->selling_price}}</span>
              <span class="original-price">${{$pp->original_price}}</span>
            </div>
            <div class="mt-2">
              <a href="" class="btn btn1">Add To Cart</a>
              <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
              <a href="" class="btn btn1"> View </a>
            </div>
          </div>
        </div>
      </div>
      @empty
        <h2>No Product Found For Category {{$category->name}}</h2>
      @endforelse
    </div>
  </div>
</div>
@endsection