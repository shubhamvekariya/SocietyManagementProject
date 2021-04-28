<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="author" content="shubhamvekariya">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
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
            background-color: #555;
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
        <div class="placeholder">
            <div class="parallax-window" data-parallax="scroll" data-image-src="{!! asset('images/home/simple-house-01.jpg') !!}">
                <div class="tm-header">
                    <div class="row tm-header-inner mx-0">
                        <div class="col-md-6 col-12">
                            <span style="font-size: 5.3em;">
                                <i class="fa fa-home tm-site-logo"></i>
                            </span>
                            <div class="tm-site-text-box">
                                <h1 class="tm-site-title">ISocietyClub</h1>
                                <h6 class="tm-site-description">Visitor and Society Management</h6>
                            </div>
                        </div>
                        <nav class="col-md-6 col-12 tm-nav">
                            <ul class="tm-nav-ul">
                                <li class="tm-nav-li"><a href="{{ route('Home') }}"
                                        class="tm-nav-link active">Home</a></li>
                                <li class="tm-nav-li"><a href="{{ route('about_us') }}" class="tm-nav-link">About</a>
                                </li>
                                <li class="tm-nav-li"><a href="{{ route('contact_us') }}"
                                        class="tm-nav-link">Contact</a></li>
                                <li class="tm-nav-li"><a href="{{ route('login.member') }}"
                                        class="tm-nav-link">Login</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <main>
            <header class="row tm-welcome-section">
                <h2 class="col-12 text-center tm-section-title">Welcome to ISocietyClub</h2>
                <p class="col-12 text-center">We offers many features to sovle most common problem facedin residential
                    societies. It uses to manage day-to-day activities of any co-operative housing society.</p>
            </header>

            <div class="tm-paging-links">
                <nav>
                    <ul>
                        <li class="tm-paging-item"><a href="#" class="tm-paging-link btn rounded active">Residents</a>
                        </li>
                        <li class="tm-paging-item"><a href="#" class="tm-paging-link btn rounded">Committee</a></li>
                        <li class="tm-paging-item"><a href="#" class="tm-paging-link btn rounded">Secretary</a></li>
                        <li class="tm-paging-item"><a href="#" class="tm-paging-link btn rounded">Securtiy-Staff</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Gallery -->
            <div class="tm-gallery">
                <!-- gallery page 1 -->
                <div id="tm-gallery-page-residents" class="tm-gallery-page">
                    <div class="card-deck mx-auto">
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/visitor-1.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Visitor image">
                            <div class="card-body">
                                <h5 class="card-title">Visitor Management</h5>
                                <p class="card-text">Here, Visitor Can Pre Approve to Visit Member in society,Security
                                    allows for Visiting,Parking Details is also Managed.</p>
                            </div>
                        </div>
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/communication-1.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Communication image">
                            <div class="card-body">
                                <h5 class="card-title">Communication</h5>
                                <p class="card-text">Communication is done between Member and Committee member About Any
                                    Issue,So he/she can Chat.</p>
                            </div>
                        </div>
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/bill-1.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Bill image">
                            <div class="card-body">
                                <h5 class="card-title">Maintenance & Bill payment</h5>
                                <p class="card-text">Maintenance Bill is Generated on Basis of Expenses, and Bill is
                                    Sent to Member through Mail, and User Can Pay Online Bill.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck mx-auto">
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/staff-1.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Staff image">
                            <div class="card-body">
                                <h5 class="card-title">Staff Management</h5>
                                <p class="card-text">Management of Staff is Done, Add Staff, Remove Staff, Attendence of
                                    Staff Monthly wise is done.</p>
                            </div>
                        </div>
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/complain.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Complain image">
                            <div class="card-body">
                                <h5 class="card-title">Complaint Management</h5>
                                <p class="card-text">Here, Member can Register Complaint, Add description and As soon as
                                    committe member Resolves complaint, Member is Notified That the Complaint is
                                    Resolved.</p>
                            </div>
                        </div>
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/asset.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Assets image">
                            <div class="card-body">
                                <h5 class="card-title">Assets Usage</h5>
                                <p class="card-text">Member Can Book Assets/Events on Basis of Assets/Events Charges Are
                                    Decided.</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- gallery page 1 -->

                <!-- gallery page 2 -->
                <div id="tm-gallery-page-committee" class="tm-gallery-page hidden">
                    <div class="card-deck mx-auto mx-auto">
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/bill-2.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Bill image">
                            <div class="card-body">
                                <h5 class="card-title">Account & Bill Management</h5>
                                <p class="card-text">A Committee member can Manage Members and Expenses on which bill is
                                    being generated.</p>
                            </div>
                        </div>
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/visitor-2.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Visitor image">
                            <div class="card-body">
                                <h5 class="card-title">Visitor track</h5>
                                <p class="card-text">Committee Member Keeps Track on Visitors.</p>
                            </div>
                        </div>
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/apartment.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Appartment image">
                            <div class="card-body">
                                <h5 class="card-title">Residents & Apartment management</h5>
                                <p class="card-text">Committee Member Can Add and Remove Apartment Member.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck mx-auto">
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/staff-2.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Staff image">
                            <div class="card-body">
                                <h5 class="card-title">Manage Staff</h5>
                                <p class="card-text">Committee Member Can Add Staff Remove Staff can Pay Salary Monthly
                                    wise to Staffs.</p>
                            </div>
                        </div>
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/communication-2.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="communication image">
                            <div class="card-body">
                                <h5 class="card-title">Communication</h5>
                                <p class="card-text">Committee Member Can Communicate with Members Reagarding any
                                    issues.</p>
                            </div>
                        </div>
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/complain.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Complaint management</h5>
                                <p class="card-text">Committee Member Can Resolve the Complaint and Can Notify the
                                    member that Complaint resolved.</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- gallery page 2 -->

                <!-- gallery page 3 -->
                <div id="tm-gallery-page-secretary" class="tm-gallery-page hidden">
                    <div class="card-deck mx-auto mx-auto">
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/rule.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Rule management</h5>
                                <p class="card-text">Secretary Can have List of Rules, Can Add, Remove, Modify rules.
                                </p>
                            </div>
                        </div>
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/admin.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Adminside</h5>
                                <p class="card-text">Secretary Can Add, Remove Committee Members, which is done only by
                                    Admin.</p>
                            </div>
                        </div>
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/user.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Manage User</h5>
                                <p class="card-text">Secretary Can Manage Users like Security & Staff, Members,
                                    Committee members.</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- gallery page 3 -->

                <!-- gallery page 4 -->
                <div id="tm-gallery-page-securtiy-staff" class="tm-gallery-page hidden">
                    <div class="card-deck mx-auto mx-auto">
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/visitor-3.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Visitor management</h5>
                                <p class="card-text">Security has rights to allow visitor or not,and Parking Details is
                                    also Managed.</p>
                            </div>
                        </div>
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/parking.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Parking management</h5>
                                <p class="card-text">Security Manages Parking Details of Visitors, who is not member of
                                    society.</p>
                            </div>
                        </div>
                        <div class="card p-3 m-3">
                            <img class="card-img-top" src="{!! asset('images/home/salary.png') !!}" style="height: 18rem;width: 18rem;"
                                alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Salary management</h5>
                                <p class="card-text">Staff & security Salary is Managed Acording to work & Salary is
                                    Paid Monthly wise.</p>
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
                        </div>
                        <a href="{{ route('login.staff') }}" class="tm-btn tm-btn-default tm-left btn">Login (Staff &
                            Security)</a>
                        <a href="{{ route('register.society') }}" class="tm-btn tm-btn-default tm-right btn">Register
                            Society</a>
                    </div>
                </div>
            </div>
        </main>
        <br>

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
        window.onscroll = function() {
            scrollFunction()
        };

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

    <script>
        $(document).ready(function() {
            // Handle click on paging links
            $('.tm-paging-link').click(function(e) {
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
