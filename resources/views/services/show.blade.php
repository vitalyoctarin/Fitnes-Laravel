@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Информация об услуги "{{$service->services_name}}"</h2>
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
                            <strong>Подкатегория:</strong>
                            {{ $service->subcategories_id }} - {{$subcategory[0]->subcategory_name}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Стоимость:</strong>
                            {{ $service->cost }} &#8381
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Уровень подготовки:</strong>
                            {{ $service->lvl_preparation_id }} - {{$level_preparation[0]->level_name}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <form action="{{ route('services.destroy',$service->id) }}" method="POST">
                            @can('service-edit')
                                <a class="btn btn-warning" href="{{ route('services.edit',$service->id) }}">Изменить</a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('service-delete')
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
