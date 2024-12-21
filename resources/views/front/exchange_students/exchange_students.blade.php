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
        <li><div onclick="scrollToSection('students_exchange')">STUDENTS EXCHANGE</div></li>
        <li><div onclick="scrollToSection('incoming_exchange_students')">INCOMING EXCHANGE</div></li>
        <li><div onclick="navigateToPage('/students_profiles')">STUDENTS PROFILES</div></li>
        
        </ul>
    </div>

    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
      <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
          <h1 class="display-4 text-white animated zoomIn">Interchanges</h1>
          <a href="/" class="h5 text-white">Home</a>
          <i class="far fa-circle text-white px-2"></i>
          <a href="/exchange_students" class="h5 text-white">Exchange Students</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Full Screen Search Section -->
  @include('front.partials.screen_search')

  <!-- Exchange Students Section -->
  <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="students_exchange">
      
    <div class="container py-5" >
        <div class="row g-5">
            
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
        <h1 class="mb-0">Students Exchange </h1>
      </div>
            <p class="mb-4 p-size">Welcome to the Exchange Students Program, a collaborative initiative between Cadi Ayyad University (UCA) and Baden-Württemberg Cooperative State University (DHBW). Immerse yourself in a global experience that transcends borders, embraces cultural diversity, and elevates your academic journey.</p>
        
        
        
      </div>
      <div class="row g-5" >
        
        <div class="col-lg-7">
          <h5 class="fw-bold text-primary text-uppercase">What is the applicant exchange?</h5>
          <p class="mb-4">For the purpose of this agreement, between University Cadi Ayyad & Duale Hochschule Baden-Württemberg, “Exchange Students” are students who may study at the host institution and/or complete an internship or project for one semester or one academic year. They will be classified as exchange students and will not be eligible for degree status at the host institution unless previously agreed by both institutions. The “Exchange Program” is the program pursuant to this agreement.</p>
          <h5 class="fw-bold text-primary text-uppercase">What is a Home institution ?</h5>
          <p class="mb-4 p-size">Home institution means the institution at which a student intends to graduate</p>
          <h5 class="fw-bold text-primary text-uppercase">What is a host institution ?</h5>
          <p class="mb-4 p-size">Host institution means the institution that has agreed to accept the student from the home institution.</p>
        </div>
        <div class="col-lg-5" style="min-height: 500px;">
          <div class="position-relative h-100">
            <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{asset('img/IMG_0818.JPG')}}" style="object-fit: cover;">
          </div>
        </div>
      </div>
    </div>
      <div class="container py-5">
      <div class="row g-5">
        <div class="col-lg-7">
          <h5 class="fw-bold text-primary text-uppercase">How does the applicant exchange work?</h5>
          <p class="mb-4 p-size">Applicants for participation in the exchange program will be selected according to criteria established by the home and the host institution. These applicants will be selected by the home institution and subject to final acceptance by the host institution.</p>
          <h5 class="fw-bold text-primary text-uppercase">Who can come to the host institution as an exchange student?</h5>
          <p class="mb-4 p-size">To come to the host institution as an exchange student, your home university must have a formal agreement for exchange studies with it. All exchange students must be registered and must remain enrolled as full-time degree-seeking at the home institution as a condition of acceptance into the exchange program. Exchange students must be in good academic standing before participating in the exchange program. Students are eligible to participate if they have satisfied any language proficiency requirements of the host institution.</p>
        </div>
        <div class="col-lg-5" style="min-height: 500px;">
          <div class="position-relative h-100">
            <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{asset('img/IMG_0705.jpg')}}" style="object-fit: cover;">
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Incoming Exchange Section -->
  <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="incoming_exchange_students">
    <div class="container py-5">
      <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
        <h1 class="mb-0">Incoming Exchange Students</h1>
      </div>
      <div class="row g-5 justify-content-center">
        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
          <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
            <div class="service-icon">
              <i class='fas fa-hospital' style='color: white'></i>
            </div>
            <p class="m-0">All students must carry adequate health, emergency evacuation, and repatriation insurance coverage to the satisfaction of the host institution.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
          <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
            <div class="service-icon">
              <i class='fas fa-money-check-alt' style='color: white'></i>
            </div>
            <p class="m-0">Exchange program participants are exempt from tuition fees at the host institution and will pay tuition to their home institution following its policies.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
          <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
            <div class="service-icon">
              <i class='fas fa-plane' style='color: white'></i>
            </div>
            <p class="m-0">Exchange students cover all travel expenses, including transportation, housing, academic materials, personal costs, orientation fees, and passport/visa applications...</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
          <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
            <div class="service-icon">
              <i class='fas fa-th-list' style='color: white'></i>
            </div>
            <p class="m-0">Exchange students will be subject to the rules and regulations of the host institution and the laws of the host country.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
          <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
            <div class="service-icon">
              <i class='fas fa-hands-helping' style='color: white'></i>
            </div>
            <p class="m-0">The host institution will make every effort to facilitate the integration of exchange students into the student life of the host institution.</p>
          </div>
        </div>
      </div>
    </div>
    <a href="/students_profiles" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">View Available Exchange Students Profiles</a>
  </div>

  <!-- Footer Section -->
  @include('front.partials.footer')

  <!-- Back to Top Button -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

  <!-- Include Scripts -->
  @include('front.partials.scripts')
    
    <!-- Quick Navigation Script-->
    @include('front.partials.navigation_script')
</body>

</html>
