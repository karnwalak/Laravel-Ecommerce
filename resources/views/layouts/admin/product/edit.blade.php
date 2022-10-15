@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Edit Products
            <a href="{{route('products.index')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
        </h3>
        @if(Session::has('message'))
           <p class="alert alert-success">{{Session::get('message')}}</p>
        @elseif(Session::has('error'))
           <p class="alert alert-danger">{{Session::get('error')}}</p>
        @endif
      </div>
      <div class="card-body">
        <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
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
                        <option value="{{$cat->id}}" {{$product->category_id == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
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
                      <input type="text" name="product_name" value="{{$product->name}}" placeholder="Product Name" class="form-control">
                      <span class="text-danger">
                        @error('product_name')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label>Product Slug</label>
                      <input type="text" name="product_slug" value="{{$product->slug}}" placeholder="Product Slug" class="form-control">
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
                        <option value="{{$br->name}}" {{$product->brand == $br->name ? 'selected' : ''}}>{{$br->name}}</option>
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
                      <textarea name="small_description" placeholder="Small Description Max (500)" class="form-control" id="" cols="30" rows="3">{{$product->small_description}}</textarea>
                      <span class="text-danger">
                        @error('small_description')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label for="">Description</label>
                      <textarea name="description" placeholder="Description" class="form-control" id="" cols="30" rows="3">{{$product->description}}</textarea>
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
                      <input type="text" name="meta_title" value="{{$product->meta_title}}" placeholder="Meta Title" class="form-control">
                      <span class="text-danger">
                        @error('meta_title')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label for="">Meta Keyword</label>
                      <textarea name="meta_keyword" placeholder="Meta Keyword" class="form-control" id="" cols="30" rows="3">{{$product->meta_keyword}}</textarea>
                      <span class="text-danger">
                        @error('meta_keyword')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label for="">Meta Description</label>
                      <textarea name="meta_description" placeholder="Meta Description" class="form-control" id="" cols="30" rows="3">{{$product->meta_description}}</textarea>
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
                      <input type="text" name="original_price" value="{{$product->original_price}}" placeholder="Original Price" class="form-control">
                      <span class="text-danger">
                        @error('original_price')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Selling Price</label>
                      <input type="text" name="selling_price" value="{{$product->selling_price}}" placeholder="Selling Price" class="form-control">
                      <span class="text-danger">
                        @error('selling_price')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Quantity</label>
                      <input type="text" name="quantity" value="{{$product->quantity}}" placeholder="Quantity" class="form-control">
                      <span class="text-danger">
                        @error('quantity')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Trending</label>
                      <input type="checkbox" name="trending" {{$product->trending == '1' ? 'checked' : ''}}>
                      <span class="text-danger">
                        @error('trending')
                          {{$message}}
                        @enderror
                      </span>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Status</label>
                      <input type="checkbox" name="status" {{$product->status == '1' ? 'checked' : ''}}>
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
                      <input type="file" name="files[]" class="form-control my-3" multiple>
                      <div class="row">
                        @foreach($product->images as $vv)
                        <div class="col-md-2 text-center">
                          <img src="{{url($vv->image)}}" width="100%" height="100vh" alt="" srcset="">
                          <a href="{{url('admin/products_image/destroy/'.$vv->id)}}" onclick="return confirm('Are You Sure! You want to delete this record?')" class="btn btn-danger btn-sm my-3"><i class="mdi mdi-delete"></i></a>
                        </div>
                       
                        @endforeach
                      </div>
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
                    @php $i=0; @endphp
                    @foreach ($color as $key => $colorItem)
                    <div class="col-md-3">
                      <div class="p-2 border mb-3">
                        Color : <input type="checkbox" {{ in_array($colorItem->id, $color_exist) ? 'checked' : '' }} value={{$colorItem->id}} name="colors[{{$colorItem->id}}]"/>
                        {{ucwords($colorItem->color)}}
                        <br>
                        Quantity : <input type="number" value="{{in_array($colorItem->id, $color_exist) ? $qunatity_exist[$i] : ''}}" name="color_quantity[{{$colorItem->id}}]" style="width:70%;border: 1px solid"/>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
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