<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Image;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Integer;
use PhpParser\Node\Stmt\Else_;

class TrainerController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:trainer-list|trainer-create|trainer-edit|trainer-delete', ['only' => ['index','show']]);
        $this->middleware('permission:trainer-create', ['only' => ['create','store']]);
        $this->middleware('permission:trainer-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:trainer-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $trainers = Trainer::paginate(10);
        return view('trainers.index',compact('trainers'));
    }


    public function create()
    {
        $employees = Employee::all();
        return view('trainers.create',compact('employees'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'trainer_name'=>'required|string',
            'employee_id' => 'required',
            'fitness_education'=>['required','integer'],
            'fitness_directions'=>['required','integer'],
            'experience'=>['required','integer'],
            'specialization'=>['required','integer'],
            'directions'=>['required','integer']
        ]);

        Trainer::create([
            'trainer_name' => $request['trainer_name'],
            'employee_id' => $request['employee_id'],
            'fitness_education'=> $request['fitness_education'],
            'fitness_directions'=> $request['fitness_directions'],
            'experience'=> $request['experience'],
            'specialization'=> $request['specialization'],
            'directions'=> $request['directions']
        ]);

        return redirect()->route('trainers.index')
            ->with('success','Trainer created successfully.');
    }

    public function show(Trainer $trainer)
    {
        $image = Image::where('employee_id','=',$trainer->employee_id)->first();
        return view('trainers.show',compact('trainer','image'));
    }

    public function edit(Trainer $trainer)
    {
        return view('trainers.edit',compact('trainer'));
    }

    public function update(Request $request, Trainer $trainer)
    {
        $this->validate($request,[
            'trainer_name'=>'required|string',
            'fitness_education'=>['required','integer'],
            'fitness_directions'=>['required','integer'],
            'experience'=>['required','integer'],
            'specialization'=>['required','integer'],
            'directions'=>['required','integer']
        ]);

        $trainer->trainer_name = $request['trainer_name'];
        $trainer->fitness_education = $request['fitness_education'];
        $trainer->fitness_directions = $request['fitness_directions'];
        $trainer->experience = $request['experience'];
        $trainer->specialization = $request['specialization'];
        $trainer->directions = $request['directions'];
        $trainer->save();
        return redirect()->route('trainers.index')
            ->with('success','Trainer updated successfully');
    }

    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        return redirect()->route('trainers.index')
            ->with('success','Trainer deleted successfully');
    }
}
