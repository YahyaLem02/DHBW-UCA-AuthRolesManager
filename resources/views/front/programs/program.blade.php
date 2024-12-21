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

<div id="sectionNotification" class="notification2 show">
            <div>Quick Navigation</div>
        <div id="toggleNotificationArrow" onclick="toggleNotification()">
            <i class="fa-solid fa-circle-arrow-left" style="color: #800000; font-size: 28px;"></i>
        </div>
        <ul>
        <li><div onclick="scrollToSection('programs')">PROGRAMS</div></li>
        <li><div onclick="navigateToPage('/academic_programs')">ACADEMIC PROGRAMS</div></li>
        <li><div onclick="navigateToPage('/cultural_programs')">CULTURAL PROGRAMS</div></li>
        </ul>
    </div>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Programs</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/program" class="h5 text-white">Programs</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Search Section -->
    @include('front.partials.screen_search')

    <!-- Programs Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="programs">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="mb-0">Programs</h1>
                    </div>
                    <p class="mb-4">The purpose of this cooperation between University Cadi Ayyad (UCA) & Duale Hochschule Baden-Württemberg (DHBW) is to match faculty members from both universities member institutions who will collaborate in the partial design and teaching of a course. Each professor will be expected to travel (if conditions due to the COVID-19 pandemic allow for it) to the partner institution, for a period that will be determined by the purpose of the exchange, during the winter or the spring semester (between January and June). In that week the professor will teach a class, meet with other faculty members in order to discuss future potential projects, give an open lecture to the community, etc. Professors are also expected to organize a virtual activity to give their students the opportunity to collaborate.<br>
                    The faculty exchange program is one way to take advantage of the benefits of diverse faculty. Ultimate goal of educational institutions is to develop a vibrant and diverse faculty. The faculty exchange programs present a unique opportunity for interaction between Foreign universities and University Cadi Ayyad. They will create a greater bond among the concerned institutions and will be a powerful recruitment and retention tool.<br>
                    This partnership also includes a cultural exchange program whose goal is to promote respect and deepening understanding for other cultures while strengthening relations. The more people learn to cooperate and collaborate there is mutual understanding of each other s way of life which then translates to promotion of international friendship and goodwill.</p>
                    <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="h5 mb-md-4 animated  zoomIn fw-semi-bold bg-light rounded py-2" href="/academic_programs"><i class="bi bi-arrow-right me-2"></i>Academic Programs</a>
                            <a class="h5 mb-md-4 animated  zoomIn fw-semi-bold bg-light rounded py-2" href="/cultural_programs"><i class="bi bi-arrow-right me-2"></i>Cultural Programs</a>
                            
                        </div>
                </div>
                <div class="col-lg-5">
                    <div class="position-relative h-100">
                        <img class="w-100 h-100 rounded wow zoomIn img-fluid" data-wow-delay="0.9s" src="{{ asset('img/flag.jpg') }}" style="object-fit: contain;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    @include('front.partials.footer')

    <!-- Back to Top Button-->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Include scripts -->
    @include('front.partials.scripts')
                    
    <!-- Quick Navigation Script-->
    @include('front.partials.navigation_script')
</body>

</html>
