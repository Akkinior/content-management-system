<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $progresses = [
            ['label' => 'Dashboard Design', 'percentage' => 70],
            ['label' => 'App Development', 'percentage' => 45],
            ['label' => 'Something2', 'percentage' => 90],
        ];
        return view('dashboard.index', [
            'progresses' => $progresses,
        ]);
    }
}
