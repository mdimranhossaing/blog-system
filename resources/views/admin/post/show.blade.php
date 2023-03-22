@extends('admin.layout.app')
@section('stylesheet')
@endsection

@section('content')
    {{-- MAIN CONTNET AREA START --}}
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <div class="user-block">
                        <img class="img-circle" src="/admin/dist/img/imran.jpg" alt="User Image">
                        <span class="username"><a href="#">{{$post->user->name}}</a></span>
                        <span class="description">Shared publicly - {{date('h:i A - d M Y', strtotime($post->created_at))}}</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" title="Mark as read">
                            <i class="far fa-circle"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <div class="card-body">
                    <img class="img-fluid pad" src="{{ asset('post_thumbnails/' . $post->thumbnail) }}" alt="Photo">

                    <p>{{$post->content}}</p>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                    <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                    <span class="float-right text-muted">{{$post->views}} Views - {{$post->like}} likes</span>
                </div>
                <div class="card-footer card-comments">
                    <div class="card-comment">
                        <!-- User image -->
                        <img class="img-circle img-sm" src="/admin/dist/img/user3-128x128.jpg" alt="User Image">

                        <div class="comment-text">
                            <span class="username">
                                Maria Gonzales
                                <span class="text-muted float-right">8:03 PM Today</span>
                            </span><!-- /.username -->
                            It is a long established fact that a reader will be distracted
                            by the readable content of a page when looking at its layout.
                        </div>
                        <!-- /.comment-text -->
                    </div>
                    <!-- /.card-comment -->
                    <div class="card-comment">
                        <!-- User image -->
                        <img class="img-circle img-sm" src="/admin/dist/img/user4-128x128.jpg" alt="User Image">

                        <div class="comment-text">
                            <span class="username">
                                Luna Stark
                                <span class="text-muted float-right">8:03 PM Today</span>
                            </span><!-- /.username -->
                            It is a long established fact that a reader will be distracted
                            by the readable content of a page when looking at its layout.
                        </div>
                        <!-- /.comment-text -->
                    </div>
                    <!-- /.card-comment -->
                </div>
                <!-- /.card-footer -->
                <div class="card-footer">
                    <form action="#" method="post">
                        <img class="img-fluid img-circle img-sm" src="/admin/dist/img/user4-128x128.jpg" alt="Alt Text">
                        <!-- .img-push is used to add margin to elements next to floating images -->
                        <div class="img-push">
                            <input type="text" class="form-control form-control-sm"
                                placeholder="Press enter to post comment">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <div class="col-md-12">
                    <form action="simple-results.html">
                        <div class="input-group input-group-lg">
                            <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="Lorem ipsum">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent posts</h3>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                <div class="list-group-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <img class="img-fluid" src="/admin/dist/img/photo1.png" alt="Photo" style="max-height: 160px;">
                                        </div>
                                        <div class="col-8">
                                            <div>
                                                <div class="">Category</div>
                                                <h5>Lorem ipsum dolor sit amet</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <img class="img-fluid" src="/admin/dist/img/photo2.png" alt="Photo" style="max-height: 160px;">
                                        </div>
                                        <div class="col-8">
                                            <div>
                                                <div class="">Category</div>
                                                <h5>Lorem ipsum dolor sit amet</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <img class="img-fluid" src="/admin/dist/img/photo1.png" alt="Photo" style="max-height: 160px;">
                                        </div>
                                        <div class="col-8">
                                            <div>
                                                <div class="">Category</div>
                                                <h5>Lorem ipsum dolor sit amet</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- MAIN CONTNET AREA END --}}
@endsection
