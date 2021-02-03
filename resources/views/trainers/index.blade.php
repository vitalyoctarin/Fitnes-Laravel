@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Тренера</h2>
            </div>
            <div class="pull-right mb-2">
                @can('trainer-create')
                <a class="btn btn-success" href="{{ route('trainers.create') }}">Добавить нового тренера</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>ФИО</th>
            <th>Группы</th>
            <th>Специализация</th>
            <th>Направления</th>
            <th>Действия</th>
        </tr>
	    @foreach ($trainers as $trainer)
	    <tr>
	        <td>{{ $trainer->id }}</td>
	        <td>{{ $trainer->full_name }}</td>
	        <td>{{ $trainer->groups }}</td>
            <td>{{ $trainer->specialization }}</td>
            <td>{{ $trainer->directions }}</td>
	        <td>
                <form action="{{ route('trainers.destroy',$trainer->id) }}" method="POST">
                    <div class="d-flex justify-content-around">
                        <a class="btn btn-primary" href="{{ route('trainers.show',$trainer->id) }}">Карточка</a>
                        @can('trainer-edit')
                        <a class="btn btn-warning" href="{{ route('trainers.edit',$trainer->id) }}">Изменить</a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('trainer-delete')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                        @endcan
                    </div>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

    <div class="d-flex justify-content-center">{{$trainers->links("pagination::bootstrap-4")}}</div>

@endsection
