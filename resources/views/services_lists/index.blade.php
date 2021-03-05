@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Список используемых услуг</h2>
            </div>
            <div class="pull-right mb-2">
                @can('services_list-create')
                    <a class="btn btn-success" href="{{ route('services_lists.create') }}">Добавить</a>
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
        <tr style="white-space: nowrap;">
            <th>Id</th>
            <th>Клиент</th>
            <th>Услуга</th>
            <th>Стоимость</th>
            <th>Дата начала</th>
            <th>Дата окончания</th>
            <th>Группа</th>
            <th>Действия</th>
        </tr>
	    @foreach ($services_lists as $services_list)
	    <tr style="white-space: nowrap;">
	        <td>{{ $services_list->id }}</td>
	        <td>
                @foreach($clients as $client)
                    @if($services_list->client_id == $client->id)
                        {{$client->full_name}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($services as $service)
                    @if($services_list->service_id == $service->id)
                        @foreach($subcategories as $subcategory)
                            @if($service->subcategories_id == $subcategory->id)
                                {{$subcategory->subcategory_name}}
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </td>
            <td>{{ $services_list->cost }} &#8381</td>
            <td>{{ $services_list->start_date }}</td>
            <td>{{ $services_list->end_date }}</td>
            <td>
                @foreach($groups as $group)
                    @if($services_list->group_id == $group->id)
                        {{$group->group_name}}
                    @endif
                @endforeach
            </td>
	        <td>
                <form action="{{ route('services_lists.destroy',$services_list->id) }}" method="POST">
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-primary mr-1" href="{{ route('services_lists.show',$services_list->id) }}">Подробнее</a>
                        @can('services_list-edit')
                        <a class="btn btn-warning ml-1 mr-1" href="{{ route('services_lists.edit',$services_list->id) }}">Изменить</a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('services_list-delete')
                            <button type="button" class="btn btn-danger ml-1" data-bs-toggle="modal" data-bs-target="#exampleModal{{$services_list->id}}">
                                Удалить
                            </button>

                            <div class="modal fade" id="exampleModal{{$services_list->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <div class="d-flex justify-content-center">{{$services_lists->links("pagination::bootstrap-4")}}</div>

@endsection
