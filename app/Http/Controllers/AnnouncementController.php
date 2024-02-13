<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use App\Models\Company;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        return view('announcements.index', compact('announcementsWithMatchInfo'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        $user = auth()->user();
        $matchInfo = $announcement->calculateSkillMatchPercentage($user);
        return view('announcements.show', compact('matchInfo', 'announcement'));
    }
}
