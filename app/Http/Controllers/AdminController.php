<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Method to display the admin dashboard
    public function dashboard()
    {
        return view('admin.dashboard');  // Make sure to create this view
    }
}
