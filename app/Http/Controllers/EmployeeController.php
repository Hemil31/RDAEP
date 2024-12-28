<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{

    /**
     * Method index
     *
     * @return void
     */
    public function index()
    {
        $employees = Employee::all()->map(function ($employee) {
            $employee->hobbies = json_decode($employee->hobbies, true);
            return $employee;
        });
        return view('employee.index', compact('employees'));
    }


    /**
     * Method create
     *
     * @return void
     */
    public function create()
    {
        return view('employee.create');
    }


    /**
     * Method store
     *
     * @param EmployeeRequest $request [explicite description]
     *
     * @return void
     */
    public function store(EmployeeRequest $request)
    {
        try {
            if ($request->hasFile('photo')) {
                $filestore = 'photo' . time() . '.' . $request->photo->getClientOriginalExtension();
                $request->photo->storeAs('public/photos', $filestore);
            }
            $data = $request->all();
            $data['hobbies'] = json_encode($data['hobbies']);
            $data['photo'] = $filestore;
            Employee::create($data);
            return redirect()->route('employees.index');
        } catch (\Exception $e) {
            echo "Error creating employee: " . $e->getMessage();
        }
    }

    /**
     * Method edit
     *
     * @param string $id [explicite description]
     *
     * @return void
     */
    public function edit(string $id)
    {
        $employees = Employee::find($id);
        return view('employee.edit', compact('employees'));
    }


    /**
     * Method update
     *
     * @param EmployeeUpdateRequest $request [explicite description]
     * @param string $id [explicite description]
     *
     * @return void
     */
    public function update( EmployeeUpdateRequest $request, string $id)
    {
        try {
            $employee = Employee::find($id);
            $data = $request->all();
            $data['hobbies'] = json_encode($data['hobbies']);
            if ($request->hasFile('photo')) {
                $filestore = 'photo' . time() . '.' . $request->photo->getClientOriginalExtension();
                $request->photo->storeAs('public/photos', $filestore);
                $data['photo'] = $filestore;
            }
            $employee->update($data);
            return redirect()->route('employees.index');
        } catch (\Exception $e) {
            echo "Error updating employee: " . $e->getMessage();
        }
    }


    /**
     * Method destroy
     *
     * @param string $id [explicite description]
     *
     * @return void
     */
    public function destroy(string $id)
    {
        Employee::find($id)->delete();
        return redirect()->route('employees.index');
    }
}
