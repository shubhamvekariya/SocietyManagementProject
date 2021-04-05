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

<style>
	#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #555 ;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: rgb(102, 212, 176);
}
	</style>
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
								<li class="tm-nav-li"><a href="{{ route('Home') }}" class="tm-nav-link active">Home</a></li>
								<li class="tm-nav-li"><a href="{{ route('about_us')}}" class="tm-nav-link">About</a></li>
								<li class="tm-nav-li"><a href="{{ route('contact_us') }}" class="tm-nav-link">Contact</a></li>
								<li class="tm-nav-li"><a href="{{ route('login.member') }}" class="tm-nav-link">Login</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<main>
            <header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Contact Us</h2>
				<p class="col-12 text-center">Contact us and we'll get back to you within 24 hours</p>
			</header>

			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row">
					<div class="col-md-6">
						<form action="" method="POST" class="tm-contact-form">
					        <div class="form-group">
					          <input type="text" name="name" class="form-control" placeholder="Name" required="" />
					        </div>

					        <div class="form-group">
					          <input type="email" name="email" class="form-control" placeholder="Email" required="" />
					        </div>

					        <div class="form-group">
					          <textarea rows="5" name="message" class="form-control" placeholder="Message" required=""></textarea>
					        </div>

					        <div class="form-group tm-d-flex">
					          <button type="submit" class="tm-btn tm-btn-success tm-btn-right">
					            Send
					          </button>
					        </div>
						</form>
					</div>
					<div class="col-md-6">
						<div class="tm-address-box">
							<h4 class="tm-info-title tm-text-success">Our Address</h4>
							<address>
								Gujarat,India
							</address>
							<a href="tel:080-090-0110" class="tm-contact-link">
								<i class="fa fa-phone tm-contact-icon"></i>+91 8401564660
							</a>
							<a href="mailto:info@company.co" class="tm-contact-link">
								<i class="fa fa-envelope tm-contact-icon"></i>isocietyclub@gmail.com
							</a>
							<div class="tm-contact-social">
								<a href="#" class="tm-social-link"><i class="fa fa-facebook-square tm-social-icon"></i></a>
								<a href="#" class="tm-social-link"><i class="fa fa-twitter-square tm-social-icon"></i></a>
								<a href="#" class="tm-social-link"><i class="fa fa-instagram tm-social-icon"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
        </main>
		<!--top button-->

		<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-angle-double-up"></i></button>
		<!--end top-->


		<footer class="tm-footer text-center">
			<p>Copyright &copy; 2021 ISocietyClub </p>
		</footer>
	</div>

    <script src="{!! asset('js/jquery.min.js') !!}"></script>
	<script src="{!! asset('js/parallax.min.js') !!}"></script>

	<script>
		//Get the button
		var mybutton = document.getElementById("myBtn");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
		  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			mybutton.style.display = "block";
		  } else {
			mybutton.style.display = "none";
		  }
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
		  document.body.scrollTop = 0;
		  document.documentElement.scrollTop = 0;
		}
		</script>

</body>
</html>
