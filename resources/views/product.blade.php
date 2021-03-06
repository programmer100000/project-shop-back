@extends('master')
@section('title')
محصولات
@endsection
@section('header')
<link rel="stylesheet" href="{{ asset('myplugin/persian.datepicker.min.css') }}">
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
                                <th>وضعیت</th>
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
                                    <a class="btn btn-primary edit-product" data-toggle="modal" data-target="#editproduct" data-id="{{ $item->product_id }}" data-url={{ route('edit.product') }}>ویرایش</a>
                                    <button class="btn btn-danger disable-product" data-id={{ $item->product_id }}
                                        data-toggle="modal" data-target='#deletemodal'> غیر فعال/فعال</button>
                                </td>
                                <td>
                                    @if ($item->status ==1 )
                                        فعال
                                        @else
                                        غیرفعال

                                    @endif
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
                برای غیر فعال/ فعال این مورد مطمئن هستید ؟؟؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">خیر</button>
                <button type="button" class="btn btn-primary" id="disable-product" data-id=""
                    data-csrf="{{ csrf_token() }}" data-url="{{ route('disable.product') }}">بله</button>
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
                <form id="edit-form-modal" action="{{ route('edit.info.product')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="" id="id">
                    <div class="form-group">
                        <label for="title">عنوان</label>
                        <input class="form-control" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="picture">عکس</label>
                        <img src="" id="image" alt="" width="300" height="300">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label for="">توضیحات</label>
                        <input type="text" name="description" class="form-control" id="desc">
                    </div>
                    <input type="hidden" name="special-value" id="special-value" value="0">
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
                            <input class="start-date " id="stime" name="start-date">
                        </div>
                        <div class="input-group">
                            <label for="finish-date">تاریخ پایان </label>
                            <input class="finish-date" id="ftime" name="finish-date">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">ویرایش</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('myplugin/persian.date.min.js') }}"></script>
<script src="{{ asset('myplugin/persian.datepicker.min.js') }}"></script>
<script src="{{ asset('myplugin/ckeditor/ckeditor.js')}}"></script>
<script>
    let csrf_token = '{{ csrf_token() }}';
</script>
<script src="{{ asset('js/product.js') }}"></script>
<script>
    $(function () {
        var CKEDITOR_BASEPATH = '{{ asset('images') }}';

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
