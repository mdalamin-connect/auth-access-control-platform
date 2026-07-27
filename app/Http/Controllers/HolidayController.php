<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HolidayController extends Controller
{
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\CustomAuth');
    }

    public function index()
    {
        $holidays = Holiday::with(['creator', 'updater'])
            ->orderBy('date')
            ->paginate(20);

        return view('pages.erp.holiday.index', [
            'holidays' => $holidays,
            'user_role_id' => session('sess_user_role_id')
        ]);
    }

    public function create()
    {
        return view('pages.erp.holiday.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'date' => 'required|date',
            'description' => 'nullable|string|max:500',
            'is_recurring' => 'nullable|boolean'
        ]);

        $holiday = new Holiday();
        $holiday->name = $request->name;
        $holiday->date = $request->date;
        $holiday->description = $request->description;
        $holiday->is_recurring = $request->is_recurring ?? false;
        $holiday->created_by = session('sess_user_id');
        $holiday->save();

        return redirect()->route('holidays.index')->with('success', 'Holiday added successfully.');
    }

    public function show($id)
    {
        $holiday = Holiday::with(['creator', 'updater'])->findOrFail($id);
        return view('pages.erp.holiday.show', ['holiday' => $holiday]);
    }

    public function edit($id)
    {
        $holiday = Holiday::findOrFail($id);
        return view('pages.erp.holiday.edit', ['holiday' => $holiday]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'date' => 'required|date',
            'description' => 'nullable|string|max:500',
            'is_recurring' => 'nullable|boolean'
        ]);

        $holiday = Holiday::findOrFail($id);
        $holiday->name = $request->name;
        $holiday->date = $request->date;
        $holiday->description = $request->description;
        $holiday->is_recurring = $request->is_recurring ?? false;
        $holiday->updated_by = session('sess_user_id');
        $holiday->save();

        return redirect()->route('holidays.index')->with('success', 'Holiday updated successfully.');
    }

    public function destroy($id)
    {
        $holiday = Holiday::findOrFail($id);
        $holiday->delete();
        return redirect()->route('holidays.index')->with('success', 'Holiday deleted successfully.');
    }

   public function calendar()
{
    $holidays = Holiday::select('id', 'name', 'date', 'description', 'is_recurring')
        ->orderBy('date')
        ->get()
        ->map(function($holiday) {
            $year = date('Y');
            $date = $holiday->date;
            
            if ($holiday->is_recurring) {
                $date = date("$year-m-d", strtotime($holiday->date));
            }
            
            return [
                'id' => $holiday->id,
                'title' => $holiday->name,
                'start' => $date,
                'allDay' => true,
                'color' => '#f39c12',
                'description' => $holiday->description,
                'extendedProps' => [
                    'isRecurring' => $holiday->is_recurring
                ]
            ];
        });

    return view('pages.erp.holiday.calendar', [
        'holidays' => $holidays,
        'user_role_id' => session('sess_user_role_id')
    ]);
}
}