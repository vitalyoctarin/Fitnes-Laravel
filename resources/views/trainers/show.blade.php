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
                            {{ $trainer->full_name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Электронная почта:</strong>
                            {{ $trainer->groups }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Дата рождения:</strong>
                            {{ $trainer->fitness_education }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Должность:</strong>
                            {{ $trainer->fitness_direction }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Номер телефона:</strong>
                            {{ $trainer->experience }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Заработная плата:</strong>
                            {{ $trainer->specialization }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Образование:</strong>
                            {{ $trainer->directions }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <form action="{{ route('trainers.destroy',$trainer->id) }}" method="POST">
                            @can('trainer-edit')
                                <a class="btn btn-warning" href="{{ route('trainers.edit',$trainer->id) }}">Изменить</a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('trainer-delete')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            @endcan

                        </form>
                    </div>
                </div></td>
            <td>
                <strong>Фото:</strong>
                <img src="{{url('storage/image/'.$trainer->id)}}" style="max-width: 400px; max-height: 400px" class="img-thumbnail ">
            </td>
        </tr>
        </tbody>
    </table>

@endsection
