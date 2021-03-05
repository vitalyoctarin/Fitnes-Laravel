@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Информация об абонементе "{{$subscription->subscription_name}}"</h2>
            </div>
        </div>
    </div>



    <table class="table">
        <tbody>
        <tr>
            <td><div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Скидка:</strong>
                            {{ $subscription->discount }} %
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Кол-во тренировок:</strong>
                            {{ $subscription->count_training }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Для услуги:</strong>
                            {{ $service[0]->services_name }} - {{ $subcategory[0]->subcategory_name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <form action="{{ route('trainers.destroy',$subscription->id) }}" method="POST">
                            @can('subscription-edit')
                                <a class="btn btn-warning" href="{{ route('trainers.edit',$subscription->id) }}">Изменить</a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('subscription-delete')
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
