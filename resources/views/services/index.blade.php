@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Услуги</h2>
            </div>

            <div class="pull-right mb-2">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Добавить
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @can('service-create')
                            <a class="dropdown-item" href="{{ route('services.create') }}">Услугу</a>
                        @endcan

                        @can('subcategory-create')
                            <a class="dropdown-item" href="{{ route('subcategories.create') }}">Подкатегорию</a>
                        @endcan

                        @can('level_preparation-create')
                            <a class="dropdown-item" href="{{ route('level_preparations.create') }}">Уровень подготовки</a>
                        @endcan

                        @can('subscription-create')
                            <a class="dropdown-item" href="{{ route('subscriptions.create') }}">Абонемент</a>
                        @endcan
                    </div>
                </div>
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
            <th>Услуга</th>
            <th>Подкатегория</th>
            <th>Стоимость</th>
            <th>Уровень подготовки</th>
            <th>Абонемент</th>
            <th style="width: 350px">Действия</th>
        </tr>
	    @foreach ($services as $service)
	    <tr>
	        <td>{{ $service->id }}</td>
	        <td style="white-space: nowrap;">{{ $service->services_name }}</td>
            <td style="white-space: nowrap;">
                @foreach ($subcategories as $subcategory)
                    @if($subcategory->id == $service->subcategories_id)
                        {{$subcategory->subcategory_name}}
                    @endif
                @endforeach
            </td>
            <td style="white-space: nowrap;">{{ $service->cost }} &#8381</td>
            <td style="white-space: nowrap;">
                @foreach ($level_preparations as $level_preparation)
                    @if($level_preparation->id == $service->lvl_preparation_id)
                        {{$level_preparation->level_name}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($subscriptions as $subscription)
                    @if($service->id == $subscription->service_id)
                        @if(auth()->user()->can('subscription-list'))
                            <li style="white-space: nowrap;"><a href="{{route('subscriptions.show',$subscription->id)}}">{{$subscription->subscription_name}}</a></li>
                        @else
                            <li style="white-space: nowrap;">{{$subscription->subscription_name}}</li>
                        @endif
                    @endif
                @endforeach
            </td>
	        <td>
                <form action="{{ route('services.destroy',$service->id) }}" method="POST">
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-primary" href="{{ route('services.show',$service->id) }}">Подробнее</a>
                        @can('service-edit')
                        <a class="btn btn-warning" href="{{ route('services.edit',$service->id) }}">Изменить</a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('service-delete')
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$service->id}}">
                                Удалить
                            </button>

                            <div class="modal fade" id="exampleModal{{$service->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <div class="d-flex justify-content-center">{{$services->links("pagination::bootstrap-4")}}</div>

@endsection
