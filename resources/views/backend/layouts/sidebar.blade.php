<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Profile Section -->
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="images/faces/face5.jpg" alt="image" />
                </div>
                <div class="profile-name">

                    {{-- //checking if user is authenticated --}}
                    @if (Auth::check())
                        <p class="name">Welcome {{ Auth::user()->name }} </p>
                        <p class="designation">Super Admin</p>
                    @else
                        <p class="name">Welcome, Guest</p>
                        <p class="designation">Please log in</p>
                    @endif
                </div>

            </div>
        </li>

        <!-- Dashboard Link -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Admin Dashboard</span>
            </a>
        </li>

        <!-- Student Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#student-menu" aria-expanded="false"
                aria-controls="student-menu">
                <i class="fa fa-graduation-cap menu-icon"></i>
                <span class="menu-title">Student</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="student-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.create') }}">Add Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.index') }}">View Students</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Course Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#course-menu" aria-expanded="false"
                aria-controls="course-menu">
                <i class="fa fa-book menu-icon"></i>
                <span class="menu-title">Course</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="course-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses.create') }}">Add Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses.index') }}">View Courses</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Enrollment Section -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#enrollment-menu" aria-expanded="false"
                aria-controls="enrollment-menu">
                <i class="fa fa-users menu-icon"></i>
                <span class="menu-title">Enrollment</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="enrollment-menu">
                <ul class="nav flex-column sub-menu">
                    <!-- Form to Enroll a Student (POST request) -->
                    <li class="nav-item">
                        {{-- <form action="{{ route('admin.enroll') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">
                                <i class="fa fa-user-plus menu-icon"></i> Enroll Student
                            </button>
                        </form> --}}

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.enroll', ['course' => 1]) }}" method="POST">
                            <i class="fa fa-users menu-icon"></i> Enroll Student
                        </a>


                        <!-- View Enrolled Students -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.show', ['course' => 1]) }}">
                            <i class="fa fa-users menu-icon"></i> View Enrolled Students
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- Report Section -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#report-menu" aria-expanded="false"
                aria-controls="report-menu">
                <i class="fa fa-file-alt menu-icon"></i>
                <span class="menu-title">Report</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="report-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reports.create') }}">Create Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reports.index') }}">View Reports</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>

<!-- Include Bootstrap and jQuery for Collapsibles to Work -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Include Bootstrap and jQuery for Collapsibles to Work -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
