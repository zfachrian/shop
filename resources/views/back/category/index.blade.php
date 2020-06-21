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
                            <td><a class="btn btn-outline-warning btn-sm btn-block font-weight-bold">Edit</a></td>
                            <td><a class="btn btn-outline-danger btn-sm btn-block font-weight-bold">Hapus</a></td>
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