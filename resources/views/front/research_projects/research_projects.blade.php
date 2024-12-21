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
        <li><div onclick="scrollToSection('research_projects')">RESEARCH PROJECTS</div></li>
        <li><div onclick="scrollToSection('results-container')">AVAILABLE PROJECTS</div></li>
        
        </ul>
    </div>

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

    <!-- Full Screen Search Section -->
    @include('front.partials.screen_search')

    <!-- Research Projects Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="research_projects">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="mb-0">Research Projects</h1>
                    </div>
                    <p class="mb-4">The Research Project scheduled in semester 9 of the 5th year involves a period of practical experience in an academic environment.</p>
                </div>
                <div class="col-lg-5">
                    <div class="position-relative h-100">
                        <img class="w-100 h-100 rounded wow zoomIn img-fluid" data-wow-delay="0.9s" src="{{ asset('img/IMG_0232.JPG') }}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Available Research Projects Section -->
    <div id="results-container" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h1 class="mb-0">Available Research Projects</h1>
        </div>

        @foreach($projects as $project)
        
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-7">
                        <h4 class="mb-3">{{ $project->title }}</h4>
                        <p>{{ Str::limit($project->description, 300, '...') }}</p>
                        <a class="text-uppercase" href="{{ route('front.research_projects.showProjects', ['projects' => $project->slug]) }}">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-5">
                        <div class="position-relative h-100">
                            <img class="rounded wow zoomIn img-fluid" data-wow-delay="0.9s" src="{{ asset('storage/projects/'.$project->image) }}" width="300" height="100">
                        </div>
                    </div>
                </div>
            </div>
        
        @endforeach

        <div class="pagination">
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>

    </div>

    <!-- Footer Section -->
    @include('front.partials.footer')

    <!-- Back to Top Button -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Include Scripts -->
    @include('front.partials.scripts')

    <!-- AJAX script for pagination -->
    @include('front.partials.pagination_script')
    <!-- Quick Navigation Script-->
    @include('front.partials.navigation_script')
</body>

</html>
