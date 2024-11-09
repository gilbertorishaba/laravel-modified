{{-- resources/views/courses/edit.blade.php --}}
@extends('backend.layouts.main')

@section('content')
    {{-- Customized CSS --}}
    <style>
        /* Harvard-inspired color palette */
        .card {
            border: 1px solid #990000;
            /* Deep red border */
            background-color: #f9f6f2;
            /* Light background */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card-header {
            background-color: #990000;
            color: white;
            padding: 20px;
            font-family: 'Times New Roman', Times, serif;
            border-bottom: 3px solid #660000;
        }

        /* Form labels */
        .form-label {
            font-weight: bold;
            font-family: 'Georgia', serif;
            font-size: 1.1rem;
            color: #333;
        }

        /* Form input styling */
        .form-control {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1.05rem;
            background-color: #fff;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #990000;
            /* Harvard red when focused */
            box-shadow: 0 0 8px rgba(153, 0, 0, 0.2);
        }

        /* Fancy submit button */
        .btn-primary {
            background-color: #660000;
            /* Deep crimson */
            border-color: #660000;
            padding: 12px 30px;
            font-family: 'Georgia', serif;
            font-size: 1.1rem;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #990000;
        }

        /* Cancel button */
        .btn-secondary {
            background-color: #bbb;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
        }

        /* Card body */
        .card-body {
            padding: 3rem;
        }

        /* Page title */
        .card-title {
            font-family: 'Georgia', serif;
            font-weight: bold;
            color: #990000;
            font-size: 2rem;
        }

        /* Adjusting layout */
        .content-wrapper {
            background-color: #fafafa;
            padding-top: 20px;
        }

        /* Subtle animations */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }
    </style>

    <div class="container-fluid page-body-wrapper">
        @include('backend.layouts.sidebar')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-8 offset-md-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Edit Course Information</h4>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title mb-4">Update Course Details</h4>

                                <!-- Display validation errors if any -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- Edit Course Form -->
                                <form action="{{ route('courses.update', $course->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Course Name -->
                                    <div class="mb-4">
                                        <label for="course_name" class="form-label">Course Name</label>
                                        <input type="text" name="course_name" class="form-control" id="course_name"
                                            value="{{ old('course_name', $course->course_name) }}" required>
                                    </div>

                                    <!-- Course Description -->
                                    <div class="mb-4">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" id="description" rows="5"
                                            placeholder="Enter course description">{{ old('description', $course->description) }}</textarea>
                                    </div>

                                    <!-- Credit Hours -->
                                    <div class="mb-4">
                                        <label for="credit_hours" class="form-label">Credit Hours</label>
                                        <input type="number" name="credit_hours" class="form-control" id="credit_hours"
                                            value="{{ old('credit_hours', $course->credit_hours) }}" required>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="d-flex justify-content-between mt-4">
                                        <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            Save Changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
