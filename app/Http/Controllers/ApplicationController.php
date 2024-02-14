<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function appliedAnnouncements()
    {
        $user = auth()->user();
        $appliedAnnouncements = $user->announcements;

        return view('user.applied_announcements', compact('appliedAnnouncements'));
    }
    public function apply(Announcement $announcement)
    {
        $user = auth()->user();

        // Check if the user can apply for jobs
        if ($user->canApplyForJobs()) {
            // Check if the user has already applied to this announcement
            if (!$user->announcements->contains($announcement)) {
                // Associate the announcement with the user
                $user->announcements()->attach($announcement);

                // Update the application_status to true
                // $user->update(['application_status' => true]);
                $user->application_status = true;
                $user->save();

                return redirect()->back()->with('success', 'Application submitted successfully!');
            } else {
                return redirect()->back()->with('error', 'You have already applied to this announcement.');
            }
        } else {
            return redirect()->back()->with('error', 'You do not have the required role to apply for announcements.');
        }
    }
    public function deleteAppliedAnnouncement(Request $request, Announcement $announcement)
    {
        $user = auth()->user();

        // Detach the announcement from the user
        $user->announcements()->detach($announcement);

        return redirect()->route('applied.announcements')->with('success', 'Announcement deleted from your applied list.');
    }
}
