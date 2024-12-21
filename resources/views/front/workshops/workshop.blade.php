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

<div id="sectionNotification" class="notification5 show">
            <div>Quick Navigation</div>
        <div id="toggleNotificationArrow" onclick="toggleNotification()">
            <i class="fa-solid fa-circle-arrow-left" style="color: #800000; font-size: 28px;"></i>
        </div>
        <ul>
        <li><div onclick="scrollToSection('workshops')">WORKSHOPS</div></li>
        <li><div onclick="scrollToSection('refine_search')">FILTER WORKSHOPS</div></li>
        
        </ul>
    </div>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Workshops</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/workshop" class="h5 text-white">Workshops</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Search Section -->
    @include('front.partials.screen_search')

    <!-- Workshops Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="workshops">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="mb-0">Workshops</h1>
                    </div>
                    <p class="mb-4">These seminars aim to bring together students and teachers in various fields around the study of concrete cases in the context of a collaboration between the UCA and the DHBW. Conferences and support from the UCA and DHBW teams provided the data needed to carry out the seminar.</p>
                </div>
                <div class="col-lg-5">
                    <div class="position-relative">
                        <img class="w-100 h-100 rounded wow zoomIn img-fluid" data-wow-delay="0.9s" src="{{ asset('img/IMG_0701.JPG') }}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Refine Search Section -->
    <div class="container py-5" id="refine_search">
        <div class="col-lg-7">
            <h5 class="fw-bold text-primary text-uppercase">Refine your Search</h5>
            <div class="box">
                <!-- Filter Form -->
                <form id="filter-form" class="d-flex">

                    <select name="year" class="form-select me-2">
                        <option disabled selected>Year</option>
                        @foreach($years as $optionYear)
                        <option value="{{ $optionYear }}" {{ $year == $optionYear ? 'selected' : '' }}>
                            {{ $optionYear }}
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
                <!-- Display filtered workshops -->
                @if (isset($filteredWorkshops))
                <div class="col-12">
                    <center><h2 class="fw-bold text-primary text-uppercase">Filtered Workshops for {{ $year }}</h2></center>
                    <div class="box_filter mt-3 text-center">
                        @if($filteredWorkshops->isEmpty())
                        <p>No workshops found for the selected year.</p>
                        @else
                        <div class="workshops-container justify-content-center">
                            @foreach ($filteredWorkshops as $workshop)
                            <div class="workshop-item border p-3 mb-3 mx-2 d-flex flex-column flex-md-row">
                                <div class="col-lg-5 order-md-2">
                                    <div class="position-relative">
                                        <img class="w-100 h-100 rounded wow zoomIn img-fluid" data-wow-delay="0.9s" src="{{ asset('storage/workshops/'.$workshop->image) }}" style="object-fit: contain;">
                                    </div>
                                </div>
                                <div class="col-lg-7 order-md-1">
                                    <h3>{{ $workshop->title }}</h3>
                                    <br>
                                    <i class="far fa-calendar-alt text-primary me-2"></i>{{date('M d, Y', strtotime($workshop->date_start))}} - {{date('M d, Y', strtotime($workshop->date_end)) }}
                                    <br>
                                    <i class='fas fa-university' style='color:#800000'></i>&nbsp;&nbsp;{{ $workshop->university }}<br><br>
                                    <!-- <h6 class="text-primary text-uppercase" style="display: inline;">OBJECTIVE : </h6>{{$workshop->objective}}<br><br> -->
                                    <div>
                                        <h6 data-bs-toggle="collapse" data-bs-target="#workshopDescription{{$workshop->id}}" aria-expanded="false" aria-controls="workshopDescription{{$workshop->id}}" class="text-primary text-uppercase" style="cursor: pointer;">
        DESCRIPTION
    </h6>
    <div id="workshopDescription{{$workshop->id}}" class="collapse" style="text-align : justify; margin : 20px;">
        <!-- Content to be collapsed -->
        {{ $workshop->description }}
    </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="pagination">
            {{ $filteredWorkshops->appends(['year' => $year])->links('pagination::bootstrap-5') }}
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
