@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
                                </svg>
                                Таблицы
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @can('employee-list')
                                    <a class="dropdown-item" href="{{ route('employees.index') }}">Работники</a>
                                @endcan

                                @can('user-list')
                                    <a class="dropdown-item" href="{{ route('users.index') }}">Пользователи</a></li>
                                @endcan

                                @can('role-list')
                                    <a class="dropdown-item" href="{{ route('roles.index') }}">Роли</a></li>
                                @endcan

                                @can('trainer-list')
                                    <a class="dropdown-item" href="{{ route('trainers.index') }}">Тренера</a></li>
                                @endcan
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
