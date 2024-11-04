@extends('layouts.masterlayout2')

@section('content2')
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
    .edit-box {
        width: 75%;
        max-width: 65%;
        margin: 0 auto;
        padding: 30px;
        background: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }
    .edit-box .card {
        border: none;
    }
    .edit-box .card-header {
        background-color: #007bff;
        color: #fff;
        border-bottom: 1px solid #ddd;
    }
    .invalid-feedback {
        display: none;
        color: red;
    }
    .is-invalid + .invalid-feedback {
        display: block;
    }
</style>

<div class="edit-box">
    <div class="card card-outline card-primary">
        <div class="card-body">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Code Crafters</b></a>
            </div>
            <h4 class="login-box-msg text-center">Edit Project</h4>
            <form method="POST" action="{{ route('projects.update', $project->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <input type="text" id="project_name" name="project_name" class="form-control" value="{{ old('project_name', $project->project_name) }}" placeholder="Enter project name" required>
                            <div class="invalid-feedback">Project name is required.</div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="tech">Technology</label>
                            <input type="text" id="tech" name="tech" class="form-control" value="{{ old('tech', $project->tech) }}" placeholder="Enter technology" required>
                            <div class="invalid-feedback">Technology is required.</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select">
                            <option value="" selected disabled>Select status</option>
                            <option value="ongoing" {{ old('status', $project->status) == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="upcoming" {{ old('status', $project->status) == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                            <option value="pending" {{ old('status', $project->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        <div class="invalid-feedback">Status is required.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="dev_team">Dev Team</label>
                            <input type="text" id="dev_team" name="dev_team" class="form-control" value="{{ old('dev_team', $project->dev_team) }}" placeholder="Enter development team" required>
                            <div class="invalid-feedback">Development team is required.</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', $project->start_date) }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date', $project->end_date) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="business_analyst_name">BA Name</label>
                            <input type="text" id="business_analyst_name" name="business_analyst_name" class="form-control" value="{{ old('business_analyst_name', $project->business_analyst_name) }}" placeholder="Enter BA name">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Update Project</button>
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
        const form = document.querySelector('form');

        form.addEventListener('submit', function(event) {
            let valid = true;

            const requiredFields = ['project_name', 'tech', 'status', 'dev_team'];

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
    });
</script>
@endsection
