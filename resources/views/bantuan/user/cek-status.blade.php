<!DOCTYPE html>
<html lang="en">
<head>
	<title>Desa Makmur Jaya</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('LandingPage/css/open-iconic-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('LandingPage/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('LandingPage/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('LandingPage/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('LandingPage/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('LandingPage/css/aos.css') }}">
	<link rel="stylesheet" href="{{ asset('LandingPage/css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('LandingPage/css/bootstrap-datepicker.css') }}">
	<link rel="stylesheet" href="{{ asset('LandingPage/css/jquery.timepicker.css') }}">	
	<link rel="stylesheet" href="{{ asset('LandingPage/css/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('LandingPage/css/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('LandingPage/css/style.css') }}">
</head>
<body class="goto-here">
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
            <a class="navbar-brand" href="index.html">Desa Sukawana</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    {{-- <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li> --}}
                    
                    <li class="nav-item">
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link">Home</a></li>
                                <li class="nav-item"><a href="{{ url('/bantuan') }}" class="nav-link">Bantuan</a></li>
                                <li class="nav-item"><a href="{{ url('/bantuan',Auth::id()) }}" class="nav-link">Status</a></li>
                                <li class="nav-item"><a href="{{ url('/penyuluhan',Auth::id()) }}" class="nav-link">Cek Penyuluhan</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                @endif
                            @endauth
                        @endif
                    </li>
                </ul>
            </div>
		</div>
	</nav>
    <!-- END nav -->
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                        <tr class="text-center">
                            <th>ID Bantuan</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Bantuan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($bantuan as $data)
                        <tr class="text-center">
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->penduduk->nik }}</td>
                                <td>{{ $data->penduduk->nama }}</td>
                                <td>{{ $data->jenisbantuan->nama }}</td>
                                <td>{{ $data->created_at->format('d-m-Y') }}</td>
                                <td>{{ $data->status }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </section>

	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                <span>Get e-mail updates about our latest shops and special offers</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="#" class="subscribe-form">
                <div class="form-group d-flex">
                    <input type="text" class="form-control" placeholder="Enter email address">
                    <input type="submit" value="Subscribe" class="submit px-3">
                </div>
                </form>
            </div>
            </div>
        </div>
    </section>
    
	<footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                            <a href="#" class="mouse-icon">
                                <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                            </a>
                        </div>
            </div>
            <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Vegefoods</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                <h2 class="ftco-heading-2">Menu</h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Shop</a></li>
                    <li><a href="#" class="py-2 d-block">About</a></li>
                    <li><a href="#" class="py-2 d-block">Journal</a></li>
                    <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Help</h2>
                <div class="d-flex">
                    <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                        <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                        <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                        <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                        <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                    </ul>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">FAQs</a></li>
                        <li><a href="#" class="py-2 d-block">Contact</a></li>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                    <ul>
                        <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                        <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                        <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                    </ul>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
            </div>
            </div>
        </div>
	</footer>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{ asset('LandingPage/js/jquery.min.js') }}"></script>
<script src="{{ asset('LandingPage/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('LandingPage/js/popper.min.js') }}"></script>
<script src="{{ asset('LandingPage/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('LandingPage/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('LandingPage/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('LandingPage/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('LandingPage/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('LandingPage/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('LandingPage/js/aos.js') }}"></script>
<script src="{{ asset('LandingPage/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('LandingPage/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('LandingPage/js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('LandingPage/js/google-map.js') }}"></script>
<script src="{{ asset('LandingPage/js/main.js') }}"></script>
	
</body>
</html>