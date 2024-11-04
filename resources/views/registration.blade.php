<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enquiry form </title>
    <link rel="icon" href="img/cc.png" type="image/png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

    <style>
        .register-box {
            width: 90%;
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .register-box .card {
            border: none;
        }
        .invalid-feedback {
            display: none;
            color: red;
        }
        .is-invalid + .invalid-feedback {
            display: block;
        }
    </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-body">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Code Crafters</b></a>
            </div>
            <h4 class="login-box-msg">Enquiry Form</h4>
            <div id="success-message" class="alert alert-success" style="display: none;">
                Registration successful!
            </div>
            <form id="registrationForm" action="{{ route('register.submit') }}" method="post">
                @csrf <!-- CSRF protection for Laravel -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="text" name="full_name" class="form-control" placeholder="Full name">
                            <div class="invalid-feedback">Full name is required.</div>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <div class="invalid-feedback">Valid email is required.</div>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="tel" name="phone_number" class="form-control" placeholder="Phone Number">
                            <div class="invalid-feedback">Phone number is required.</div>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="date" name="date_of_birth" class="form-control" placeholder="Date of Birth">
                            <div class="invalid-feedback">Date of birth is required.</div>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-calendar-alt"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="courses">Select Course</label>
                            <select class="form-control" id="courses" name="course">
                                <option value="">Select a course</option>
                                <option value="C">C</option>
                                <option value="C++">C++</option>
                                <option value="Php">Php</option>
                                <option value="Java">Java</option>
                                <option value="Spring-boot">Spring-boot</option>
                                <option value="Aws">Aws</option>
                                <option value="Angular">Angular</option>
                            </select>
                            <div class="invalid-feedback">Please select a course.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="textAreaInput">Enquiries</label>
                            <textarea class="form-control" id="textAreaInput" name="enquiries" rows="1" placeholder="Enter your enquiries"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="agree_terms" value="1">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                            <div class="invalid-feedback">You must agree to the terms.</div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-6 mb-2 mb-md-0">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <div class="col-12 col-md-6">
                        <button type="reset" class="btn btn-secondary btn-block">Reset</button>
                    </div>
                </div>
            </form>
        </div><!-- /.card-body -->
    </div><!-- /.card -->
</div><!-- /.register-box -->

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

<script>
   document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registrationForm');
    const successMessage = document.getElementById('success-message');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        let valid = true;

        // Validate form fields (existing validation logic)
        // ...

        if (valid) {
            // If the form is valid, submit it via AJAX
            $.ajax({
                url: form.action,
                method: form.method,
                data: $(form).serialize(),
                success: function(response) {
                    if (response.success) {
                        // Show success message
                        successMessage.style.display = 'block';
                        // Reset the form
                        form.reset();
                        // Hide validation messages
                        form.querySelectorAll('.is-invalid').forEach(function(element) {
                            element.classList.remove('is-invalid');
                        });
                    } else {
                        // Handle the case where the registration failed (e.g., user already exists)
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    // Handle the error response if needed
                    console.error(xhr.responseText);
                    alert('An error occurred. Please try again.');
                }
            });
        }
    });
});
</script>
</body>
</html>
