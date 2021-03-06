@extends('back.templates.main')
@section('title') Edit Kategori @endsection
@section('style')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('back/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('back/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('script')
<!-- Select2 -->
<script src="{{asset('back/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    })
</script>
@endsection
@section('isi')
<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Kategori</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('back.category.update',[$category->id])}}" enctype="multipart/form-data">
        @method('put')
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="nama_kategori" name="nama_kategori" value="{{$category->category_name}}">
                    @error('nama_kategori')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="detail_kategori">Detail Kategori</label>
                    <input type="text" class="form-control" id="detail_kategori" name="detail_kategori" value="{{$category->category_detail}}">
                </div>
                <img src="{{ asset('storage/'.$category->category_img) }}" class="img-thumbnail" style="max-width:200px;">
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                    @error('gambar')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->

</div>
@endsection