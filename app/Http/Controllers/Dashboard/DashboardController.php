<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $data = Student::count();
            return view('pages.dashboard.dashboard', compact('data'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
