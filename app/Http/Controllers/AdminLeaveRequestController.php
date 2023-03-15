<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminLeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = http::get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/leave_requests');
        $leave_requests = json_decode($response, true);

        $data = [
            'leave_requests' => $leave_requests,
        ];
        return view('admin.students.leave_requests.index', $leave_requests);
    }

    public function get()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $status = $data['status'];
        $response = http::get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/requests/'. $status);
        $leave_requests = json_decode($response, true);

        $data = [
            'leave_requests' => $leave_requests,
        ];
        return view('admin.students.leave_requests.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function approve_leave_request($leave_request)
    {
        $response = http::get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/approve/leaverequests/'.$leave_request);
        $response = json_decode($response, true);
        // dd($response);
        return back()->with($response);
    }

    public function reject_leave_request(LeaveRequest $leave_request)
    {

        // dd($leave_request);

        $response = http::get('http://localhost/Ezlin_Task_Project/Ezlin_project/public/leave_requests/'.$leave_request->id .'/reject');
        $response = json_decode($response, true);
        // dd($response);
        return back()->with($response);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
