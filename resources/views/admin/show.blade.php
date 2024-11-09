@extends('backend.layouts.main')

@section('content')
    <div class="container-scroller">
        <!-- Navbar -->
        @include('backend.layouts.nav')

        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            @include('backend.layouts.sidebar')

            <!-- Main Panel -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <h1>Enrolled Students</h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Student Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Enrollment Date</th>
                                <th>Status</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course->students as $student)
                                <tr>
                                    <td>{{ $course->course_name }}</td> <!-- Ensure you're using course_name here -->
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ \Carbon\Carbon::parse($student->pivot->enrollment_date)->format('d-m-Y') }}</td>
                                    <td>{{ ucfirst($student->pivot->status) }}</td>
                                    <td>{{ $student->pivot->grade ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <!-- Footer -->
                @include('backend.layouts.footer')
            </div>
        </div>
    </div>
@endsection
