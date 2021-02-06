@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Управление пользователями</h2>
        </div>
        <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Создать нового пользователя</a>
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
   <th>id</th>
   <th>Логин</th>
   <th>Работник</th>
   <th>Роль</th>
   <th>Действия</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->login }}</td>
    <td>{{ $user->empid }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
        <div class="justify-content-between">
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Изменить</a>
            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </td>
  </tr>
 @endforeach
</table>


{!! $data->links("pagination::bootstrap-4") !!}
@endsection
