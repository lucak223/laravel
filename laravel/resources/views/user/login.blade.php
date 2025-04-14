@extends('template.user')
@section('body')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Login</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Account Login Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                <form class="card login-form" method="POST" action="{{ route('postlogin') }}">
    @csrf
    <div class="card-body">
        <div class="title">
            <h3>Login Now</h3>
            <p>You can login using your social media account or email address.</p>
        </div>

        <!-- ... social login buttons ... -->

        <div class="alt-option"><span>Or</span></div>

        @if (session()->get('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif


        <div class="form-group input-group">
            <label for="reg-email">Email</label>
            <input class="form-control" type="email" id="reg-email" name="email" required>
        </div>

        <div class="form-group input-group">
            <label for="reg-pass">Password</label>
            <input class="form-control" type="password" id="reg-pass" name="password" required>
        </div>

        <div class="d-flex flex-wrap justify-content-between bottom-content">
            <div class="form-check">
                <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1">
                <label class="form-check-label">Remember me</label>
            </div>
            <a class="lost-pass" href="#">Forgot password?</a>
        </div>

        <div class="button">
            <button class="btn" type="submit">Login</button>
        </div>
        <div class="button">
    <a href="{{ url('auth/google') }}" class="btn btn-danger w-100 mb-3">
        <i class="lni lni-google"></i> Login with Google
    </a>
</div>

        <p class="outer-link">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->

    
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from demo.graygrids.com/themes/shopgrids/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 May 2024 10:12:16 GMT -->
</html>