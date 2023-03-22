@extends('admin.layout.app')

@section('stylesheet')
    <!-- DataTables -->
    <link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <style>
        .admin-post-thumb {
            width: 50px;
            height: 35px;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    {{-- MAIN CONTNET AREA START --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="20">SN</th>
                                <th width="70">Thumbnail</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Comments</th>
                                <th>Views</th>
                                <th>Likes</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th width="70">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($posts) > 0)
                                @foreach ($posts as $key=>$post)
                                    <tr>
                                        <td width="20">{{ $key + 1 }}</td>
                                        <td><img class="admin-post-thumb" src="{{ asset('post_thumbnails/' . $post->thumbnail) }}"
                                                alt="Post Thumbnail"></td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ count($post->comments) }}</td>
                                        <td>{{ $post->views == 0 ? 0 : $post->views }}</td>
                                        <td>{{ $post->likes == 0 ? 0 : $post->likes }}</td>
                                        <td>{{ date('s:i:h - d M Y', strtotime($post->created_at)) }}</td>
                                        <td>{{ date('s:i:h - d M Y', strtotime($post->updated_at)) }}</td>
                                        <td width="70">
                                            <a class="badge badge-info mr-2" href="{{route('posts.show', $post->id)}}"><i
                                                    class="fa fa-binoculars"></i></a>
                                            <a class="badge badge-success mr-2" href="{{route('posts.edit', $post->id)}}"><i
                                                    class="fas fa-edit"></i></a>
                                            <a class="badge badge-danger" href="javascript:deletePost('{{route('posts.destroy', $post->id)}}')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="20">SN</th>
                                <th width="70">Thumbnail</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Comments</th>
                                <th>Views</th>
                                <th>Likes</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th width="70">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.row -->
    {{-- MAIN CONTNET AREA END --}}
    <form action="" id="deletePostForm" method="POST">@csrf @method('DELETE')</form>
@endsection

@section('script')
    <!-- DataTables  & Plugins -->
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/admin/plugins/jszip/jszip.min.js"></script>
    <script src="/admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "order": [[1, 'desc']],
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deletePost(url) {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                jQuery('#deletePostForm').attr('action', url);
                jQuery('#deletePostForm').submit();
            }
            })
        }
    </script>
@endsection
