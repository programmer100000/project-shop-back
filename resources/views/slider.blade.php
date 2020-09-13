@extends('master')
@section('title')
    اسلایدر
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
              <a href="{{ route('add.slider') }}" class="btn btn-success">افزودن</a>
            <h3 class="card-title">اسلایدر</h3>
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
                  @foreach ($slider_images as $item)
                  <tr>
                    <td>
                        {{ $i++ }}
                    </td>
                    <td>
                        <img src="{{ url($item->img) }}" width="600" height="250" alt="{{ $item->alt }}">
                    </td>
                    <td>{{ $item->alt }}</td>
                    <td> 
                        <a class="btn btn-primary" href="{{ route('edit.slider', [$item->slider_image_id]) }}"  >ویرایش</a>
                        <button class="btn btn-danger delete-image-slider" data-id = {{ $item->slider_image_id }}  data-toggle="modal" data-target='#deletemodal'>حذف</button>
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
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="delete-image-slider" data-id="" data-csrf="{{ csrf_token() }}" data-url= "{{ route('delete.slider') }}">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.js')}}" defer></script>
<script>
    $(function () {
      $("#example1").DataTable({
          "language": {
              "paginate": {
                  "next": "بعدی",
                  "previous" : "قبلی"
              }
          },
          "info" : false,
      });
      $('#example2').DataTable({
          "language": {
              "paginate": {
                  "next": "بعدی",
                  "previous" : "قبلی"
              }
          },
        "info" : false,
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "autoWidth": false
      });
    });
  </script>
  <script src="{{ asset('js/slider.js') }}" defer></script>
@endsection