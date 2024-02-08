<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Admin\BackViewController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\employee\employeeController;
use App\Http\Controllers\supplier\supplierController;
use App\Http\Controllers\salary\salaryController;
use App\Http\Controllers\product\productController;
use App\Http\Controllers\setting\settingController;
use App\Http\Controllers\pos\PosController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});

//==================// Location //==================//
Route::get('/location', [LocationController::class, 'index'])->name('location');
Route::get('/get-districts', [LocationController::class, 'getDistricts'])->name('get_districts');
Route::get('/get-upazila', [LocationController::class, 'getUpazilas'])->name('get_upazila');
Route::get('/get-thana', [LocationController::class, 'getThanas'])->name('get_thana');


//____________________// START \\_________________//
Route::middleware([ 'auth:sanctum','verified', config('jetstream.auth_session')])->group(function () {
    Route::get('/dashboard', [BackViewController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    Route::get('/coming_soon', [BackViewController::class, 'coming_soon'])->name('coming_soon')->middleware('auth');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
});

Route::middleware([ 'auth:sanctum','verified', config('jetstream.auth_session')])->group(function () {

    // ========================================= Employee route ==========================================//

    Route::get('/employee', [employeeController::class, 'employeeindex'])->name('employee_index');
    Route::post('/store_employee', [employeeController::class, 'storeEmployee'])->name('store_employee');
    Route::get('/edit_employee', [employeeController::class, 'editEmployee'])->name('edit_employee');
    Route::post('/update_employee/{id}', [employeeController::class, 'updateEmployee'])->name('update_employee');
    Route::get('/delete_employee', [employeeController::class, 'deleteEmployee'])->name('delete_employee');
    Route::get('/employee_designation',[employeeController::class,'employeeDesignation'])->name('employee_designation');
    Route::post('/store_designation',[employeeController::class,'storeDesignation'])->name('store_designation');
    Route::get('/designation_edit',[employeeController::class,'designationEdit'])->name('designation_edit');
    Route::post('/update_designation',[employeeController::class,'updateDesignation'])->name('update_designation');
    Route::get('/get_designation_view',[employeeController::class,'getDesignationView'])->name('get_designation_view');

    // ============================================ Attendance =====================================================//

    Route::get('/attendance',[employeeController::class,'attendance'])->name('attendance');
    Route::post('/store_attendance',[employeeController::class,'storeAttendance'])->name('store_attendance');
    Route::get('/all_attendance',[employeeController::class,'allAttendance'])->name('all_attendance');
    Route::get('/get_attendance_list',[employeeController::class,'getAttendanceList'])->name('get_attendance_list');
    Route::get('get_filter_data', [employeeController::class,'getFilterData'])->name('get_filter_data');
    Route::get('change_attendance', [employeeController::class,'changeAttendance'])->name('change_attendance');
    Route::get('get_attendance_edit', [employeeController::class,'getAttendanceEdit'])->name('get_attendance_edit');
    Route::post('update_change_attendance', [employeeController::class,'updateChangeAttendance'])->name('update_change_attendance');
    Route::get('get_attendance_view', [employeeController::class,'getAttendanceView'])->name('get_attendance_view');



    //================================================= Customer route ==========================================//
    Route::get('/Customer_index',[customerController::class,'customerIndex'])->name('Customer_index');
    Route::post('/store_customer', [customerController::class, 'storeCustomer'])->name('store_customer');
    Route::get('/edit_customer', [customerController::class, 'editCustomer'])->name('edit_customer');
    Route::post('/update_customer/{id}', [customerController::class, 'updateCustomer'])->name('update_customer');
    Route::get('/view_customer', [customerController::class, 'viewCustomer'])->name('view_customer');
    Route::get('/delete_customer', [customerController::class, 'deleteCustomer'])->name('delete_customer');

    //================================================= Supplier route ==========================================//
    Route::get('/Supplier_index',[supplierController::class,'SupplierIndex'])->name('Supplier_index');
    Route::post('/store_supplier',[supplierController::class,'storeSupplier'])->name('store_supplier');
    Route::get('/edit_supplier',[supplierController::class,'editSupplier'])->name('edit_supplier');
    Route::post('/update_supplier/{id}',[supplierController::class,'updateSupplier'])->name('update_supplier');
    Route::get('/view_supplier',[supplierController::class,'viewSupplier'])->name('view_supplier');
    Route::get('/delete_supplier',[supplierController::class,'deleteSupplier'])->name('delete_supplier');


    //================================================= salary route ===================================================//
    Route::get('/advanced_salary',[salaryController::class,'advancedSalary'])->name('advanced_salary');
    Route::get('/get_adv_current_salary',[salaryController::class,'getCurrentSalary'])->name('get_adv_current_salary');
    Route::post('/store_advanced_salary',[salaryController::class,'storeAdvancedSalary'])->name('store_advanced_salary');
    Route::get('/get_adv_salary_edit',[salaryController::class,'getAdvSalaryEdit'])->name('get_adv_salary_edit');
    Route::post('/update_adv_salary/{id}',[salaryController::class,'updateAdvSalary'])->name('update_adv_salary');
    Route::get('/pay_salary',[salaryController::class,'paySalary'])->name('pay_salary');
    Route::get('/get_current_salary',[salaryController::class,'getCurrentSalary'])->name('get_current_salary');
    Route::get('/get_pay_salary',[salaryController::class,'getPaySalary'])->name('get_pay_salary');
    Route::get('/get_advanced_salary_for_leave',[salaryController::class,'getAdvancedSalaryForLeave'])->name('get_advanced_salary_for_leave');
    Route::get('/salary_process',[salaryController::class,'salaryProcess'])->name('salary_process');
    Route::post('/store_salary_process',[salaryController::class,'storeSalaryProcess'])->name('store_salary_process');
    Route::get('/edit_salary_process',[salaryController::class,'editSalaryProcess'])->name('edit_salary_process');
    Route::post('/update_salary_process',[salaryController::class,'updateSalaryProcess'])->name('update_salary_process');
    Route::get('/get_advance_leave_withoutpay',[salaryController::class,'getAdvanceLeaveWithoutpay'])->name('get_advance_leave_withoutpay');
    Route::post('/store_paidsalary',[salaryController::class,'storePaidSalary'])->name('store_paidsalary');
    Route::get('/salary_approve_list',[salaryController::class,'salaryApproveList'])->name('salary_approve_list');
    Route::get('/paid_salary_view',[salaryController::class,'paidSalaryView'])->name('paid_salary_view');
    Route::get('/approve_paid_salary_view',[salaryController::class,'approvePaidSalaryView'])->name('approve_paid_salary_view');
    Route::get('/paid_salary_delete',[salaryController::class,'paidSalaryDelete'])->name('paid_salary_delete');
    Route::patch('/salary_approve/{id}',[salaryController::class,'salaryApprove'])->name('salary_approve');
    Route::patch('/salary_approve_cancale/{id}',[salaryController::class,'salaryApproveCancale'])->name('salary_approve_cancale');


    //================================================= product route ===================================================//
    //units
    Route::get('unit',[productController::class,'unitIndex'])->name('unit');
    Route::post('/store_unit',[productController::class,'storeUnit'])->name('store_unit');
    Route::get('/edit_unit',[productController::class,'editUnit'])->name('edit_unit');
    Route::post('/update_unit',[productController::class,'updateUnit'])->name('update_unit');

    // category
    Route::get('/category_index',[productController::class,'categoryIndex'])->name('category');
    Route::post('/store_category',[productController::class,'storeCategory'])->name('store_category');
    Route::get('/edit_category',[productController::class,'editCategory'])->name('edit_category');
    Route::post('/update_category',[productController::class,'updateCategory'])->name('update_category');
    // product

    Route::get('/product',[productController::class,'productIndex'])->name('product');
    Route::post('/store_product',[productController::class,'storeProduct'])->name('store_product');
    Route::get('/get_product_edit',[productController::class,'getProductEdit'])->name('get_product_edit');
    Route::post('/update_product_details',[productController::class,'updateProductDetails'])->name('update_product_details');
    Route::get('/product_approve_list',[ProductController::class,'productApproveList'])->name('product_approve_list');
    Route::patch('/product_approve/{id}',[ProductController::class,'productApprove'])->name('product_approve');
    Route::patch('/product_approve_cancale/{id}',[ProductController::class,'productApproveCancale'])->name('product_approve_cancale');
    Route::get('/product_export_import',[ProductController::class,'productExportImport'])->name('product_export_import');
    Route::get('/product.excel', [ProductController::class, 'export'])->name('product.excel');
    Route::post('/product_import', [ProductController::class, 'productImport'])->name('product_import');


    // expense all route

    Route::get('/expense',[ProductController::class,'expenseIndex'])->name('expense');
    Route::post('/store_expense',[ProductController::class,'storeExpense'])->name('store_expense');
    Route::get('/edit_expense',[ProductController::class,'editExpense'])->name('edit_expense');
    Route::post('/update_expense',[ProductController::class,'updateExpense'])->name('update_expense');
    Route::get('/expense_report',[ProductController::class,'expenseReport'])->name('expense_report');
    Route::get('/get_expense_report',[ProductController::class,'getExpenseReport'])->name('get_expense_report');


    // setting all route

    Route::get('/setting',[settingController::class,'setting'])->name('setting');
    Route::post('/store_setting_info',[settingController::class,'storeSettingInfo'])->name('store_setting_info');
    Route::get('/edit_setting_info',[settingController::class,'editSettingInfo'])->name('edit_setting_info');
    Route::post('/update_setting_info',[settingController::class,'updateSettingInfo'])->name('update_setting_info');
    Route::get('/setting_info_view',[settingController::class,'settingInfoView'])->name('setting_info_view');


    // pos all route

    Route::get('/pos_index',[PosController::class,'posIndex'])->name('pos_index');
    Route::get('/get-product',[PosController::class,'getProduct'])->name('get_product');

    Route::get('/invoice_product',[PosController::class,'invoiceProduct'])->name('invoice_product');

    Route::post('/store_sale',[PosController::class,'storeSale'])->name('store_sale');
    // due payment
    Route::get('/due_payment',[PosController::class,'duePayment'])->name('due_payment');
    Route::get('/get_pre_due_amount',[PosController::class,'getPreDueAmount'])->name('get_pre_due_amount');
    Route::post('/store_due_payment_received',[PosController::class,'storeDuePaymentReceived'])->name('store_due_payment_received');

    // Report all route

    Route::get('/sales_report',[PosController::class,'salesReport'])->name('sales_report');
    Route::get('/get_sales_report',[PosController::class,'getSalesReport'])->name('get_sales_report');
    Route::get('/sales_against_profit',[PosController::class,'salesAgainstProfit'])->name('sales_against_profit');
    Route::get('/get_sales_againt_profit_report',[PosController::class,'getSalesAgaintProfitReport'])->name('get_sales_againt_profit_report');
    Route::get('/due_payment_report',[PosController::class,'duePaymentReport'])->name('due_payment_report');
    Route::get('/get_due_payment',[PosController::class,'getDuePayment'])->name('get_due_payment');
    

});


//__________________________ TEST AJAX MODEL_____________________________//
use App\Http\Controllers\TodoController;
Route::get('/todos', [TodoController::class, 'index']);
Route::get('todos/{todo}/edit', [TodoController::class, 'edit']);
Route::post('todos/store', [TodoController::class, 'store']);
Route::delete('todos/destroy/{todo}', [TodoController::class, 'destroy']);

// Route::get('get-procedure', function () {$id = 1; $post = DB::select("CALL get_users_by_id(".$id.")");dd($post);});
