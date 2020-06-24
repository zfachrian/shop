@extends('back.templates.main')
@section('title') Product @endsection
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
            <a href="{{route('back.product.create')}}" class="btn btn-primary float-right">Tambah</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="mainTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <th>{{$item->category->category_name}}</th>
                        <th>{{$item->product_code}}</th>
                        <th>{{$item->product_name}}</th>
                        <th>{{$item->product_price}}</th>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
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