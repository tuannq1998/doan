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
                                <input type="text" class="form-control"  name="name" id="name" value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea type="text" style="resize: none" rows="5" class="form-control" name="description" id="description">{{$product->description}}</textarea>
                            </div>
                            <button type="submit" name="update_product" class="btn btn-info">Update</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
