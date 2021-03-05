@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Абонементы</h2>
            </div>
            <div class="pull-right mb-2">
                @can('subscription-create')
                    <a class="btn btn-success" href="{{ route('subscriptions.create') }}">Добавить новый абонемент</a>
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
            <th>Название</th>
            <th>Скидка (%)</th>
            <th>Кол-во занятий</th>
            <th>Id услуги</th>
            <th style="width: 350px">Действия</th>
        </tr>
	    @foreach ($subscriptions as $subscription)
	    <tr>
	        <td>{{ $subscription->id }}</td>
	        <td>{{ $subscription->subscription_name }}</td>
            <td>{{ $subscription->discount }}</td>
            <td>{{ $subscription->count_training }}</td>
            <td>
                @foreach ($services as $service)
                    @if($service->id == $subscription->service_id)
                        <a href="{{route('services.show',$service->id)}}">{{$subscription->service_id}}</a>
                    @endif
                @endforeach
            </td>
            <td>
                <form action="{{ route('subscriptions.destroy',$subscription->id) }}" method="POST">
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-primary" href="{{ route('subscriptions.show',$subscription->id) }}">Подробнее</a>
                        @can('service-edit')
                        <a class="btn btn-warning" href="{{ route('subscriptions.edit',$subscription->id) }}">Изменить</a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('service-delete')
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$subscription->id}}">
                                Удалить
                            </button>

                            <div class="modal fade" id="exampleModal{{$subscription->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Удаление</h5>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Вы точно хотите удалить выбранную запись из таблицы ?</p>
                                            <p>Данные невозможно будет восстановить!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Да, удалить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endcan
                    </div>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

    <div class="d-flex justify-content-center">{{$subscriptions->links("pagination::bootstrap-4")}}</div>

@endsection
