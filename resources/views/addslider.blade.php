@extends('master')

@section('main')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">افزودن عکس </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('add.slider') }}" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputFile">ارسال فایل</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="image" id="image">
                      <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="عنوان عکس" name="altimage">
                </div>
                </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">ارسال</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection