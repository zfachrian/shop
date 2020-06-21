@extends('back.templates.main')
@section('title') Category @endsection
@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('script')
<!-- DataTables -->
<script src="{{asset('back/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- page script -->
<script>
    $(function() {
        $("#mainTable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
<script>
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
$(document).on('click', 'a.jquery-postback', function(e) {
    e.preventDefault(); // does not go through with the link.

    var $this = $(this);

    // $.post({
    //     type: $this.data('method'),
    //     url: $this.attr('href')
    // }).done(function (data) {
    //     alert('success');
    //     console.log(data);
    // });

    $.ajax({
        type: "post",
        url: $this.attr('href'),
        data: {_method: 'delete'},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log("success yes");
            location.reload();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});
</script>
@endsection
@section('isi')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <a href="{{route('back.category.create')}}" class="btn btn-primary float-right">Tambah</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="mainTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Detail</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->category_name}}</td>
                            <td>{{$row->category_detail}}</td>
                            <td><a href="{{ route('back.category.edit', $row->id) }}" class="btn btn-outline-warning btn-sm btn-block font-weight-bold">Edit</a></td>
                            <td><a href="{{ route('back.category.destroy', $row->id) }}"  data-method="delete" class="jquery-postback btn btn-outline-danger btn-sm btn-block font-weight-bold">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Category</th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
@endsection