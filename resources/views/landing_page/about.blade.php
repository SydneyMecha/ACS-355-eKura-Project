<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Meta -->
    <link rel="icon" href="../../../public/images/fevicon.png" type="image/gif" />
    <meta name="keywords" content="Voting System, Online Voting, E-Kura" />
    <meta name="description" content="E-Kura Voting System, Online voting for your favorite options" />
    <meta name="author" content="E-kura Team" />

    <title>E-Kura Voting System - About</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.css" />
    <!-- Fonts Style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../../public/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom Styles -->
    <link href="../../../public/css/style.css" rel="stylesheet" />
    <!-- Responsive Styles -->
    <link href="../../../public/css/responsive.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .header_section {
            background-color: #3498db;
            padding: 10px 0;
        }

        .header_section .navbar-brand span {
            font-size: 28px;
            font-weight: 700;
            color: white;
        }

        .about_section {
            padding: 40px 0;
            background-color: #fff;
        }

        .about_section h2 {
            text-align: center;
            font-size: 32px;
            margin-bottom: 15px;
            color: #3498db;
        }

        .about_section .section_title {
            text-align: center;
            font-size: 22px;
            margin-bottom: 30px;
        }

        /* Styling for the duplicated images arranged horizontally */
        .about-images-container {
            display: flex; /* Align items horizontally */
            justify-content: center; /* Center images */
            gap: 20px; /* Add some space between images */
        }

        .about-section img {
            max-width: 30%; /* Control image width */
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            display: block;
        }

        .about-image {
            background: url('../../../public/images/voting-banner.jpg') no-repeat center center;
            background-size: cover;
            padding: 50px 0;
            text-align: center;
            color: white;
            border-radius: 10px;
            margin-top: 30px;
        }

        .about-image h3 {
            font-size: 28px;
            margin-bottom: 15px;
        }

        .about-image p {
            font-size: 16px;
            max-width: 550px;
            margin: 0 auto;
        }

        .footer_section {
            background-color: #3498db;
            padding: 15px 0;
            color: white;
            text-align: center;
            font-size: 14px;
        }

        .feature-box {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 30px;
        }

        .feature-item {
            background-color: #ecf0f1;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
        }

        .feature-item i {
            font-size: 36px;
            color: #3498db;
            margin-bottom: 15px;
        }

        .feature-item h4 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .feature-item p {
            font-size: 14px;
            color: #7f8c8d;
        }
    </style>

</head>

<body class="sub_page">

<!-- Header Section -->
<div class="hero_area">
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand" href="index.html">
                    <i class="fa fa-thumbs-up" aria-hidden="true" style="margin-right: 8px;"></i>
                    <span>e-kura</span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
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
                    </ul>
                    <div class="quote_btn-container">
                        <form class="form-inline" action="search_results.html" method="GET">
                            <input type="text" class="form-control" name="searchQuery" placeholder="Search">
                            <button class="btn nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>

                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>Call : +254758071396</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>
<!-- End Header Section -->

<!-- About Section -->
<section class="about_section">
    <div class="container">
        <h2>Welcome to E-Kura Voting System</h2>
        <div class="section_title">
            <h3>How Our Voting System Works</h3>
        </div>
        <p class="text-center">
            Our voting system is designed to be simple, secure, and accessible to everyone. Whether it's for selecting a favorite option or engaging in polls, we offer a transparent and easy-to-use platform to gather opinions.
        </p>

        <!-- Container to hold the three horizontally arranged images -->
        <div class="about-images-container">
            <img src="images/trumps.png" alt="Voting Process" class="img-fluid">
            <img src="images/trumps.png" alt="Voting Process" class="img-fluid">
            <img src="images/trumps.png" alt="Voting Process" class="img-fluid">
        </div>

        <div class="about-image">
            <h3>Instant & Transparent Voting</h3>
            <p>Participate in live polls and instantly see the results as they unfold. Our secure platform ensures that your voice is heard and counted.</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h4>How Does It Work?</h4>
                <p>Once logged in, you can participate in various voting activities. Simply select your preferred option and submit your vote. Our system ensures that your vote is counted in real-time, and results are visible after submission.</p>
                <h5>Key Features:</h5>
                <ul>
                    <li>Instant voting updates</li>
                    <li>Multiple voting options</li>
                    <li>Real-time result viewing</li>
                    <li>Secure and anonymous</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h4>What Makes Our System Unique?</h4>
                <p>Our platform is built with transparency and user experience in mind. You will always know that your vote has been counted, and the process is smooth without any unnecessary delays.</p>
                <p>Our voting options range from simple questions to more complex polls. We also offer data analysis features to analyze voting trends and results over time.</p>
            </div>
        </div>

        <!-- Features Section -->
        <div class="feature-box">
            <div class="feature-item">
                <i class="fa fa-check-circle"></i>
                <h4>Real-time Results</h4>
                <p>Instantly see the voting results as they come in. Transparency is key in ensuring the accuracy of the process.</p>
            </div>
            <div class="feature-item">
                <i class="fa fa-shield-alt"></i>
                <h4>Secure Voting</h4>
                <p>All votes are anonymous and securely processed to ensure integrity and fairness in the voting process.</p>
            </div>
            <div class="feature-item">
                <i class="fa fa-users"></i>
                <h4>Multiple Voting Options</h4>
                <p>Choose from multiple vote options, whether it's for a favorite team, product, or general poll.</p>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->

<!-- Footer Section -->
<section class="footer_section">
    <p>© 2024 E-Kura Voting System | All rights reserved</p>
</section>

<!-- jQuery -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="js/bootstrap.js"></script>
<!-- Custom JS -->
<script src="js/custom.js"></script>

</body>

</html>
