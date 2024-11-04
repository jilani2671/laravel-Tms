<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BA Login</title>
    <link rel="icon" href="/img/cc.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        body {
            background: #a5acac;
            font-family: "Poppins", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .wrapper {
            max-width: 500px; /* Increased max width */
            padding: 60px 50px 70px; /* Increased padding */
            background: #f8f9fa; /* Updated background color */
            border-radius: 10px; /* Increased border radius */
            text-align: center;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.1);
            border: 5px solid #c1c2c7; /* Added border */
        }

        .wrapper header {
            font-size: 40px; /* Increased font size */
            font-weight: 600;
            margin-bottom: 30px; /* Increased margin-bottom */
        }

        .form-group {
            margin-bottom: 25px; /* Increased margin-bottom */
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
        input[type="password"] {
            width: 100%;
            height: 55px; /* Increased height */
            padding: 0 55px; /* Increased padding */
            font-size: 20px; /* Increased font size */
            background: none;
            caret-color: #5372F0;
            border-radius: 5px;
            border: 1px solid #bfbfbf;
            border-bottom-width: 2px;
            transition: all 0.2s ease;
        }

        input[type="text"]:focus,
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

        .pass-txt {
            text-align: left;
            margin-top: -10px;
        }

        input[type="submit"] {
            width: 100%;
            height: 55px; /* Increased height */
            color: #fff;
            padding: 0;
            border: none;
            background: #5372F0;
            cursor: pointer;
            border-bottom: 2px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        input[type="submit"]:hover {
            background: #5a73c6;
        }

        @media screen and (max-width: 480px) {
            .wrapper {
                width: 90%;
                max-width: 500px;
            }

            .pass-txt {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <header>Code Crafters</header>
        <h3>BA Login</h3>
        <hr>
        <form action="{{ route('login') }}" method="POST" class="needs-validation">
            @csrf
            <!-- Form fields -->
            <div class="form-group">
                <div class="input-area">
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email Address" required autocomplete="email">
                    <i class="icon fas fa-envelope"></i>
                    <i class="error-icon fas fa-exclamation-circle"></i>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-area">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autocomplete="current-password">
                    <i class="icon fas fa-lock"></i>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Login">
        </form>
    </div>

    <!-- Bootstrap JS and dependencies (for form validation) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>
</html>
