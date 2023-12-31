<?php

namespace App\Http\Controllers;

use App\Models\Dictates;
use App\Models\Schedule;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $subjects = Dictates::join('subjects', 'subjects.id', 'dictates.subject_id')->where('teacher_id', $teacher->id)->get();
        $data = [
            'subjects' => $subjects
        ];
        return view('teacher.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $parallels = Schedule::join('subjects', 'subjects.id', 'schedules.subject_id')
            ->join('parallels', 'parallels.id', 'schedules.parallel_id')
            ->join('stages', 'stages.id', 'schedules.stage_id')
            ->where('subject_id', $id)->where('teacher_id', $teacher->id)->get();
        $data = [
            'parallels' => $parallels
        ];
        return view('teacher.show',$data);
        //return ($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
