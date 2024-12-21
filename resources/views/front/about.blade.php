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

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">About Us</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/about" class="h5 text-white">About Us</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Search section -->
    @include('front.partials.screen_search')

    <!-- About Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">About Us</h5>
                        <h1 class="mb-0">Our Collaborative Journey:<br>Cadi Ayyad University & DHBW</h1>
                    </div>
                    <p class="mb-4">Welcome to Cadi Ayyad University (UCA), in collaboration with Baden-Württemberg Cooperative State University (DHBW). This synergistic partnership exemplifies our commitment to innovation, academic excellence, and global collaboration. Developed by the talented students of Cadi Ayyad University, this website is a testament to our dedication to experiential learning and cross-cultural collaboration. With a rich tapestry of international partnerships, including DHBW, we aim to be a catalyst for positive change, nurturing talents, and shaping the future of education. Join us in exploring our journey, values, and the collective pursuit of knowledge that defines who we are. Together, with DHBW, we make a lasting impact on a global scale.</p>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{asset('img/fsssm.jpg')}}" style="object-fit: contain;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Team Members</h5>
                <h1 class="mb-0">Student Innovators at Cadi Ayyad University</h1>
            </div>
            <div class="row g-5 justify-content-center">
                <!-- Team members loop -->
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <!-- Team member item -->
                    <div class="team-item bg-light rounded overflow-hidden">
                        <!-- Team member image and social links -->
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('img/Maria.jpg')}}" alt="">
                            <div class="team-social">
                                <!-- Social links -->
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="https://www.linkedin.com/in/maria-jaouar-48a276232" target="_blank"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="mailto:mariajaouar195@gmail.com" target="_blank"><i class="fa-regular fa-envelope"></i></a>
                            </div>
                        </div>
                        <!-- Team member information -->
                        <div class="text-center py-4">
                            <h4 class="text-primary">Maria Jaouar</h4>
                            <p class="text-uppercase m-0 p2">ISI Master Student</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <!-- Team member item -->
                    <div class="team-item bg-light rounded overflow-hidden">
                        <!-- Team member image and social links -->
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('img/Badr.png')}}" alt="">
                            <div class="team-social">
                                <!-- Social links -->
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=" https://www.linkedin.com/in/badr-azaou-ba2829211/" target="_blank"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="mailto:azaoubadr@gmail.com" target="_blank"><i class="fa-regular fa-envelope"></i></a>
                            </div>
                        </div>
                        <!-- Team member information -->
                        <div class="text-center py-4">
                            <h4 class="text-primary">Badr Azaou</h4>
                            <p class="text-uppercase m-0 p2">ISI Master Student</p>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row g-5 justify-content-center">
                <!-- Team members loop -->
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <!-- Team member item -->
                    <div class="team-item bg-light rounded overflow-hidden">
                        <!-- Team member image and social links -->
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('img/Haitam.jpeg')}}" alt="">
                            <div class="team-social">
                                <!-- Social links -->
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="https://www.linkedin.com/in/chefira-haitam-0259592a3/" target="_blank"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="mailto:Chefira.haithem@gmail.com" target="_blank"><i class="fa-regular fa-envelope"></i></a>
                            </div>
                        </div>
                        <!-- Team member information -->
                        <div class="text-center py-4">
                            <h4 class="text-primary">Haitam Chefira</h4>
                            <p class="text-uppercase m-0 p2">ISI Master Student</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <!-- Team member item -->
                    <div class="team-item bg-light rounded overflow-hidden">
                        <!-- Team member image and social links -->
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('img/Adil.jpg')}}" alt="">
                            <div class="team-social">
                                <!-- Social links -->
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="https://www.linkedin.com/in/adil-ait-taleb" target="_blank"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="mailto:adilnewlife27@gmail.com" target="_blank"><i class="fa-regular fa-envelope"></i></a>
                            </div>
                        </div>
                        <!-- Team member information -->
                        <div class="text-center py-4">
                            <h4 class="text-primary">Adil Ait Taleb</h4>
                            <p class="text-uppercase m-0 p2">ISI Master Student</p>
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
</body>

</html>
