 @extends('backend.layouts.main')
 @section('content')
     <div class="container-scroller">
         <!-- partial:partials/_navbar.html -->
         @include('backend.layouts.nav')
         <!-- partial -->
         <div class="container-fluid page-body-wrapper">
             <!-- partial:partials/_settings-panel.html -->
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
                                             <input class="checkbox" type="checkbox">
                                             Team review meeting at 3.00 PM
                                         </label>
                                     </div>
                                     <i class="remove fa fa-times-circle"></i>
                                 </li>
                                 <li>
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input class="checkbox" type="checkbox">
                                             Prepare for presentation
                                         </label>
                                     </div>
                                     <i class="remove fa fa-times-circle"></i>
                                 </li>
                                 <li>
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input class="checkbox" type="checkbox">
                                             Resolve all the low priority tickets due today
                                         </label>
                                     </div>
                                     <i class="remove fa fa-times-circle"></i>
                                 </li>
                                 <li class="completed">
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input class="checkbox" type="checkbox" checked>
                                             Schedule meeting for next week
                                         </label>
                                     </div>
                                     <i class="remove fa fa-times-circle"></i>
                                 </li>
                                 <li class="completed">
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input class="checkbox" type="checkbox" checked>
                                             Project review
                                         </label>
                                     </div>
                                     <i class="remove fa fa-times-circle"></i>
                                 </li>
                             </ul>
                         </div>
                         <div class="events py-4 border-bottom px-3">
                             <div class="wrapper d-flex mb-2">
                                 <i class="fa fa-times-circle text-primary mr-2"></i>
                                 <span>Feb 11 2018</span>
                             </div>
                             <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
                             <p class="text-gray mb-0">build a js based app</p>
                         </div>
                         <div class="events pt-4 px-3">
                             <div class="wrapper d-flex mb-2">
                                 <i class="fa fa-times-circle text-primary mr-2"></i>
                                 <span>Feb 7 2018</span>
                             </div>
                             <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                             <p class="text-gray mb-0 ">Call Sarah Graves</p>
                         </div>
                     </div>
                     <!-- To do section tab ends -->
                     <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                         <div class="d-flex align-items-center justify-content-between border-bottom">
                             <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                             <small
                                 class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                                 All</small>
                         </div>
                         <ul class="chat-list">
                             <li class="list active">
                                 <div class="profile"><img src="{{ asset('images/faces/face1.jpg') }}"
                                         alt="image"><span class="online"></span></div>
                                 <div class="info">
                                     <p>Thomas Douglas</p>
                                     <p>Available</p>
                                 </div>
                                 <small class="text-muted my-auto">19 min</small>
                             </li>
                             <li class="list">
                                 <div class="profile"><img src="{{ asset('images/faces/face2.jpg') }}"
                                         alt="image"><span class="offline"></span></div>
                                 <div class="info">
                                     <div class="wrapper d-flex">
                                         <p>Catherine</p>
                                     </div>
                                     <p>Away</p>
                                 </div>
                                 <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                 <small class="text-muted my-auto">23 min</small>
                             </li>
                             <li class="list">
                                 <div class="profile"><img src="{{ asset('images/faces/face3.jpg') }}"
                                         alt="image"><span class="online"></span></div>
                                 <div class="info">
                                     <p>Daniel Russell</p>
                                     <p>Available</p>
                                 </div>
                                 <small class="text-muted my-auto">14 min</small>
                             </li>
                             <li class="list">
                                 <div class="profile"><img src="{{ asset('images/faces/face4.jpg') }}"
                                         alt="image"><span class="offline"></span></div>
                                 <div class="info">
                                     <p>James Richardson</p>
                                     <p>Away</p>
                                 </div>
                                 <small class="text-muted my-auto">2 min</small>
                             </li>
                             <li class="list">
                                 <div class="profile"><img src="{{ asset('images/faces/face5.jpg') }}"
                                         alt="image"><span class="online"></span></div>
                                 <div class="info">
                                     <p>Madeline Kennedy</p>
                                     <p>Available</p>
                                 </div>
                                 <small class="text-muted my-auto">5 min</small>
                             </li>
                             <li class="list">
                                 <div class="profile"><img src="{{ 'images/faces/face6.jpg' }}" alt="image"><span
                                         class="online"></span></div>
                                 <div class="info">
                                     <p>Sarah Graves</p>
                                     <p>Available</p>
                                 </div>
                                 <small class="text-muted my-auto">47 min</small>
                             </li>
                         </ul>
                     </div>
                     <!-- chat tab ends -->
                 </div>
             </div>
             <!-- partial -->
             <!-- partial:partials/_sidebar.html -->
             @include('backend.layouts.sidebar')
             <!-- partial -->
             <div class="main-panel">
                 <div class="content-wrapper">
                     <div class="page-header">
                         <h3 class="page-title">
                             Dashboard
                         </h3>
                     </div>

                     <div class="star-notification" id="starNotification">
                         @if ($errors->any())
                             <div class="alert alert-danger">
                                 <ul>
                                     @foreach ($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                     @endforeach
                                 </ul>
                             </div>
                         @endif
                     </div>

                     <div class="container">

                         <div class="card-body">
                             <!-- Modal HTML -->
                             <div class="modal fade" id="successModal" tabindex="-1" role="dialog"
                                 aria-labelledby="successModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="successModalLabel">Success</h5>
                                             <button type="button" class="close" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                             </button>
                                         </div>
                                         <div class="modal-body">
                                             {{ session('success') }}
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-primary close-modal">Close</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <!-- backend/reports/create.blade.php -->
                             <form action="{{ route('reports.store') }}" method="POST">
                                 @csrf

                                 <!-- Report Type -->
                                 <div class="form-group">
                                     <label for="report_type">Report Type</label>
                                     <input type="text" name="report_type" id="report_type" class="form-control"
                                         required>
                                 </div>

                                 <!-- Generated At -->
                                 <div class="form-group">
                                     <label for="generated_at">Generated At</label>
                                     <input type="date" name="generated_at" id="generated_at" class="form-control"
                                         required>
                                 </div>

                                 <!-- Select Course -->
                                 <div class="form-group">
                                     <label for="course_id">Course</label>
                                     <select name="course_id" id="course_id" class="form-control" required>
                                         <option value="" disabled selected>Select a Course</option>
                                         @foreach ($courses as $course)
                                             <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                         @endforeach
                                     </select>
                                 </div>

                                 <!-- Students List for the selected course -->
                                 <div class="form-group">
                                     <label for="students">Select Students</label>
                                     <select name="students[]" id="students" class="form-control" multiple>
                                         @foreach ($courses as $course)
                                             <optgroup label="{{ $course->name }}">
                                                 @foreach ($course->students as $student)
                                                     <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                 @endforeach
                                             </optgroup>
                                         @endforeach
                                     </select>
                                 </div>

                                 <!-- Submit Button -->
                                 <button type="submit" class="btn btn-primary">Generate Report</button>
                             </form>


                             <script>
                                 // Use JavaScript to dynamically update number of students and student details
                                 document.getElementById('course_id').addEventListener('change', function() {
                                     const courseId = this.value;

                                     if (courseId) {
                                         // Make an AJAX call to fetch students for the selected course
                                         fetch(`/reports/students/${courseId}`)
                                             .then(response => response.json())
                                             .then(data => {
                                                 const numberOfStudents = data.students.length;
                                                 document.getElementById('number_of_students').value = numberOfStudents;

                                                 // Format student details
                                                 let studentDetails = '';
                                                 data.students.forEach(student => {
                                                     const profileImage = student.profile_image_url ?
                                                         `<img src="${student.profile_image_url}" alt="Profile Image" width="50" height="50">` :
                                                         `<img src="/storage/profile_images/default.png" alt="Profile Image" width="50" height="50">`;

                                                     studentDetails +=
                                                         `<p>${student.name} (${student.email})</p>${profileImage}`;
                                                 });
                                                 document.getElementById('student_details').value = studentDetails;
                                             });
                                     } else {
                                         document.getElementById('number_of_students').value = '';
                                         document.getElementById('student_details').value = '';
                                     }
                                 });
                             </script>


                             <script>
                                 // JavaScript to handle course selection
                                 document.getElementById('course_id').addEventListener('change', function() {
                                     var selectedOption = this.options[this.selectedIndex];
                                     var students = JSON.parse(selectedOption.getAttribute('data-students'));

                                     // Update number of students
                                     document.getElementById('number_of_students').value = students.length;

                                     // Update student details
                                     var studentDetails = students.map(function(student) {
                                         return 'Name: ' + student.name + '\nEmail: ' + student.email;
                                     }).join('\n\n');

                                     document.getElementById('student_details').value = studentDetails;
                                 });
                             </script>



                             <!-- JavaScript for Modal Display and Close -->
                             @if (session('success'))
                                 <script>
                                     $(document).ready(function() {
                                         // Show modal when success session exists
                                         $('#successModal').modal('show');

                                         // Close modal when 'Close' button or 'X' is clicked
                                         $('.close-modal, .close').on('click', function() {
                                             $('#successModal').modal('hide');
                                         });
                                     });
                                 </script>
                             @endif
                         </div>


                     </div>

                 </div>
                 <!-- content-wrapper ends -->
                 <!-- partial:partials/_footer.html -->
                 @include('backend.layouts.footer')
                 <!-- partial -->
             </div>
         </div>
         <!-- main-panel ends -->
     </div>
     <!-- page-body-wrapper ends -->
     </div>
     <!-- container-scroller -->

     {{-- designing the notification --}}
     <script>
         // Add event listener to the course selection
         document.getElementById('course_id').addEventListener('change', function() {
             var courseId = this.value;

             if (courseId) {
                 // Make AJAX request to fetch student details and number of students
                 fetch(`/get-student-details/${courseId}`)
                     .then(response => response.json())
                     .then(data => {
                         // Update the number of students
                         document.getElementById('number_of_students').value = data.number_of_students;

                         // Update the student details (format them as needed)
                         document.getElementById('student_details').value = data.student_details;
                     })
                     .catch(error => {
                         console.error('Error fetching student details:', error);
                     });
             } else {
                 // Clear the fields if no course is selected
                 document.getElementById('number_of_students').value = '';
                 document.getElementById('student_details').value = '';
             }
         });
     </script>
 @endsection
