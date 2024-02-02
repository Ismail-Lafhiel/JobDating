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
        $announcements = Announcement::latest()->paginate(10);
        return view('announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('announcements.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnouncementRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('announcement_img')) {
            // Move image to the 'public/images' directory
            $imageName = time() . '.' . $request->announcement_img->extension();
            
            $request->announcement_img->move(public_path('images/announcements'), $imageName);

            // Add the image information to the validated data
            $validatedData['announcement_img'] =  $imageName;

        }
        

        Announcement::create($validatedData);
        return redirect()->route('admin.announcements')
            ->with('success', 'New Announcement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        $companies = Company::all();
        return view('announcements.edit', compact(['companies', 'announcement']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnouncementRequest $request, Announcement $announcement)
    {
        $announcement->update($request->validated());
        return redirect()->route('admin.announcements')
            ->with('success', 'Announcement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('admin.announcements')
            ->with('success', 'Announcement deleted successfully.');
    }
}
