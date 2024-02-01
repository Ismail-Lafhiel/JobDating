<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function announcements_data(){
        return view("admin.announcements-data");
    }
    public function companies_data(){
        $companies = Company::latest()->paginate(3);
        return view("admin.companies-data", compact('companies'));
    }
    public function dashboard(){
        return view("admin.dashboard");
    }
}
