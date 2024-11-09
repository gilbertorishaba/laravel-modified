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
                    <h2>Students Enrolled in Courses</h2>

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

                            {{-- populate data from Database --}}
                            @foreach ($course->students as $student)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                    {{-- enrollment_date from pivot tble  --}}
                                    <td>{{ \Carbon\Carbon::parse($student->pivot->enrollment_date)->format('d-m-Y') }}
                                    </td>
                                    <td>{{ ucfirst($student->pivot->status) }}</td>
                                    <!-- Enrollment status -->
                                    <td>{{ $student->pivot->grade ?? 'N/A' }}</td> <!-- Student's grade -->
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
