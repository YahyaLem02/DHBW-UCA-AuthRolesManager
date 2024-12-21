<!DOCTYPE html>
<html lang="en">

<!-- Include head partial -->
@include('front.partials.head')

<body>
    <!-- Loading spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>

    <!-- Navbar section -->
    <div class="container-fluid position-relative p-0">
        @include('front.partials.navbar')

        <!-- Profile Header Section -->
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">My Profile</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/my-profile" class="h5 text-white">My Profile</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5 justify-content-center">
                <!-- Personal Information Card -->
                <div class="col-lg-5">
                    <div class="card bg-light rounded shadow-sm">
                        <div class="card-header bg-primary text-white text-center">
                            <h5 class="mb-0">Personal Information</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Name:</strong> {{ session('user')['name'] }}</p>
                            <p><strong>Email:</strong> {{ session('user')['email'] }}</p>
                            <p><strong>Role:</strong> {{ session('user')['profile'] ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Other Information Card -->
                <div class="col-lg-5">
                    <div class="card bg-light rounded shadow-sm">
                        <div class="card-header bg-primary text-white text-center">
                            <h5 class="mb-0">Other Information</h5>
                        </div>
                        <div class="card-body">
                            @if (session('user')->isTeacher() || session('user')->isStudent())
                                <p><strong>Phone:</strong> {{ session('user')['userDetails']->phone_number ?? 'N/A' }}</p>
                            @else
                                <p><strong>Phone:</strong> {{ session('user')['phone'] ?? 'N/A' }}</p>
                            @endif
                            <p><strong>Joined On:</strong> {{ session('user')['created_at'] ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <!-- Footer Section -->
    @include('front.partials.footer')

    <!-- Back to Top Button -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Include Scripts -->
    @include('front.partials.scripts')

    <!-- Custom CSS -->
    <style>
        .bg-header {
            background-color: #800000 !important;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .card-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .btn-primary {
            background-color: #800000;
            border: none;
        }

        .btn-primary:hover {
            background-color: #5e0000;
        }
    </style>
</body>

</html>
