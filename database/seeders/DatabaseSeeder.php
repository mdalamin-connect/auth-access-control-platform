<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $permissions = [
    // Attendance
    ['name' => 'view_attendance', 'description' => 'View attendance records'],
    ['name' => 'manage_attendance', 'description' => 'Manage all attendance records'],
    ['name' => 'check_in_out', 'description' => 'Can check in/out'],
    
    // Leave
    ['name' => 'view_leave', 'description' => 'View leave applications'],
    ['name' => 'manage_leave', 'description' => 'Manage all leave applications'],
    ['name' => 'apply_leave', 'description' => 'Apply for leave'],
    ['name' => 'approve_leave', 'description' => 'Approve/reject leave applications'],
    
    // Salary
    ['name' => 'view_salary', 'description' => 'View salary information'],
    ['name' => 'manage_salary', 'description' => 'Manage salary structures'],
    
    // Salary Payment
    ['name' => 'view_salary_payment', 'description' => 'View salary payments'],
    ['name' => 'process_payment', 'description' => 'Process salary payments'],
    
    // Holiday
    ['name' => 'view_holiday', 'description' => 'View holidays'],
    ['name' => 'manage_holiday', 'description' => 'Manage holidays'],
];

foreach ($permissions as $permission) {
    Permission::firstOrCreate($permission);
}
    }
}
