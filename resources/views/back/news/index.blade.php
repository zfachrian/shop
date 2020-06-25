@extends('back.templates.main')
@section('title') Berita @endsection
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
            <a href="{{route('back.news.create')}}" class="btn btn-primary float-right">Tambah</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="mainTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Thumbnail</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Tag</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                @if($item->news_thumbnail)
                                    <img src="{{ asset('storage/'.$item->news_thumbnail) }}" class="img-thumbnail" style="max-width:200px;">
                                @else
                                    <p class="text-danger">thumbnail kosong</p>
                                @endif
                            </td>
                            <td>      
                                @if($item->news_image)
                                    <img src="{{ asset('storage/'.$item->news_image) }}" class="img-tdumbnail" style="max-width:200px;">
                                @else
                                <p class="text-danger">gambar kosong</p>
                                @endif
                            </td>
                            <td>{{$item->news_title}}</td>
                            <td>
                                <?php $arr = explode(', ',$item->tags); ?>
                                @foreach($arr as $tag)
                                    <a class="badge badge-primary text-light">{{$tag}}</a>
                                @endforeach
                            </td>
                            <td><a href="{{ route('back.news.edit', $item->id) }}" class="btn btn-outline-warning btn-sm btn-block font-weight-bold">Edit</a></td>
                            <td><a href="{{ route('back.news.destroy', $item->id) }}"  data-method="delete" class="jquery-postback btn btn-outline-danger btn-sm btn-block font-weight-bold">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Thumbnail</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Tag</th>
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