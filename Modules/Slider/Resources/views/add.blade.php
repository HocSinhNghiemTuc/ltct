@extends('layouts.admin')

@section('title')
  <title>Trang chu</title>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Slider', 'key' => 'Add'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Ten slider</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="Nhap ten slider">

                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>

              <div class="form-group">
                <label>Mo ta slider</label>
                <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror"  placeholder="Nhap mo ta slider"></textarea>

                @error('description')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>

              <div class="form-group">
                <label>Hinh anh</label>
                <input type="file" name="image_path" class="form-control-file @error('image_path') is-invalid @enderror">

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

