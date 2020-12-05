@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'Products', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('product.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                                <th scope="row">1</th>
                                <td>Áo khoác nam</td>
                                <td>1000000</td>
                                <td><img src="" alt=""></td>
                                <td>Quần áo nam</td>
                                <td>
                                	<a href="" class="btn btn-default">Edit</a>
                                	<a href="" class="btn btn-danger">Delete</a>
                                </td>

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
