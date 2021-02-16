@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Редактирование расписания</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('timetable.index') }}"> Назад</a>
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

    <form action="{{ route('groups.update',$group->id) }}"  method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Название группы</strong>
                    <input type="text" name="group_name" class="form-control" value="{{$group->group_name}}" placeholder="Название группы" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Стоимость</strong>
                    <input type="number" name="cost" class="form-control" value="{{$group->cost}}" placeholder="Стоимость" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Тренер</strong>
                    <select class="form-control" name="trainer_id">
                        <option selected value={{$group->trainer_id}}> {{$trainer_name}} </option>
                        @foreach($trainers as $trainer)
                            <option value={{$trainer->id}}>{{$trainer->trainer_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Услуга</strong>
                    <input type="number" min="1" name="service_id" value="{{$group->service_id}}" class="form-control" placeholder="Услуга" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Время</strong>
                    <input type="time" name="time" value="{{$group->time}}" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </form>
@endsection
