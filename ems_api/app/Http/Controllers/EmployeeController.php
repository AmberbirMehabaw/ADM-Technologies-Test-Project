<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

use Validator; 

class EmployeeController extends Controller
{
    /**
     * Display a list of employees
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
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
     * Store a new employee record to database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'dateOfBirth' => 'required|date',
            'gender' => 'required',
            'salary' => 'required'
        ]);

        Employee::create($request->all());
        return response()->json(['message'=>'Employee successfully created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
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
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request, [
            'name' => 'required',
            'dateOfBirth' => 'required|date',
            'gender' => 'required',
            'salary' => 'required'
        ]);
        $input = $request->all();
        $employee->name = $input['name'];
        $employee->dateOfBirth = $input['dateOfBirth'];
        $employee->gender = $input['gender'];
        $employee->salary = $input['salary'];

        $employee->save();
        return response()->json(['message' => 'Employee successfully updated']);


    }

    /**
     * Remove the specified employee from database.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(["message" => "Employee deleted successfully."]);
    }
}
