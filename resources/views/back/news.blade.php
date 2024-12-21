<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UCA-DHBW Portail/ Partners</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="back/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="back/css/style.css" rel="stylesheet">
    
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{session('user')["name"]}}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('dashboard') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ route('students') }}" class="nav-item nav-link"><i class="fa-solid fa-graduation-cap me-2"></i>Students</a>
                    <a href="{{ route('teachers') }}" class="nav-item nav-link"><i class="fa-solid fa-chalkboard-user me-2"></i>Teachers</a>
                    <a href="{{ route('exchanges') }}" class="nav-item nav-link"><i class="fa-solid fa-arrow-right-arrow-left me-2"></i>Exchanges</a>
                    <a href="{{ route('partners') }}" class="nav-item nav-link active"><i class="fa-solid fa-arrow-right-arrow-left mx-3"></i>Partners</a>
                    <a href="{{ route('internships') }}" class="nav-item nav-link"><i class="fa-solid fa-laptop-file me-2"></i>Internships</a>
                    <a href="{{ route('workshops') }}" class="nav-item nav-link "><i class="fa-solid fa-laptop-file me-2"></i>Workshops</a>
                    <a href="{{ route('projects') }}" class="nav-item nav-link"><i class="fa-solid fa-diagram-project me-2"></i>Projects</a>
                    <a href="{{ route('fablabs') }}" class="nav-item nav-link"><i class="fa-solid fa-group-arrows-rotate me-2"></i>Fablabs</a>
                    <a href="{{ route('programs') }}" class="nav-item nav-link"><i class="fa-solid fa-list me-2"></i>Programs</a>
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
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
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
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <h2 class="col-10">Partners</h2>
                    <div class="col-2">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_input">
                            <i class="fa-solid fa-plus text mt-1 fs-5"></i>
                            Add partner
                        </button>
                    </div>
                </div>
                <!-- Add New Student Modal -->
                <div class="modal fade" tabindex="-1" role="dialog" id="modal_input" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTeacherModalLabel" style="color:black;">Add partner</h5>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <!-- Your form goes here -->
                                <form action="{{ route('partners.add') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger text-light">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <span>{{ $error }}</span> <br>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name_company">Company name</label>
                                                <input type="text" class="form-control" style="background-color:#ffffff;" id="name_company" name="name_company" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="function_company">Company function</label>
                                                <input type="text" class="form-control" style="background-color:#ffffff;" id="function_company" name="function_company" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" class="form-control" style="background-color:#ffffff;" id="description" name="description" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="adress">Adress</label>
                                                <input type="text" class="form-control" style="background-color:#ffffff;" id="adress" name="adress" required>
                                            </div>


                                        </div>

                                        <div class="col-md-6">
                                        <div class="form-group">
                                                <label for="email_company">Company email</label>
                                                <input type="email" class="form-control" style="background-color:#ffffff;" id="email_company" name="email_company" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="website">Website</label>
                                                <input type="text" class="form-control" style="background-color:#ffffff;" id="website" name="website" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="fax">fax</label>
                                                <input type="text" class="form-control" style="background-color:#ffffff;" id="fax" name="fax" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="logo">Logo</label>
                                                <input type="file" class="form-control" id="logo" name="logo">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="close btn btn-danger float-end mt-3"  data-dismiss="modal" style="margin-left:10px !important;">Cancel</button>
                                    <button type="submit" class="btn btn-success float-end mt-3">Add partner</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!-- Table for Students -->
                <table class="table my-4">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>ID</th>
                            <th>Company name</th>
                            <th>Company function</th>
                            <th>Description</th>
                            <th>Adress</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Fax</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($partners as $partner)
                                <tr id={{$partner->id }}>
                                    <td>
                                        @if($partner->logo)
                                        <img src="{{  url('storage/partners/'.$partner->logo)}}" alt="Partner Logo" class="rounded-circle" style="width: 70px; height: 70px;">
                                        @else
                                            No logo
                                        @endif
                                    </td>
                                    <td>{{ $partner->id }}</td>
                                    <td>{{ $partner->name_company}}</td>
                                    <td>{{ $partner->function_company }}</td>
                                    <td>{{ $partner->description}}</td>
                                    <td>{{ $partner->adress}}</td>
                                    <td>{{ $partner->email_company}}</td>
                                    <td>{{ $partner->website}}</td>
                                    <td>{{ $partner->fax}}</td>
                                    
                                    <td>
                                        <div class="d-inline">

                                        
                                            <a href="#" class="d-inline">
                                                <button type="button" class="btn-sm btn-danger" onclick="show_confirmation_message('Are you sure you want to delete this partner ?',{{$partner->id}})">
                                                    <i class="fa-solid fa-trash mx-1 fs-5"></i>
                                                </button>
                                            </a>
                                            <a href="route" hidden>
                                                <form action="{{ route('partners.destroy', $partner->id) }}" method="post" style="display: inline-block; width: auto;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn-sm btn-danger" id="delete_confirm_{{$partner->id}}">Delete</button>
                                                </form>
                                            </a>
                                        </div>
                                        <div class="d-inline">
                                            <a href="#" class="d-inline">
                                                <button type="button" class=" btn-sm btn-warning" onclick="openUpdateModal({{$partner->id}})">
                                                    <i class="bi bi-pencil-fill "></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>

            </div>


            <!-- Footer Start -->
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
                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addTeacherModalLabel" style="color:black;">Update exchange</h5>
                                </div>
                                    <div class="modal-body">
                                        <form action="{{ route('partners.update',1) }}" method="POST" enctype="multipart/form-data" id="update_form">
                                            @csrf
                                            @method('PUT')
                                            @if ($errors->any())
                                                <div class="alert alert-danger text-light ">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <span>{{ $error }}</span> <br>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <!-- row goes here -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name_company">Company name</label>
                                                        <input type="text" class="form-control" style="background-color:#ffffff;" id="name_company_update" name="name_company" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="function_company">Company function</label>
                                                        <input type="text" class="form-control" style="background-color:#ffffff;" id="function_company_update" name="function_company" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <input type="text" class="form-control" style="background-color:#ffffff;" id="description_update" name="description" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="adress">Adress</label>
                                                        <input type="text" class="form-control" style="background-color:#ffffff;" id="adress_update" name="adress" required>
                                                    </div>


                                                </div>

                                                <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="email_company">Company email</label>
                                                        <input type="email" class="form-control" style="background-color:#ffffff;" id="email_company_update" name="email_company" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="website">Website</label>
                                                        <input type="text" class="form-control" style="background-color:#ffffff;" id="website_update" name="website" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fax">fax</label>
                                                        <input type="text" class="form-control" style="background-color:#ffffff;" id="fax_update" name="fax" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="logo">Logo</label>
                                                        <input type="file" class="form-control" id="logo_update" name="logo">
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="close btn btn-danger float-end mt-3"  id="s" data-dismiss="modal" style="margin-left:10px !important;">Cancel</button>
                                            <button type="submit" class="btn btn-warning float-end mt-3">Update partner</button>
                                            <!-- end row-->
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
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
    <script src="back/lib/chart/chart.min.js"></script>
    <script src="back/lib/easing/easing.min.js"></script>
    <script src="back/lib/waypoints/waypoints.min.js"></script>
    <script src="back/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="back/lib/tempusdominus/js/moment.min.js"></script>
    <script src="back/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="back/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="back/js/main.js"></script>
    <script>
        function openUpdateModal(partnerId) {
            // Find the table row with the corresponding partnerId
            let tableRow =  $("#" + partnerId);

            // Extract data from the table row
            let partnerData = {
                name_company: tableRow.find("td:eq(2)").text(),
                function_company: tableRow.find("td:eq(3)").text(),
                description: tableRow.find("td:eq(4)").text(),
                adress: tableRow.find("td:eq(5)").text(),
                email_company: tableRow.find("td:eq(6)").text(),
                website: tableRow.find("td:eq(7)").text(),
                fax: tableRow.find("td:eq(8)").text(),
                // Add other fields as needed
            };

            let form=document.getElementById("update_form");
            let action= form.getAttribute("action");
            form.setAttribute("action",action.substring(0, action.lastIndexOf("/"))+"/"+partnerId);

            // Update modal fields
            $("#name_company_update").val(partnerData.name_company);
            $("#function_company_update").val(partnerData.function_company);
            $("#description_update").val(partnerData.description);
            $("#adress_update").val(partnerData.adress);
            $("#email_company_update").val(partnerData.email_company);
            $("#website_update").val(partnerData.website);
            $("#fax_update").val(partnerData.fax);

            // Open the modal
            $("#updateModal").modal("show");
        }
    </script>
</body>

</html>