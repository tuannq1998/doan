@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                List the product
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <td style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </td>
                        <td></td>
                        <td>Name</td>
                        <td>Product Category </td>
                        <td>Product brand </td>
                        <td>Status</td>
                        <td style="width:40px;"></td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($products))
                        @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img style="width: 50px" src="{{ asset('') }}/{{ pare_url_file($product->image) }}" alt=""></td>
                                <td>{{$product->name}}</td>
                                <td>{{isset($product->category->name)?$product->category->name : 'N\A'}}</td>
                                <td>{{isset($product->brand->name)?$product->brand->name : 'N\A'}}</td>
                                <td>
                                    @if($product->c_status == \App\Models\Product::STATUS_SHOWS)
                                        <a href="{{route('product.status',$product->id )}}" class="label {{$product->getStatus($product->status)['class']}}">{{$product->getStatus($product->status)['name']}}</a>
                                    @else
                                        <a href="{{route('product.status',$product->id )}}" class="label {{$product->getStatus($product->status)['class']}}">{{$product->getStatus($product->status)['name']}}</a>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-sm btn-outline-info" ui-toggle-class="">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('product.destroy', $product->id)}}"
                                       class="text-danger"
                                       onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
