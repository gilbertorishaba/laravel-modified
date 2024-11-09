@extends('backend.layouts.main')

@section('content')
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('backend.layouts.nav')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            @include('backend.layouts.sidebar')

            <!-- Main Panel -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Page Header -->
                    <div class="page-header">
                        <h3 class="page-title">Dashboard</h3>
                    </div>

                    <!-- Statistics Section -->
                    <div class="row grid-margin">
                        <div class="col-12">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts and Table Section -->
                    <div class="row">
                        <!-- Number of Students Enrolled Chart -->
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-users"></i> Students Enrolled in Courses</h4>
                                    <canvas id="enrollment-chart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Student Details Table -->
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-user-graduate"></i> Student Details</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Course Enrolled</th>
                                                    <th>Enrollment Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $student)
                                                    <tr>
                                                        <td>{{ $student->name }}</td>
                                                        <!-- Check if course exists before accessing it -->
                                                        <td>{{ $student->course ? $student->course->course_name : 'No course assigned' }}
                                                        </td>
                                                        <td>{{ $student->created_at->format('d M, Y') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- partial:partials/_footer.html -->
                @include('backend.layouts.footer')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart for Students Enrolled
        var ctx1 = document.getElementById('enrollment-chart').getContext('2d');
        var enrollmentChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: @json($courses), // Assuming you pass an array of course names
                datasets: [{
                    label: 'Number of Students',
                    data: @json($enrollments), // Assuming you pass an array of student counts
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Chart for Student Details (Gender Ratio Example)
        var ctx2 = document.getElementById('details-chart').getContext('2d');
        var detailsChart = new Chart(ctx2, {
            type: 'pie',
            options: {
                responsive: true,
            }
        });
    </script>
@endsection

<style>
    #enrollment-chart {
        width: 100% !important;
        height: 400px;

    }

    .card-body {
        padding: 20px;
    }


    .card {
        height: 100%;
    }

    .table-responsive {
        max-height: 400px;
        overflow-y: auto;
    }
</style>
