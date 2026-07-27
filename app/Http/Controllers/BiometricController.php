<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use zkteco\Lib\ZKLibrary;
use Carbon\Carbon;

class BiometricController extends Controller
{
    public function syncAttendance()
    {
        $zk = new ZKLibrary('192.168.1.201', 4370);
        
        try {
            if ($zk->connect()) {
                // Get attendance data from device
                $attendanceData = $zk->getAttendance();
                $zk->disconnect();
                
                $syncedCount = 0;
                
                foreach ($attendanceData as $data) {
                    // Find employee by biometric ID
                    $employee = Employee::where('biometric_id', $data['id'])->first();
                    
                    if ($employee) {
                        $date = Carbon::parse($data['date'])->format('Y-m-d');
                        $time = Carbon::parse($data['time'])->format('H:i:s');
                        
                        // Check if attendance already exists
                        $existing = Attendance::where('employee_id', $employee->id)
                            ->where('date', $date)
                            ->first();
                            
                        if ($existing) {
                            // Update check-out if check-in exists
                            if ($existing->check_in && !$existing->check_out) {
                                $existing->update(['check_out' => $time]);
                                $syncedCount++;
                            }
                        } else {
                            // Create new attendance record
                            Attendance::create([
                                'employee_id' => $employee->id,
                                'date' => $date,
                                'check_in' => $time,
                                'status' => 'present',
                                'device_info' => 'Biometric Device',
                            ]);
                            $syncedCount++;
                        }
                    }
                }
                
                return response()->json([
                    'success' => true,
                    'message' => "Successfully synced $syncedCount attendance records",
                ]);
            }
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to connect to biometric device',
            ], 500);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function testConnection()
    {
        $zk = new ZKLibrary('192.168.1.201', 4370);
        
        if ($zk->connect()) {
            $deviceInfo = [
                'device_version' => $zk->version(),
                'device_serial' => $zk->serialNumber(),
                'device_users' => count($zk->getUser()),
            ];
            
            $zk->disconnect();
            
            return response()->json([
                'success' => true,
                'data' => $deviceInfo,
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Connection failed',
        ], 500);
    }
}