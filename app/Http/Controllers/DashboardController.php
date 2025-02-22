<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return view('admin-page');
        }

        return view('dashboard');
    }
}