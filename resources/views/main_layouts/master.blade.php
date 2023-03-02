<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SEO Master - SEO Agency Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('template2/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('template2/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('template2/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('template2/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('template2/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('blog_template/css/style.css') }}">

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">Portfolio<span class="fs-5"></span></h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#tools" class="nav-item nav-link">Tools</a>
                        <a href="#service" class="nav-item nav-link">Project</a>
                        <div class="nav-item dropdown">
                            <div class="dropdown-menu m-0">
                                @foreach($navbar_categories as $category)
                                <a href="{{ route('categories.show', $category) }}" class="dropdown-item">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                        @guest
                        <a  href="{{route('login')}}"   class="nav-item nav-link">Login</a>
                                @endguest
                        @auth
                        <a  class="nav-item nav-link" onclick="event.preventDefault();
                        document.getElementById('nav-logout-form').submit()" 
                        href="#">Logout</a>

                        <form id="nav-logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        </li>
                        </ul>
                        </li>
                        @endauth
                    </div>
                </div>
            </nav>

            <div id="about" class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated zoomIn" style="font-size: 50px;">I'm Eiler Alminana <br> <span style="font-size: 60px;"> Junior Web Developer</span> </h1>
                            <p class="text-white pb-3 animated zoomIn">Tempor rebum no at dolore lorem clita rebum rebum ipsum rebum stet dolor sed justo kasd. Ut dolor sed magna dolor sea diam. Sit diam sit justo amet ipsum vero ipsum clita lorem</p>
                            <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft"> Resume</a>
                            <a href="{{route('contact.create')}}" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact Us</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-start">
                            {{-- <img class="img-fluid" src="{{asset('template2/img/programming.png')}}" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        @yield('content') 

        
        <!-- Full Screen Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
                    <div class="modal-header border-0">
                        <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                        <div class="input-group" style="max-width: 600px;">
                            <input type="text" class="form-control bg-transparent border-light p-3" placeholder="Type search keyword">
                            <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Screen Search End -->

      <!-- Footer Start -->
      <div class="container-fuild bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
               
        <div class="container px-lg-6">
            <div class="copyright">
                <div class="row">
                    
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a style="font-size: 30px;" href="https://www.facebook.com/profile.php?id=100086537031816"><i class="fab fa-facebook-f"></i></a>
                            <a style="font-size: 30px;" href="https://www.linkedin.com/in/eiler-alminana-8b93b9249/"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>
    <script src="https://kit.fontawesome.com/ea29e1dce1.js" crossorigin="anonymous"></script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('template2/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('template2/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('template2/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('template2/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('template2/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('template2/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('template2/js/main.js')}}"></script>
</body>

</html>