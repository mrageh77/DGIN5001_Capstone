<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use anlutro\LaravelSettings\Facade as Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('setting/edit', compact('settings'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        foreach ($request->except('_token') as $key => $value) {
            Setting::set($key, $value);
        }
        Setting::save();
        return redirect()->back()->with('success', 'Settings Update');
    }

    }
