@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Slider List
          <a href="{{route('sliders.create')}}" class="btn btn-primary btn-sm text-white float-end">Add Slider</a>
        </h3>
        @if(Session::has('message'))
        <p class="alert alert-success py-2">
          {{Session::get('message')}}
        </p>
        @endif
        @if(Session::has('error'))
        <p class="alert alert-danger py-2">
          {{Session::get('error')}}
        </p>
        @endif
      </div>
      <div class="card-body table-responsive">
        <table id="recent-purchases-listing" class="table">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Title</th>
              <th>Description</th>
              <th>Image</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($slider as $key => $value)
            <tr>
              <td>#{{$key+1}}</td>
              <td>{{ucwords($value->title)}}</td>
              <td>{{$value->description}}</td>
              <td><a href="{{url($value->image)}}" target="_blank"><img src="{{url($value->image)}}" width="100%"></a></td>
              <td>{{$value->status == '1' ? 'Hidden' : 'Visible'}}</td>
              <td class="d-flex">
                <a href="{{route('sliders.edit',$value->id)}}" class="btn btn-success p-2"><i
                    class="mdi mdi-grease-pencil"></i></a>
                <form action="{{route('sliders.destroy',$value->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger p-2 mx-3"><i class="mdi mdi-delete"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
       
        <div class="py-3">
          {{$slider->links()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection