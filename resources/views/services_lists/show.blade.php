@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Услуга №{{$services_list->id}} для {{$client}}</h2>
            </div>
        </div>
    </div>



    <table class="table">
        <tbody>
        <tr>
            <td>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>ID услуги:</strong>
                            @if(auth()->user()->can('service-list'))
                                <a href="{{route('services.show',$services_list->service_id)}}">{{$services_list->service_id}} - {{$service}}</a>
                            @else
                                {{ $services_list->service_id }} - {{$service}}
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>ID клиента:</strong>
                            @if(auth()->user()->can('client-list'))
                                <a href="{{route('clients.show',$services_list->client_id)}}">{{$services_list->client_id}} - {{$client}}</a>
                            @else
                                {{ $services_list->client_id }} - {{$client}}
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Стоимость:</strong>
                            {{ $services_list->cost }} &#8381
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Дата начала действия услуги:</strong>
                            {{ $services_list->start_date }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Дата оуончания действия услуги:</strong>
                            {{ $services_list->end_date }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>ID группы:</strong>
                            @if(auth()->user()->can('client-list'))
                                <a href="{{route('groups.show',$services_list->group_id)}}">{{$services_list->group_id}} - {{$group}}</a>
                            @else
                                {{ $services_list->group_id }} - {{$group}}
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Метод оплаты:</strong>
                            {{ $services_list->pay_method_id }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <form action="{{ route('services_lists.destroy',$services_list->id) }}" method="POST">
                            @can('services_list-edit')
                                <a class="btn btn-warning" href="{{ route('trainers.edit',$services_list->id) }}">Изменить</a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('services_list-delete')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            @endcan
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

@endsection
