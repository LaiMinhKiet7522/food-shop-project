@extends('admin.admin_dashboard')
@section('admin')
@section('title')
    Employee Management
@endsection
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Employee</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Search Pay Salary By Month</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
        <form action="{{ route('month.salary.search') }}" method="post">
            @csrf
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Search By Month</h5>
                        <label class="form-label">Select Month: </label>
                        <select name="month" class="form-select mb-3" aria-label="Default select example">
                            <option selected="" disabled></option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                        <label class="form-label">Select Year: </label>
                        <select name="year" class="form-select mb-3" aria-label="Default select example">
                            <option selected="" disabled></option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <br>
                        <input type="submit" class="btn btn-rounded btn-primary" value="Search">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
