<?php

namespace App\Http\Controllers;

use App\Imports\JobsImport;
use App\Models\Job;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::paginate();
        return view('jobs/index', compact('jobs'));

    }
    public function application(Job $job)
    {
        $job->load(['applications', 'applications.user']);
        return view('jobs/application', compact('job'));

    }
    public function import(Request $request)
    {
        if($request->hasFile('jobs')){
            Excel::import(new JobsImport, $request->file('jobs')->store('temp'));
        }
        return redirect()->back()->with('success', 'Imported successfully!');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'excerpt' => 'required',
        ]);
        Job::create($request->all());
        return redirect()->back()->with('success', 'Job Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('jobs/edit', compact('job'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('jobs/edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'excerpt' => 'required',
        ]);
        $job->update($request->all());
        return redirect()->back()->with('success', 'Job Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->back()->with('success', 'Job deleted');
    }
}
