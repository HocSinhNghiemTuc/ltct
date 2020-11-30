@extends('layouts.admin')

@section('title')
  <title>Trang chu</title>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Slider', 'key' => 'Edit'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{route('slider.update', ['id' => $slider->id])}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Ten slider</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="Nhap ten slider" value="{{$slider->name}}">

                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>

              <div class="form-group">
                <label>Mo ta slider</label>
                <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{$slider->description}}</textarea>

                @error('description')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>

              <div class="form-group">
                <label>Hinh anh</label>
                <input type="file" name="image_path" class="form-control-file @error('image_path') is-invalid @enderror">

                <div class="col-md-4">
                  <div class="row">
                    <img height="130" width="100%" margin-top="10" object-fit="cover" src="{{$slider->image_path}}" alt="">
                  </div>
                </div>

                @error('image_path')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
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

