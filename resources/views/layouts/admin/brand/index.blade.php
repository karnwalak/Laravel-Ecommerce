@extends('layouts.admin')

@section('content')
 
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 >Brands
          <a href="{{route('brands.create')}}" class="btn btn-primary btn-sm text-white float-end">Add Brands</a>
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
              <th>Name</th>
              <th>Slug</th>
              <th>Category</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($brand as $key => $value)
            <tr>
              <td>#{{$key+1}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->slug}}</td>
              <td>{{$value->category->name}}</td>
              <td>{{$value->status == '1' ? 'Hidden' : 'Visible'}}</td>
              <td>
                <a href="{{route('brands.edit',$value->id)}}" class="btn btn-success p-2"><i class="mdi mdi-grease-pencil"></i></a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger p-2 mx-3"><i class="mdi mdi-delete"></i></a>
              </td>
            </tr>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <form action="{{route('brands.destroy',$value->id)}}" method="post">
                @csrf
                @method('DELETE')
              <div class="modal-dialog">
                <input type="hidden" value="{{$value->id}}" name="pid">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Sure! You want to delete this record?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                  </div>
                </div>
              </div>
            </form>
            </div>
            @endforeach
          </tbody>
        </table>
        
        <div class="py-3">
          {{$brand->links()}}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection