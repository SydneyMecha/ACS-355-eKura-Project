<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="images/fevicon.png" type="image/gif" />

    <title>E-kura</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />

    <style>

        body {
            background-color: #3498db;
        }


        .header_section {
            background-color: #3498db;
        }

        .slider_section {
            background-color: #3498db;
        }
    </style>

</head>

<body>

<div class="hero_area">

    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand" href="/">
                    <i class="fa fa-thumbs-up" aria-hidden="true" style="margin-right: 8px;"></i>
                    <span>e-kura</span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html"> About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="service.html">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="price.html">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                    </ul>
                    <div class="quote_btn-container">
                        <form class="form-inline" action="#" method="GET">
                            <input type="text" class="form-control" name="searchQuery" placeholder="Search">
                            <button class="btn nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

        </div>
    </header>

    <!-- slider section -->
    <section class="slider_section">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <h1>
                                        Secure, Transparent,and Efficient Voting for a Digital Era
                                    </h1>
                                    <p>
                                        Your vote is protected with
                                        top-tier security measures,
                                        ensuring privacy and integrity throughout the entire process.
                                        Accessible from any device, e-Kura lets you cast your vote anytime,
                                        anywhere, bringing convenience to your fingertips.
                                        Experience a fair and open voting process with visibility into each
                                        step, from registration to vote counting.
                                    </p>
                                    <div class="btn-box">
                                        @if (Route::has('login'))
                                            <nav class="-mx-3 flex flex-1 justify-end">
                                                @auth
                                                    <a
                                                        href="{{ url('/admin/dashboard') }}"
                                                        class="btn-2"
                                                    >
                                                        Dashboard
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}" class="btn-2" >
                                                        Log in
                                                    </a>


                                                    @if (Route::has('register'))
                                                        <a href="{{ route('register') }}" class="btn-1" >
                                                            Register
                                                        </a>
                                                    @endif
                                                @endauth
                                            </nav>
                                        @endif
{{--                                        <a href="" class="btn-1">Sign up</a>--}}
{{--                                        <a href="{{ route('login') }}" class="btn-2">Login</a>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-10 mx-auto">
                                        <div class="img-box">
                                            <img src="images/sliders.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <h1>
                                        Secure, Transparent,and Efficient Voting for a Digital Era
                                    </h1>
                                    <p>
                                        Your vote is protected with
                                        top-tier security measures,
                                        ensuring privacy and integrity throughout the entire process.
                                        Accessible from any device, e-Kura lets you cast your vote anytime,
                                        anywhere, bringing convenience to your fingertips.
                                        Experience a fair and open voting process with visibility into each
                                        step, from registration to vote counting.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn-1">Read More</a>
                                        <a href="" class="btn-2">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-10 mx-auto">
                                        <div class="img-box">
                                            <img src="images/slider.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <h1>Fast & Secure <br> Web Hosting</h1>
                                    <p>
                                        Anything embarrassing hidden in the middle of text. All the Lorem Ipsuanything embarrassing hidden in the middle of text. All the Lorem Ipsumm
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn-1">Read More</a>
                                        <a href="" class="btn-2">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-10 mx-auto">
                                        <div class="img-box">
                                            <img src="images/slider.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel_btn-box">
                <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
</body>

</html>

<!-- end slider section -->
</div>

<!-- service section -->

<section class="service_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our Voting Management System
            </h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- VR -->
            <div class="col-md-6 col-lg-4">
                <div class="box">
                    <div class="img-box">
                        <img src="images/voter_registration.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h4>
                            Voter Registration
                        </h4>
                        <p>
                            Ensure secure and easy registration of voters for the upcoming elections.
                        </p>
                        <a href="">
                            Read More
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- VS-->
            <div class="col-md-6 col-lg-4">
                <div class="box">
                    <div class="img-box">
                        <img src="images/voting_system.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h4>
                            Voting System
                        </h4>
                        <p>
                            A secure and user-friendly voting platform to cast your votes electronically.
                        </p>
                        <a href="">
                            Read More
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- RC-->
            <div class="col-md-6 col-lg-4">
                <div class="box">
                    <div class="img-box">
                        <img src="images/result_calculation.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h4>
                            Result Calculation
                        </h4>
                        <p>
                            Automated calculation and reporting of election results in real-time.
                        </p>
                        <a href="">
                            Read More
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ES-->
            <div class="col-md-6 col-lg-4">
                <div class="box">
                    <div class="img-box">
                        <img src="images/election_security.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h4>
                            Election Security
                        </h4>
                        <p>
                            High-level security features to protect against fraud and ensure fair elections.
                        </p>
                        <a href="">
                            Read More
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- VC-->
            <div class="col-md-6 col-lg-4">
                <div class="box">
                    <div class="img-box">
                        <img src="images/vote_counting.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h4>
                            Vote Counting
                        </h4>
                        <p>
                            Efficient and accurate counting of votes to ensure the integrity of results.
                        </p>
                        <a href="">
                            Read More
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- BM-->
            <div class="col-md-6 col-lg-4">
                <div class="box">
                    <div class="img-box">
                        <img src="images/ballot_management.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h4>
                            Ballot Management
                        </h4>
                        <p>
                            Efficient management of both digital and paper ballots for the election.
                        </p>
                        <a href="">
                            Read More
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- end service section -->

<!-- about section -->

<section class="about_section layout_padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2 style="color: white;">
                            About Our Voting System
                        </h2>
                    </div>
                    <p style="color: white;">
                        Our Voting Management System is designed to ensure secure, transparent, and efficient elections. We provide an easy-to-use platform for voters to register, cast their votes, and track election results. With state-of-the-art security features, our system guarantees the integrity of the voting process, protecting against fraud and ensuring every vote counts. Our goal is to revolutionize the way elections are conducted, making them more accessible, fair, and reliable.
                    </p>
                    <a href="" style="color: white;">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img-box">
                    <img src="images/imageskenyan.png" alt="Voting System">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- end about section -->


<!-- server section -->

<section class="voting_section" style="background-color: #3498db; padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="img-box">
                    <img src="images/vote_images.png" alt="Voting Image" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2 style="color: #fff; font-size: 32px;">
                            Vote for Your Favorite Candidate
                        </h2>
                        <p style="color: #f1f1f1; font-size: 18px;">
                            Your vote matters! Cast your vote for your favorite candidate and make a difference. Every vote counts towards choosing the best option.
                        </p>
                    </div>
                    <a href="voting-details.html" class="btn btn-light mt-3" style="border-radius: 20px; padding: 12px 25px; font-size: 16px;">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Voting Section -->

<section class="voting_section layout_padding" style="background-color: #f8f9fa; padding: 50px 0;">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Cast Your Vote Sample
            </h2>
            <p style="font-size: 18px;">
                Choose a candidate to cast your vote and help shape our future!
            </p>
        </div>
        <div class="voting_container">
            <!-- Candidate 1 -->
            <div class="box" style="border-radius: 15px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);">
                <div class="detail-box" style="padding: 20px; text-align: center;">
                    <h3>John Murume</h3>
                    <h5>Candidate for senate</h5>
                    <ul class="vote_features" style="list-style: none; padding: 0; color: #555;">
                        <li>Experience in Public Service</li>
                        <li>Promises to improve infrastructure</li>
                        <li>Focus on education and healthcare</li>
                    </ul>
                </div>
                <div class="btn-box" style="text-align: center; padding: 10px;">
                    <button onclick="vote('John Murume')" class="btn btn-primary" style="padding: 10px 20px; border-radius: 30px; font-size: 16px;">
                        Vote Now
                    </button>
                </div>
            </div>

            <!-- Candidate 2 -->
            <div class="box" style="border-radius: 15px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1); margin-top: 30px;">
                <div class="detail-box" style="padding: 20px; text-align: center;">
                    <h3>Frida Janet</h3>
                    <h5>Candidate for senate</h5>
                    <ul class="vote_features" style="list-style: none; padding: 0; color: #555;">
                        <li>Experienced in local government</li>
                        <li>Promotes fairness and ethnicity</li>
                        <li>Advocates for social equality</li>
                    </ul>
                </div>
                <div class="btn-box" style="text-align: center; padding: 10px;">
                    <button onclick="vote('Frida Janet')" class="btn btn-primary" style="padding: 10px 20px; border-radius: 30px; font-size: 16px;">
                        Vote Now
                    </button>
                </div>
            </div>

            <!-- Candidate 3 -->
            <div class="box" style="border-radius: 15px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1); margin-top: 30px;">
                <div class="detail-box" style="padding: 20px; text-align: center;">
                    <h3>Alex Neghurr</h3>
                    <h5>Candidate for City Mayor</h5>
                    <ul class="vote_features" style="list-style: none; padding: 0; color: #555;">
                        <li>Focus on urban development</li>
                        <li>Support for technology and innovation</li>
                        <li>Improving public safety policies</li>
                    </ul>
                </div>
                <div class="btn-box" style="text-align: center; padding: 10px;">
                    <button onclick="vote('Alex Neghurr')" class="btn btn-primary" style="padding: 10px 20px; border-radius: 30px; font-size: 16px;">
                        Vote Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="py-4 bg-light mt-auto footer_section">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; eKura 2024</div>
            <div>
                <a href="#">Privacy Policy</a>
                |
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>

<script>

    function vote(candidate) {
        alert("Thank you for voting for " + candidate + "!");
        sendVoteToServer(candidate);
    }
    function sendVoteToServer(candidate) {
        console.log("Vote for " + candidate + " has been sent to the server.");
    }
</script>

<!-- End of Voting Section -->
