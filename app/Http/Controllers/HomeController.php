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
        $user = auth()->user();
        $announcementsWithMatchInfo = [];

        foreach (Announcement::latest()->paginate(10) as $announcement) {
            $matchInfo = $announcement->calculateSkillMatchPercentage($user);

            $announcementsWithMatchInfo[] = [
                'announcement' => $announcement,
                'matchPercentage' => $matchInfo['matchPercentage'],
                'isMatchAboveThreshold' => $matchInfo['isMatchAboveThreshold'],
            ];
        }
        return view('index', compact('announcementsWithMatchInfo', "companies"));
    }
}
