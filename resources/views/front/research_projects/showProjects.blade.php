<!DOCTYPE html>
<html lang="en">
    
    <!-- head Start -->
    @include('front.partials.head')
    <!-- head End -->


<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    

    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        @include('front.partials.navbar')

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Research Projects</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/research_projects" class="h5 text-white">Research Projects</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    @include('front.partials.screen_search')
    <!-- Full Screen Search End -->


    <!-- Features Start -->
       
     <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Research Projects</h5>
                        <h1 class="mb-0">{{ $projects->title }}</h1>
                    </div>
                    <p class="mb-4">{{ $projects->description }}</p>
                    
                    
                </div>
                <div class="col-lg-5">
                                            <div class="position-relative h-100">
                                                <img class=" w-100 h-100 rounded wow zoomIn img-fluid" data-wow-delay="0.9s" src="{{ asset('storage/projects/'.$projects->image) }}" style="object-fit: contain;">
                                            </div>
                                        </div>
            </div>
        </div>
    </div>
    

    
    
       
    <!-- Features Start -->



    
    

    <!-- Footer Start -->
    @include('front.partials.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="{{asset('https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
   <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
   <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
   <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
   <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Import custom scripts -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/navbar.js') }}"></script>
    
</body>

</html>
