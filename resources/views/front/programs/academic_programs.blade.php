<!DOCTYPE html>
<html lang="en">

<!-- head Section -->
@include('front.partials.head')

<body>

    <!-- Loading Spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>

    <!-- Navbar Section -->
    <div class="container-fluid position-relative p-0">
        @include('front.partials.navbar')

<div id="sectionNotification" class="notification6 show">
            <div>Quick Navigation</div>
        <div id="toggleNotificationArrow" onclick="toggleNotification()">
            <i class="fa-solid fa-circle-arrow-left" style="color: #800000; font-size: 28px;"></i>
        </div>
        <ul>
        <li><div onclick="scrollToSection('academic_programs')">ACADEMIC PROGRAMS</div></li>
        <li><div onclick="scrollToSection('refine_search')">FILTER ACADEMIC PROGRAMS</div></li>
        
        </ul>
    </div>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Programs</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/academic_programs" class="h5 text-white">Academic Programs</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Search Section -->
    @include('front.partials.screen_search')

    <!-- Academic Programs Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="academic_programs">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="mb-0">Academic Programs</h1>
                    </div>
                    <p>At the heart of the cooperation between UCA & DHBW, there is a commitment to foster academic cooperation and exchange, thus enriching the academic curricula and our common understanding of human rights and the associated global challenges.The exchange of professors among our member universities has been one of our flagship activities since the establishment of the network.These programs are mutual, inter-institutional arrangements through which the proficiency and services of one institute's faculty are exchanged with the other institution for time-limited periods. The primary aim of an academic exchange program is to provide the opportunity for the exchanged personnel to serve as employees of the host institution, to encourage professional development through the stimulus of a different setting, and for the host organizations to benefit from the knowledge and skills of the exchanged personnel. It assists in the transformative internationalization of the university.</p>
                </div>
                <div class="col-lg-5">
                    <div class="position-relative h-100">
                        <img class="w-100 h-100 rounded wow zoomIn img-fluid" data-wow-delay="0.9s" src="{{ asset('img/UCA.jpg') }}" style="object-fit: contain;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <p>These faculty exchange programs in most cases international faculty exchange lead to some benefits that accrue to the organization like:</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Invigoration of school faculty by the addition of new colleagues directly involved in the similar practice arena.</p>
                    <p class="mb-3"><i class="fa fa-check text-primary me-3"></i>Creation of new opportunities for future school-agency collaboration on research, special projects and practicals.</p>
                    <p class="mb-3"><i class="fa fa-check text-primary me-3"></i>Acquisition or update of practice experience which can inform faculty teaching and research.</p>
                </div>
                <div class="col-lg-5">
                    <div class="position-relative h-100">
                        <img class="w-100 h-100 rounded wow zoomIn img-fluid" data-wow-delay="0.9s" src="{{ asset('img/DHBW.jpg') }}" style="object-fit: cover; ">
                    </div>
                </div>
            </div><br>
        </div>
    </div>

    <!-- Refine Search Section -->
    <div class="container py-5" id="refine_search">
        <div class="col-lg-7">
            <h5 class="fw-bold text-primary text-uppercase">Refine your Search</h5>
            <div class="box">
                <!-- Filter Form -->
                <form id="filter-form" method="GET" class="d-flex">
                    <select name="title" class="form-select me-2">
                        <option disabled selected>Title</option>
                        @foreach($titles as $optionTitle)
                        <option value="{{ $optionTitle }}" {{ $title == $optionTitle ? 'selected' : '' }}>
                            {{ $optionTitle }}
                        </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Apply Filters</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Results Section -->
    <div id="results-container" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Display filtered programs -->
                @if (isset($filteredPrograms))
                <div class="col-12">
                    <center><h2 class="fw-bold text-primary text-uppercase">Filtered Programs for {{ $title }}</h2></center>
                    <div class="box_filter mt-3 text-center">
                        @if($filteredPrograms->isEmpty())
                        <p>No Academic Programs found for the selected title.</p>
                        @else
                        <div class="workshops-container justify-content-center">
                            @foreach ($filteredPrograms as $program)
                            <div class="workshop-item border p-3 mb-3 mx-2 d-flex flex-column flex-md-row">
                                <div class="col-lg-5 order-md-2">
                                    <div class="position-relative h-100">
                                        <img class="w-100 h-100 rounded wow zoomIn img-fluid" data-wow-delay="0.9s" src="{{ asset('storage/programs/'.$program->image_program) }}" style="object-fit: contain;">
                                    </div>
                                </div>
                                <div class="col-lg-7 order-md-1">
                                    <h3>{{ $program->title }}</h3>
                                    <br>
                                    <i class="far fa-calendar-alt text-primary me-2"></i>{{ $program->updated_at->format('d M, Y') }}
                                    <br>
                                    <i class='fas fa-clock' style='color:#800000'></i>&nbsp;&nbsp;{{ $program->NB_hours }} Hours<br><br>
                                    <h6 data-bs-toggle="collapse" data-bs-target="#workshopDescription{{$program->id}}" aria-expanded="false" aria-controls="workshopDescription{{$program->id}}" class="text-primary text-uppercase" style="cursor: pointer;">
        DESCRIPTION
    </h6>
    <div id="workshopDescription{{$program->id}}" class="collapse" style="text-align : justify; margin : 20px;">
        <!-- Content to be collapsed -->
        {{ $program->description }}
    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
    <div class="pagination">
            {{ $filteredPrograms->appends(['title' => $title])->links('pagination::bootstrap-5') }}
        </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    @include('front.partials.footer')

    <!-- Back to Top Button-->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Include scripts -->
    @include('front.partials.scripts')

    <!-- AJAX script for form submission and pagination -->
    @include('front.partials.form_script')
    
    <!-- Quick Navigation Script-->
    @include('front.partials.navigation_script')
</body>

</html>
