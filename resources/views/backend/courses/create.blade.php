@extends('backend.layouts.main')
@section('content')
    <style>
        body {
            background-color: white;
        }

        .card {
            background-color: white;
            border: 1px solid #007bff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-light {
            background-color: #f8f9fa;
            color: #007bff;
        }

        .form-control {
            border: 1px solid #007bff;
            background-color: #f0f9ff;
            color: #333;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .page-title {
            color: #007bff;
        }
    </style>

    <div class="container-scroller">
        @include('backend.layouts.nav')
        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Add New Course</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Course Registration Form</h4>
                                    <p class="card-description">Fill out the details to create a new course</p>
                                    <form class="forms-sample" action="{{ route('courses.store') }}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="courseName">Course Name</label>
                                            <input type="text" class="form-control" id="courseName" name="course_name"
                                                placeholder="Enter Course Name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="courseDescription">Description</label>
                                            <textarea class="form-control" id="courseDescription" name="description" rows="4" placeholder="Course Description"
                                                required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="creditHours">Credit Hours</label>
                                            <input type="number" class="form-control" id="creditHours" name="credit_hours"
                                                placeholder="Credit Hours" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <a href="{{ route('courses.index') }}" class="btn btn-light">Cancel</a>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('backend.layouts.footer')
            </div>
        </div>
    </div>
@endsection
