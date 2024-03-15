<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Course;
use App\Models\Enrolment;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display all available courses.
     */
    public function listAll(Request $request): View
    {
        return view('dashboard.all-courses', [
            'courses' => Course::get()->unique(),
        ]);
    }

    /**
     * Display all enrolled courses for the user.
     */
    public function listEnrolled(Request $request): View
    {
        return view('dashboard.user-courses', [
            'courses' => $request->user()->courses()->get()->unique(),
        ]);
    }

    /**
     * Display new course form.
     */
    public function new(Request $request): View
    {
        return view('dashboard.new-course');
    }

    /**
     * Store new course.
     */
    public function store(Request $request): View
    {
        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'fee' => $request->fee,
        ]);
        return view('dashboard.all-courses', [
            'courses' => Course::get()->unique(),
        ]);
    }

    /**
     * enrol user on course.
     */
    public function enrol(Request $request): View
    {
        Auth::user()->courses()->attach($request->course_id, ['active' => true]);
        return view('dashboard.user-courses', [
            'courses' => $request->user()->courses()->get()->unique(),
        ]);
    }

    /**
     * unenrol user on course.
     */
    public function unenrol(Request $request): View
    {
        Auth::user()->courses()->detach($request->course_id);
        return view('dashboard.user-courses', [
            'courses' => $request->user()->courses()->get()->unique(),
        ]);
    }

    // /**
    //  * Handle an incoming course request.
    //  */
    // public function store(Request $request): View
    // {
    //     dd($request->user()->courses()->get());
    //     return view('dashboard', [
    //         'user' => $request->user()->courses()->get(),
    //     ]);
    // }
}
