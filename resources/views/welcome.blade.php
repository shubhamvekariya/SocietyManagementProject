<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>ISocietyClub</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
	<link href="{{ mix('/css/app.css') }}" rel="stylesheet">
	<link href="{{ mix('/css/templatemo-style.css') }}" rel="stylesheet" />
</head>

<body>

	<div class="container-fuild">
	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder" >
			<div class="parallax-window" data-parallax="scroll" data-image-src="{!! asset('images/home/simple-house-01.jpg') !!}">
				<div class="tm-header" >
					<div class="row tm-header-inner mx-0">
						<div class="col-md-6 col-12">
						<span style="font-size: 5.3em;">
							<i class="fa fa-home tm-site-logo"></i>
						</span>
							<div class="tm-site-text-box" >
								<h1 class="tm-site-title">ISocietyClub</h1>
								<h6 class="tm-site-description">Visitor and Society Management</h6>
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul" >
								<li class="tm-nav-li"><a href="index.html" class="tm-nav-link active">Home</a></li>
								<li class="tm-nav-li"><a href="about.html" class="tm-nav-link">About</a></li>
								<li class="tm-nav-li"><a href="contact.html" class="tm-nav-link">Contact</a></li>
								<li class="tm-nav-li"><a href="{{ route('login.member') }}" class="tm-nav-link">Login</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Welcome to ISocietyClub</h2>
				<p class="col-12 text-center">We offers many features to sovle most common problem facedin residential societies. It uses to manage day-to-day activities of any co-operative housing society.</p>
			</header>

			<div class="tm-paging-links">
				<nav>
					<ul>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link btn rounded active">Residents</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link btn rounded">Committee</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link btn rounded">Secretary</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link btn rounded">Securtiy-Staff</a></li>
					</ul>
				</nav>
			</div>

			<!-- Gallery -->
			<div class="tm-gallery">
				<!-- gallery page 1 -->
				<div id="tm-gallery-page-residents" class="tm-gallery-page">
					<div class="card-deck mx-auto">
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/visitor-1.png') !!}" style="height: 18rem;width: 18rem;" alt="Visitor image">
							<div class="card-body">
								<h5 class="card-title">Visitor Management</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/communication-1.png') !!}" style="height: 18rem;width: 18rem;" alt="Communication image">
							<div class="card-body">
								<h5 class="card-title">Communication</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/bill-1.png') !!}" style="height: 18rem;width: 18rem;" alt="Bill image">
							<div class="card-body">
								<h5 class="card-title">Maintenance & Bill payment</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
					</div>
					<div class="card-deck mx-auto">
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/staff-1.png') !!}" style="height: 18rem;width: 18rem;" alt="Staff image">
							<div class="card-body">
								<h5 class="card-title">Staff Management</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/complain.png') !!}" style="height: 18rem;width: 18rem;" alt="Complain image">
							<div class="card-body">
								<h5 class="card-title">Complain Management</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/asset.png') !!}" style="height: 18rem;width: 18rem;" alt="Assets image">
							<div class="card-body">
								<h5 class="card-title">Assets Usage</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
					</div>
				</div> <!-- gallery page 1 -->

				<!-- gallery page 2 -->
				<div id="tm-gallery-page-committee" class="tm-gallery-page hidden">
					<div class="card-deck mx-auto mx-auto">
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/bill-2.png') !!}" style="height: 18rem;width: 18rem;" alt="Bill image">
							<div class="card-body">
								<h5 class="card-title">Account & Bill Management</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/visitor-2.png') !!}" style="height: 18rem;width: 18rem;" alt="Visitor image">
							<div class="card-body">
								<h5 class="card-title">Visitor track</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/apartment.png') !!}" style="height: 18rem;width: 18rem;" alt="Appartment image">
							<div class="card-body">
								<h5 class="card-title">Residents & Appartment management</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
					</div>
					<div class="card-deck mx-auto">
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/staff-2.png') !!}" style="height: 18rem;width: 18rem;" alt="Staff image">
							<div class="card-body">
								<h5 class="card-title">Manage Staff</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/communication-2.png') !!}" style="height: 18rem;width: 18rem;" alt="communication image">
							<div class="card-body">
								<h5 class="card-title">Communication</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/complain.png') !!}" style="height: 18rem;width: 18rem;" alt="Card image">
							<div class="card-body">
								<h5 class="card-title">Complain management</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
					</div>
				</div> <!-- gallery page 2 -->

				<!-- gallery page 3 -->
				<div id="tm-gallery-page-secretary" class="tm-gallery-page hidden">
					<div class="card-deck mx-auto mx-auto">
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/rule.png') !!}" style="height: 18rem;width: 18rem;" alt="Card image">
							<div class="card-body">
								<h5 class="card-title">Rule management</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/admin.png') !!}" style="height: 18rem;width: 18rem;" alt="Card image">
							<div class="card-body">
								<h5 class="card-title">Adminside</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/user.png') !!}" style="height: 18rem;width: 18rem;" alt="Card image">
							<div class="card-body">
								<h5 class="card-title">Manage User</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
					</div>
				</div> <!-- gallery page 3 -->

				<!-- gallery page 4 -->
				<div id="tm-gallery-page-securtiy-staff" class="tm-gallery-page hidden">
					<div class="card-deck mx-auto mx-auto">
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/visitor-3.png') !!}" style="height: 18rem;width: 18rem;" alt="Card image">
							<div class="card-body">
								<h5 class="card-title">Visitor management</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/parking.png') !!}" style="height: 18rem;width: 18rem;" alt="Card image">
							<div class="card-body">
								<h5 class="card-title">Parking management</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
						<div class="card p-3 m-3" >
							<img class="card-img-top" src="{!! asset('images/home/salary.png') !!}" style="height: 18rem;width: 18rem;" alt="Card image">
							<div class="card-body">
								<h5 class="card-title">Salary management</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
					</div>
				</div> <!-- gallery page 4 -->
			</div>
			<div class="tm-section tm-container-inner">
				<div class="row">
					<div class="col-md-6">
						<figure class="tm-description-figure">
							<img src="{!! asset('images/home/society-02.jpg') !!}" alt="Image" class="img-fluid" />
						</figure>
					</div>
					<div class="col-md-6">
						<div class="tm-description-box">
							<h4 class="tm-gallery-title">Register your society</h4>
								<ul class="tm-mb-70 ml-4 mt-2">
									<li>Easy registration </li>
									<li>Simple and Fast</li>
								</ul>
							<a href="{{ route('register.society') }}" class="tm-btn tm-btn-default tm-right btn">Register</a>
						</div>
					</div>
				</div>
			</div>
		</main>

		<footer class="tm-footer text-center">
			<p>Copyright &copy; 2021 ISocietyClub </p>
		</footer>
	</div>
	<script src="{!! asset('js/jquery.min.js') !!}"></script>
	<script src="{!! asset('js/parallax.min.js') !!}"></script>
	<script>
		$(document).ready(function(){
			// Handle click on paging links
			$('.tm-paging-link').click(function(e){
				e.preventDefault();

				var page = $(this).text().toLowerCase();
				$('.tm-gallery-page').addClass('hidden');
				$('#tm-gallery-page-' + page).removeClass('hidden');
				$('.tm-paging-link').removeClass('active');
				$(this).addClass("active");
			});
		});
	</script>
</body>
</html>
