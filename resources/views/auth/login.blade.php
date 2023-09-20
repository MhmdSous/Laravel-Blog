<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
@include('layouts.head')
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
                style="background-image: url('assets/media/bg/bg-3.jpg');">
                <div class="login-form text-center p-7 position-relative overflow-hidden">
                    <!--begin::Login Header-->
                    <div class="d-flex flex-center mb-15">
                        <a href="#">
                            <img src="{{ asset('assets/media/logos/logo-letter-13.png') }}" class="max-h-75px"
                                alt="" />
                        </a>
                    </div>
                    <!--end::Login Header-->
                    <!--begin::Login Sign in form-->
                    <div class="login-signin">
                        <div class="mb-20">
                            <h3 class="opacity-70 font-weight-normal">Sign In To Admin</h3>
                            <p class="text-muted font-weight-bold">Enter your details to login to your account:</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input
                                class="form-control h-auto form-control-solid py-4 px-8"
                                    type="email" name="email" id="email" placeholder="Email"
                                    autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <input
                                class="form-control h-auto form-control-solid py-4 px-8"
                                    type="password" id="password" name="password" placeholder="Password" />
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                <div class="checkbox-inline">
                                    <label class="checkbox m-0 text-muted">
                                    <input type="checkbox" name="remember" />
                                    <span></span>Remember me</label>
                                </div>
                                {{-- <a href="{{ route('password.request') }}" id="kt_login_forgot"
                                class="text-muted text-hover-primary">Forget Password ?</a> --}}
                            </div>
                            <div class="form-group text-center mt-10">
                                <button id="kt_login_signin_submit"
                                class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button>
                            </div>

                            <div class="form-group text-center mt-10">
                                <p class="text-center mb-3">
                                    Or Login with
                                </p>
                                {{-- <a href="{{ route('google-auth') }}"
                                class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">
                                Sign In With Google</a> --}}
                            </div>
                        </form>

                        <div class="mt-10">
                            <span class="opacity-70 mr-4">Don't have an account yet?</span>
                            <a href="{{ route('register') }}" id="kt_login_signup"
                            class="text-muted text-hover-primary font-weight-bold">Sign Up</a>
                        </div>
                    </div>
                    <!--end::Login Sign in form-->

                    <!--end::Login Sign up form-->
                    <!--begin::Login forgot password form-->
                    <div class="login-forgot">
                        <div class="mb-20">
                            <h3 class="opacity-70 font-weight-normal">Forgotten Password ?</h3>
                            <p class="opacity-40">Enter your email to reset your password</p>
                        </div>
                        <form class="form" id="kt_login_forgot_form">
                            <div class="form-group mb-10">
                                <input
                                class="form-control h-auto form-control-solid py-4 px-8"
                                    type="text" placeholder="Email" name="email" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <button id="kt_login_forgot_submit"
                                class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Request</button>
                                <button id="kt_login_forgot_cancel"
                                class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <!--end::Login forgot password form-->
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->

@include('body.scripts')
</body>
<!--end::Body-->

</html>
