@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Edit Category
            <a href="{{route('categories.index')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
        </h3>
        
      </div>
      <div class="card-body">
        <form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Name</label>
              <input type="text" class="form-control" value="{{$category->name}}" placeholder="Name" name="name">
              <span class="text-danger">
                @error('name')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-6 mb-3">
              <label>Slug</label>
              <input type="text" class="form-control" value="{{$category->slug}}" placeholder="Slug" name="slug">
              <span class="text-danger">
                @error('slug')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <label>Description</label>
              <textarea class="form-control" rows="3" placeholder="Description" name="description">{{$category->description}}</textarea>
              <span class="text-danger">
                @error('description')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-6 mb-3">
              <label>Image</label>
              <input type="file" class="form-control" name="file">
              <img src="{{url('category')}}/{{$category->image}}" width="20%" alt="" srcset="">
              <span class="text-danger">
                @error('file')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-6 mb-3">
              <label>Status</label><br>
              <input type="checkbox" {{$category->status == '1' ? 'checked' : ''}} name="status">
              <span class="text-danger">
                @error('status')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3"><h3>SEO Tags</h3></div>
            <div class="col-md-12 mb-3">
              <label>Meta Title</label>
              <input type="text" class="form-control" value="{{$category->meta_title}}" placeholder="Meta Title" name="meta_title">
              <span class="text-danger">
                @error('meta_title')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <label>Meta Keyword</label>
              <textarea class="form-control" placeholder="Meta Keyword" name="meta_keyword">{{$category->meta_keyword}}</textarea>
              <span class="text-danger">
                @error('meta_keyword')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <label>Meta Description</label>
              <textarea class="form-control" placeholder="Meta Description" name="meta_description">{{$category->meta_description}}</textarea>
              <span class="text-danger">
                @error('meta_description')
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