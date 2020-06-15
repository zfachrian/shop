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
            <button class="btn btn-primary float-right">Tambah</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="mainTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Category</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        <td><a class="btn btn-outline-warning btn-sm btn-block font-weight-bold">Edit</a></td>
                        <td><a class="btn btn-outline-danger btn-sm btn-block font-weight-bold">Hapus</a></td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.0
                        </td>
                        <td>Win 95+</td>
                        <td><a class="btn btn-outline-warning btn-sm btn-block font-weight-bold">Edit</a></td>
                        <td><a class="btn btn-outline-danger btn-sm btn-block font-weight-bold">Hapus</a></td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5
                        </td>
                        <td>Win 95+</td>
                        <td><a class="btn btn-outline-warning btn-sm btn-block font-weight-bold">Edit</a></td>
                        <td><a class="btn btn-outline-danger btn-sm btn-block font-weight-bold">Hapus</a></td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 6
                        </td>
                        <td>Win 98+</td>
                        <td><a class="btn btn-outline-warning btn-sm btn-block font-weight-bold">Edit</a></td>
                        <td><a class="btn btn-outline-danger btn-sm btn-block font-weight-bold">Hapus</a></td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet Explorer 7</td>
                        <td>Win XP SP2+</td>
                        <td><a class="btn btn-outline-warning btn-sm btn-block font-weight-bold">Edit</a></td>
                        <td><a class="btn btn-outline-danger btn-sm btn-block font-weight-bold">Hapus</a></td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>AOL browser (AOL desktop)</td>
                        <td>Win XP</td>
                        <td><a class="btn btn-outline-warning btn-sm btn-block font-weight-bold">Edit</a></td>
                        <td><a class="btn btn-outline-danger btn-sm btn-block font-weight-bold">Hapus</a></td>
                    </tr>
                    <tr>
                        <td>Other browsers</td>
                        <td>All others</td>
                        <td>-</td>
                        <td><a class="btn btn-outline-warning btn-sm btn-block font-weight-bold">Edit</a></td>
                        <td><a class="btn btn-outline-danger btn-sm btn-block font-weight-bold">Hapus</a></td>
                    </tr>
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