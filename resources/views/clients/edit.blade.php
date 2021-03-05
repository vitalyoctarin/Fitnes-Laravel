@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Редактирование клиента</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients.index') }}"> Назад</a>
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

    <form action="{{ route('clients.update',$client->id) }}"  method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ФИО:</strong>
                    <input type="text" name="full_name" class="form-control" value="{{ $client->full_name }}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Дата рождения:</strong>
                    <input type="date" name="dob" class="form-control" value="{{ $client->dob }}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Услуга:</strong>
                    <input type="text" name="subscription_name" class="form-control" value="{{ $client->subscription_name }}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Номер телефона:</strong>
                    <input type="tel" name="phone_number" class="form-control" pattern="\7\{0,1}9[0-9]{2}{0,1}\d{3}\d{2}\d{2}" value="{{ $client->phone_number }}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Группа</strong>
                    <select class="form-control" name="group_id">
                        <option selected> - </option>
                        @foreach($groups as $group)
                            <option value={{$group->id}}>{{$group->group_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </div>
    </form>
@endsection
