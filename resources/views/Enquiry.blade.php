<html>
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
                <div class="col-md-7 text-md-start text-center ">
                    <h1 class="display-4 fw-bold mb-3 animate-fade-in" style="color: #000000;">Quality Of Our Design Speaks For Us</h1>
                    <p class="lead mb-4 animate-fade-in" style="animation-delay: 0.5s; color: #000000; font-weight: bold; font-size: 16px;">Take your business to the next level with our Website Design and Development Services</p>


                    <button class="btn btn-light btn-lg animate-slide-up" style="background-color: #1a73e8; color: white; border: none;">Contact Us</button>
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

    <!-- About Section -->
    <section class="about-section text-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="display-5 fw-bold mb-4 animate-fade-in">The Best Code Crafters Solution</h2>
                    <p class="lead mb-5 animate-fade-in" style="animation-delay: 0.5s;">Innovative solutions tailored to meet the unique needs of your business.</p>
                </div>
            </div>
            <div class="row">
                <!-- Feature 1 -->
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 border rounded shadow-sm animate-slide-up" style="animation-delay: 1s;">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-lightbulb" style="font-size: 2rem; color: #000000;"></i>
                        </div>
                        <h4 class="feature-title fw-bold">Innovative Ideas</h4>
                        <p class="feature-text">We bring cutting-edge ideas to life to give your business a unique edge.</p>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 border rounded shadow-sm animate-slide-up" style="animation-delay: 1.5s;">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-code-slash" style="font-size: 2rem; color: #000000;"></i>
                        </div>
                        <h4 class="feature-title fw-bold">Expert Coding</h4>
                        <p class="feature-text">Our expert developers use the latest technologies to build robust and scalable solutions.</p>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 border rounded shadow-sm animate-slide-up" style="animation-delay: 2s;">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-gear" style="font-size: 2rem; color: #000000;"></i>
                        </div>
                        <h4 class="feature-title fw-bold">Tailored Solutions</h4>
                        <p class="feature-text">We customize our solutions to fit your specific needs and business goals.</p>
                    </div>
                </div>
            </div>
        </div>
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

<section id="registration-section" class="py-5" style="background-color: #E3F2FD;">
    <div class="container">
        <h2 class="text-center mb-5" style="color: #1976D2;">Register Now</h2>
        <form id="registrationForm" action="{{ route('register.submit') }}" method="post">
            @csrf <!-- CSRF protection for Laravel -->

            <div class="row mb-4">
                <!-- Full Name -->
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="text" name="full_name" class="form-control form-control" id="full_name" placeholder="Full name" required>
                        <label for="full_name">Full Name</label>
                        <div class="invalid-feedback">Full name is required.</div>
                    </div>
                </div>
                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control form-control" id="email" placeholder="Email" required>
                        <label for="email">Email</label>
                        <div class="invalid-feedback">Valid email is required.</div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <!-- Phone Number -->
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="tel" name="phone_number" class="form-control form-control" id="phone_number" placeholder="Phone Number" required>
                        <label for="phone_number">Phone Number</label>
                        <div class="invalid-feedback">Phone number is required.</div>
                    </div>
                </div>
                <!-- Date of Birth -->
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="date" name="date_of_birth" class="form-control form-control" id="date_of_birth" placeholder="Date of Birth" required>
                        <label for="date_of_birth">Date of Birth</label>
                        <div class="invalid-feedback">Date of birth is required.</div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <!-- Select Course -->
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <select class="form-select form-select" id="courses" name="course" required>
                            <option value="" disabled selected>Select a course</option>
                            <option value="C">C</option>
                            <option value="C++">C++</option>
                            <option value="Php">Php</option>
                            <option value="Java">Core-Java</option>
                            <option value="Spring-boot">Spring-boot</option>
                            <option value="Aws">Aws</option>
                            <option value="Angular">Angular</option>
                        </select>
                        <label for="courses">Select Course</label>
                        <div class="invalid-feedback">Please select a course.</div>
                    </div>
                </div>
                <!-- Enquiries -->
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <textarea class="form-control form-control" id="textAreaInput" name="enquiries" rows="3" placeholder="Enter your enquiries"></textarea>
                        <label for="textAreaInput">Enquiries</label>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <!-- Agree to Terms -->
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="agreeTerms" name="agree_terms" value="1" required>
                        <label class="form-check-label" for="agreeTerms">
                            I agree to the <a href="#" style="color: #1976D2;">terms</a>
                        </label>
                        <div class="invalid-feedback">You must agree to the terms.</div>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <button type="submit" class="btn btn-dark btn-lg" style="background-color: #1976D2; border: none;">Register</button>
            </div>
        </form>
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
                    <div class="social-media-icons mt-2">
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
