@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add product
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{route('product.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product name</label>
                                <input type="text" class="form-control" name="name" placeholder="Product name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Product title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Product name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" class="form-control" name="image" placeholder="Product image">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea type="text" style="resize: none" rows="5" class="form-control"
                                          name="description" placeholder="Product description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Content</label>
                                <textarea type="text" style="resize: none" rows="5" class="form-control" name="content"
                                          placeholder="Product content"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Category</label>
                                <select name="category" class="form-control input-sm m-bot15">
                                    @foreach($categories as $key=> $category)
                                        <option
                                            @if($category->id == $category->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Brand</label>
                                <select name="brand" class="form-control input-sm m-bot15">
                                    @foreach($brands as $key=> $brand)
                                        <option
                                            @if($brand->id == $brand->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{ $brand->id }}">{{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <select name="status" class="form-control input-sm m-bot15">
                                    <option value="0">hide</option>
                                    <option value="1">shows</option>
                                </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Create</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
