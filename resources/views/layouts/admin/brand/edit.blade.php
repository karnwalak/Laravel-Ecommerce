@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Edit Brand
            <a href="{{route('brands.index')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
        </h3>
        
      </div>
      <div class="card-body">
        <form action="{{route('brands.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row justify-content-center">
            <div class="col-md-7 mb-3">
              <label>Name</label>
              <input type="text" class="form-control" value="{{$brand->name}}" placeholder="Name" name="name">
              <span class="text-danger">
                @error('name')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-7 mb-3">
              <label>Slug</label>
              <input type="text" class="form-control" value="{{$brand->slug}}" placeholder="Slug" name="slug">
              <span class="text-danger">
                @error('slug')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-7 mb-3">
              <label>Status</label><br>
              <input type="checkbox" {{$brand->status == '1' ? 'checked' : ''}} name="status">
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