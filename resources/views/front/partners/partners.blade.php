<!DOCTYPE html>
<html lang="en">

<!-- head Section -->
@include('front.partials.head')

<body>
    <!-- Loading Spinner-->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>

    <!-- Navbar Section -->
    <div class="container-fluid position-relative p-0">
        @include('front.partials.navbar')

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Partners</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/partners" class="h5 text-white">Partners</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Search Section -->
    @include('front.partials.screen_search')

    <!-- Partners Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Partners</h5>
                <h1 class="mb-0">Meet Our Partners </h1>
            </div>
            <div class="row g-5"  id="results-container">
                <p class="mb-4 p-size">The purpose of this cooperation between these two universities is to collaborate
                    with several companies in different fields to create opportunities for students to explore the
                    professional universe.<br>Working and studying abroad are key elements that can enhance a
                    graduate CV, demonstrating an ability to adapt to different locations and adopt intercultural
                    skills. Thanks to more than 100 agreements that Cadi Ayyad University has signed with several
                    German companies, students can now experience a new way of learning, learning through
                    experimentation.<br>We collaborate with businesses and organisations from all sectors. Our business
                    development team will work with you to match your needs to our academics expertise and manage the
                    contracts and IP, as well as advising on funding opportunities.</p>
                 @foreach($partners as $partner)
                <div class="col-lg-4 col-md-6 col-sm-12 wow slideInUp " data-wow-delay="0.3s" >
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('img/uca_logo.png') }}" alt="">
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small><i class='fa fa-envelope-open' style='color:#800000;'></i>&nbsp;&nbsp;{{ $partner->email_company }}</small>
                            </div>
                            <div class="d-flex mb-3">
                                <small><i class='fas fa-phone' style='color:#800000'></i>&nbsp;&nbsp;{{ $partner->fax }}</small>
                            </div>
                            <h4 class="mb-3">{{ $partner->name_company }}</h4>
                            <p>{{ $partner->description}}</p>
                            <a class="text-uppercase" href="{{ $partner->website }}" target="_blank">Visit Website <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="pagination">
                    {{ $partners->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <div id="results-container" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
               
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    @include('front.partials.footer')

    <!-- Back to Top Button -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <!-- Include Scripts -->
    @include('front.partials.scripts')

    <!-- AJAX script for pagination -->
    @include('front.partials.pagination_script')
</body>

</html>
