@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Карточка работника</h2>
            </div>
        </div>
    </div>



    <table class="iksweb">
        <tbody>
        <tr>
            <td><div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>ФИО:</strong>
                            {{ $employee->full_name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Электронная почта:</strong>
                            {{ $employee->email }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Дата рождения:</strong>
                            {{ $employee->dob }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Должность:</strong>
                            {{ $employee->position }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Номер телефона:</strong>
                            {{ $employee->phone }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Заработная плата:</strong>
                            {{ $employee->pay }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Образование:</strong>
                            {{ $employee->education }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Дата начала работы:</strong>
                            {{ $employee->work_start_date }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                            @can('employee-edit')
                                <a class="btn btn-warning" href="{{ route('employees.edit',$employee->id) }}">Изменить</a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('employee-delete')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            @endcan

                        </form>
                    </div>
                </div></td>
            <td>
                <strong>Фото:</strong>
                <img src="{{url('storage/image/'.$employee->img)}}" style="max-width: 400px; max-height: 400px" class="img-thumbnail ">
            </td>
        </tr>
        </tbody>
    </table>

@endsection
