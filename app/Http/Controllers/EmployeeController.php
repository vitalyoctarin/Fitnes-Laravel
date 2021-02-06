<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Integer;
use PhpParser\Node\Stmt\Else_;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    function __construct()
    {
        $this->middleware('permission:employee-list|employee-create|employee-edit|employee-delete', ['only' => ['index','show']]);
        $this->middleware('permission:employee-create', ['only' => ['create','store']]);
        $this->middleware('permission:employee-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:employee-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('employees.index',compact('employees'));
    }


    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'dob' => ['required','date'],
            'position' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'integer'],
            'pay' => ['required', 'integer'],
            'img' => ['image','nullable','mimes:jpg, jpeg, png, bmp, gif, svg'],
            'education' => ['required', 'string', 'max:255'],
            'work_start_date' => ['required','date'],
        ]);

        if ($request->hasFile('img'))
        {
            $filenamewithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_'.time().'.'.$extension;
            $path = $request->file('img')->storeAs('public/image',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        $employee = Employee::create([
            'full_name' => $request['full_name'],
            'dob' => $request['dob'],
            'position' =>$request['position'],
            'phone' => $request['phone'],
            'pay' => $request['pay'],
            'education' => $request['education'],
            'work_start_date' => $request['work_start_date'],
        ]);

        Image::create([
            'employee_id' => $employee->id,
            'image' => $fileNameToStore
        ]);

        return redirect()->route('employees.index')
            ->with('success','Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        $image = DB::table('images')->select('image')->where('employee_id','=',$employee->id)->first();
        return view('employees.show',compact('employee','image'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit',compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $this->validate($request,[
            'full_name' => ['required', 'string', 'max:255'],
            'dob' => ['required','date'],
            'position' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'integer'],
            'pay' => ['required'],
            'img' => ['image','nullable','mimes:jpg, jpeg, png, bmp, gif, svg'],
            'education' => ['required', 'string', 'max:255'],
            'work_start_date' => ['required','date'],
        ]);

        if ($request->hasFile('img'))
        {
            $filenamewithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_'.time().'.'.$extension;
            $path = $request->file('img')->storeAs('public/image',$fileNameToStore);

            DB::table('images')->where('employee_id', '=',$employee->id)->update(['image' => $fileNameToStore]);
        }

        $employee->dob = $request['dob'];
        $employee->position = $request['position'];
        $employee->phone = $request['phone'];
        $employee->pay = $request['pay'];
        $employee->education = $request['education'];
        $employee->work_start_date = $request['work_start_date'];
        $employee->full_name = $request['full_name'];
        $employee->save();
        return redirect()->route('employees.index')
            ->with('success','Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')
            ->with('success','Employee deleted successfully');
    }
}
