<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function announcements_data(){
        $announcements = Announcement::latest()->paginate(10);
        return view("admin.announcements-data", compact("announcements"));
    }
    public function companies_data(){
        $companies = Company::latest()->paginate(10);
        return view("admin.companies-data", compact('companies'));
    }
    public function users_data(){
        $users = User::latest()->paginate(10);
        return view("admin.users-data", compact('users'));
    }
    public function dashboard(){
        return view("admin.dashboard");
    }
}
