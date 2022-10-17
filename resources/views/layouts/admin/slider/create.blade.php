@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Add Slider
            <a href="{{route('sliders.index')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
        </h3>
        
      </div>
      <div class="card-body">
        <form action="{{route('sliders.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-12 mb-3 border">
              <label>Title</label>
              <input type="text" class="form-control" placeholder="Title" name="title">
              <span class="text-danger">
                @error('title')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <label>Description</label>
              <textarea class="form-control" rows="3" placeholder="Description" name="description"></textarea>
              <span class="text-danger">
                @error('description')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <label>Image</label>
              <input type="file" class="form-control" name="file">
              <span class="text-danger">
                @error('file')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <label>Status</label><br>
              <input type="checkbox" name="status">
              <span class="text-danger">
                @error('status')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <button type="submit" class="btn btn-primary float-end text-white">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>  

@endsection