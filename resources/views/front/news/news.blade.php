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
                    <h1 class="display-4 text-white animated zoomIn">News</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/news" class="h5 text-white">News</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Search section -->
    @include('front.partials.screen_search')

    <!-- News Section -->
    <div id="results-container" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <!-- News section title -->
                <h1 class="mb-0">News</h1>
            </div>
           
            <div class="row g-5">
                <div class="col-lg-4">
            <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Categories</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#workshop_news"><i class="bi bi-arrow-right me-2"></i>Workshops</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#internship_news"><i class="bi bi-arrow-right me-2"></i>Internships</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#program_news"><i class="bi bi-arrow-right me-2"></i>Programs</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#fablab_news"><i class="bi bi-arrow-right me-2"></i>Achievements</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#project_news"><i class="bi bi-arrow-right me-2"></i>Research Projects</a>
                        </div>
                    </div>
            </div>
                <div class="col-lg-8">
                    <div class="row g-5" id="workshop_news">
                @foreach($latestWorkshops as $workshop)
                    
                <div class="col-md-6 wow slideInUp" >
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{asset('img/latestNews.jpg')}}" alt="">
                            <span class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4">Workshops</span>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ $workshop->updated_at->format('d M, Y') }}</small>
                            </div>
                            <h4 class="mb-3">{{ $workshop->title }}</h4>
                            <p>{{ Str::limit($workshop->description, 100, '...') }}</p>
                            <!-- Read more link -->
                            <a class="text-uppercase" href="{{ route('front.news.showNews', ['slug' => $workshop->slug]) }}">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                    </div>
            </div>
                 
            </div>
            
            <div class="row g-5" id="internship_news">
                @foreach($latestInternships as $internship)
                <div class="col-lg-4 wow slideInUp">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{asset('img/latestNews.jpg')}}" alt="">
                            <span class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4">Internships</span>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ $internship->updated_at->format('d M, Y') }}</small>
                            </div>
                            <h4 class="mb-3">{{ $internship->title }}</h4>
                            <p>{{ Str::limit($internship->description, 100, '...') }}</p>
                            <!-- Read more link -->
                            <a class="text-uppercase" href="{{ route('front.news.showNews', ['slug' => $internship->slug]) }}">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
            
            <div class="row g-5" id="program_news">
                @foreach($latestPrograms as $program)
                <div class="col-lg-4 wow slideInUp">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{asset('img/latestNews.jpg')}}" alt="">
                            <span class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4">Programs</span>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ $program->updated_at->format('d M, Y') }}</small>
                            </div>
                            <h4 class="mb-3">{{ $program->title }}</h4>
                            <p>{{ Str::limit($program->description, 100, '...') }}</p>
                            <!-- Read more link -->
                            <a class="text-uppercase" href="{{ route('front.news.showNews', ['slug' => $program->slug]) }}">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
            
            <div class="row g-5" id="fablab_news">
                @foreach($latestFablabs as $fablab)
                <div class="col-lg-4 wow slideInUp">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{asset('img/latestNews.jpg')}}" alt="">
                            <span class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4">Achievements</span>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ $fablab->updated_at->format('d M, Y') }}</small>
                            </div>
                            <h4 class="mb-3">{{ $fablab->title }}</h4>
                            <p>{{ Str::limit($fablab->description, 100, '...') }}</p>
                            <!-- Read more link -->
                            <a class="text-uppercase" href="{{ route('front.news.showNews', ['slug' => $fablab->slug]) }}">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
            
            <div class="row g-5" id="project_news">
                @foreach($latestProjects as $project)
                <div class="col-lg-4 wow slideInUp">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{asset('img/latestNews.jpg')}}" alt="">
                            <span class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4">Research Projects</span>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ $project->updated_at->format('d M, Y') }}</small>
                            </div>
                            <h4 class="mb-3">{{ $project->title }}</h4>
                            <p>{{ Str::limit($project->description, 100, '...') }}</p>
                            <!-- Read more link -->
                            <a class="text-uppercase" href="{{ route('front.news.showNews', ['slug' => $project->slug]) }}">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
               
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
