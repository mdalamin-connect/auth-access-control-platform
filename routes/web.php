<?php


use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\StockAdjustmentController;
use App\Http\Controllers\StockAdjustmentDetailController;
use App\Http\Controllers\StockAdjustmentTypeController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseDetailController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RequisitionDetailController;
use App\Http\Controllers\UomController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CustomAuth;

use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SalaryPaymentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\HolidayController;








/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Common routes accessible to all roles
Route::get('/', [AuthController::class, 'index'])->name('/');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::group(['middleware' => 'custom.auth'], function () {

});

Route::middleware(['web', 'CustomAuth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // User and Role Management
    Route::resource('users', UserController::class);
    Route::get("getuser", [UserController::class, 'get_user_json']);
    Route::match(['get', 'put'], '/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

   // Employee Routes
    Route::resource('employees', EmployeeController::class);
    // Attendance Routes
    Route::resource('attendances', AttendanceController::class);
    Route::post('/attendance/mark', [AttendanceController::class, 'markAttendance'])->name('attendance.mark');
    Route::get('/attendance/report', [AttendanceController::class, 'monthlyReport'])->name('attendance.report');
    
    // Leave Routes
    Route::resource('leaves', LeaveController::class);
    Route::resource('leaves', LeaveController::class)->except(['edit', 'update']);
    Route::post('/leaves/{id}/status', [LeaveController::class, 'updateStatus'])->name('leaves.status');
    Route::get('/leave/balance', [LeaveController::class, 'leaveBalance'])->name('leave.balance');
    
    // Leave Type Routes
    Route::resource('leave_types', LeaveTypeController::class);
    
    // Salary Routes
    Route::resource('salaries', SalaryController::class)->only(['index', 'show']);
    Route::get('/salaries/{employee_id}/structure/create', [SalaryController::class, 'createStructure'])->name('salaries.structure.create');
    Route::post('/salaries/{employee_id}/structure/store', [SalaryController::class, 'storeStructure'])->name('salaries.structure.store');
    Route::get('/salaries/{employee_id}/payment/create', [SalaryController::class, 'createPayment'])->name('salaries.payment.create');
    Route::post('/salaries/{employee_id}/payment/store', [SalaryController::class, 'storePayment'])->name('salaries.payment.store');
    Route::get('/salaries/{id}/payslip', [SalaryController::class, 'payslip'])->name('salaries.payslip');
    Route::get('/salary/report', [SalaryController::class, 'monthlyReport'])->name('salary.report');
    
    // Holiday Routes
    Route::resource('holidays', HolidayController::class);
    Route::get('/holiday/calendar', [HolidayController::class, 'calendar'])->name('holiday.calendar');

    // Core App Resources
    Route::resource('departments', DepartmentController::class);
    Route::resource('designations', DesignationController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('status', StatusController::class);
    Route::resource('uoms', UomController::class);
    Route::resource('transaction-types', TransactionTypeController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::get("getsupplier", [SupplierController::class, 'get_supplier_json']);

    // Products and Stock
    Route::resource('products', ProductController::class);
    Route::get("getproduct", [ProductController::class, 'get_product_json']);
    Route::resource('stocks', StockController::class);
    Route::resource('stockadjustments', StockAdjustmentController::class);
    Route::resource('stockadjustmenttypes', StockAdjustmentTypeController::class);
    Route::resource('stockadjustmentdetails', StockAdjustmentDetailController::class);

    // Requisitions and Purchases
    Route::resource('/requisitions', RequisitionController::class);
    Route::resource('/requisitiondetails', RequisitionDetailController::class);
    Route::resource('/purchases', PurchaseController::class);
    Route::resource('/purchasedetails', PurchaseDetailController::class);
    Route::get('/requisition-purchase/{id?}', [PurchaseController::class, 'requisitionPurchase']);

    // Use Product
    Route::get('use-product', [\App\Http\Controllers\UseProductController::class, 'indexUseProduct'])->name('use_product');
    Route::get('create-use-product', [\App\Http\Controllers\UseProductController::class, 'createUseProduct'])->name('create_use_product');
    Route::post('store-use-product', [\App\Http\Controllers\UseProductController::class, 'storeUseProduct'])->name('store_use_product');
    Route::delete('destroy-use-product/{id}', [\App\Http\Controllers\UseProductController::class, 'useProductDestroy'])->name('destroy_use_product');
    Route::get('show-use-product/{id}', [\App\Http\Controllers\UseProductController::class, 'useProductShow'])->name('show_use_product');

    // Notifications and Reports
    Route::get('/new-requisitions-count', [RequisitionController::class, 'getNewRequisitionsCount']);
    Route::get('/new-requisitions', [RequisitionController::class, 'getNewRequisitions']);
    Route::get('/report/requisition', [ReportController::class, 'reportRequisition']);
    Route::get('/report/purchase', [ReportController::class, 'reportPurchase']);
    Route::get('/report/stock', [ReportController::class, 'reportStock']);
    Route::get('/project-report/{projectId}', [DashboardController::class, 'projectWiseReport']);

    // Activity Log
    Route::resource('activity-log', ActivityLogController::class);


});





// Show the password reset request form
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Handle the password reset request form submission
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
// Show the password reset form with token and email parameters
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Handle the password reset form submission
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');



Route::post('/upload-image', [ProjectController::class, 'uploadImage'])->name('upload.image');






