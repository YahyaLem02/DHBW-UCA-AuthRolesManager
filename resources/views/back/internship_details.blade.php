<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UCA-DHBW Portail/ Internships</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('back/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ url('back/css/style.css') }}" rel="stylesheet">

    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">UCA-DHBW</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{session('user')["name"]}}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('dashboard') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ route('students') }}" class="nav-item nav-link"><i
                            class="fa-solid fa-graduation-cap me-2"></i>Students</a>
                    <a href="{{ route('teachers') }}" class="nav-item nav-link"><i
                            class="fa-solid fa-chalkboard-user me-2"></i>Teachers</a>
                    <a href="{{ route('exchanges') }}" class="nav-item nav-link"><i
                            class="fa-solid fa-arrow-right-arrow-left me-2"></i>Exchanges</a>
                    <a href="{{ route('partners')  }}" class="nav-item nav-link"><i
                            class="fa-solid fa-arrow-right-arrow-left me-2"></i>Partners</a>
                    <a href="{{ route('internships') }}" class="nav-item nav-link active"><i
                            class="fa-solid fa-arrow-right-arrow-left mx-3"></i>internships</a>
                    <a href="{{ route('workshops') }}" class="nav-item nav-link "><i
                            class="fa-solid fa-laptop-file me-2"></i>Workshops</a>
                    <a href="{{ route('projects') }}" class="nav-item nav-link"><i
                            class="fa-solid fa-diagram-project me-2"></i>Projects</a>
                    <a href="{{ route('fablabs') }}" class="nav-item nav-link"><i
                            class="fa-solid fa-group-arrows-rotate me-2"></i>Fablabs</a>
                    <a href="{{ route('programs') }}" class="nav-item nav-link"><i
                            class="fa-solid fa-list me-2"></i>Programs</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{session('user')["name"]}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="/my-profile" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#logout">Log out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <div class="container-fluid pt-4 px-4 my-5">
                <div class="edit">
                    <div class="bg-secondary rounded-top p-4">
                        <div class="row">
                            <div class="col-12 col-sm-12 text-sm-start">
                                <h5>Edit The Inetrnship </h5>
                                <hr>
                                <form action="{{ route('internships.update', $internship->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ $internship->title }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4"
                                            required>{{ $internship->description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="date_start">Start Date</label>
                                        <input type="date" class="form-control" id="date_start" name="date_start"
                                            value="{{ $internship->date_start }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="date_end">End Date</label>
                                        <input type="date" class="form-control" id="date_end" name="date_end"
                                            value="{{ $internship->date_end }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="company">Company</label>
                                        <input type="text" class="form-control" id="company" name="company"
                                            value="{{ $internship->company }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="partner_id">Partner</label>
                                        <select class="form-select" id="partner_id" name="partner_id">
                                            <option disabled>Select a partner</option>
                                            @foreach($partners as $partner)
                                            <option value="{{ $partner->id }}" {{ $internship->partner_id ==
                                                $partner->id ? 'selected' : '' }}>{{ $partner->name_company }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary my-2">Update</button>
                                </form>
                                <hr>
                                <h5>Students : </h5>
                                <hr>
                                <table class="table table-bordered mt-4">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($internship->students as $student)
                                        <tr>
                                            <td>{{ $student->firstname }} {{ $student->lastname }}</td>
                                            <td>
                                                <form
                                                    action="{{ route('internships.removeStudent', ['internship' => $internship->id, 'student' => $student->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h5>Affect Students </h5>
                                <hr>
                                <form action="{{ route('internships.affectStudents', $internship->id) }}" method="post">
                                    @csrf
                                    @method('put')

                                    <div class="form-group">
                                        <label for="student">Select Student</label>
                                        <select class="form-select text-dark" id="student" name="student"
                                            style="background-color:#fff; color:#000;">
                                            <option value="" selected disabled> Select Student</option>
                                            @foreach($students as $student)
                                            @unless($internship->students->contains($student))
                                            <option value="{{ $student->id }}">{{ $student->firstname }}{{
                                                $student->lastname }} </option>
                                            @endunless
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary my-2">Add Student</button>
                                </form>
                                <hr>
                                <h5>Supervisors : </h5>
                                <hr>
                                <table class="table table-bordered mt-4">
                                    <thead>
                                        <tr>
                                            <th>Supervisor Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($internship->teachers as $supervisor)
                                            <tr>
                                                <td>{{ $supervisor->firstname}}{{ $supervisor->lastname}}</td>
                                                <td>
                                                    <form action="{{ route('internships.removeSupervisor', ['internship' => $internship->id, 'supervisor' => $supervisor->id]) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h5>Affect Supervisor </h5>
                                <hr>
                                <form action="{{ route('internships.affectSupervisors', $internship->id) }}"
                                    method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="supervisor">Select Supervisor</label>
                                        <select class="form-select text-dark" id="supervisor" name="supervisor"
                                            style="background-color:#fff;">
                                            <option value="" selected disabled> Select Supervisor</option>
                                            @foreach($teachers as $teacher)
                                            @unless($internship->teachers->contains($teacher))
                                            <option value="{{ $teacher->id }}">{{ $teacher->firstname }} {{
                                                $teacher->lastname }}</option>
                                            @endunless
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary my-2">Add Supervisor</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="container-fluid pt-4 px-4">
                    <div class="bg-secondary rounded-top p-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 text-center text-sm-start">
                                &copy; <a href="#">UCA-DHBW Portail</a>, All Right Reserved.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer End -->
            </div>
            <!-- Content End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>
        <!-- Start Update  Modal -->



        <!-- End Update  Modal -->
        @include('back/confirmation_modal')
        @include('back/logout_confirmation')
        <!-- JavaScript Libraries -->
        <!-- Add these to your layout file -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ url('back/lib/chart/chart.min.js') }}"></script>
        <script src="{{ url('back/lib/easing/easing.min.js') }}"></script>
        <script src="{{ url('back/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ url('back/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ url('back/lib/tempusdominus/js/moment.min.js') }}"></script>
        <script src="{{ url('back/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
        <script src="{{ url('back/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ url('back/js/main.js') }}"></script>
</body>

</html>