{{-- resources/views/courses/index.blade.php --}}
@extends('backend.layouts.main')

@section('content')
    {{-- Customized CSS --}}
    <style>
        /* Table design for a more refined look */
        table.table-striped th,
        table.table-striped td {
            padding: 15px;
            text-align: left;
        }

        /* Adding hover effect to the table rows */
        .table-striped tbody tr:hover {
            background-color: #F8F9FA;
        }

        /* Custom button styles */
        .btn-primary {
            background-color: #00274C;
            border-color: #00274C;
        }

        .btn-danger {
            background-color: #B22222;
            border-color: #B22222;
        }

        /* Alert success styling */
        .alert-success {
            color: #155724;
            background-color: #D4EDDA;
            border-color: #C3E6CB;
        }

        /* Card title styling */
        .card-title {
            font-family: 'Georgia', serif;
            font-weight: bold;
            font-size: 1.5em;
            color: #333;
        }

        /* Custom padding and margins for the card */
        .card-body {
            padding: 2rem;
        }

        /* Button styles */
        button.btn {
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
        }

        /* Sidebar color */
        .sidebar {
            background-color: #E9ECEF;
        }
    </style>

    <div class="container-fluid page-body-wrapper">
        @include('backend.layouts.sidebar')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card shadow-sm rounded">
                            <div class="card-body">
                                <h4 class="card-title mb-4 text-uppercase"
                                    style="font-family: 'Arial', sans-serif; font-weight: 600;">Courses List</h4>

                                <!-- Add New Course Button -->
                                <div class="d-flex justify-content-end mb-4">
                                    <a href="{{ route('courses.create') }}"
                                        class="btn btn-primary btn-lg rounded-pill shadow-sm"
                                        style="background-color: #2A5DB0; border-color: #2A5DB0;">+ Add New Course</a>
                                </div>

                                <!-- Success Alert -->
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <!-- Courses Table -->
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" style="border-color: #DDDDDD;">
                                        <thead class="thead-light" style="background-color: #F8F9FA;">
                                            <tr
                                                style="font-family: 'Arial', sans-serif; font-size: 14px; font-weight: 600;">
                                                <th>#</th>
                                                <th>Course ID</th>
                                                <th>Course Name</th>
                                                <th>Credit Hours</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courses as $course)
                                                <tr class="align-middle"
                                                    style="font-family: 'Arial', sans-serif; font-size: 14px;">
                                                    <td>{{ $loop->iteration + ($courses->currentPage() - 1) * $courses->perPage() }}
                                                    </td>
                                                    <td>{{ $course->course_id }}</td>
                                                    <td>{{ $course->course_name }}</td>
                                                    <td>{{ $course->credit_hours }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('courses.edit', $course->id) }}"
                                                            class="btn btn-warning btn-sm rounded-pill"
                                                            style="font-size: 12px; padding: 8px 16px;">Edit</a>
                                                        <form action="{{ route('courses.destroy', $course->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm rounded-pill"
                                                                style="font-size: 12px; padding: 8px 16px;"
                                                                onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination Links -->
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $courses->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
