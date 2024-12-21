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

<div id="sectionNotification" class="notification3 show">
            <div>Quick Navigation</div>
        <div id="toggleNotificationArrow" onclick="toggleNotification()">
            <i class="fa-solid fa-circle-arrow-left" style="color: #800000; font-size: 28px;"></i>
        </div>
        <ul>
        <li><div onclick="scrollToSection('faculty_and_staff_exchange')">FACULTY&STAFF EXCHANGE</div></li>
        <li><div onclick="scrollToSection('teachers_profiles')">MEET OUR TEACHERS</div></li>
       
        
        </ul>
    </div>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Interchanges</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/faculty_staff_exchange" class="h5 text-white">Faculty and Staff Exchange</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Search Section -->
    @include('front.partials.screen_search')
    <!-- Faculty and Staff Exchange Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="faculty_and_staff_exchange">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Faculty and Staff Exchange</h5>
                <h1 class="mb-0">Faculty Academic Exchange Program </h1>
            </div>
            <div class="row g-5">
                <p class="mb-4 p-size">The faculty exchange program would provide participants with the opportunity to
                    teach or conduct research for one semester or an academic year at an overseas university. Faculty
                    members would benefit from exposure to a culturally varied and diverse faculty makeup, with an
                    opportunity to exchange ideas and observe a variety of styles. The faculty exchange program is one
                    way to take advantage of the benefits of diverse faculty. The ultimate goal of educational
                    institutions is to develop a vibrant and diverse faculty. This process, however, cannot take place
                    overnight. It occurs slowly, one or two faculty members at a time. The need for a rich variety of
                    ideas, cultures, thoughts, and styles, however, is immediate. In order to facilitate the process,
                    University Cadi Ayyad can develop plans for a faculty exchange program. The benefit will be
                    immediate, and students will have the opportunity to learn concepts and ideas presented in an
                    entirely new and different manner. This cooperation between UCA & DHBW presents a unique opportunity
                    for interaction between UCA’s and DHBW’s students and staff. They will create a greater bond among
                    the concerned institutions and will be a powerful recruitment and retention tool.</p>
                <div class="row g-5 justify-content-center">
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div
                            class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="service-icon">
                                <i class='fa-solid fa-1' style='color: white'></i>
                            </div>
                            <p class="m-0">Both institutions promote staff and faculty participation in exchange
                                activities. Mutual approval is required for all exchanges between the host and home
                                institutions.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                        <div
                            class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="service-icon">
                                <i class='fa-solid fa-2' style='color: white'></i>
                            </div>
                            <p class="m-0">Applicants for participation in the exchange will be selected by the home
                                institution and will be subject to acceptance by the host institution.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                        <div
                            class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="service-icon">
                                <i class='fa-solid fa-3' style='color: white'></i>
                            </div>
                            <p class="m-0">Exchange terms, covering finances, insurance, housing, and more, will be
                                agreed upon by both parties before the commencement of faculty and staff exchanges.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div
                            class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="service-icon">
                                <i class='fa-solid fa-4' style='color: white'></i>
                            </div>
                            <p class="m-0">Exchange duration aligns with its purpose. Faculty and staff exchanges adhere
                                to host institution rules, determining the appropriate duration as per established
                                practices.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                        <div
                            class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="service-icon">
                                <i class='fa-solid fa-5' style='color: white'></i>
                            </div>
                            <p class="m-0">Each institution will be responsible for their own costs for the
                                implementation of the above arrangements unless mutually and formally agreed otherwise
                                in written form.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Refine Search Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="teachers_profiles">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">MEET OUR TEACHERS</h5>
                <h1 class="mb-0">Exchange Teachers Profiles</h1>
            </div>
            <div class="col-lg-7">
                <h5 class="fw-bold text-primary text-uppercase">Refine your Search</h5>
                <div class="box">
                    <!-- Filter Form -->
                    <form id="filter-form" method="GET" class="d-flex">
                        <select name="university" class="form-select me-2">
                            <option disabled selected>University</option>
                            @foreach($universities as $optionUniversity)
                            <option value="{{ $optionUniversity }}" {{ $university==$optionUniversity ? 'selected' : ''
                                }}>
                                {{ $optionUniversity }}
                            </option>
                            @endforeach
                        </select>
                        <button id="apply-filters" type="submit"
                            class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Apply Filters</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="results-container" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <!-- Display filtered teachers -->
                    @if (isset($filteredTeachers))
                    <center>
                        <h2 class="fw-bold text-primary text-uppercase">Filtered Teachers for {{ $university }}</h2>
                    </center>
                    <div id="results" class="box_filter mt-3 text-center">
                        @if($filteredTeachers->isEmpty())
                        <p>No Teachers found for the university.</p>
                        @else
                        <div class="row g-5">
                            @foreach ($filteredTeachers as $teacher)
                            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                                <div class="team-item bg-light rounded overflow-hidden">
                                    <div class="team-img position-relative overflow-hidden">
                                        <img class="img-fluid w-100"
                                            src="{{ asset('storage/teachers/'.$teacher->photo) }}" alt="">
                                    </div>
                                    <div class="text-center py-4">
                                        <h4 class="text-primary">{{$teacher->firstname}} {{$teacher->lastname}}</h4>
                                        <p class="text-uppercase m-0"><i class='fas fa-chalkboard-teacher'
                                                style='color:#800000'></i>&nbsp;{{$teacher->speciality}}</p>
                                        <p class="text-uppercase m-0"><i class='fas fa-passport'
                                                style='color:#800000'></i>&nbsp;{{$teacher->nationnality}}</p>
                                        <p class="text-uppercase m-0"><i class='fas fa-envelope-open'
                                                style='color:#800000'></i>&nbsp;{{$teacher->email}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="pagination">
                        {{ $filteredTeachers->appends(['university' => $university])->links('pagination::bootstrap-5')
                        }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    @include('front.partials.footer')

    <!-- Back to Top Button -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Include scripts -->
    @include('front.partials.scripts')

    <!-- AJAX script for form submission and pagination -->
    @include('front.partials.form_script')
    
    <!-- Quick Navigation Script-->
    @include('front.partials.navigation_script')
</body>

</html>