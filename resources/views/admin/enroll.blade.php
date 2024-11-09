@extends('backend.layouts.main')

@section('content')
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('backend.layouts.nav')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <!-- Theme Settings -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close fa fa-times"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles primary"></div>
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close fa fa-times"></i>
                <ul class="nav nav-tabs" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                            aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                            aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <!-- To-do Section -->
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                        aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn"
                                        id="add-task-todo">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="list-wrapper px-3">
                            <ul class="d-flex flex-column-reverse todo-list">

                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox"> Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove fa fa-times-circle"></i>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- Chats Section -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                            <small
                                class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                                All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile">
                                    <img src="images/faces/face1.jpg" alt="image"><span class="online"></span>
                                </div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">19 min</small>
                            </li>
                            <!-- Add more chat users here -->
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            @include('backend.layouts.sidebar')

            <!-- Main Panel -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Display Course Information -->
                    <h1>Enroll Students in {{ $course->name }}</h1>
                    @if ($students->isEmpty())
                        <p>No students enrolled yet.</p>
                    @else
                        <h3>Enrolled Students:</h3>
                        <ul>
                            @foreach ($students as $student)
                                <li>{{ $student->name }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <!-- Enrollment Form -->
                    <form class="forms-sample" action="{{ route('admin.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="student_id">Select Student:</label>
                            <select class="form-control" name="student_id" id="student_id" required>
                                <option value="">Select a Student</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="studentInputEmail">Email</label>
                            <input type="email" class="form-control" id="studentInputEmail" name="email"
                                placeholder="Email" required>
                        </div>


                        <div class="form-group">
                            <label for="studentInputcourse">Course Enrolled</label>
                            <select class="form-control" name="course_id" id="studentInputcourse" required>
                                <option value="{{ $course->id }}"
                                    {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                    {{ $course->id }} - {{ $course->name }}
                                </option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="enrollment_date">Enrollment Date</label>
                            <input type="date" class="form-control" id="enrollment_date" name="enrollment_date"
                                required>
                        </div>


                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="active" selected>Active</option>
                                <option value="completed">Completed</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="grade">Grade</label>
                            <input type="text" class="form-control" id="grade" name="grade"
                                placeholder="Grade (optional)">
                        </div>


                        <div class="form-group">
                            <label for="studentInputDob">Date of Birth</label>
                            <input type="date" class="form-control" id="studentInputDob" name="dob" required>
                        </div>


                        <div class="form-group">
                            <label for="studentInputPhone">Phone Number</label>
                            <input type="text" class="form-control" id="studentInputPhone" name="phone" required>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="button" class="btn btn-light"
                            onclick="window.location='{{ route('students.create') }}'">Cancel</button>
                    </form>



                    <!-- partial:partials/_footer.html -->
                    @include('backend.layouts.footer')
                </div>
            </div>
        </div>
    @endsection
