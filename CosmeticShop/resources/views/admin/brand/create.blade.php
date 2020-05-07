@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add brand
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{route('brand.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand name</label>
                                <input type="text" class="form-control"  name="name" id="exampleInputEmail1" placeholder="Brand name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Descripsion</label>
                                <textarea type="text" style="resize: none" rows="5" class="form-control" name="descripsion" id="exampleInputPassword1" placeholder="Descripsion product catalog"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <select name="status" class="form-control input-sm m-bot15">
                                    <option value="0">hide</option>
                                    <option value="1">shows</option>
                                </select>
                            </div>
                            <button type="submit" name="add_brand" class="btn btn-info">Create</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
