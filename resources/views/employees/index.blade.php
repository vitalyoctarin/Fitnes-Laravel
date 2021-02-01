@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employees</h2>
            </div>
            <div class="pull-right mb-2">
                @can('employee-create')
                <a class="btn btn-success" href="{{ route('employees.create') }}">Добавить нового сотрудника</a>
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
            <th>Номер телефона</th>
            <th width="280px">Действия</th>
        </tr>
	    @foreach ($employees as $employee)
	    <tr>
	        <td>{{ $employee->id }}</td>
	        <td>{{ $employee->full_name }}</td>
	        <td>{{ $employee->phone }}</td>
	        <td>
                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                    <div class="d-flex justify-content-around">
                        <a class="btn btn-primary" href="{{ route('employees.show',$employee->id) }}">Карточка</a>
                        @can('employee-edit')
                        <a class="btn btn-warning" href="{{ route('employees.edit',$employee->id) }}">Изменить</a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('employee-delete')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                        @endcan
                    </div>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

    <div class="d-flex justify-content-center">{{$employees->links("pagination::bootstrap-4")}}</div>

@endsection
