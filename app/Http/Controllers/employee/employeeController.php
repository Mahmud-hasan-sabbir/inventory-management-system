<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\Employee;
use Illuminate\Support\Facades\Auth;
use App\Models\employee\Designation;
use App\Models\employee\attendance;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class employeeController extends Controller
{
    public static $products,$product,$image,$imageName,$imageUrl,$directory;

    public function employeeindex()
    {
        $allDesignation = Designation::where('status','Active')->orderBy('id','DESC')->get();
        $allEmployee = Employee::with('designation')->orderBy('id','DESC')->get();
        return view('layouts.pages.employee.employeeindex',['allEmployee' => $allEmployee , 'allDesignation' => $allDesignation]);
    }

    public static function uploadImage($request,$product= null)
    {
        self::$image = $request->file('image');
        if (self::$image)
        {
            if ($product)
            {
                if (file_exists($product->image))
                {
                    unlink($product->image);
                }
            }
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'public/assets/images/employee-images/';
            self::$image->move(self::$directory,self::$imageName);
            self::$imageUrl = self::$directory.self::$imageName;
        }else{
            if ($product)
            {
                self::$imageUrl = $product->image;
            }else{
                self::$imageUrl = null;
            }

        }

        return self::$imageUrl;
    }

    public function storeEmployee(Request $request)
    {
        $storeEmployee = new Employee();
        $storeEmployee->name = $request->emp_name;
        $storeEmployee->email = $request->email;
        $storeEmployee->perso_number = $request->per_number;
        $storeEmployee->nid = $request->nid;
        $storeEmployee->experience = $request->work_experience;
        $storeEmployee->salary = $request->salary;
        $storeEmployee->em_con_name = $request->emg_con_name;
        $storeEmployee->em_con_number = $request->emg_con_number;
        $storeEmployee->relationship = $request->relationship;
        $storeEmployee->vacation = $request->vacation;
        $storeEmployee->address = $request->address;
        $storeEmployee->image = self::uploadImage($request);
        $storeEmployee->remarks = $request->remarks;
        $storeEmployee->status = $request->status;
        $storeEmployee->desig_id = $request->designation;
        $storeEmployee->user_id = Auth::user()->id;
        $storeEmployee->save();
        return redirect()->back();
    }

    public function editEmployee(Request $request)
    {
        $editEmployee = Employee::where('id',$request->id)->first();
        return response()->json($editEmployee);
    }

    public function updateEmployee(Request $request,$id)
    {
        $updateEmployee = Employee::where('id',$id)->first();
        $updateEmployee->name = $request->emp_name;
        $updateEmployee->email = $request->email;
        $updateEmployee->perso_number = $request->per_number;
        $updateEmployee->nid = $request->nid;
        $updateEmployee->experience = $request->work_experience;
        $updateEmployee->salary = $request->salary;
        $updateEmployee->em_con_name = $request->emg_con_name;
        $updateEmployee->em_con_number = $request->emg_con_number;
        $updateEmployee->relationship = $request->relationship;
        $updateEmployee->vacation = $request->vacation;
        $updateEmployee->address = $request->address;
        $updateEmployee->image = self::uploadImage($request,$updateEmployee);
        $updateEmployee->remarks = $request->remarks;
        $updateEmployee->status = $request->status;
        $updateEmployee->user_id = Auth::user()->id;
        $updateEmployee->save();
        return redirect()->back();
    }

    public function deleteEmployee(Request $request)
    {
        $deleteEmployee = Employee::where('id',$request->id)->first();
        if (isset($deleteEmployee->image))
        {
            if (file_exists($deleteEmployee->image))
            {
                unlink($deleteEmployee->image);
            }
        }
        $deleteEmployee->delete();
        return response()->json('success');
    }

    public function employeeDesignation()
    {
        $allDesignation = Designation::orderBy('id','DESC')->get();
        return view('layouts.pages.employee.employee_designation',['allDesignation' => $allDesignation ]);
    }

    public function storeDesignation(Request $request)
    {
        $storeDesignation = new Designation();
        $storeDesignation->designation_name = $request->designation_name;
        $storeDesignation->status = $request->status;
        $storeDesignation->remarks = $request->remarks;
        $storeDesignation->save();
        $notification=array('messege'=>'Designation Save Successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function designationEdit(Request $request)
    {
        $editDesignation = Designation::where('id',$request->id)->first();
        return response()->json($editDesignation);
    }

    public function updateDesignation(Request $request)
    {
        $updateDesignation = Designation::where('id',$request->hideId)->first();
        $updateDesignation->designation_name = $request->newName;
        $updateDesignation->status = $request->newStatus;
        $updateDesignation->remarks = $request->newRemarks;
        $updateDesignation->save();
        $notification=array('messege'=>'Designation Update Successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function getDesignationView(Request $request)
    {
        $getDesignationview = Designation::where('id',$request->id)->first();
        return response()->json($getDesignationview);
    }

    // ===================== Attendance ========================//

    public function attendance()
    {
            $allEmployee = Employee::with('designation')->orderBy('id','DESC')->get();
            return view('layouts.pages.employee.attendance',['allEmployee' => $allEmployee ]);
    }

    // public function storeAttendance(Request $request)
    // {
    //     // dd($request->all());
    //     $req_date = $request->att_date;
    //     $att_date = attendance::where('att_date',$req_date)->first();

    //     if ($att_date) {
    //         $notification=array('messege'=>'Attendance Already Taken!','alert-type'=>'success');
    //         return redirect()->back()->with($notification);
    //     }else
    //     {
    //         $data = [];
    //         foreach ($request->emp_id as $row) {
    //             $data[] = [
    //                 'emp_id' => $row,
    //                 'attendance' => $request->attendance[$row],
    //                 'att_date' => $request->att_date,
    //                 'edit_date' => date("Y-m-d"),
    //                 'att_month' => $request->att_month,
    //                 'att_year' => $request->att_year,
    //                 'user_id' => Auth::user()->id,
    //             ];
    //         }

    //         $save = DB::table('attendances')->insert($data);

    //         if ($save) {
    //             $notification=array('messege'=>'Attendance Save successfully!','alert-type'=>'success');
    //             return redirect()->back()->with($notification);
    //         } else {
    //             $notification=array('messege'=>'Attendance Not Save Successfully!','alert-type'=>'success');
    //             return redirect()->back()->with($notification);
    //         }
    //     }
    // }

    // public function storeAttendance(Request $request)
    // {
    //     $req_date = $request->att_date;
    //     $att_date = attendance::where('att_date', $req_date)->first();

    //     if ($att_date) {
    //         $notification = array('messege' => 'Attendance Already Taken!', 'alert-type' => 'success');
    //         return redirect()->back()->with($notification);
    //     } else {
    //         $data = [];
    //         foreach ($request->emp_id as $row) {
    //             $attendanceStatus = $request->attendance[$row];

    //             $data[] = [
    //                 'emp_id' => $row,
    //                 'attendance' => $attendanceStatus,
    //                 'att_date' => $request->att_date,
    //                 'edit_date' => date("Y-m-d"),
    //                 'att_month' => $request->att_month,
    //                 'att_year' => $request->att_year,
    //                 'user_id' => Auth::user()->id,
    //             ];

    //             // Check if the employee is absent and update leave_count
    //             if ($attendanceStatus == 'Absence') {
    //                 $employee = Employee::find($row);

    //                 // Check if the employee exists before attempting to update
    //                 if ($employee) {
    //                     $employee->leave_count += 1;
    //                     $employee->save();
    //                 }
    //             }
    //         }

    //         // Use Eloquent ORM to insert data
    //         $save = attendance::insert($data);

    //         if ($save) {
    //             $notification = array('messege' => 'Attendance Save successfully!', 'alert-type' => 'success');
    //             return redirect()->back()->with($notification);
    //         } else {
    //             $notification = array('messege' => 'Attendance Not Save Successfully!', 'alert-type' => 'success');
    //             return redirect()->back()->with($notification);
    //         }
    //     }
    // }

    public function storeAttendance(Request $request)
    {
        $req_date = $request->att_date;
        $att_date = attendance::where('att_date', $req_date)->first();

        if ($att_date) {
            $notification = array('messege' => 'Attendance Already Taken!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data = [];
            foreach ($request->emp_id as $row) {
                $attendanceStatus = $request->attendance[$row];

                $data[] = [
                    'emp_id' => $row,
                    'attendance' => $attendanceStatus,
                    'att_date' => $request->att_date,
                    'edit_date' => date("Y-m-d"),
                    'att_month' => $request->att_month,
                    'att_year' => $request->att_year,
                    'user_id' => Auth::user()->id,
                ];

                // Check if the employee is absent and update leave_count
                if ($attendanceStatus == 'Absence') {
                    $employee = Employee::find($row);

                    // Check if the employee exists before attempting to update
                    if ($employee) {
                        $employee->leave_count += 1;
                        $employee->save();

                        // Set without_pay to leave_count if leave_count is greater than vacation, else set to 0
                        $withoutPayValue = ($employee->leave_count > $employee->vacation) ? ($employee->leave_count - $employee->vacation) : 0;

                        $employee->without_pay = $withoutPayValue;
                        $employee->save();
                    }
                }
            }

            // Use Eloquent ORM to insert data
            $save = attendance::insert($data);

            if ($save) {
                $notification = array('messege' => 'Attendance Save successfully!', 'alert-type' => 'success');
                return redirect()->back()->with($notification);
            } else {
                $notification = array('messege' => 'Attendance Not Save Successfully!', 'alert-type' => 'success');
                return redirect()->back()->with($notification);
            }
        }
    }


    public function allAttendance()
    {
        // $allAttendance = attendance::with('employee')->with('employee.designation')->orderBy('id','DESC')->get();
        $allEmployeeName = Employee::all();
        return view('layouts.pages.employee.all_attendance',['allEmployeeName' => $allEmployeeName ]);
    }

    public function getFilterData(Request $request)
    {

        $filterData = attendance::with('employee')->where('emp_id', $request->empName)->whereDate('att_date', '>=', $request->startDate)->whereDate('att_date', '<=', $request->endDate)->get();
        // dd($filterData);
        return view('layouts.pages.employee.attendance.filter_data', ['filterData' => $filterData]);
    }

    public function changeAttendance()
    {
        $currentDate = Carbon::now()->toDateString();
        $changeEmployee = Attendance::with('employee.designation')->whereDate('att_date', $currentDate)->get();
        return view('layouts.pages.employee.attendance.change_attendance', ['changeEmployee' => $changeEmployee]);
    }

    public function getAttendanceEdit(Request $request)
    {
        $change = Attendance::with('employee.designation')->where('id',$request->id)->first();
        return response()->json($change);
    }

    public function updateChangeAttendance(Request $request)
    {
        $updateChangeAttendance = Attendance::where('id',$request->changeAttendanceId)->first();
        $updateChangeAttendance->attendance = $request->newattendance;
        $updateChangeAttendance->save();
        $notification=array('messege'=>'Attendance Update Successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function getAttendanceView(Request $request)
    {
        $getAttendanceView = Attendance::with('employee.designation')->where('id',$request->id)->first();
        return response()->json($getAttendanceView);
    }


}
