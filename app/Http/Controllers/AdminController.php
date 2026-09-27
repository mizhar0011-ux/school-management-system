<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        $totalStudents = User::where('role', 'student')->count();

        $totalAdmins = User::where('role', 'admin')->count();

        $recentUsers = User::latest()->take(5)->get();

        return view('admin', compact(
            'totalUsers',
            'totalStudents',
            'totalAdmins',
            'recentUsers'
        ));
    }
}
