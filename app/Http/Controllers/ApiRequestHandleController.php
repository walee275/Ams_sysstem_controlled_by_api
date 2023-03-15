<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiRequestHandleController extends Controller
{
    public function fetch_company_users(Company $company)
    {
        $token = session('token');
        $headers = ['Authorization' => 'Bearer ' . $token];
        // dd($company);
        $response = Http::withHeaders($headers)->get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/api/company/registered/users?company=' . $company->id . '');
        $students = json_decode($response, true);
        // $data = $response->json();

        // dd($students);
        $data = [
            'students' => $students,
        ];

        return view('admin.students.index', $data);
    }


    public function fetch_companies()
    {
        $token = session('token');
        $headers = ['Authorization' => 'Bearer ' . $token];

        $response = http::get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/api/companies');
        $companies = json_decode($response, true);

        $data = [
            'companies' => $companies,
        ];
        dd($companies);
        return view('admin.companies.index', $data);
    }


    public function fetch_attendances()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // dd($data);
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        // echo json_encode($from_date);
        $token = session('token');
        $headers = ['Authorization' => 'Bearer ' . $token];
        $response = http::withHeaders($headers)->get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/api/attendances/' . $from_date . '/' . $to_date);
        // echo $response;
        $attendances = json_decode($response, true);

        echo json_encode($attendances);
        // dd($attendances);
    }


    public function fetch_single_student_attendances()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // dd($data);
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $student_id = $data['studentId'];
        $token = session('token');
        $headers = ['Authorization' => 'Bearer ' . $token];
        // echo json_encode($from_date);
        $response = http::withHeaders($headers)->get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/api/attendances/' . $from_date . '/' . $to_date . '/' . $student_id);
        // echo $response;
        $attendances = json_decode($response, true);

        echo json_encode($attendances);
        // dd($attendances);
    }



    public function create_attendance(Request $request)
    {
        // dd($request->all());
        $data = [
            'request' => $request->all(),
        ];
        $token = session('token');
        $headers = ['Authorization' => 'Bearer ' . $token];
        $response = Http::withHeaders($headers)->get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/api/attendances/create', $data);

        $response = json_decode($response, true);
        // dd($response);
        return back()->with($response);
    }




    public function update_attendance(Request $request, $attendance)
    {
        // dd($request->all());
        $data = [
            'status' => $request->status,
            'attendance' => $attendance,
        ];
        $token = session('token');
        $headers = ['Authorization' => 'Bearer ' . $token];

        $response = Http::withHeaders($headers)->get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/api/update/student/attendance', $data);

        $response = json_decode($response, true);
        return back()->with($response);
    }


    public function destroy_attendance($attendance)
    {

        $token = session('token');
        $headers = ['Authorization' => 'Bearer ' . $token];
        $response = Http::withHeaders($headers)->get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/api/destroy/student/attendance/' . $attendance);

        $response = json_decode($response, true);
        // dd($response);
        return back()->with($response);
    }



    public function fetch_leave_requests()
    {
        $token = session('token');
        $headers = ['Authorization' => 'Bearer ' . $token];
        $response = Http::withHeaders($headers)->get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/api/leave_requests');

        $response = json_decode($response, true);
        // dd($response);
        return back()->with($response);
    }

    public function fetch_specific_leave_requests()
    {
        // dd($request->all());
        $token = session('token');
        $headers = ['Authorization' => 'Bearer ' . $token];
        $data = json_decode(file_get_contents('php://input'), true);
        // dd($data);
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        // echo json_encode($from_date);
        $response = http::withHeaders($headers)->get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/api/requests/' . $from_date . '/' . $to_date);
        // echo $response;
        $attendances = json_decode($response, true);

        echo json_encode($attendances);
        // return view('admin.students.leave_requests.index', $data);
    }
}
