@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Информация о группе "{{$group->group_name}}"</h2>
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
                            <strong>ID тренера:</strong>
                            @if(auth()->user()->can('trainer-list'))
                                <a href="{{route('trainers.show',$group->trainer_id)}}">{{ $group->trainer_id }} - {{$trainer}}</a>
                            @else
                                {{ $group->trainer_id }} - {{$trainer}}
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>ID услуги:</strong>
                            @if(auth()->user()->can('service-list'))
                                <a href="{{route('services.show',$group->service_id)}}">{{ $group->service_id }} - {{$service_name}}({{$subcategory}})</a>
                            @else
                                {{ $group->service_id }} - {{$service_name}}({{$subcategory}})
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Максимальная продолжительность занятия:</strong>
                            {{ $group->time }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <form action="{{ route('groups.destroy',$group->id) }}" method="POST">
                            @can('group-edit')
                                <a class="btn btn-warning" href="{{ route('groups.edit',$group->id) }}">Изменить</a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('group-delete')
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
