<!-- Stored in resources/views/child.blade.php -->
@extends('layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Product', 'key' => 'Add'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="">Tên sản phẩm</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       placeholder="Nhập tên sản phẩm">
                            </div>

                            <div class="form-group">
                                <label for="">Giá</label>
                                <input type="number"
                                       class="form-control"
                                       name="price"
                                       placeholder="Nhập giá sản phẩm">
                            </div>

                            <div class="form-group">
                                <label for="">Ảnh đại diện</label>
                                <input type="file"
                                       class="form-control"
                                       name="feature_image_path"
                                >
                            </div>

                            <div class="form-group">
                                <label for="">Ảnh chi tiết</label>
                                <input type="file"
                                       multiple
                                       class="form-control"
                                       name="image_path[]"
                                >
                            </div>

                            <div class="form-group">
                                <label>Lựa chọn danh mục</label>
                                <select class="form-control select2_init" name="parent_id">
                                    <option value="">Chọn danh mục sản phẩm</option>
                                    {!! $htmlOption !!}

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Nhập tags cho sản phẩm</label>
                                <select class="form-control tags_select_choose" multiple="multiple">
                                  
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Nhập nội dung</label>
                                <textarea name="content" class="form-control" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(function() {
        $(".tags_select_choose").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });
        $(".select2_init").select2({
            placeholder: "Chọn danh mục sản phẩm",
            allowClear: true
        })
    })
</script>
@endsection