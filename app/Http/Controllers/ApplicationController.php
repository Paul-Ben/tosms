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
        if (Application::where('applicationId', $request->applicationId)->exists()) {
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

        // Extract file uploads and handle them
        $this->handleFileUpload('fslc', 'images/fslc/', $applicationData);
        $this->handleFileUpload('olevel', 'images/olevel/', $applicationData);

        Application::create($applicationData);

        return redirect()->route('application.index')->with('success', 'Application created successfully.');
    }

    private function handleFileUpload($field, $directory, &$data)
    {
        if ($file = request()->file($field)) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($directory), $filename);
            $data[$field] = $filename;
        }
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

        $files = [
            'fslc' => 'images/fslc/',
            'olevel' => 'images/olevel/',
        ];
        
        foreach ($files as $file => $path) {
            if ($request->hasFile($file)) {
                $fileName = time(). '_'. $request->file($file)->getClientOriginalName();
                $request->file($file)->move(public_path($path), $fileName);
                $requestData[$file] = $fileName;
            } else {
                unset($requestData[$file]);
            }
        }

        $application->update($requestData);
        return redirect()->route('application.index')->with('success', 'Application updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        // Check if fslc and olevel files exist in public folder
        $this->deleteFile('images/fslc/', $application->fslc);
        $this->deleteFile('images/olevel/', $application->olevel);
    

        // Delete the application record
        $application->delete();


        return redirect()->route('application.index')->with('success', 'Application deleted successfully');
    }

    private function deleteFile($directory, $filename)
    {
        $filePath = public_path($directory . $filename);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}
