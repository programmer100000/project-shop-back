@extends('master')
@section('title')
    افزودن محصول
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('myplugin/persian.datepicker.min.css') }}">
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
                        <h3 class="card-title">افزودن محصول </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('add.product') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="exampleInputFile">عنوان</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="exampleFormControlTextarea1">:توضیحات</label><br >
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description"></textarea><br>
                                </div>
                            </div>
                            <input type="hidden" name="special-value" id="special-value" value="0">
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="balance">:موجودی</label><br>
                                    <input class="form-control" type="number" id="balance" rows="5" name="balance">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="balance">:قیمت</label><br>
                                    <input class="form-control" type="text" id="price" rows="5" name="price">
                                </div>
                            </div>
                            <div class="from-group">
                                <div class="input-group">
                                    <label for="editor">نقد و بررسی :</label>
                                    <textarea id="editor1" name="editor1" style="width: 100%">لطفا متن مورد نظر خودتان را وارد کنید</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="offer-type">نوع تخفیف:</label>
                                    <select name="offer-type" id="offer-type">
                                        <option value="0">ندارد</option>
                                        <option value="1">درصدی</option>
                                        <option value="2">قیمت</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="offer-price">تخفیف:</label>
                                    <input class="d-none" type="text" name="offer-price" id="offer-price">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="image">عکس اصلی</label>
                                    <input type="file" name="main-image" name="main-image">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="image">فروش ویژه</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" onchange="changeradiono()" id="noradio" checked>
                                        <label class="form-check-label"  for="exampleCheck1">خیر</label>
                                      </div>
                                      <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="yesradio" onchange="changeradioyes()">
                                        <label class="form-check-label" for="exampleCheck1">بله</label>
                                      </div>                         
                                </div>
                            </div>
                            <div class="form-group d-none" id="special">
                                <div class="input-group">
                                    <label for="start-date">تاریخ شروع </label>
                                    <input class="start-date" name="start-date">
                                </div>
                                <div class="input-group">
                                    <label for="finish-date">تاریخ پایان </label>
                                    <input class="finish-date" name="finish-date">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
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
@section('scripts')
<script src="{{ asset('myplugin/persian.date.min.js') }}"></script>
<script src="{{ asset('myplugin/persian.datepicker.min.js') }}"></script>
<script src="{{ asset('plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('js/product.js') }}"></script>
<script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      ClassicEditor
        .create(document.querySelector('#editor1'))
        .then(function (editor) {
          // The editor instance
        })
        .catch(function (error) {
          console.error(error)
        })
        $('.start-date').persianDatepicker({
            autoClose: true
        });
        $('.finish-date').persianDatepicker({
            autoClose: true
        });
    })
  </script>
@endsection
