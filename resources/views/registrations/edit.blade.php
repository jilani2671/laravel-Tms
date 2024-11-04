@extends('layouts.masterlayout')

@section('content')
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
    .confirm-box {
        width: 75%;
        max-width: 65%;
        margin: 0 auto;
        padding: 30px;
        background: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }
    .confirm-box .card {
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

<div class="confirm-box">
    <div class="card card-outline card-primary">
        <div class="card-body">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Code Crafters</b></a>
            </div>
            <h4 class="login-box-msg">Edit Registration Details</h4>
            <form id="editForm" action="{{ route('registrations.update', $registration->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="full_name" name="full_name" class="form-control" value="{{ old('full_name', $registration->full_name) }}" placeholder="Enter full name">
                            <div class="invalid-feedback">Full name is required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $registration->email) }}" placeholder="Enter email">
                            <div class="invalid-feedback">Valid email is required.</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="tel" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number', $registration->phone_number) }}" placeholder="Enter phone number">
                            <div class="invalid-feedback">Phone number is required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="course">Course</label>
                            <input type="text" id="course" name="course" class="form-control" value="{{ old('course', $registration->course) }}" placeholder="Enter course">
                            <div class="invalid-feedback">Course is required.</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="installment1">Installment 1</label>
                            <input type="text" id="installment1" name="installment1" class="form-control" value="{{ old('installment1', $registration->installment1) }}" placeholder="Enter installment 1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="installment2">Installment 2</label>
                            <input type="text" id="installment2" name="installment2" class="form-control" value="{{ old('installment2', $registration->installment2) }}" placeholder="Enter installment 2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="total_fees">Total Fees</label>
                            <input type="text" id="total_fees" name="total_fees" class="form-control" placeholder="Enter total fees">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="remaining_fees">Remaining Fees</label>
                            <input type="text" id="remaining_fees" name="remaining_fees" class="form-control" placeholder="Remaining fees" readonly>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Confirm Admission</button>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('editForm');

        form.addEventListener('submit', function(event) {
            let valid = true;

            const requiredFields = ['full_name', 'email', 'phone_number', 'course'];

            requiredFields.forEach(function(field) {
                const input = document.getElementById(field);
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    valid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!valid) {
                event.preventDefault();
            }
        });

        const courseInput = document.getElementById('course');
        const totalFeesInput = document.getElementById('total_fees');
        const installment1Input = document.getElementById('installment1');
        const installment2Input = document.getElementById('installment2');
        const remainingFeesInput = document.getElementById('remaining_fees');

        const fees = {
            'c': 3500,
            'c++': 4000,
            'php': 12000,
            'java': 10000,
            'spring-boot': 10000,
            'aws': 29000,
            'angular': 15000
        };

        courseInput.addEventListener('input', function() {
            const course = this.value.trim().toLowerCase();
            totalFeesInput.value = fees[course] || '';
            calculateRemainingFees();
        });

        function calculateRemainingFees() {
            const totalFees = parseFloat(totalFeesInput.value) || 0;
            const installment1 = parseFloat(installment1Input.value) || 0;
            const installment2 = parseFloat(installment2Input.value) || 0;

            const remainingFees = totalFees - (installment1 + installment2);
            remainingFeesInput.value = remainingFees.toFixed(2);
        }

        installment1Input.addEventListener('input', calculateRemainingFees);
        installment2Input.addEventListener('input', calculateRemainingFees);

        // Set initial total fees based on old course value
        const initialCourse = courseInput.value.trim().toLowerCase();
        if (fees.hasOwnProperty(initialCourse)) {
            totalFeesInput.value = fees[initialCourse];
            calculateRemainingFees();
        }
    });
</script>
@endsection
