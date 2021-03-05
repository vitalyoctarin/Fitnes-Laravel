@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Редактирование используемой услуги № {{$services_list->id}}</h2>
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

    <form action="{{ route('services_lists.update',$services_list->id) }}"  method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Услуга:</strong>
                    <select class="form-control" name="service_id" required>
                        <option value="{{$services->id}}" selected> {{$subcategories->subcategory_name}} </option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Клиент:</strong>
                    <select class="form-control" name="client_id" required>
                        <option value="{{$clients->id}}" selected> {{$clients->full_name}} </option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Дата начала действия:</strong>
                    <input type="date" value="{{$services_list->start_date}}" name="start_date" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Дата окончания действия:</strong>
                    <input type="date" value="{{$services_list->end_date}}" name="end_date" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Название группы:</strong>
                    <select class="form-control" name="group_id" required>
                        <option value="{{$main_group->id}}" selected> {{$main_group->group_name}} </option>
                        @foreach($groups as $group)
                            <option value="{{$group->id}}">{{$group->group_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Стоимость:</strong>
                    <input type="number" value="{{$services_list->cost}}" name="cost" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Метод оплаты:</strong>
                    <input type="text" name="pay_method" value="{{$services_list->pay_method_id}}" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </div>
    </form>
@endsection
