<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use anlutro\LaravelSettings\Facade as Setting;
use App\Models\JobApplication;
use App\Models\SavedApplication;
use App\Models\User;

class FrontendController extends Controller
{
    /**
     *
     */
    public function home(Request $request)
    {
        $query = Job::query();
        if($request->search){
            $query
            ->where("title","LIKE","%{$request->search}%")
                    ->orWhere("description","LIKE","%{$request->search}%")
                    ->orWhere("excerpt","LIKE","%{$request->search}%");
        }
        $jobs = $query->latest()->paginate();
        return view('homepage', compact('jobs'));
    }
    public function company()
    {
        $company = Setting::get('company');
        return view('company', compact('company'));
    }
    public function job(Job $job)
    {
        return view('job', compact('job'));

    }
    /**
     *
     */
    public function resume()
    {
        $profile = Auth::user();
        $resumes = Resume::where('user_id', Auth::user()->id)->get();
        return view('resume', compact('resumes', 'profile'));
    }

    /**
     *
     */
    public function applyJob(Request $request)
    {
        JobApplication::create([
            'job_id' => $request->job_id,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back()->with('success', 'You have successfully applied for this job!');

    }
    public function saveJob(Request $request)
    {
        SavedApplication::create([
            'job_id' => $request->job_id,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back()->with('success', 'Job Saved successfully!');

    }
public function application()
{
    $jobs = JobApplication::where('user_id', Auth::user()->id)->with(['job', 'user'])->paginate();
    return view('applied_job', compact('jobs'));

}
public function savedJob()
{
    $jobs = SavedApplication::where('user_id', Auth::user()->id)->with(['job', 'user'])->paginate();
    return view('saved_job', compact('jobs'));
}
public function removeSavedJob(SavedApplication $job)
{
    $job->delete();
    return redirect()->back()->with('success', 'Job removed successfully!');

}

    /**
     * @
     */
    public function uploadResume(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'resume' => 'required',
        ]);
        $resume = null;
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume')->store('resume');
        }
        Resume::create([
            'title' => $request->title,
            'resume' => $resume,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back()->with('success', 'Resume uploaded successfully!');
    }
    /**
     *
     */
    public function destroy(Resume $resume)
    {
        if($resume->user_id == Auth::user()->id){
            $resume->delete();
        }
        return redirect()->back()->with('success', 'Resume deleted successfully!');

    }


    /**
     *
     */
    public function profile()
    {

        return view('profile', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'password' => 'nullable|min:6|confirmed'
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
        ]);
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
