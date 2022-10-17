@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Edit Slider
            <a href="{{route('sliders.index')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
        </h3>
        
      </div>
      <div class="card-body">
        <form action="{{route('sliders.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-12 mb-3 border">
              <label>Title</label>
              <input type="text" class="form-control" value="{{old('title',$slider->title)}}" placeholder="Title" name="title">
              <span class="text-danger">
                @error('title')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <label>Description</label>
              <textarea class="form-control" rows="3" placeholder="Description" name="description">{{old('title',$slider->description)}}</textarea>
              <span class="text-danger">
                @error('description')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <label>Image</label>
              <input type="file" class="form-control" name="file">
              <img src="{{url($slider->image)}}" class="my-3" alt="Image" width="20%">
              <span class="text-danger">
                @error('file')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <label>Status</label><br>
              <input type="checkbox" name="status" {{$slider->status == '1' ? 'checked' : ''}}>
              <span class="text-danger">
                @error('status')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <button type="submit" class="btn btn-primary float-end text-white">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>  

@endsection