@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Add Brand
            <a href="{{route('brands.index')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
        </h3>
        
      </div>
      <div class="card-body">
        <form action="{{route('brands.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row justify-content-center">
            <div class="col-md-7 mb-3">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Name" name="name">
              <span class="text-danger">
                @error('name')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-7 mb-3">
              <label>Slug</label>
              <input type="text" class="form-control" placeholder="Slug" name="slug">
              <span class="text-danger">
                @error('slug')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-7 mb-3">
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