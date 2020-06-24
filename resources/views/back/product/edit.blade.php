@extends('back.templates.main')
@section('title') Edit Product @endsection
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
            <h3 class="card-title">Edit Data Product</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('back.product.update',[$product->id])}}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="kategori">Kategori {{$product->categories_id}}</label>
                    <select class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                    @foreach($category as $item)
                        <option value="{{$item->id}}" 
                            {{ $item->id == $product->categories_id ? "selected" : null}}
                        >{{$item->category_name}}</option>
                    @endforeach
                    </select>

                    @error('kategori')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kode_produk">Kode Produk</label>
                    <div class="row">
                        <div class="col-2">
                        <input type="text" class="form-control" id="kode" name="kode" readonly value="SOS">
                        </div>
                        <div class="col">
                        <input type="text" name="kode_produk" class="form-control @error('kode_produk') is-invalid @enderror" value="{{$product->product_code}}">
                        @error('kode_produk')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" value="{{$product->product_name}}">
                    @error('nama_produk')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="Harga" name="harga" value="{{$product->product_price}}">
                    @error('harga')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{$product->product_description}}</textarea>
                    @error('deskripsi')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <img src="{{ asset('storage/'.$product->product_img) }}" class="img-thumbnail" style="max-width:200px;">
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