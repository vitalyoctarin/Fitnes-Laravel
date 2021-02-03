<?php

namespace App\Http\Controllers;

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
        $trainers = Trainer::latest()->paginate(10);
        return view('trainers.index',compact('trainers'));
    }


    public function create()
    {
        return view('trainers.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'full_name'=>['required','string'],
            'groups'=>['required','integer'],
            'fitness_education'=>['required','integer'],
            'fitness_direction'=>['required','integer'],
            'experience'=>['required','integer'],
            'specialization'=>['required','integer'],
            'directions'=>['required','integer']
        ]);

        Trainer::create([
            'full_name' => $request['full_name'],
            'groups' => $request['groups'],
            'fitness_education'=> $request['fitness_education'],
            'fitness_direction'=> $request['fitness_direction'],
            'experience'=> $request['experience'],
            'specialization'=> $request['specialization'],
            'directions'=> $request['directions']
        ]);

        return redirect()->route('trainers.index')
            ->with('success','Trainer created successfully.');
    }

    public function show(Trainer $trainer)
    {
        return view('trainers.show',compact('trainer'));
    }

    public function edit(Trainer $trainer)
    {
        return view('trainers.edit',compact('trainer'));
    }

    public function update(Request $request, Trainer $trainer)
    {
        $this->validate($request,[
            'full_name'=>['required'],
            'groups'=>['required','integer'],
            'fitness_education'=>['required','integer'],
            'fitness_direction'=>['required','integer'],
            'experience'=>['required','integer'],
            'specialization'=>['required','integer'],
            'directions'=>['required','integer']
        ]);

        $trainer->full_name = $request['full_name'];
        $trainer->groups = $request['groups'];
        $trainer->fitness_education = $request['fitness_education'];
        $trainer->fitness_direction = $request['fitness_direction'];
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
