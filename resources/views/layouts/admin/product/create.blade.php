@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Add Products
            <a href="{{route('products.index')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
        </h3>
        
      </div>
      <div class="card-body">
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row justify-content-center">
            <div class="col-md-12">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">SEO Tags</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Details</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="product-tab" data-bs-toggle="tab" data-bs-target="#product-image-tab-pane" type="button" role="tab" aria-controls="product-image-tab-pane" aria-selected="false">Products Image</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">Products Color</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <label>Category</label>
                      <select name="category" class="form-control">
                        <option value="">Select category</option>
                        @foreach($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">
                        @error('category')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label>Product Name</label>
                      <input type="text" name="product_name" placeholder="Product Name" class="form-control">
                      <span class="text-danger">
                        @error('product_name')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label>Product Slug</label>
                      <input type="text" name="product_slug" placeholder="Product Slug" class="form-control">
                      <span class="text-danger">
                        @error('product_slug')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label>Brand</label>
                      <select name="brand" class="form-control">
                        <option value="">Select Brand</option>
                        @foreach($brand as $br)
                        <option value="{{$br->name}}">{{$br->name}}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">
                        @error('brand')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label for="">Small Description(Max. 500)</label>
                      <textarea name="small_description" placeholder="Small Description Max (500)" class="form-control" id="" cols="30" rows="3"></textarea>
                      <span class="text-danger">
                        @error('small_description')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label for="">Description</label>
                      <textarea name="description" placeholder="Description" class="form-control" id="" cols="30" rows="3"></textarea>
                      <span class="text-danger">
                        @error('description')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="seo-tab-pane" role="tabpanel" aria-labelledby="seo-tab" tabindex="0">
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <label>Meta Title</label>
                      <input type="text" name="meta_title" placeholder="Meta Title" class="form-control">
                      <span class="text-danger">
                        @error('meta_title')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label for="">Meta Keyword</label>
                      <textarea name="meta_keyword" placeholder="Meta Keyword" class="form-control" id="" cols="30" rows="3"></textarea>
                      <span class="text-danger">
                        @error('meta_keyword')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label for="">Meta Description</label>
                      <textarea name="meta_description" placeholder="Meta Description" class="form-control" id="" cols="30" rows="3"></textarea>
                      <span class="text-danger">
                        @error('meta_description')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label>Original Price</label>
                      <input type="text" name="original_price" placeholder="Original Price" class="form-control">
                      <span class="text-danger">
                        @error('original_price')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Selling Price</label>
                      <input type="text" name="selling_price" placeholder="Selling Price" class="form-control">
                      <span class="text-danger">
                        @error('selling_price')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Quantity</label>
                      <input type="text" name="quantity" placeholder="Quantity" class="form-control">
                      <span class="text-danger">
                        @error('quantity')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Trending</label>
                      <input type="checkbox" name="trending">
                      <span class="text-danger">
                        @error('trending')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Status</label>
                      <input type="checkbox" name="status">
                      <span class="text-danger">
                        @error('status')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="product-image-tab-pane" role="tabpanel" aria-labelledby="product-tab" tabindex="0">
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <label>Product Images</label>
                      <input type="file" name="files[]" class="form-control" multiple>
                      <span class="text-danger">
                        @error('files')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade my-3" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                  <label for="">Select Color</label>
                  <div class="row py-3">
                    @forelse ($color as $colorItem)
                    <div class="col-md-3">
                      <div class="p-2 border mb-3">
                        Color : <input type="checkbox" value={{$colorItem->id}} name="colors[{{$colorItem->id}}]"/>
                        {{ucwords($colorItem->color)}}
                        <br>
                        Quantity : <input type="number" name="color_quantity[{{$colorItem->id}}]" style="width:70%;border: 1px solid"/>
                      </div>
                    </div>
                    @empty
                      <h3>No Color Found!</h3>
                    @endforelse
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary text-white">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>  

@endsection