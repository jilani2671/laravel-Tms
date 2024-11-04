@extends('layouts.masterlayout2')

@section('content2')
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">

  <style>
    .content 
    {
      margin-left: 123px; /* Ensure this matches the sidebar width */
      flex: 1;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: calc(80vh - 10px); /* Adjust to account for any padding or margins */
    }

    @media (max-width: 768px) {
      .sidebar {
        min-width: 100%;
        max-width: 100%;
        height: auto;
        position: relative;
      }

      .content {
        margin-left: 0;
        height: auto;
      }
    }

    .confirm-box {
      width: 100%; /* Adjust width to be responsive */
      max-width: 800px; /* Adjust max-width if needed */
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

  <div class="content">
    <div class="confirm-box">
      <div class="card card-outline card-primary">
        <div class="card-body">
          <div class="card-header text-center">
            <a href="#" class="h1"><b>Code Crafters</b></a>
          </div>
          <h4 class="login-box-msg">Project Management</h4>

          <!-- Display success message -->
          <div id="success-message" class="alert alert-success d-none"></div>

          <!-- Display validation errors -->
          <div id="error-message" class="alert alert-danger d-none"></div>

          <form id="registrationForm" action="{{ route('bawork.stores') }}" method="POST">
            @csrf
            <input type="hidden" name="business_analyst_name" value="{{ session('user.name') ?? 'Guest' }}">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="project_name" class="form-label">Project Name</label>
                <input type="text" id="project_name" name="project_name" class="form-control" placeholder="Enter Project Name">
                <div class="invalid-feedback">Project name is required.</div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="tech" class="form-label">Technology</label>
                <input type="text" id="tech" name="tech" class="form-control" placeholder="Enter Technology">
                <div class="invalid-feedback">Valid technology is required.</div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select">
                  <option value="" selected disabled>Select status</option>
                  <option value="ongoing">Ongoing</option>
                  <option value="upcoming">Upcoming</option>
                  <option value="pending">Pending</option>
                  <option value="completed">Completed</option>
                </select>
                <div class="invalid-feedback">Status is required.</div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="dev_team" class="form-label">Developer Team</label>
                <input type="text" id="dev_team" name="dev_team" class="form-control" placeholder="Enter Dev Team">
                <div class="invalid-feedback">Developer team is required.</div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="start_date" class="form-label">Project Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control">
              </div>
              <div class="col-md-6 mb-3">
                <label for="end_date" class="form-label">Project End Date</label>
                <input type="date" id="end_date" name="end_date" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <button type="submit" class="btn btn-primary btn-block btn-wide">Store</button>
              </div>
              <div class="col-md-6 mb-3">
                <button type="reset" class="btn btn-secondary btn-block btn-wide">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
  
  <script>
    // JavaScript to handle form submission, show success message, and validation errors
    document.addEventListener('DOMContentLoaded', function () {
      const form = document.getElementById('registrationForm');
      const successMessageDiv = document.getElementById('success-message');
      const errorMessageDiv = document.getElementById('error-message');

      form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(form);
        
        fetch(form.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            successMessageDiv.textContent = 'Project details have been saved successfully!';
            successMessageDiv.classList.remove('d-none');
            errorMessageDiv.classList.add('d-none'); // Hide error message if any
            form.reset();
          } else if (data.errors) {
            let errorMessages = '';
            for (const [key, errors] of Object.entries(data.errors)) {
              errorMessages += errors.join(' ') + ' ';
              document.querySelector(`#${key}`).classList.add('is-invalid');
            }
            errorMessageDiv.textContent = errorMessages;
            errorMessageDiv.classList.remove('d-none');
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
      });
    });
  </script>
@endsection
