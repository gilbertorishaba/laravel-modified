<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings | Student Management System</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid p-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-3">
                <!-- Sidebar navigation for settings -->
                <div class="list-group">
                    <h5 class="mb-4">Settings</h5>
                    <a href="#personalInfo" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                        Personal Information
                    </a>
                    <a href="#changePassword" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                        Change Password
                    </a>
                    <a href="#notifications" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                        Notifications
                    </a>
                    <a href="#privacy" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                        Privacy Settings
                    </a>
                    <a href="#preferences" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                        Other Preferences
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <!-- Settings Content Area -->
                <div class="tab-content">
                    <!-- Personal Information Tab -->
                    <div class="tab-pane fade" id="personalInfo">
                        <h3>Personal Information</h3>
                        <form method="POST" action="{{ route('settings.update') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullname" name="fullname"
                                    value="{{ old('fullname', $user->fullname) }}" required>
                                @error('fullname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone', $user->phone) }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>

                    <!-- Change Password Tab -->
                    <div class="tab-pane fade" id="changePassword">
                        <h3>Change Password</h3>
                        <form method="POST" action="{{ route('settings.update') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" class="form-control" id="current_password"
                                    name="current_password">
                                @error('current_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                                @error('new_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" id="new_password_confirmation"
                                    name="new_password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </form>
                    </div>

                    <!-- Notifications Tab -->
                    <div class="tab-pane fade" id="notifications">
                        <h3>Notification Preferences</h3>
                        <form>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="emailNotifications" checked>
                                <label class="form-check-label" for="emailNotifications">Email Notifications</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="smsNotifications" checked>
                                <label class="form-check-label" for="smsNotifications">SMS Notifications</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Save Preferences</button>
                        </form>
                    </div>

                    <!-- Privacy Settings Tab -->
                    <div class="tab-pane fade" id="privacy">
                        <h3>Privacy Settings</h3>
                        <form>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="profileVisibility" checked>
                                <label class="form-check-label" for="profileVisibility">Make my profile public</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Save Privacy Settings</button>
                        </form>
                    </div>

                    <!-- Other Preferences Tab -->
                    <div class="tab-pane fade" id="preferences">
                        <h3>Other Preferences</h3>
                        <form>
                            <div class="mb-3">
                                <label for="language" class="form-label">Preferred Language</label>
                                <select class="form-control" id="language" name="language">
                                    <option>English</option>
                                    <option>French</option>
                                    <option>Spanish</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="darkMode">
                                <label class="form-check-label" for="darkMode">Enable Dark Mode</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Save Preferences</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
