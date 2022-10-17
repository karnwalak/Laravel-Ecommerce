@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Add Category
            <a href="{{route('categories.index')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
        </h3>
        
      </div>
      <div class="card-body">
        <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Name</label>
              <input type="text" class="form-control" value="{{old('name')}}" placeholder="Name" name="name">
              <span class="text-danger">
                @error('name')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-6 mb-3">
              <label>Slug</label>
              <input type="text" class="form-control" value="{{old('slug')}}" placeholder="Slug" name="slug">
              <span class="text-danger">
                @error('slug')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <label>Description</label>
              <textarea class="form-control" rows="3" placeholder="Description" name="description">{{old('description')}}</textarea>
              <span class="text-danger">
                @error('description')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-6 mb-3">
              <label>Image</label>
              <input type="file" class="form-control" name="file">
              <span class="text-danger">
                @error('file')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-6 mb-3">
              <label>Status</label><br>
              <input type="checkbox" name="status">
              <span class="text-danger">
                @error('status')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3"><h3>SEO Tags</h3></div>
            <div class="col-md-12 mb-3">
              <label>Meta Title</label>
              <input type="text" class="form-control" value="{{old('meta_title')}}" placeholder="Meta Title" name="meta_title">
              <span class="text-danger">
                @error('meta_title')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <label>Meta Keyword</label>
              <textarea class="form-control" placeholder="Meta Keyword" value="{{old('meta_keyword')}}" name="meta_keyword"></textarea>
              <span class="text-danger">
                @error('meta_keyword')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <label>Meta Description</label>
              <textarea class="form-control" placeholder="Meta Description" value="{{old('meta_description')}}" name="meta_description"></textarea>
              <span class="text-danger">
                @error('meta_description')
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