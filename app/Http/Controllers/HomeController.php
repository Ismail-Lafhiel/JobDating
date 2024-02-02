<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->take(4)->get();
        $announcements = Announcement::latest()->take(4)->get();
        return view('index', compact('companies', 'announcements'));
    }
}
