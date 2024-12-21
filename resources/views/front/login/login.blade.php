<!DOCTYPE html>
<html lang="en">

<!-- head Section -->
@include('front.partials.head')

<body>
    <!-- Loading Spinner -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>

    <!-- Navbar Section -->
    <div class="container-fluid position-relative p-0">
        @include('front.partials.navbar')

        <div class="container-fluid py-5 bg-header" style="margin-bottom: 90px; background-color: #800000;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn" id="form-title">Login</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/login" class="h5 text-white">Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Forms Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="position-relative h-100">
                        <img class="w-100 h-100 rounded wow zoomIn image-container" data-wow-delay="0.9s"
                            src="{{ asset('img/IMG_0800.JPG') }}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto"
                        style="max-width: 600px;">
                        <h1 class="mb-0" id="form-title">Login</h1>
                    </div>

                    <!-- Login Form -->
                    <!-- Login Form -->
              <!-- Login Form -->
<form id="login-form" action="{{ url('/login') }}" method="post"
style="display: {{ session('form') === 'signup' ? 'none' : 'block' }};">
@csrf
<div class="input-div one">
    <div class="i">
        <i class="fas fa-user"></i>
    </div>
    <div>
        <input class="input" type="text" name="email" placeholder="Email Address"
            value="{{ old('email') }}" required>
        @if ($errors->has('email') && session('form') !== 'signup')
            <small class="text-danger">{{ $errors->first('email') }}</small>
        @endif
    </div>
</div>
<div class="input-div two">
    <div class="i">
        <i class="fas fa-lock"></i>
    </div>
    <div>
        <input class="input" type="password" name="password" placeholder="Password" required>
        @if ($errors->has('password') && session('form') !== 'signup')
            <small class="text-danger">{{ $errors->first('password') }}</small>
        @endif
    </div>
</div>
<a href="/forgot-password">Forgot Password</a>
<input type="submit" class="btn btn-primary" value="Login">
</form>

<!-- Signup Form -->
<form id="signup-form" action="{{ url('/signup') }}" method="post"
style="display: {{ session('form') === 'signup' ? 'block' : 'none' }};">
@csrf
<div class="input-div one">
    <div class="i">
        <i class="fas fa-user"></i>
    </div>
    <div>
        <input class="input" type="text" name="name" placeholder="Full Name"
            value="{{ old('name') }}" required>
        @if ($errors->has('name'))
            <small class="text-danger">{{ $errors->first('name') }}</small>
        @endif
    </div>
</div>
<div class="input-div one">
    <div class="i">
        <i class="fas fa-envelope"></i>
    </div>
    <div>
        <input class="input" type="email" name="email" placeholder="Email Address"
            value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <small class="text-danger">{{ $errors->first('email') }}</small>
        @endif
    </div>
</div>
<div class="input-div two">
    <div class="i">
        <i class="fas fa-lock"></i>
    </div>
    <div>
        <input class="input" type="password" name="password" placeholder="Password" required>
        @if ($errors->has('password'))
            <small class="text-danger">{{ $errors->first('password') }}</small>
        @endif
    </div>
</div>
<div class="input-div two">
    <div class="i">
        <i class="fas fa-lock"></i>
    </div>
    <div>
        <input class="input" type="password" name="password_confirmation"
            placeholder="Confirm Password" required>
        @if ($errors->has('password_confirmation'))
            <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
        @endif
    </div>
</div>
<input type="submit" class="btn btn-primary" value="Signup">
</form>

                    <!-- Toggle Links -->
                    <div class="text-center mt-4">
                        <button id="switch-to-signup" class="btn btn-primary">Don't have an account? Sign Up</button>
                        <button id="switch-to-login" class="btn btn-primary" style="display: none;">Already have an
                            account? Login</button>
                    </div>
                </div>
            </div><br>
        </div>
    </div>

    <!-- Include Scripts -->
    @include('front.partials.scripts')

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JavaScript -->
    <script>
        // Form toggle functionality
        const loginForm = document.getElementById('login-form');
        const signupForm = document.getElementById('signup-form');
        const formTitle = document.getElementById('form-title');
        const switchToSignup = document.getElementById('switch-to-signup');
        const switchToLogin = document.getElementById('switch-to-login');

        switchToSignup.addEventListener('click', (e) => {
            e.preventDefault();
            loginForm.style.display = 'none';
            signupForm.style.display = 'block';
            formTitle.textContent = 'Signup';
            switchToSignup.style.display = 'none';
            switchToLogin.style.display = 'inline-block';
        });

        switchToLogin.addEventListener('click', (e) => {
            e.preventDefault();
            loginForm.style.display = 'block';
            signupForm.style.display = 'none';
            formTitle.textContent = 'Login';
            switchToSignup.style.display = 'inline-block';
            switchToLogin.style.display = 'none';
        });

        // SweetAlert2 for session messages
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                confirmButtonColor: '#800000'
            });
        @endif

        @if ($errors->any())
    Swal.fire({
        icon: 'error',
        title: 'Validation Errors',
        html: '{!! implode("<br>", $errors->all()) !!}',
        confirmButtonColor: '#800000'
    });
@endif

    </script>

    <!-- CSS -->
    <style>
        .btn-primary {
            background-color: #800000;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 1rem;
        }

        .btn-primary:hover {
            background-color: #5e0000;
        }

        .bg-primary {
            background-color: #800000 !important;
        }
    </style>
</body>

</html>
