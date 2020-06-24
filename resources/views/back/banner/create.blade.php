@extends('back.templates.main')
@section('title') Tambah Banner @endsection
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
            <h3 class="card-title">Tambah Banner</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('back.banner.store')}}" enctype="multipart/form-data">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_banner">Nama Banner</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="nama_banner" name="nama_banner">
                    @error('nama_banner')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link_banner">Link Banner</label>
                    <input type="text" class="form-control" id="link_banner" name="link_banner">
                </div>
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