@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Edit Color
            <a href="{{route('colors.index')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
        </h3>
        
      </div>
      <div class="card-body">
        <form action="{{route('colors.update',$color->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="row justify-content-center">
            <div class="col-md-12 mb-3">
              <label>Color Name</label>
              <input type="text" name="color" value="{{$color->color}}" placeholder="Color" class="form-control">
              <span class="text-danger">
                @error('color')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12 mb-3">
              <label>Status</label>
              <input type="checkbox" name="status" {{$color->status == '1' ? 'checked' : ''}}>
              <span class="text-danger">
                @error('status')
                  {{$message}}
                @enderror
              </span>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary text-white">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>  

@endsection