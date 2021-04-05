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
								<li class="tm-nav-li"><a href="{{ route('Home')}}" class="tm-nav-link active">Home</a></li>
								<li class="tm-nav-li"><a href="{{ route('about_us')}}" class="tm-nav-link">About</a></li>
								<li class="tm-nav-li"><a href="{{ route('contact_us')}}" class="tm-nav-link">Contact</a></li>
								<li class="tm-nav-li"><a href="{{ route('login.member')}}" class="tm-nav-link">Login</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<main>
            <header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">About ISociety Club</h2>
				<p class="col-12 text-center">Society management system in which society members can have facilities like notice board, book events, track of their income & expenses, complaints status etc. And make payment through cash or online payment gateway. Committee member will be interacting with society members for bills (maintenance bill, gas bill etc.), manage apartment, members of apartment, resolve complaints and track of visitors and staff. Security & staff will be monitoring of parking spot, entry exit time, track of visitors.</p>
			</header>
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
