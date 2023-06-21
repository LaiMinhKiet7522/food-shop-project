@extends('frontend.master_dashboard')
@section('main')
@section('title')
    Reset Password
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Reset Password
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                <div class="row">
                    <div class="col-lg-6 pr-30 d-none d-lg-block">
                        <img class="border-radius-15" src="{{ asset('frontend/assets/imgs/page/login-1.png') }}"
                            alt="" />
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Reset Password</h1>
                                </div>
                                <br>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $error }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endforeach
                                @endif
                                <form method="POST" action="{{ route('password.store') }}" id="myForm">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <div class="form-group">
                                        <input class="form-control" type="email" id="email" required=""
                                            name="email" placeholder="Your email *"
                                            value="{{ old('email', $request->email) }}" readonly />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required="" id="password" type="password"
                                            name="password" placeholder="New password *" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required="" id="password_confirmation"
                                            type="password" name="password_confirmation"
                                            placeholder="Confirm new password *" />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-heading btn-block hover-up"
                                            name="login">Reset Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                password: {
                    required: true,
                    validatePassword: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password",
                },
            },
            messages: {
                password: {
                    required: 'Please enter your password.',
                    minlength: ''
                },
                password_confirmation: {
                    required: 'Please enter your confirmation password.',
                    equalTo: 'Confirm password must be same as new password.',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
        $.validator.addMethod("validatePassword", function(value, element) {
                return this.optional(element) || /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/i
                    .test(
                        value);
            },
            "Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character."
        );
    });
</script>
@endsection
