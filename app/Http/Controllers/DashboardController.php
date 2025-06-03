<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
   public function showDashboard()
    {
        $occData = Cache::get('occ_data', []);
        return view('dashboard', ['occData' => $occData]);
    }

    public function showDashboardUser()
    {
        $occData = Cache::get('occ_data', []);
        return view('user.dashboard-user', ['occData' => $occData]);
    }
}
