<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin\HrAttendance;
use App\Models\Admin\InfoPersonal;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttendanceExport;
use App\Imports\AttendanceImport;
use App\Imports\UsersImport;
use Carbon\Carbon;

class ManualAttendanceController extends Controller
{
    public function index()
    {
        $employee = User::where('status', 1)->get();
        return view('layouts.pages.admin.attendance.index',compact('employee'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employeeName' => 'required',
            'date' => 'date',
            'attendance_type' => 'required',
            'in_time' => 'required',
            'out_time' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = new HrAttendance();
        $data->date = $request->date;
        $data->in_time = $request->in_time;
        $data->out_time = $request->out_time;
        $data->attendance_type = $request->attendance_type;
        $data->location = $request->location;
        $data->description = $request->description;
        $data->finger_id = $request->finger_id;
        $data->user_id = Auth::user()->id;
        $data->save();

        $notification=array('messege'=>'Manual attendance successfully!','alert-type'=>'success');
        return response()->json($data);
    }

    //------ Attendance Approve
    public function attendance_approve_list()
    {
        $data = HrAttendance::with('user')->where('status', 0)->get();
        return view('layouts.pages.admin.attendance.approve_attendance',compact('data'));
    }

    public function attendance_approve($id)
    {
        $data = HrAttendance::findOrFail($id);
        $data->status = 1;
        $data->save();
        return redirect()->back();
    }
    public function decline($id){
        $data = HrAttendance::findOrFail($id);
        $data->status = 2;
        $data->save();
        return redirect()->back();

    }
    /*--------------------------------------------------------------
     * SHOW AJAX CALL DATA
     *--------------------------------------------------------------
     */
    public function setUpAttendanceID(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attendanceId' => 'required',
            'attendance_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = User::find($request->attendanceId);
        $data->attendance_id = $request->attendance_id;
        $data->save();

        return response()->json($data);
    }
    //--- Attendance Report
    public function getAttendanceRepot($id)
    {
        // $data = HrAttendance::where('emp_id', $id)->get();
        // $user = User::where('id', $id)->first();
        // return view('layouts.pages.admin.attendance.show',compact('data','user'));
    }

    public function filterDate(Request $request)
    {  
        $user_id = $request->input('user_id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($user_id && $start_date && $end_date ) {
            if (strtotime($end_date) > strtotime($start_date)) {
                $data = HrAttendance::whereBetween('date', [$start_date, $end_date])->where('finger_id', $user_id)
                ->where('hr_attendances.status', 1)->join('users','users.attendance_id','hr_attendances.finger_id')
                ->select('hr_attendances.*','users.name','users.employee_code')->orderBy('date')->get();        
            }else {
                $data = HrAttendance::join('users','users.attendance_id','hr_attendances.finger_id')->where('hr_attendances.status', 1)
                ->select('hr_attendances.*','users.name','users.employee_code')->orderBy('date')->get();
            }
        } else if($user_id) {
            $data = HrAttendance::where('finger_id', $user_id)
            ->join('users','users.attendance_id','hr_attendances.finger_id')->where('hr_attendances.status', 1)
            ->select('hr_attendances.*','users.name','users.employee_code')->orderBy('date')->get();
        } else if($start_date && $end_date) {
            if (strtotime($end_date) > strtotime($start_date)) {
                $data = HrAttendance::whereBetween('date', [$start_date, $end_date])
                ->join('users','users.attendance_id','hr_attendances.finger_id')->where('hr_attendances.status', 1)
                ->select('hr_attendances.*','users.name','users.employee_code')->orderBy('date')->get();
            }else {
                $data = HrAttendance::join('users','users.attendance_id','hr_attendances.finger_id')->where('hr_attendances.status', 1)
                ->select('hr_attendances.*','users.name','users.employee_code')->orderBy('date')->get();
            }
        }else {
            $data = HrAttendance::join('users', 'users.attendance_id', '=', 'hr_attendances.finger_id')
            ->select('hr_attendances.*', 'users.name', 'users.employee_code')
            ->orderBy('date')->where('hr_attendances.status', 1)->get();
        }
        return view('layouts.pages.admin.attendance.load-attendance-list',compact('data'));
    }

    /*____________________________________
                Upload EXCEL
    _____________________________________*/
    public function importAttendance()
    {
        return view('layouts.pages.admin.attendance.import');
    }

    public function uploadAttendance(Request $request)
    {
        $emp_id = $request->emp_id;
        $file = $request->file('file');

        Excel::import(new AttendanceImport($emp_id), $file);
        // Excel::import(new UsersImport, $request->file); //this way try to successfully

        $notification=array('messege'=>'Manual attendance successfully!','alert-type'=>'success');
        return redirect()->route('manual_attendances.index')->with($notification);
    }

    public function exportAttendance() 
    {
        return Excel::download(new AttendanceExport, 'Attendance.xlsx');
    }
}


