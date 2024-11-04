@extends('layouts.masterlayout')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    body {
        background: #f8f2f2;
        font-family: "Poppins", sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .wrapper {
        max-width: 500px;
        padding: 40px 30px 50px;
        background: #f8f9fa;
        border-radius: 5px;
        text-align: center;
        box-shadow: 10px 10px 15px rgba(209, 13, 13, 0.1);
        border: 5px solid #c1c2c7; /* Added border */
    }

    .wrapper header {
        font-size: 35px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .input-area {
        position: relative;
    }

    .icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 15px;
        color: #bfbfbf;
        transition: color 0.2s ease;
    }

    .error-icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 15px;
        color: #dc3545;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"] {
        width: 100%;
        height: 50px;
        padding: 0 45px;
        font-size: 18px;
        background: none;
        caret-color: #5372F0;
        border-radius: 5px;
        border: 1px solid #bfbfbf;
        border-bottom-width: 2px;
        transition: all 0.2s ease;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="tel"]:focus,
    input[type="password"]:focus {
        border-color: #5372F0;
    }

    .error {
        display: none;
        color: #dc3545;
        text-align: left;
        margin-top: 5px;
    }

    .error-icon {
        color: #dc3545;
    }

    input[type="submit"] {
        width: 100%;
        height: 50px;
        color: #fff;
        padding: 0;
        border: none;
        background: #5372F0;
        cursor: pointer;
        border-bottom: 2px solid rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    input[type="submit"]:hover {
        background: #2c52ed;
    }

    @media screen and (max-width: 480px) {
        .wrapper {
            width: 90%;
            max-width: 500px;
        }
    }

    .success-message {
        display: none;
        color: #28a745;
        font-size: 18px;
        margin-top: 20px;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="wrapper">
    <header>Code Crafters Registration</header><hr>
    <form action="{{ route('user_regis.stores') }}" method="POST" id="registrationForm">
        @csrf
        <div class="form-group">
            <div class="input-area">
                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autocomplete="name">
                <i class="icon fas fa-user"></i>
                <div class="invalid-feedback">Name is required and must be a string with a maximum of 255 characters.</div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-area">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required autocomplete="email">
                <i class="icon fas fa-envelope"></i>
                <div class="invalid-feedback">Email is required, must be a valid email, and must be unique.</div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-area">
                <input type="tel" id="phone_no" name="phone_no" class="form-control" placeholder="Phone Number" required autocomplete="tel">
                <i class="icon fas fa-phone"></i>
                <div class="invalid-feedback">Phone number is required and must be a string with a maximum of 20 characters.</div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-area">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autocomplete="new-password">
                <i class="icon fas fa-lock"></i>
                <div class="invalid-feedback">Password is required and must be at least 8 characters long.</div>
            </div>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Register">
    </form>
    <div class="sign-txt">Already a member? <a href="{{ route('bi.logout') }}">Login here</a></div>
    <div class="success-message" id="successMessage">Successfully registered!</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var form = document.getElementById('registrationForm');
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault();
                    $.ajax({
                        url: "{{ route('user_regis.stores') }}",
                        type: "POST",
                        data: $(form).serialize(),
                        success: function(response) {
                            console.log(response); // Log the response for debugging
                            if (response.message) {
                                alert(response.message);
                                window.location.href = "/bi/user_regis"; // Redirect to the login page
                            }
                        },
                        error: function(response) {
                            console.log(response); // Log the error for debugging
                            // Handle errors if needed
                        }
                    });
                }
                form.classList.add('was-validated');
            }, false);
        }, false);
    })();
</script>

@endsection
