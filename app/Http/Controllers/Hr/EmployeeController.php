<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Hr\Designation;
use App\Models\Hr\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $designations = Designation::all();
        $countries = Country::all();
        return view('hr.employees.index', compact('employees', 'designations', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'picture' => 'nullable|image|mimes:png,jpg,jpeg|max:4096',
        ]);
        //Handle file upload
        if ($request->hasfile('picture')) {
            //Get filename with the extension
            // $filenameWithExt = $request->file('picture')->getClientOriginalName();
            //Get just filename
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('picture')->getClientOriginalExtension();
            //Filename to store
            // $filenameToStore = $filename.'_'.time().'.'.$extension;
            $filenameToStore = 'employee_invoice_' .time(). '.' . $extension;
            //delete old image
            Storage::delete('public/employee-pictures/' . $filenameToStore);
            //Upload File
            $path = $request->file('picture')->storeAs('public/employee-pictures', $filenameToStore);
        }
        $employee = Employee::firstOrNew(['name' => $request->name]);
        $employee->designation_id = $request->designation;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->rate_type = $request->rate_type;
        $employee->rate = $request->rate;
        $employee->blood_group = $request->blood_group;
        $employee->address1 = $request->address1;
        $employee->address2 = $request->address2;
        if ($request->hasfile('picture')) {
        $employee->picture = $filenameToStore;
        }
        $employee->country = $request->country;
        $employee->city = $request->city;
        $employee->zip_code = $request->zip_code;
        $employee->save();
        return redirect()->back()->with('success', 'employee added: ' . $request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hr\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        // $employee = Employee::find($employee->id);
        // dd($employee);
        // $employee = $employee->$employee;
        return view('hr.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hr\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hr\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'picture' => 'nullable|image|mimes:png,jpg,jpeg|max:4096',
        ]);
        $employee = Employee::findOrFail($id);
        if ($request->hasfile('picture')) {
            //Get filename with the extension
            // $filenameWithExt = $request->file('picture')->getClientOriginalName();
            //Get just filename
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('picture')->getClientOriginalExtension();
            //Filename to store
            // $filenameToStore = $filename.'_'.time().'.'.$extension;
            $filenameToStore = 'employee_invoice_' .time(). '.' . $extension;
            //delete old image
            Storage::delete('public/employee-pictures/' . $employee->picture);
            //Upload File
            $path = $request->file('picture')->storeAs('public/employee-pictures', $filenameToStore);
        }
        $employee = Employee::where('name', $request->name)->first();
        if ($employee) {
            if ($employee->id !== (int)$id) {
                return redirect()->back()->with('warning', 'employee exists: ' . $request->name);
            } else {
                $employee = Employee::findOrFail($id);
                $employee->name = $request->name;
                $employee->designation_id = $request->designation;
                $employee->phone = $request->phone;
                $employee->email = $request->email;
                $employee->rate_type = $request->rate_type;
                $employee->rate = $request->rate;
                $employee->blood_group = $request->blood_group;
                $employee->address1 = $request->address1;
                $employee->address2 = $request->address2;
                if ($request->hasfile('picture')) {
                $employee->picture = $filenameToStore;
                }
                $employee->country = $request->country;
                $employee->city = $request->city;
                $employee->zip_code = $request->zip_code;
                $employee->save();
                return redirect()->back()->with('success', 'employee updated: ' . $request->name);
            }
        } else {
            $employee = Employee::findOrFail($id);
            $employee->name = $request->name;
            $employee->designation_id = $request->designation;
            $employee->phone = $request->phone;
            $employee->email = $request->email;
            $employee->rate_type = $request->rate_type;
            $employee->rate = $request->rate;
            $employee->blood_group = $request->blood_group;
            $employee->address1 = $request->address1;
            $employee->address2 = $request->address2;
            if ($request->hasfile('picture')) {
            $employee->picture = $filenameToStore;
            }
            $employee->country = $request->country;
            $employee->city = $request->city;
            $employee->zip_code = $request->zip_code;
            $employee->save();
            return redirect()->back()->with('success', 'employee updated: ' . $request->name);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hr\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        Storage::delete('public/employee-pictures/' . $employee->picture);
        $employee->delete();
        return redirect()->back()->with('info', 'employee removed.');
    }

    public function createemployee($viewtype)
    {
        $designations = Designation::all();
        $countries = Country::all();
        return view('hr.employees.createemployee', compact('viewtype', 'designations', 'countries'));
    }

    public function editemployee(Employee $employee, $viewtype)
    {
        $designations = Designation::all();
        $countries = Country::all();
        return view('hr.employees.editemployee', compact('employee', 'viewtype', 'designations', 'countries'));
    }
}
