@extends('admin.admin_dashboard')
@section('admin')
@section('title')
    Slider
@endsection
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Slider</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Slider: <span
                            class="badge rounded-pill bg-danger">{{ count($sliders) }}</span></li>
                </ol>
            </nav>
        </div>
        @if (Auth::user()->can('slider.add'))
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.slider') }}" class="btn btn-primary"><i class="lni lni-plus"> Add New</i></a>
                </div>
            </div>
        @endif
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
                            <th>Slider Title</th>
                            <th>Short Title</th>
                            <th>Slider Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->slider_title }}</td>
                                <td>{{ $item->short_title }}</td>
                                <td><img src="{{ asset($item->slider_image) }}" style="width: 150px; height: 80px;">
                                <td>
                                    @if ($item->status == 'hide')
                                        <span class="badge rounded-pill bg-dark" style="font-size: 13px;">Hide</span>
                                    @else
                                        <span class="badge rounded-pill bg-success" style="font-size: 13px;">Show</span>
                                    @endif
                                </td>
                                </td>
                                <td>
                                    @if (Auth::user()->can('slider.edit'))
                                        <a href="{{ route('edit.slider', $item->id) }}" class="btn btn-warning">Edit</a>
                                    @endif

                                    @if (Auth::user()->can('slider.delete'))
                                        <a href="{{ route('delete.slider', $item->id) }}" class="btn btn-danger"
                                            id="delete">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Slider Title</th>
                            <th>Short Title</th>
                            <th>Slider Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
