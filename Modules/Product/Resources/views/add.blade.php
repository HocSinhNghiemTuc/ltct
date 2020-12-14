<!-- Stored in resources/views/child.blade.php -->
@extends('layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('modules/product/add.css')}}">
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Product', 'key' => 'Add'])
    <!-- Main content -->
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">

                    <div class="row">

                        <div class="col-md-6">

                            @csrf

                            <div class="form-group">
                                <label for="">Tên sản phẩm</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name"
                                       placeholder="Nhập tên sản phẩm"
                                       value="{{old('name')}}">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Giá</label>
                                <input type="number"
                                       class="form-control @error('price') is-invalid @enderror"
                                       name="price"
                                       placeholder="Nhập giá sản phẩm"
                                       value="{{old('price')}}">
                                @error('price')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Ảnh đại diện</label>
                                <input type="file"
                                       class="form-control-file"
                                       name="feature_image_path"
                                >
                            </div>

                            <div class="form-group">
                                <label for="">Ảnh chi tiết</label>
                                <input type="file"
                                       multiple
                                       class="form-control-file"
                                       name="image_path[]"
                                >
                            </div>

                            <div class="form-group">
                                <label>Lựa chọn danh mục</label>
                                <select class="form-control select2_init @error('category_id') is-invalid @enderror"
                                        name="category_id">
                                    <option value="">Chọn danh mục sản phẩm</option>
                                    {!! $htmlOption !!}

                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Nhập tags cho sản phẩm</label>
                                <select name="tags[]"
                                        class="form-control tags_select_choose @error('content') is-invalid @enderror"
                                        multiple="multiple">

                                </select>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nhập nội dung</label>
                                <textarea name="contents" class="form-control tinymce_editor_init" rows="8">
                                {{old('content')}}
                            </textarea>
                                @error('content')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </form>
    </div>
    <!-- /.content-wrapper -->


@endsection

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{asset('modules/product/add.js')}}"></script>
@endsection
