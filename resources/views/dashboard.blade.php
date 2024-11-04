@extends('layouts.masterlayout')

@section('content')
    <!-- CSS Links -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Course Admissions Dashboard</h2>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Course Popularity</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="coursePopularityChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Links -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function() {
            fetch('/dashboard-data').then(response => response.json()).then(data => {
                var ctx = document.getElementById('coursePopularityChart').getContext('2d');
                var coursePopularityChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.courses,
                        datasets: [{
                            label: '# of Students',
                            data: data.counts,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection



