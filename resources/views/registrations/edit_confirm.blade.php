@extends('layouts.masterlayout')

@section('content')
<!-- CSS Links -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">

<style>
    .confirm-box {
        width: 75%;
        max-width: 65%;
        margin: 0 auto;
        padding: 30px;
         background-color: #f8f2f2;
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
    .btn-wide {
        width: 100%;
    }
</style>

<div class="confirm-box">
    <div class="card card-outline card-primary">
        <div class="card-body">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Code Crafters</b></a>
            </div>
            <h4 class="login-box-msg">Edit Admission Details</h4>
            <form id="editForm" action="{{ route('registrations.saveUpdates', $admission->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="full_name" name="full_name" class="form-control" value="{{ old('full_name', $admission->full_name) }}" placeholder="Enter full name">
                            <div class="invalid-feedback">Full name is required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $admission->email) }}" placeholder="Enter email">
                            <div class="invalid-feedback">Valid email is required.</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="tel" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number', $admission->phone_number) }}" placeholder="Enter phone number">
                            <div class="invalid-feedback">Phone number is required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="course">Course</label>
                            <input type="text" id="course" name="course" class="form-control" value="{{ old('course', $admission->course) }}" placeholder="Enter course">
                            <div class="invalid-feedback">Course is required.</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="installment1">Installment 1</label>
                            <input type="text" id="installment1" name="installment1" class="form-control" value="{{ old('installment1', $admission->installment1) }}" placeholder="Enter installment 1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="installment2">Installment 2</label>
                            <input type="text" id="installment2" name="installment2" class="form-control" value="{{ old('installment2', $admission->installment2) }}" placeholder="Enter installment 2">
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="total_fees">Total Fees</label>
                            <input type="text" id="total_fees" name="total_fees" class="form-control" value="{{ old('total_fees', $admission->total_fees) }}" placeholder="Enter total fees">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="remaining_fees">Pending Installment</label>
                            <input type="text" id="remaining_fees" name="remaining_fees" class="form-control" value="{{ old('remaining_fees', $admission->remaining_fees) }}" placeholder="Pending Fees">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block btn-wide">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JS Links -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

<script>
    function calculateRemainingFees() {
        var totalFees = parseFloat(document.getElementById('total_fees').value) || 0;
        var installment1 = parseFloat(document.getElementById('installment1').value) || 0;
        var installment2 = parseFloat(document.getElementById('installment2').value) || 0;

        var remainingFees = totalFees - (installment1 + installment2);
        document.getElementById('remaining_fees').value = remainingFees.toFixed(2);
    }

    document.getElementById('editForm').addEventListener('submit', function(event) {
        var isValid = true;
        var requiredFields = ['full_name', 'email', 'phone_number', 'course'];

        requiredFields.forEach(function(field) {
            var input = document.getElementById(field);
            if (!input.value.trim()) {
                input.classList.add('is-invalid');
                isValid = false;
            } else {
                input.classList.remove('is-invalid');
            }
        });

        if (!isValid) {
            event.preventDefault();
        } else {
            // Update total fees and remaining fees fields before submitting
            document.getElementById('total_fees').value = updateTotalFees(document.getElementById('course').value.trim());
            calculateRemainingFees();
        }
    });

    function updateTotalFees(course) {
        var fees = {
            'c': 3500,
            'c++': 4000,
            'php': 12000,
            'java': 10000,
            'spring-boot': 10000,
            'aws': 29000,
            'angular': 15000
        };

        return fees[course.toLowerCase()] || '';
    }

    document.getElementById('course').addEventListener('input', function() {
        var course = this.value.trim();
        var totalFees = document.getElementById('total_fees');
        
        totalFees.value = updateTotalFees(course);
        calculateRemainingFees();
    });

    document.getElementById('installment1').addEventListener('input', calculateRemainingFees);
    document.getElementById('installment2').addEventListener('input', calculateRemainingFees);

    document.addEventListener('DOMContentLoaded', function() {
        var course = document.getElementById('course').value.trim();
        document.getElementById('total_fees').value = updateTotalFees(course);
        calculateRemainingFees();
    });
</script>
@endsection
