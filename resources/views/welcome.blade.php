<<!DOCTYPE html>
<html lang="@lang('en')">

<head>
    <meta charset="utf-8">
    <title>Give A Hand</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="/landing/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/landing/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/landing/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/landing/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/landing/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">@lang('Loading...')</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
    <img src="https://i.ibb.co/W6mqRHM/Community-service-1.png" alt="Logo" width="100px" height="70px" class="me-2">

        <h1 class="m-0 text-primary">Give A Hand</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.html" class="nav-item nav-link active">@lang('Home')</a>

            <a href="{{ route('login') }}" class="nav-item nav-link">@lang('Login')</a>

           
            <!-- Language Dropdown -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img width="30px" src="@if(session('locale') == 'ar') https://i.ibb.co/n3Q2QFY/saudi-arabia.png @else https://i.ibb.co/ZzDYXGn/united-kingdom.png @endif" alt="@lang('Language')">
                </a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="/lang/ar" class="dropdown-item">@lang('Arabic')</a>
                    <a href="/lang/en" class="dropdown-item">@lang('English')</a>
                </div>
            </div>
            <!-- Language Dropdown End -->
        </div>
        <a href="{{ route('register') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">@lang('Join us')<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->



       <!-- Carousel Start -->
<div class="container-fluid p-0">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img src="https://i.ibb.co/Z8GSZPf/Ssa.png" alt="@lang('Ssa')" style="height: 800px;" />
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">@lang('Join the 10K Volunteers Initiative')</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">@lang('Volunteerism is the lifeblood of vibrant communities, pivotal in harnessing societal energy and enhancing the nation through the contributions and efforts of its people. The volunteer platform offers you the opportunity to engage in service at a location, time, and area that align with your skills and knowledge. Additionally, the platform enables you to record your volunteering hours and obtain official certificates for your contributions. Embrace the 2030 vision of the Kingdom by becoming one of the million volunteers making a difference.')</p>
                            <a href="{{ route('login') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">@lang('Search for Volunteer Opportunity')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img src="https://i.ibb.co/80np57H/Screenshot-4.png" alt="@lang('Screenshot-4')" style="height: 800px;" />
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                    <div class="col-10 col-lg-8">
                    <h1 class="display-3 text-white animated slideInDown mb-4">@lang('Connect with Opportunities at Give A Hands')</h1>
                    <p class="fs-5 fw-medium text-white mb-4 pb-2">@lang('Join a community where giving and receiving help uplifts everyone. Whether youre looking to volunteer your skills or find assistance for your cause.')</p>

                    <a href="{{ route('register') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">@lang('Register Now')</a>
                    <a href="{{ route('login') }}" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">@lang('Login')</a>
                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->




<!-- Search Start --> 
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row g-2">
            <div class="col-md-10">
               
            </div>
           
        </div>
    </div>
</div>
<!-- Search End -->


<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">@lang('Statistics')</h1>
        <div class="row g-4">
            
        
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
        <a class="cat-item rounded p-4" >
            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
            <h6 class="mb-3">@lang('Volunteers')</h6>
            <p class="mb-0">{{ \App\Models\User::where('type', 0)->count() }} @lang('Volunteer')</p>
        </a>
    </div>


            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item rounded p-4" >
                <i class="fas fa-3x fa-building text-primary mb-4"></i>
                    <h6 class="mb-3">@lang('Organizations')</h6>
                    <p class="mb-0">{{ \App\Models\User::where('type', 1)->count() }} @lang('Organization')</p>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item rounded p-4">
                    <i class="far fa-3x fa-clock text-primary mb-4"></i>
                    <h6 class="mb-3">@lang('Volunteering Hours')</h6>
                    <p class="mb-0">{{ \App\Models\User::where('type', 0)->sum('volunteer_hours') }} @lang('Hours')</p>
                </a>
            </div>


            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4">
                    <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                    <h6 class="mb-3">@lang('Overall Volunteer Participation')</h6>
                    <p class="mb-0">{{ \App\Models\Application::count() }} @lang('Participation')</p>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Category End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-0 about-bg rounded overflow-hidden">
                <img src="https://i.ibb.co/W6mqRHM/Community-service-1.png" alt="Community-service-1" border="0" />                              
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">@lang('Connecting Passion with Purpose')</h1>
                <p class="mb-4">"Give-A-Hand @lang('links enthusiastic volunteers with opportunities that resonate, transforming goodwill into real-world impact.')</p>
                <ul>
                    <li><i class="fa fa-check text-primary me-3"></i>@lang('Direct matches to make every effort count')</li>
                    <li><i class="fa fa-check text-primary me-3"></i>@lang('Streamlined communication to keep everyone on the same page')</li>
                    <li><i class="fa fa-check text-primary me-3"></i>@lang('Track achievements and witness the difference you make')</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Opportunity Listing Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">@lang('Opportunity Listing')</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <!-- Tab panes for displaying opportunities -->
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <!-- Dynamic Opportunity Items Start -->
                    @foreach($opportunities->take(5) as $opportunity)
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <!-- Opportunity Image -->
                                @if ($opportunity->image)
                                <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('storage/' . $opportunity->image) }}" alt="@lang('Opportunity Image')" style="width: 80px; height: 80px;">
                                @endif
                                <!-- Opportunity Details -->
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">{{ $opportunity->event_name }}</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $opportunity->location }}</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $opportunity->volunteer_hours }}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-primary" href="{{ route('login') }}">@lang('Apply Now')</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>@lang('Date Line'): {{ $opportunity->start_date }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Dynamic Opportunity Items End -->
                    <a class="btn btn-primary py-3 px-5" href="{{ route('login') }}">@lang('Browse More Opportunities')</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Opportunity Listing End -->

<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="text-center mb-5">@lang('Hear From Our Community')</h1>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>"@lang('Participating in volunteer work through Give-A-Hand has been a transformative experience. It\'s incredibly fulfilling to see the impact of our collective efforts on the community.')"</p>
                <div class="d-flex align-items-center">
                    <div class="ps-3">
                        <h5 class="mb-1">Khaled</h5>
                        <small>@lang('Volunteer')</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>"@lang('Give-A-Hand connected us with enthusiastic volunteers who share our mission. Their dedication and hard work have brought our projects to life.')"</p>
                <div class="d-flex align-items-center">
                    <div class="ps-3">
                        <h5 class="mb-1">TTT.org</h5>
                        <small>@lang('Nonprofit Org')</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>"@lang('Give-A-Hand not only helped me find volunteer work that aligns with my passions but also introduced me to a community of like-minded individuals dedicated to change.')"</p>
                <div class="d-flex align-items-center">
                    <div class="ps-3">
                        <h5 class="mb-1">Nawaf</h5>
                        <small>@lang('Volunteer')</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>"@lang('Collaborating with Give-A-Hand has allowed us to extend our outreach and support more beneficiaries. It\'s rewarding to see the positive outcomes of our joint efforts.')"</p>
                <div class="d-flex align-items-center">
                    <div class="ps-3">
                        <h5 class="mb-1">Ensan.org</h5>
                        <small>@lang('Nonprofit Org')</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


        

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
          
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Give A Hand</a>
														
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/landing/lib/wow/wow.min.js"></script>
    <script src="/landing/lib/easing/easing.min.js"></script>
    <script src="/landing/lib/waypoints/waypoints.min.js"></script>
    <script src="/landing/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/landing/js/main.js"></script>
</body>

</html>