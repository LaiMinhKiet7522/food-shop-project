@extends('admin.admin_dashboard')
@section('admin')
@section('title')
    Commune
@endsection
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Commune</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Communes <span
                        class="badge rounded-pill bg-danger">{{ count($commune) }}</span></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.commune') }}" class="btn btn-primary"><i class="lni lni-plus"> Add New</i></a>
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
                            <th>City, Province </th>
                            <th>District </th>
                            <th>Commune </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commune as $key => $item)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ $item['city']['city_name'] }}</td>
                                <td> {{ $item['district']['district_name'] }}</td>
                                <td> {{ $item->commune_name }}</td>
                                <td>
                                    <a href="{{ route('edit.commune', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('delete.commune', $item->id) }}" class="btn btn-danger"
                                        id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>City, Province </th>
                            <th>District </th>
                            <th>Commune </th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
