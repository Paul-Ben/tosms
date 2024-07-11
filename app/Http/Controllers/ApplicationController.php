<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::all();
        return view('application.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('application.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existing_application_id = Application::where('applicationId', $request->applicationId)->exists();
        if ($existing_application_id) {
            return redirect()->back()->with('message', 'Application ID already exists.');
        }
            $request->validate([
                'applicationId' => 'required|string',
                'email' => 'required|email',
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'phone' => 'required|string',
                'fslc' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
                'olevel' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'

            ]);

            $applicationData = $request->all();
            if($fslc = $request->file('fslc')){
                $fslc_name = time().'_'.$fslc->getClientOriginalName();
                $fslc->move(public_path('images/fslc/'), $fslc_name);
                $applicationData['fslc'] = $fslc_name;
            }
            if($olevel = $request->file('olevel')){
                $olevel_name = time().'_'.$olevel->getClientOriginalName();
                $olevel->move(public_path('images/olevel/'), $olevel_name);
                $applicationData['olevel'] = $olevel_name;
            }
            Application::create($applicationData);
        
        // Redirect with success message
        return redirect()->route('application.index')->with('success', 'Application created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return view('application.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        return view('application.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        $requestData = $request->validate([
            'applicationId' => 'required|string',
            'email' => 'required|email',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|string',
        ]);

        if($fslc = $request->file('fslc')){
            $fslc_name = time().'_'.$fslc->getClientOriginalName();
            $fslc->move(public_path('images/fslc/'), $fslc_name);
            $requestData['fslc'] = $fslc_name;
        }else{
            unset($requestData['fslc']);
        }

        if($olevel = $request->file('olevel')){
            $olevel_name = time().'_'.$olevel->getClientOriginalName();
            $olevel->move(public_path('images/olevel/'), $olevel_name);
            $requestData['olevel'] = $fslc_name;
        }else{
            unset($requestData['olevel']);
        }
        
        $application->update($requestData);
        return redirect()->route('application.index')->with('success', 'Application updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('application.index')->with('success', 'Application deleted successfully');
    }
}
