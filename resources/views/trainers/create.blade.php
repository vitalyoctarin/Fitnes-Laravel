@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Добавить нового тренера</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('trainers.index') }}"> Назад</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('trainers.store') }}" method="POST">
    	@csrf


         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Работник</strong>
                     <select class="form-control" onchange="document.getElementById('trainer_name').value = document.querySelector('#employee_'+value).textContent" name="employee_id">
                         <option selected> - </option>
                         @foreach($employees as $employee)
                             <option id="employee_{{$employee->id}}" value={{$employee->id}}>{{$employee->full_name}}</option>
                         @endforeach
                     </select>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Группы</strong>
                     <input type="text" name="groups" class="form-control" placeholder="Группы" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12" hidden>
                 <div class="form-group">
                     <strong>ФИО</strong>
                     <input type="text" name="trainer_name" id="trainer_name" class="form-control" readonly placeholder="ФИО" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Фитнес-образование</strong>
                     <input type="text" name="fitness_education" class="form-control" placeholder="Фитнес-образование" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Фитнес-направления</strong>
                     <input type="text" name="fitness_directions" class="form-control" placeholder="Фитнес-направления" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Опыт работы (полных лет)</strong>
                     <input type="number" name="experience" class="form-control" placeholder="Опыт работы" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Специализация</strong>
                     <input type="text" name="specialization" class="form-control" placeholder="Специализация" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Направления</strong>
                     <input type="text" name="directions" class="form-control" placeholder="Направления" required>
                 </div>
             </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Создать</button>
		    </div>
		</div>


    </form>

@endsection
