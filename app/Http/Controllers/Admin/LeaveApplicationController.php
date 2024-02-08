<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin\HrLeaveApplication;
use App\Models\Master\MastDesignation;
use App\Models\Master\MastLeave;
use App\Models\User;
use Carbon\Carbon;
use DateTime;

class LeaveApplicationController extends Controller
{
    public function emergency_leave()
    {
        $leave_type =MastLeave::where('status', 1)->get();
        $employee =User::where('status', 1)->get();
        return view('layouts.pages.admin.leave.index',compact('leave_type','employee'));
    }
    public function leave_application()
    {
        $data =HrLeaveApplication::with('mastLeave', 'user')->get();
        $leave_type =MastLeave::where('status', 1)->get();
        return view('layouts.pages.admin.leave.self_leave',compact('leave_type','data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'mast_leave_id' => 'required',
            'leave_contact' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = new HrLeaveApplication();
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->mast_leave_id = $request->mast_leave_id;
        $data->leave_contact = $request->leave_contact;
        $data->leave_location = $request->leave_location;
        $data->purpose = $request->purpose;
        $data->status = '0';
        $data->user_id = Auth::user()->id;
        $data->emp_id = $request->emp_id;
        $data->save();
        
        //----Leave Name
        $leave_data =MastLeave::where('id', $request->mast_leave_id)->first();
        $data->name =$request->employee_name;
        $data->leave_name =$leave_data->leave_name;
        //----Date Formate
        $date1 = Carbon::createFromFormat('Y-m-d', $request->start_date);
        $date2 = Carbon::createFromFormat('Y-m-d', $request->end_date);
        $data->formattedDate1 = $date1->format('j F, Y');
        $data->formattedDate2 = $date2->format('j F, Y');
        //----Duration Single
        $startDate = new DateTime($request->start_date);
        $endDate = new DateTime($request->end_date);
        $interval = $startDate->diff($endDate);
        $data->duration = $interval->format('%d days');

        return response()->json($data);
    }

    public function dept_approve_list()
    {
        $data =HrLeaveApplication::with('mastLeave', 'user')->where('status', 0)->get();

        return view('layouts.pages.admin.leave.approve_dept',compact('data'));
    }
    public function dept_approve($id)
    {
        $data = HrLeaveApplication::findOrFail($id);
        $data->status = '1';
        $data->save();

        $notification=array('messege'=>'Leave approve successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function hr_approve_list()
    {
        $data =HrLeaveApplication::with('mastLeave', 'user')->where('status', 1)->get();

        return view('layouts.pages.admin.leave.approve_hr',compact('data'));
    }
    public function hr_approve($id)
    {
        $data = HrLeaveApplication::findOrFail($id);
        $data->status = 2;
        $data->save();

        $notification=array('messege'=>'Leave approve successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function decline($id){
        $data = HrLeaveApplication::findOrFail($id);
        $data->status = 3;
        $data->save();

        $notification=array('messege'=>'Canceled successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function getEmployeeCode(Request $request)
    {
        $employeeCode = User::where('id', $request->userId)->first();
        return response()->json($employeeCode);
    }
    //---View Attendance List
    public function getLeaveApplication_report(Request $request)
    {
        $data =HrLeaveApplication::with('mastLeave', 'user')->where('status', 2)->where('emp_id', $request->userId)->get();
 
        return view('layouts.pages.admin.leave.leave-details-view', compact('data'));
        
    }
}
