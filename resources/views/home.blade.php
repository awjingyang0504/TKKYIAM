<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>{{ config('app name', 'TKKYIAM') }}</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="{{ asset('img/favicon.png') }}" rel="icon">
	<link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<style>
		img {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
	</style>
</head>

<body>
	<!-- Navbar -->

			@include('layouts.partials.homenavbar')
	
	<!-- /.navbar -->

	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center">
		<div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
			<h1>Tan Kah Kee Young Inventors Award</h1>
			<h2>to engage young people more in invention and creation instead of focusing solely on exam results.</h2>
		</div>
	</section><!-- End Hero -->

	<main id="main">

		<!-- ======= About Section ======= -->
		<section id="about" class="about">
			<div class="container">

				<div class="row">
					<div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
						<img src="{{ asset('img/portfolio/tkkyiam_01.jpg') }}" class="img-fluid" alt="">
					</div>
					<div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
						<h3>Tan Kah Kee Young Inventors Award (Singapore)</h3>
						<p class="fst-italic">
							was established in May 1986, advocated by Nobel Laureate Professor Yang Chen Ning, also advisor of Tan Kah Kee Foundation.
						</p>
						<p>
							In 2002, this award was extended to the universities in Shanghai. The participants included students and staff from both universities and high schools in Shanghai.
						</p>
						<p>
							In 2010, Nantah Education and Research Foundation reached an agreement with Singapore Tan Kah Kee International Society to jointly organize the Tan Kah Kee Young Inventors’ Award in Malaysia(TKKYIAM).
						</p>
						<p>
							In 2011, New Era College has became a co-organiser. The objectives of Tan Kah Kee Young Inventors’ Award are to:
						</p>
						<p>
							In 2011, this award was only opened to the 8 Chinese High Schools in Kuala Lumpur and Selangor.
						</p>
						<p>
							In 2012, this award was further extended to Negeri Sembilan and the National-type secondary schools. Starting from 2015, the competition is open to all the Chinese independent schools in Malaysia as well as all national type secondary school in Selangor, Negeri Sembilan and Melaka.
						</p>
					</div>
				</div>

			</div>
		</section><!-- End About Section -->


		<!-- ======= register Section ======= -->
		<section id="cta" class="cta">
			<div class="container" data-aos="zoom-in">

				<div class="text-center">
					<h3>Registration</h3>
					<p>Gold Medal: Medal, Certificate & Cash RM3000</p>
					<p>Silver Medal: Medal, Certificate & Cash RM2000</p>
					<p>Bronze Medal: Medal, Certificate & Cash RM1000</p>
					<p>Merit: Medal, Certificate</p>
					<p>Commendation: Certificate</p>
					<p>Finalist: Certificate</p>
					<a class="cta-btn" href="/login">Register</a><br />
					<br />
					<p>Closing date for registration: 18 April 2022</p>
				</div>

			</div>
		</section><!-- End Cta Section -->

		<!-- ======= ceremony Section ======= -->
		<section id="portfolio" class="portfolio">
			<div class="container">

				<div class="section-title">
					<h2>Awards Ceremony</h2>
					<p>Awards Presentation Ceremony</p>
				</div>

				<div class="row portfolio-container" data-aos="fade-up" data-aos-delay="150">

					<div class="col-lg-4 col-md-6 portfolio-item filter-app">
						<img src="{{ asset('img/portfolio/tkk2019_02.jpg') }}" class="img-fluid" alt="">
					</div>

					<div class="col-lg-4 col-md-6 portfolio-item filter-web">
						<img src="{{ asset('img/portfolio/tkk2019_04.jpg') }}" class="img-fluid" alt="">
					</div>

					<div class="col-lg-4 col-md-6 portfolio-item filter-app">
						<img src="{{ asset('img/portfolio/tkk2019_09.jpg') }}" class="img-fluid" alt="">
					</div>

					<div class="col-lg-4 col-md-6 portfolio-item filter-card">
						<img src="{{ asset('img/portfolio/tkk2019_11.jpg') }}" class="img-fluid" alt="">
					</div>

					<div class="col-lg-4 col-md-6 portfolio-item filter-app">
						<img src="{{ asset('img/portfolio/tkk2018_25.jpg') }}" class="img-fluid" alt="">
					</div>

					<div class="col-lg-4 col-md-6 portfolio-item filter-card">
						<img src="{{ asset('img/portfolio/tkk2018_27.jpg') }}" class="img-fluid" alt="">
					</div>

					<div class="col-lg-4 col-md-6 portfolio-item filter-card">
						<img src="{{ asset('img/portfolio/tkk2018_29.jpg') }}" class="img-fluid" alt="">
					</div>

				</div>

			</div>
		</section><!-- End Portfolio Section -->

		<!-- ======= Committee Section ======= -->
		<section id="team" class="team">
			<div class="container">

				<div class="section-title">
					<h2>Committee</h2>
					<p>The committee members of TKKYIAM include the representatives from Singapore Tan Kah Kee International Society, Nantah Foundation and New Era College, Malaysia. The judges include professionals in the fields of Physics, Chemistry, Biology and Engineering.</p>
				</div>

				<div class="row">
					<img src="{{ asset('img/portfolio/committeemembers.jpg') }}" alt="" class="section-title">

				</div>

			</div>
		</section><!-- End Team Section -->
	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6 footer-newsletter">
						<h4>New Era University College</h4>
						<p>Block B, Lot 5, Seksyen 10, Jalan Bukit,</p>
						<p>43000 Kajang, Selangor.</p>
						<p>Email : tkkyiam@newera.edu.my</p>
						<p>Tel : 03-87392770 ext: 418 (TKKYIAM working committee); 011-58514258</p>
						<p>Fax : 03-87336799</p>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- End Footer -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
	<div id="preloader"></div>

	<!-- Vendor JS Files -->
	<script src="{{ asset('vendor/aos/aos.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
	<script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
	<script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

	<!-- Template Main JS File -->
	<script src="{{ asset('js/main02.js') }}"></script>

</body>

</html>