<?php

namespace App\Http\Controllers;

use App\Models\application;
use File;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $appplications = Application::get();
        return view("applications.index",["appl"=>$appplications]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("applications.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'cover_letter' => 'required|string',
        'position' => 'required|string',
        'work_preference' => 'required|string',
        'skills' => 'required|array',
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'resume' => 'required|mimes:pdf|max:4096',
    ]);
        
        $photoName=time().".".$request->photo->extension();
        $resumeName = time() . "." . $request->resume->extension();
        $request->photo->move(public_path("applications"), $photoName);
        $request->resume->move(public_path('applications/resumes'), $resumeName);
        $application = new Application();
        $application->name = $request->name;
        $application->email = $request->email;
        $application->cover_letter = $request->cover_letter;
        $application->position = $request->position;
        $application->work_preference = $request->work_preference;
        $application->skills = json_encode($request->skills);
        $application->photo = $photoName;
        $application->resume = $resumeName;
        $application->save();

        $application->save();
        return redirect()->route("application.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $application = Application::where("id", $id)->first();
        return view("edit",["application"=>$application]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
               $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'cover_letter' => 'required|string',
        'position' => 'required|string',
        'work_preference' => 'required|string',
        'skills' => 'required|array',
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'resume' => 'required|mimes:pdf|max:4096',
    ]);
        
        $photoName=time().".".$request->photo->extension();
        $resumeName = time() . "." . $request->resume->extension();
        $request->photo->move(public_path("applications"), $photoName);
        $request->resume->move(public_path('applications/resumes'), $resumeName);
        $application = application::find( $id );
        $application->name = $request->name;
        $application->email = $request->email;
        $application->cover_letter = $request->cover_letter;
        $application->position = $request->position;
        $application->work_preference = $request->work_preference;
        $application->skills = json_encode($request->skills);
        $application->photo = $photoName;
        $application->resume = $resumeName;
        $application->save();

        $application->save();
        return redirect()->route("application.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = application::find($id);
        $application->delete();
        $photoPath = public_path('applications/' . $application->photo);
    if (File::exists($photoPath)) {
        File::delete($photoPath);
    }

    // Delete resume file if it exists
    $resumePath = public_path('applications/resumes/' . $application->resume);
    if (File::exists($resumePath)) {
        File::delete($resumePath);
    }
        return redirect()->route("application.index");
    }
}
