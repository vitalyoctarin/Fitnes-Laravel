@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Заявки</h2>
            </div>
            <div class="pull-right mb-2">
                @can('group-create')
                <a class="btn btn-success" href="{{ route('applications.create') }}">Добавить заявку</a>
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
            <th>Услуга</th>
            <th>Статус</th>
            <th>Дата создания</th>
            <th style="width: 350px">Действия</th>
        </tr>
	    @foreach ($requests as $request)
	    <tr>
	        <td>{{ $request->id }}</td>
	        <td>{{ $request->full_name }}</td>
	        <td>{{ $request->phone_number }}</td>
            <td>{{ $request->service_id }}</td>
            <td>
                @if($request->status == 'Ожидание')
                    <span class="badge bg-secondary text-light">{{ $request->status }}</span>
                @endif
                @if($request->status == 'Обработка')
                    <span class="badge bg-warning text-dark">{{ $request->status }}</span>
                @endif
                @if($request->status == 'Завершен')
                    <span class="badge bg-success text-light">{{ $request->status }}</span>
                @endif
            </td>
            <td>{{ $request->created_at }}</td>
	        <td>

                    <div class="d-flex justify-content-center">
                        @can('application-create')
                        <form action="{{ route('applications.createClient',$request->id) }}" method="POST">
                            @csrf
                            @if($request->status != 'Завершен')
                                <button type="button" class="btn btn-success mr-2" data-bs-toggle="modal" data-bs-target="#CreateUserModal{{$request->id}}">
                                    Добавить пользователя
                                </button>
                            @endif

                            <div class="modal fade" id="CreateUserModal{{$request->id}}" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Добавление нового клиента</h5>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>ФИО</strong>
                                                        <input type="text" name="full_name" id="full_name" value="{{$request->full_name}}" class="form-control" placeholder="ФИО" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Номер телефона</strong>
                                                        <input type="tel" name="phone_number" placeholder="79001234567" class="form-control" value="{{$request->phone_number}}" pattern="\7\{0,1}9[0-9]{2}{0,1}\d{3}\d{2}\d{2}" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Дата рождения</strong>
                                                        <input type="date" name="dob" id="dob" value="{{$request->dob}}" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Услуга</strong>
                                                        <input type="text" name="subscription_name" value="{{$request->service_id}}" id="subscription_name" class="form-control" required>
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
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Создать</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endcan


                        @can('application-delete')
                        <form action="{{ route('applications.destroy',$request->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Удалить
                                </button>


                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        </form>
                        @endcan
                    </div>
	        </td>
	    </tr>
	    @endforeach
    </table>

    <div class="d-flex justify-content-center">{{$requests->links("pagination::bootstrap-4")}}</div>

@endsection
