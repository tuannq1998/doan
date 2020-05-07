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
                        <form role="form" action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand name</label>
                                <input type="text" class="form-control"  name="name" id="name" value="{{$brand->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Descripsion</label>
                                <textarea type="text" style="resize: none" rows="5" class="form-control" name="descripsion" id="descripsion">{{$brand->descripsion}}</textarea>
                            </div>
                            <button type="submit" name="update_brand" class="btn btn-info">Update</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
