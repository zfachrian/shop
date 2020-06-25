@extends('back.templates.main')
@section('title') Tambah Berita @endsection
@section('style')
<!-- TaggingJS -->
<link rel="stylesheet" href="{{asset('plugins/taggingJS/tag-basic-style.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('back/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('back/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('script')
<!-- TaggingJS -->
<script src="{{asset('plugins/taggingJS/tagging.min.js')}}"></script>
<script>
    (function( $, window, document, undefined ) {
        $( document ).ready(function() {
            var t = $( "#tag" ).tagging();
            t[0].addClass( "form-control" );
            // console.log( t[0] ); 
        });
    })( window.jQuery, window, document );
</script>
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
            <h3 class="card-title">Tambah Berita</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('back.news.store')}}" enctype="multipart/form-data">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="judul_berita">Nama Berita</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="judul_berita" name="judul_berita">
                    @error('judul_berita')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isi_berita">Isi Berita</label>
                    <textarea class="form-control @error('isi_berita') is-invalid @enderror" id="isi_berita" name="isi_berita" rows="3"></textarea>
                    @error('isi_berita')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tag">Tags</label>
                    <div data-tags-input-name="tag" id="tag" name="tag"></div>
                </div>
                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control-file @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail">
                    @error('thumbnail')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
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