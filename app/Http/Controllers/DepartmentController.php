<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $department = Department::all();
        return view ('admin.department.home', ['department' => $department]);
        //dd($department);
    }
    public function create()
    {

        return view ('admin.department.create');


        //$department = Department::all();
        //return view ('admin.department.home', ['department' => $department]);
        //dd($department);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:departments'
        ]);

        $newDepartment = Department::create($data);

        return redirect(route('admin.department.home'))->with('status', 'Department has been succesfully added!');
    }
    public function destroy(Request $request, Department $department)
    {
        $department->delete();

        return redirect(route('admin.department.home'))->with('status', 'Department has been succesfully deleted!');
    }
    public function modify(Department $department)
    {
        return view('admin.department.modify', ['department' => $department]);
    }
    public function update(Request $request, Department $department)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:departments,name,' . $department->id,
        ]);

        $department->update($data);

        return redirect(route('admin.department.home'))->with('status', 'Department has been succesfully updated!');
    }
}
