@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Редактирование тренера</h2>
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

    <form action="{{ route('trainers.update',$trainer->id) }}"  method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ФИО</strong>
                    <input type="text" name="full_name" class="form-control" value="{{$trainer->full_name}}" placeholder="ФИО" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Группы</strong>
                    <input type="text" name="groups" class="form-control" value="{{$trainer->groups}}" placeholder="Группы" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Фитнес-образование</strong>
                    <input type="text" name="fitness_education" class="form-control" value="{{$trainer->fitness_education}}" placeholder="Фитнес-образование" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Фитнес-направления</strong>
                    <input type="text" name="fitness_direction" class="form-control" value="{{$trainer->fitness_direction}}" placeholder="Фитнес-направления" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Опыт работы (полных лет)</strong>
                    <input type="number" name="experience" class="form-control" value="{{$trainer->experience}}" placeholder="Опыт работы" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Специализация</strong>
                    <input type="text" name="specialization" class="form-control" value="{{$trainer->specialization}}" placeholder="Специализация" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Направления</strong>
                    <input type="text" name="directions" class="form-control" value="{{$trainer->directions}}" placeholder="Направления" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
