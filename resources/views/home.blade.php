@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Панель управления') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="row justify-content-around">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table mb-1" viewBox="0 0 16 16">
                                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
                                    </svg>
                                    Таблицы
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @can('employee-list')
                                        <a class="dropdown-item" href="{{ route('employees.index') }}">Работники</a>
                                    @endcan

                                    @can('user-list')
                                        <a class="dropdown-item" href="{{ route('users.index') }}">Пользователи</a>
                                    @endcan

                                    @can('role-list')
                                        <a class="dropdown-item" href="{{ route('roles.index') }}">Роли</a>
                                    @endcan

                                    @can('trainer-list')
                                        <a class="dropdown-item" href="{{ route('trainers.index') }}">Тренера</a>
                                    @endcan

                                    @can('group-list')
                                        <a class="dropdown-item" href="{{ route('groups.index') }}">Группы</a>
                                    @endcan

                                    @can('client-list')
                                        <a class="dropdown-item" href="{{ route('clients.index') }}">Клиенты</a>
                                    @endcan

                                    @can('service-list')
                                        <a class="dropdown-item" href="{{ route('services.index') }}">Услуги</a>
                                    @endcan

                                    @can('services_list-list')
                                        <a class="dropdown-item" href="{{ route('services_lists.index') }}">Список используемых услуг</a>
                                    @endcan


                                </div>
                            </div>

                            <a href="{{route('reports')}}"><button class="btn btn-primary" type="button" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill mb-1" viewBox="0 0 16 16">
                                    <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>
                                </svg>
                                Отчеты
                            </button></a>

                            <a href="{{route('applications.index')}}"><button class="btn btn-primary"  type="button" aria-haspopup="true" aria-expanded="false">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square-fill mb-1" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5a.5.5 0 0 1 1 0z"/>
                                </svg>
                                Заявки
                                </button></a>
                            <a href="{{route('timetable.index')}}"><button class="btn btn-primary" type="button" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event mb-1" viewBox="0 0 16 16">
                                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                    </svg>
                                    Расписание
                                </button></a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
