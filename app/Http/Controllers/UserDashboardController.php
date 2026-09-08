<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $registration = Registration::where('user_id', Auth::id())->latest()->first();

        return view('user.dashboard', compact('registration'));
    }
}
