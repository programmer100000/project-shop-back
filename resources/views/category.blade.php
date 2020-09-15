@extends('master')
@section('title')
    دسته بندی
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('css/jqtree.css') }}">
@endsection
@section('main')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">افزودن</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="category_form" role="form" action="{{ route('add.category') }}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">نام <button class="btn btn-primary d-none" id="editbtn">ویرایش</button></label>
                  <input type="text" class="form-control" id="categoryname" name="catgory-name" placeholder="نام را وارد کنید">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-success add-attr-btn"  type="button">
                                <i class="fa fa-plus"></i>
                                افزودن مشخصه
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="parent" id="attrs">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-success add-attr-btn"  type="button">
                                <i class="fa fa-plus"></i>
                                افزودن مشخصه
                            </button>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">ارسال</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
            <div id="tree"></div>
        </div>
      </div>
    </div>
</section>
@endsection
@section('scripts')
    <script src="{{ asset('js/tree.jquery.js')}}"></script>
    <script src="{{ asset('js/category.js')}}" defer></script>
    <script>
        var caturl = '{{ route('cat_json') }}';
        var changecat = '{{ route('change.parent') }}';
        var csrf_token = '{{ csrf_token() }}';
        var editurl = '{{ route('edit.category') }}';
    </script>
@endsection