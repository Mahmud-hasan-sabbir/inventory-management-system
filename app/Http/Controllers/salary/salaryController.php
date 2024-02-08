<?php

namespace App\Http\Controllers\salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\Employee;
use App\Models\salary\advanced_salary;
use App\Models\employee\attendance;
use App\Models\salary\salaryProcess;
use DB;
use Carbon\Carbon;
use App\Models\paidSalary;

class salaryController extends Controller
{
    public function advancedSalary()
    {
        $advancedSalary = advanced_salary::with('employee')->orderBy('id','DESC')->get();
        $employees = Employee::all();
        return view('layouts.pages.salary.advanced_salary',['allEmployee'=>$employees,'advancedSalary'=>$advancedSalary]);
    }

    public function getCurrentSalary(Request $request)
    {

        $employeecurrentSalary = Employee::where('id',$request->id)->first();
        // dd($employeecurrentSalary);
        return response()->json($employeecurrentSalary);
    }


    public function storeAdvancedSalary(Request $request)
    {
        // Validate if a record already exists for the same employee and month
        $existingRecord = advanced_salary::where('emp_id', $request->emp_id)
            ->where('month', $request->month)
            ->where('year', $request->year)
            ->first();

        if ($existingRecord) {
            $notification = array('messege' => 'Advanced Salary already paid for this  month!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $storeadvancedSalary = new advanced_salary();
        $storeadvancedSalary->emp_id = $request->emp_id;
        $storeadvancedSalary->month = $request->month;
        $storeadvancedSalary->year = $request->year;
        $storeadvancedSalary->advanced_salary = $request->advanced_salary;
        $storeadvancedSalary->date = $request->date;
        $storeadvancedSalary->remarks = $request->remarks;
        $storeadvancedSalary->save();

        $notification = array('messege' => 'Advanced Salary paid Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function getAdvSalaryEdit(Request $request)
    {
        $editAdvancedSalary = advanced_salary::with('employee')->where('id',$request->id)->first();
        $currentSalary = $editAdvancedSalary->employee->salary;
        return response()->json([
           'editAdvancedSalary' => $editAdvancedSalary,
            'currentSalary' => $currentSalary
        ]);
    }

    public function updateAdvSalary(Request $request , $id)
    {
        $updateAdvancedSalary = advanced_salary::find($id);
        $updateAdvancedSalary->advanced_salary = $request->advanced_salary;
        $updateAdvancedSalary->date = $request->date;
        $updateAdvancedSalary->remarks = $request->remarks;
        $updateAdvancedSalary->save();

        $notification = array('messege' => 'Advanced Salary Update Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function paySalary()
    {
        $paidSalary = paidSalary::with('employee')->get();
        $allEmployee = Employee::all();

        return view('layouts.pages.salary.pay_salary',['allEmployee'=>$allEmployee,'paidsalary' => $paidSalary]);
    }

    public function storePaidSalary(Request $request)
    {

        $existingRecord = paidSalary::where('emp_id', $request->emp_id)
        ->where('month', $request->month)
        ->where('year', $request->year)
        ->first();

        if ($existingRecord) {
            $notification = array('messege' => ' Already Salary paid for this  month!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $storepaidSalary = new paidSalary();
        $storepaidSalary->emp_id                = $request->emp_id;
        $storepaidSalary->current_salary        = $request->current_salary;
        $storepaidSalary->advanced_salary       = $request->advanced_salary == 'No advanced salary' ? 0 : $request->advanced_salary;
        $storepaidSalary->paid_salary           = $request->paidSalary;
        $storepaidSalary->year                  = $request->year;
        $storepaidSalary->month                 = $request->month;
        $storepaidSalary->date                  = $request->date;
        $storepaidSalary->leave                 = $request->leave;
        $storepaidSalary->with_out_pay_leave    = $request->withoutpaysalary;
        $storepaidSalary->remarks               = $request->remarks;
        $storepaidSalary->is_approve            = 0;
        $storepaidSalary->save();

        $notification = array('messege' => 'Paid salary save successfully.!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    public function salaryApproveList()
    {
        $paidSalary = paidSalary::with('employee')->where('is_approve', 0)->get();
        return view('layouts.pages.salary.salary_approve',compact('paidSalary'));
    }

    public function salaryApprove($id)
    {
        paidSalary::where('id', $id)->update(['is_approve' => 1]);
        $notification = array('messege' => 'Paid salary approve successfully.!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function salaryApproveCancale($id)
    {
        paidSalary::where('id', $id)->update(['is_approve' => 2]);
        $notification = array('messege' => 'Paid salary cancaled successfully.!', 'alert-type' => 'error');
        return redirect()->back()->with($notification);
    }


    public function getPaySalary(Request $request)
    {
        $currentSalary = Employee::where('id',$request->id)->first();

        return response()->json($currentSalary);
    }

    public function getAdvancedSalaryForLeave(Request $request)
    {
        // $advancedSalary = advanced_salary::where('emp_id', $request->id)->where('month',$request->month)->select('advanced_salary')->first();
        // $advancedSalaryValue = $advancedSalary ? $advancedSalary->advanced_salary : 0;
        // $currentMonthAttendance = attendance::where('emp_id', $request->id)->where('att_month',$request->month)->where('attendance','Absence')->get();
        // $countMonthDays = count($currentMonthAttendance);
        // return response()->json([
        //     'advancedSalary' => $advancedSalaryValue,
        //     'countMonthDays' => $countMonthDays
        // ]);

        $employeeId = $request->id;
        $selectedMonth = $request->month;

// Check if there is an employee selected from the front-end
        if ($employeeId) {
            // Retrieve advanced salary for the selected employee and month
            $advancedSalary = advanced_salary::where('emp_id', $employeeId)->where('month', $selectedMonth)->select('advanced_salary')->first();
            $advancedSalaryValue = $advancedSalary ? $advancedSalary->advanced_salary : 0;

            // Retrieve current month's attendance for the selected employee
            $currentMonthAttendance = attendance::where('emp_id', $employeeId)->where('att_month', $selectedMonth)->where('attendance', 'Absence')->get();
            $countMonthDays = count($currentMonthAttendance);

            // Retrieve without_pay value from the Employee model
            $employee = Employee::find($employeeId);
            $withoutPayValue = $employee ? $employee->without_pay : 0;

            return response()->json([
                'advancedSalary' => $advancedSalaryValue,
                'countMonthDays' => $countMonthDays,
                'withoutPayValue' => $withoutPayValue,
            ]);
        } else {
            // Handle the case when no employee is selected
            return response()->json(['error' => 'No employee selected.']);
        }
    }

    public function getAdvanceLeaveWithoutpay(Request $request)
    {

        $employeeId = $request->id;
        $selectedMonth = $request->month;
        $selectedYear = $request->year;

        $existingRecord = paidSalary::where('emp_id', $employeeId)->where('month', $selectedMonth)->where('year', $selectedYear)->first();

        $paySalary = salaryProcess::where('emp_id', $employeeId)->where('month', $selectedMonth)->where('year',$selectedYear)->select('advanced_salary','without_pay_leave','current_salary','leave')->first();
        return response()->json([
            'paySalary' => $paySalary,
            'existingRecord' => $existingRecord
        ]);

    }


    // ============================= salary process =============================================//

    public function salaryProcess()
    {
        $employees = Employee::all();
        $salaryProcess = salaryProcess::with('employee.designation')->orderBy('id','DESC')->get();
        return view('layouts.pages.salary.salary_process',['allEmployee'=>$employees,'salaryProcess'=>$salaryProcess]);
    }

    public function storeSalaryProcess(Request $request)
    {
        // Check if a record already exists for the same employee, month, and year
        $existingRecord = salaryProcess::where('emp_id', $request->emp_id)
            ->where('month', $request->month)
            ->where('year', $request->year)
            ->first();

        // If a record already exists, handle it
        if ($existingRecord) {
            $notification=array('messege'=>'This Employee Salary Process Complete this month!','alert-type'=>'error');
            return redirect()->back()->with($notification);
        }else{

            $storeSalaryProcess = new salaryProcess();
            $storeSalaryProcess->emp_id = $request->emp_id;
            $storeSalaryProcess->current_salary = $request->current_salary;
            $storeSalaryProcess->advanced_salary =  $request->advanced_salary == 'No advanced salary' ? 0 : $request->advanced_salary;
            $storeSalaryProcess->total_vacation = $request->total_vacation;
            $storeSalaryProcess->month = $request->month;
            $storeSalaryProcess->year = $request->year;
            $storeSalaryProcess->leave = $request->leave;
            $storeSalaryProcess->without_pay_leave = $request->without_pay_leave;
            $storeSalaryProcess->status = 0;
            $storeSalaryProcess->date = $request->date;
            $storeSalaryProcess->remarks = $request->remarks;
            $storeSalaryProcess->save();
            $employee = Employee::find($request->emp_id);

            // Update leave_count and without_pay in the Employee model
            if ($employee) {
                $employee->leave_count = $request->total_vacation;
                $employee->without_pay = 0;
                $employee->save();
            }

            // $notification = array('message' => 'Salary Process Successfully!', 'alert-type' => 'success');
            // return redirect()->back()->with($notification);
        }

        $notification=array('messege'=>'Salary Process Save Successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function editSalaryProcess(Request $request)
    {
        $editSalaryProcess = salaryProcess::with('employee')->where('id',$request->id)->first();
        return response()->json($editSalaryProcess);
    }

    public function updateSalaryProcess(Request $request)
    {
        $updateSalaryProcess = salaryProcess::where('id',$request->hiddenId)->first();
        $updateSalaryProcess->emp_id = $request->hiddenempId;
        $updateSalaryProcess->current_salary = $request->current_salary;
        $updateSalaryProcess->advanced_salary = $request->advanced_salarye == 'No advanced salary' ? 0 : $request->advanced_salarye;
        $updateSalaryProcess->total_vacation = $request->total_vacation;
        $updateSalaryProcess->month = $request->monthe;
        $updateSalaryProcess->year = $request->year;
        $updateSalaryProcess->leave = $request->leavee;
        $updateSalaryProcess->without_pay_leave = $request->without_pay_leavee;
        $updateSalaryProcess->status = 0;
        $updateSalaryProcess->date = $request->datee;
        $updateSalaryProcess->remarks = $request->remarkse;
        $updateSalaryProcess->save();

        $notification = array('messege' => 'Salary Process update Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function paidSalaryView(Request $request)
    {
        $editPaidSalary = paidSalary::with('employee')->where('id',$request->id)->first();
        return response()->json($editPaidSalary);
    }

    public function paidSalaryDelete(Request $request)
    {
        $deletePaidSalary = paidSalary::where('id',$request->id)->first();
        $deletePaidSalary->delete();
        return response()->json('success');

    }

    public function approvePaidSalaryView(Request $request)
    {
        $approvePaidSalary = paidSalary::with('employee')->where('id',$request->id)->first();
        $employeeName = $approvePaidSalary->employee->name;
        return response()->json([
            'approvePaidSalary' => $approvePaidSalary,
            'employeeName' => $employeeName
        ]);
    }

}
