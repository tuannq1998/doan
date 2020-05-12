@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update product catalog
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product name</label>
                                <input type="text" class="form-control" name="name" placeholder="Product name" value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Product title" value="{{$product->title}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Product name" value="{{$product->price}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" class="form-control" name="image" placeholder="Product image" value="{{$product->image}}">
                                <img style="width: 50px" src="{{ asset('') }}/{{ pare_url_file($product->image) }}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea type="text" style="resize: none" rows="5" class="form-control"
                                          name="description" placeholder="Product description">{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Content</label>
                                <textarea type="text" style="resize: none" rows="5" class="form-control" name="contents"
                                          placeholder="Product content">{{$product->contents}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Category</label>
                                <select name="category" class="form-control input-sm m-bot15">
                                    @if(isset($categories))
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{old('category_id', isset($product->category_id) ? $product->category_id : '') == $category->id ? "selected ='selected'" : ""}}>{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Brand</label>
                                <select name="brand" class="form-control input-sm m-bot15">
                                    @if(isset($brands))
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" {{old('category_id', isset($product->category_id) ? $product->category_id : '') == $brand->id ? "selected ='selected'" : ""}}>{{$brand->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <select name="status" class="form-control input-sm m-bot15">
                                    <option value="0">hide</option>
                                    <option value="1">shows</option>
                                </select>
                            </div>
                            <button type="submit" name="update_product" class="btn btn-info">Update</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
