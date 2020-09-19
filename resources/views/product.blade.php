@extends('master')
@section('title')
محصولات
@endsection
@section('header')
<script src="{{ asset('plugins/datatables/jquery.dataTables.js')}}" defer></script>
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('main')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">محصولات</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>عکس</th>
                                <th>عنوان</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        @php
                        $i = 1;
                        @endphp
                        <tbody>
                            @foreach ($products as $item)
                            <tr>
                                <td>
                                    {{ $i++ }}
                                </td>
                                <td>
                                    <img src="{{ url($item->main_image) }}" width="600" height="250"
                                        alt="{{ $item->title }}">
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#editproduct">ویرایش</a>
                                    <button class="btn btn-danger delete-brand" data-id={{ $item->product_id }}
                                        data-toggle="modal" data-target='#deletemodal'>حذف</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">هشدار</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                برای حذف این مورد مطمئن هستید ؟؟؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">خیر</button>
                <button type="button" class="btn btn-primary" id="delete-brand" data-id=""
                    data-csrf="{{ csrf_token() }}" data-url="{{ route('delete.brand') }}">بله</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ویرایش</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('edit.product')}}" method="POST">
                    <div class="form-group">
                        <label for="title">عنوان</label>
                        <input class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="picture">عکس</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label for="">توضیحات</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="balance">موجودی</label>
                        <input type="number" name="balance" id="balance">
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label for="offer-type">نوع تخفیف:</label>
                            <select name="offer-type" id="offer-type">
                                <option value="1" selected>ندارد</option>
                                <option value="2">درصدی</option>
                                <option value="3">قیمت</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label for="offer-price">تخفیف:</label>
                            <input class="d-none" type="text" name="offer-price" id="offer-price">
                        </div>
                    </div>
                    <div class="from-group">
                        <div class="input-group">
                            <label for="editor">نقد و بررسی :</label>
                            <textarea id="editor1" name="editor1"
                                style="width: 100%">لطفا متن مورد نظر خودتان را وارد کنید</textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">ویرایش</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">خیر</button>
                <button type="button" class="btn btn-primary" id="delete-brand" data-id=""
                    data-csrf="{{ csrf_token() }}" data-url="{{ route('delete.brand') }}">بله</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('myplugin/persian.date.min.js') }}"></script>
<script src="{{ asset('myplugin/persian.datepicker.min.js') }}"></script>
<script src="{{ asset('myplugin/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('js/product.js') }}"></script>
<script>
    $(function () {
        var CKEDITOR_BASEPATH = '{{ asset('
        images ') }}';

        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        $('.start-date').persianDatepicker({
            autoClose: true
        });
        $('.finish-date').persianDatepicker({
            autoClose: true
        });

    })

</script>
@endsection
