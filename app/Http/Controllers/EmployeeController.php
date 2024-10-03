<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddOrUpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function __construct() {
        $this->middleware('auth'); // تأكد من أن المدير مسجل دخول
    }

    public function index() {
        $employees = Employee::where('manager_id', auth()->id())->get();
        return view('employees.index', compact('employees'));
    }

    public function create() {
        return view('employees.create');
    }

    public function store(AddOrUpdateEmployeeRequest $request) {
        
        if (!Storage::exists('public/uploads')) {
            Storage::makeDirectory('public/uploads');
        }

        $pic = $request->file('picture');
        
       
        if ($pic) {
            $filename = Storage::disk('public')->put('/uploads', $pic);
        }

        $validated = $request->validated();
        $validated['picture'] = $filename ?? null; // إذا لم توجد صورة، اجعلها null
        $validated['manager_id'] = auth()->id();

        Employee::create($validated);
        session()->flash('success', 'Employee added successfully');
        return redirect(route('employees.index'));
    }

    public function edit(Employee $employee) {
        return view('employees.edit', compact('employee'));
    }

    public function update(AddOrUpdateEmployeeRequest $request, Employee $employee) {
        $validated = $request->validated();
    

        if ($request->hasFile('picture')) {
            $pic = $request->file('picture');
            $filename = Storage::disk('public')->put('/uploads', $pic);
            $validated['picture'] = $filename; // تحديث الصورة
        }

        $employee->update($validated);
        session()->flash('success', 'Employee updated successfully');
        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee) {
        $employee->delete();
        session()->flash('success', 'Employee deleted successfully');
        return redirect()->route('employees.index');
    }
}
