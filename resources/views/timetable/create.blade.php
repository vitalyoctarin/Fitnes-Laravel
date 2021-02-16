@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Добавить занятие</h2>
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


    <form action="{{ route('timetable.store') }}" method="POST">
    	@csrf
         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>День недели</strong>
                     <select class="form-control" name="">
                         <option selected>Понедельник</option>
                         <option selected>Вторник</option>
                         <option selected>Среда</option>
                         <option selected>Четверг</option>
                         <option selected>Пятница</option>
                         <option selected>Суббота</option>
                     </select>
                 </div>
             </div>
		</div>


    </form>

@endsection
