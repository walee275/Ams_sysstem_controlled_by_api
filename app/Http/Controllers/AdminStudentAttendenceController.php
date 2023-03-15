<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\AttendanceDetails;
use Illuminate\Support\Facades\Http;

class AdminStudentAttendenceController extends Controller
{


    public function index()
    {
        // dd('here');

        return view('admin.students.attendances.index');
    }

    public function single_attendance_index()
    {

        $response = http::get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/students');
        $students = json_decode($response, true);


        // dd($students);
        $data = [
            'students' => $students
        ];

        return view('admin.students.attendances.single_attendance_index', $data);
    }

    public function create()
    {

        $response = http::get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/students');
        $students = json_decode($response, true);


        // dd($students);
        $data = [
            'students' => $students
        ];

        return view('admin.students.attendances.create', $data);
    }







    public function edit(Attendance $attendance)
    {
        // dd($attendance);
        $data = [
            'attendance' => $attendance
        ];
        // dd($attendance);
        return view('admin.students.attendances.edit', $data);
    }



}
