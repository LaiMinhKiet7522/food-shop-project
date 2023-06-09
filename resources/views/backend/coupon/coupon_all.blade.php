@extends('admin.admin_dashboard')
@section('admin')
@section('title')
    Coupon
@endsection
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Coupon</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Coupons: <span
                            class="badge rounded-pill bg-danger">{{ count($coupon) }}</span></li>
                </ol>
            </nav>
        </div>
        @if (Auth::user()->can('coupon.add'))
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.coupon') }}" class="btn btn-primary"><i class="lni lni-plus"> Add New</i></a>
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
                            <th>Coupon Code</th>
                            <th>Discount(%)</th>
                            <th>Coupon Validity</th>
                            <th>Coupon Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupon as $key => $item)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ $item->coupon_code }}</td>
                                <td> <span class="badge rounded-pill bg-danger" style="font-size: 12px;">-
                                        {{ $item->coupon_discount }}%</span>
                                </td>
                                <td> {{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }} </td>
                                <td>
                                    @if ($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                        <span class="badge rounded-pill bg-success"
                                            style="font-size: 13px;">Valid</span>
                                    @else
                                        <span class="badge rounded-pill bg-dark" style="font-size: 13px;">Invalid</span>
                                    @endif
                                </td>

                                <td>
                                    @if (Auth::user()->can('coupon.edit'))
                                        <a href="{{ route('edit.coupon', $item->id) }}" class="btn btn-warning">Edit</a>
                                    @endif

                                    @if (Auth::user()->can('coupon.delete'))
                                        <a href="{{ route('delete.coupon', $item->id) }}" class="btn btn-danger"
                                            id="delete">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Coupon Code</th>
                            <th>Discount(%)</th>
                            <th>Coupon Validity</th>
                            <th>Coupon Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
