@extends('admin.admin_dashboard')
@section('admin')
@section('title')
    Blog
@endsection
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Blog Post</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Blog Posts <span
                        class="badge rounded-pill bg-danger">{{ count($blogpost) }}</span></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.blog.post') }}" class="btn btn-primary"><i class="lni lni-plus"> Add New</i></a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Post Image </th>
                            <th>Blog Category </th>
                            <th>Post Title </th>
                            <th>Views</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogpost as $key => $item)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> <img src="{{ asset($item->post_image) }}" style="width: 150px; height:80px;"> </td>
                                <td>{{ $item['blogcategory']['blog_category_name'] }}</td>
                                <td>{{ Str::limit($item->post_title, 30, '...') }}</td>
                                <td>{{ $item->views }}</td>
                                <td>
                                    <a href="{{ route('edit.blog.post', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('delete.blog.post', $item->id) }}" class="btn btn-danger"
                                        id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Post Image </th>
                            <th>Blog Category </th>
                            <th>Post Title </th>
                            <th>Views</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
