<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Crafter</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        footer {
            margin-top: auto;
            padding: 0;
            background-color: #002B5C;
            color: #ffffff;
           
        }

        .footer-section {
            padding: 20px 0;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        * {
            box-sizing: border-box;
        }

        /* Dark Blue Theme Colors */
        :root {
            --primary-dark: #27376d;
            --secondary-dark: #C7DBF7;
            --accent-light: #03040c;
            --button-hover: #5f626b;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(180deg, var(--primary-dark) 0%, var(--secondary-dark) 100%);
            color: var(--accent-light);
            padding: 60px 0;
            height: 500px;
            position: relative;
        }

        .hero-section .hero-icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: var(--primary-dark);
            border: none;
            color: var(--accent-light);
        }

        .btn-primary:hover {
            background-color: var(--button-hover);
        }

        /* About Section */
        .about-section {
            padding: 60px 0;
            background-color: var(--secondary-dark);
            color: var(--accent-light);
        }

        /* Navbar */
        .navbar-dark .navbar-nav .nav-link {
            color: var(--accent-light);
        }

        .navbar-dark .navbar-nav .nav-link.active,
        .navbar-dark .navbar-nav .nav-link:hover {
            color: #fff;
        }

        .projects-section,
        .reviews-section {
            position: relative;
            color: #ffffff;
        }

        .project-box,
        .review-box {
            background: rgba(255, 255, 255, 0.1); /* Semi-transparent white background */
            border-radius: 0.5rem; /* Rounded corners */
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .project-box:hover,
        .review-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .project-icon i,
        .review-icon i {
            color: #ffffff; /* White icons for better visibility */
        }

        .project-title,
        .review-name {
            color: #ffffff; /* White text color for titles and names */
        }

        .project-text,
        .review-text {
            color: #cccccc; /* Light grey text color for descriptions */
        }

        .projects-pattern,
        .reviews-pattern {
            top: 0;
            left: 0;
            z-index: -1;
        }

        .footer-section {
            background-color: #002B5C; /* Dark blue background */
            color: #ffffff; /* White text color */
        }

        .footer-section a:hover {
            text-decoration: underline; /* Underline links on hover */
        }

        .social-media-icons a {
            transition: color 0.3s; /* Smooth color transition on hover */
        }

        .social-media-icons a:hover {
            color: #ffffff; /* Highlight color for social media icons on hover */
        }

        .social-media-icons i {
            font-size: 2rem; /* Set icon size */
        }

            .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #1C3A87; /* Background color for better visibility */
            border-radius: 50%; /* Rounded buttons */
            height: 3rem;
            width: 3rem;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-size: 100%, 100%; /* Adjust icon size */
        }
        
            .carousel-control-prev,
        .carousel-control-next {
            z-index: 5; /* Ensure the controls are above other content */
        }
        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fadeIn 1.5s ease forwards;
        }

        .animate-slide-up {
            animation: slideUp 1.5s ease forwards;
        }

        .animate-zoom-in {
            animation: zoomIn 1.5s ease forwards;
        }

        /* Add a delay for elements */
        [style*="animation-delay"] {
            opacity: 0;
        }

                .get-in-touch {
            background-color: #f8f9fa;
        }

        .contact-info .contact-item {
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }

        .contact-info .contact-item:last-child {
            border-bottom: none;
        }

        .contact-info p {
            font-size: 1.1rem;
            margin: 0;
        }

        .contact-info a {
            text-decoration: none;
            color: #1C3A87;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">CODECrafter</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('cc.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('cc.About') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('cc.service') }}">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('cc.contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('cc.Enquiry') }}">Enquiry</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    

<!-- Hero Section -->
<main>
    <section class="hero-section text-center">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-md-7 text-md-start text-center">
                    <h1 class="display-4 fw-bold mb-3 animate-fade-in" style="color: #000000;">
                        Code Crafter services
                    </h1>
                    <p class="lead mb-4 animate-fade-in" style="animation-delay: 0.5s; color: #000000; font-weight: bold; font-size: 16px;">
                        Celebrating 4 years of excellence, CODECrafter doesn’t just create websites – we deliver exceptional digital experiences tailored to your business needs. 
                        Elevate your brand with our top-notch design, development, and innovative strategies.
                    </p>
                    <p class="animate-fade-in" style="animation-delay: 0.7s; color: #000000; font-size: 14px;">
                        From bespoke web development to immersive UX/UI design, our solutions are built to scale, 
                        ensuring your business stays ahead of the curve. Trust us to craft digital solutions that stand out.
                    </p>
                    <button class="btn btn-light btn-lg animate-slide-up" style="background-color: #1a73e8; color: white; border: none;">
                        Get Started Today
                    </button>
                </div>
                <div class="col-md-5 d-none d-md-block">
                    <!-- Hero Icons or Illustrations -->
                </div>
            </div>
            <!-- Background Pattern -->
            <div class="hero-pattern position-absolute top-0 start-0 w-100 h-100">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 800" fill="none"
                    class="animate-fade-in" style="animation-delay: 0.5s;">
                    <circle cx="400" cy="400" r="400" fill="rgba(26, 115, 232, 0.05)" />
                    <circle cx="600" cy="200" r="200" fill="rgba(26, 115, 232, 0.1)" />
                </svg>
            </div>
        </div>
    </section>
</main>

<!-- About  Section -->
<section class="about-section text-center py-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <h2 class="display-5 fw-bold mb-4 animate-fade-in">Discover What Sets Us Apart</h2>
                <p class="lead mb-5 animate-fade-in" style="animation-delay: 0.5s;">
                    At CODECrafter, we redefine the digital landscape with a unique blend of creativity, technology, and strategy. Our mission is to empower your business with solutions that not only meet but exceed expectations.
                </p>
            </div>
        </div>
        <div class="row">
            <!-- Feature 1 -->
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="feature-box p-4 border rounded shadow-sm bg-light d-flex flex-column justify-content-between animate-fade-in" style="animation-delay: 1s;">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-lightbulb" style="font-size: 2rem; color: #1a73e8;"></i>
                    </div>
                    <h4 class="feature-title fw-bold">Creative Vision</h4>
                    <p class="feature-text">We leverage our creative vision to craft solutions that are not only functional but also captivating and memorable, ensuring your brand stands out in a crowded market.</p>
                </div>
            </div>
            <!-- Feature 2 -->
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="feature-box p-4 border rounded shadow-sm bg-light d-flex flex-column justify-content-between animate-fade-in" style="animation-delay: 1.5s;">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-code-slash" style="font-size: 2rem; color: #1a73e8;"></i>
                    </div>
                    <h4 class="feature-title fw-bold">Cutting-Edge Technology</h4>
                    <p class="feature-text">Our team utilizes the latest technologies and methodologies to build robust, scalable, and secure digital solutions that meet the evolving needs of your business.</p>
                </div>
            </div>
            <!-- Feature 3 -->
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="feature-box p-4 border rounded shadow-sm bg-light d-flex flex-column justify-content-between animate-fade-in" style="animation-delay: 2s;">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-gear" style="font-size: 2rem; color: #1a73e8;"></i>
                    </div>
                    <h4 class="feature-title fw-bold">Customized Strategies</h4>
                    <p class="feature-text">We understand that every business is unique. Our tailored strategies are designed to address your specific challenges and goals, ensuring the most effective and efficient solutions.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About info Section -->
<!-- About Section -->
<section class="about-section text-center py-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <h2 class="display-5 fw-bold mb-4">About Us</h2>
                <p class="lead mb-5">
                    With over 10 years of experience, CODECrafter is the leading choice for your SEO needs. Our innovative solutions and dedicated team ensure you get the best digital experience.
                </p>
            </div>
        </div>
        <div class="row">
            <!-- Feature 1 -->
            <div class="col-md-4 mb-4 d-flex justify-content-center">
                <div class="feature-hover p-4 rounded">
                    <i class="bi bi-trophy" style="font-size: 3rem; color: #1a73e8;"></i>
                    <h4 class="fw-bold mt-3">Award Winning</h4>
                    <p class="text-muted">Our innovative SEO solutions have earned us numerous industry awards, reflecting our commitment to excellence.</p>
                </div>
            </div>
            <!-- Feature 2 -->
            <div class="col-md-4 mb-4 d-flex justify-content-center">
                <div class="feature-hover p-4 rounded">
                    <i class="bi bi-person-lines-fill" style="font-size: 3rem; color: #1a73e8;"></i>
                    <h4 class="fw-bold mt-3">Professional Staff</h4>
                    <p class="text-muted">Our team of SEO experts is highly skilled and dedicated to providing you with the best service possible.</p>
                </div>
            </div>
            <!-- Feature 3 -->
            <div class="col-md-4 mb-4 d-flex justify-content-center">
                <div class="feature-hover p-4 rounded">
                    <i class="bi bi-headset" style="font-size: 3rem; color: #1a73e8;"></i>
                    <h4 class="fw-bold mt-3">24/7 Support</h4>
                    <p class="text-muted">We offer round-the-clock support to ensure your digital presence remains strong at all times.</p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <h4 class="fw-bold mb-3">Connect With Us</h4>
                <div class="social-links d-flex justify-content-center">
                    <a href="https://www.instagram.com/yourusername" class="btn btn-outline-dark me-2" target="_blank" aria-label="Instagram">
                        <i class="bi bi-instagram" style="font-size: 2rem; color: #1a73e8;"></i>
                    </a>
                    <a href="https://www.facebook.com/yourusername" class="btn btn-outline-dark me-2" target="_blank" aria-label="Facebook">
                        <i class="bi bi-facebook" style="font-size: 2rem; color: #1a73e8;"></i>
                    </a>
                    <a href="https://twitter.com/yourusername" class="btn btn-outline-dark me-2" target="_blank" aria-label="Twitter">
                        <i class="bi bi-twitter" style="font-size: 2rem; color: #1a73e8;"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/yourusername" class="btn btn-outline-dark" target="_blank" aria-label="LinkedIn">
                        <i class="bi bi-linkedin" style="font-size: 2rem; color: #1a73e8;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- CSS for hover effect -->
<style>
    .feature-hover {
        transition: transform 0.3s, box-shadow 0.3s;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    .feature-hover:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.3);
    }
    </style>
    
</section>






<!-- Get In Touch Section -->
<section class="get-in-touch py-5" style="background-color: #C7DBF7;">
    <div class="container">
        <h2 class="display-5 fw-bold text-center mb-4" style="color: #1C3A87;">Get In Touch</h2>
        <div class="row justify-content-center">
            <!-- Contact Item -->
            <div class="col-md-4 mb-4 ">
                <div class="contact-info d-flex align-items-center p-4 rounded" style="background-color: #ffffff; border-left: 5px solid #1C3A87; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 100%;">
                    <i class="bi bi-geo-alt" style="font-size: 3rem; color: #1C3A87;"></i>
                    <div class="ms-3">
                        <h4 class="mb-2" style="color: #1C3A87;">Our Address</h4>
                        <p style="color: #333333; font-size: 1rem;">
                            R.S.No. 590 Office No.3 First Floor, Shahupuri Complex, Vyapari Peth, Kolhapur
                        </p>
                    </div>
                </div>
            </div>
            <!-- Contact Item -->
            <div class="col-md-4 mb-4 ">
                <div class="contact-info d-flex align-items-center p-4 rounded" style="background-color: #ffffff; border-left: 5px solid #1C3A87; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 100%;">
                    <i class="bi bi-phone" style="font-size: 3rem; color: #1C3A87;"></i>
                    <div class="ms-3">
                        <h4 class="mb-2" style="color: #1C3A87;">Call Us</h4>
                        <p style="color: #333333; font-size: 1rem;">
                            +91 9518396964
                        </p>
                    </div>
                </div>
            </div>
            <!-- Contact Item -->
            <div class="col-md-4 mb-4 ">
                <div class="contact-info d-flex align-items-center p-4 rounded" style="background-color: #ffffff; border-left: 5px solid #1C3A87; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 100%;">
                    <i class="bi bi-envelope" style="font-size: 3rem; color: #1C3A87;"></i>
                    <div class="ms-3">
                        <h4 class="mb-2" style="color: #1C3A87;">Email Us</h4>
                        <p style="color: #333333; font-size: 1rem;">
                            <a href="mailto:codecrafterservices@gmail.com" style="color: #1C3A87; text-decoration: none;">codecrafterservices@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






   <!-- Footer -->
<footer>
    <div class="footer-section text-center" style="padding: 8px 0;">
        <div class="container">
            <div class="row">
            <div class="col-md-6 mt-3">
            <p style="font-size: 12px;">&copy; 2024 <a href="{{route('admin.login1')}}" target="_blank">CODECrafter</a>. All rights reserved.</p>
             </div>

                <div class="col-md-6">
                    <div class="social-media-icons">
                        <a href="#" class="me-2" style="font-size: 14px;"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="me-2" style="font-size: 14px;"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="me-2" style="font-size: 14px;"><i class="bi bi-linkedin"></i></a>
                        <a href="#" style="font-size: 14px;"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

  
</body>
</html>
