<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $registrations = Registration::with('user')->latest()->get();

        $stats = [
            'total' => Registration::count(),
            'pending' => Registration::where('status', 'pending')->count(),
            'accepted' => Registration::where('status', 'accepted')->count(),
            'rejected' => Registration::where('status', 'rejected')->count(),
        ];

        return view('admin.dashboard', compact('registrations', 'stats'));
    }

    public function updateStatus(Request $request, Registration $registration)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,accepted,rejected'],
        ]);

        $registration->update(['status' => $validated['status']]);

        return back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }
}
