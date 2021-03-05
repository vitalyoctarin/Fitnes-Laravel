@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Добавление новой услуги для клиента</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary mb-2" href="{{ route('services_lists.index') }}"> Список всех используемых услуг</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('services_lists.store') }}" method="POST">
    	@csrf

         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Услуга:</strong>
                     <select class="form-control" onchange="setReadOnly(this)" name="service_id" id="service_id" required>
                         <option value="{{null}}" selected> - </option>
                         @foreach($services as $service)
                             @foreach($subcategories as $subcategory)
                                 @if($subcategory->id == $service->subcategories_id) <option value={{$service->id}}> {{$subcategory->subcategory_name}}</option> @endif
                             @endforeach
                         @endforeach
                     </select>
                 </div>
             </div>

             <div class="col-xs-12 col-sm-12 col-md-12" id="services_list" hidden>
                 <div class="form-group">
                     <strong>Абонементы:</strong>
                     <select class="form-control" onchange="onChangeSubscription(this)" id="subscription_id" name="subscription_id">
                     </select>
                 </div>
             </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Цена за одно занятие:</strong>
                     <input type="number" id="price_for_lesson" name="price_for_lesson" class="form-control" readonly required>
                 </div>
             </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Количество занятий:</strong>
                     <input type="number" id="number_of_lessons" onchange="getLessons(this)" name="number_of_lessons" class="form-control" required>
                 </div>
             </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Клиент:</strong>
                     <select class="form-control" name="client_id" required>
                         <option value="{{null}}" selected> - </option>
                         @foreach($clients as $client)
                             <option value="{{$client->id}}">{{$client->full_name}}</option>
                         @endforeach
                     </select>
                 </div>
             </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Дата начала действия:</strong>
                     <input type="date" name="start_date" id="start_date" onchange="setEndDate(this)" class="form-control" required>
                 </div>
             </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Дата окончания действия:</strong>
                     <input type="date" name="end_date" id="end_date" class="form-control" required readonly>
                 </div>
             </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Название группы:</strong>
                     <select class="form-control" name="group_id" required>
                         <option value="{{null}}" selected> - </option>
                         @foreach($groups as $group)
                             <option value="{{$group->id}}">{{$group->group_name}}</option>
                         @endforeach
                     </select>
                 </div>
             </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Стоимость:</strong>
                     <input type="number" id="cost" name="cost" class="form-control" readonly required>
                 </div>
             </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Метод оплаты:</strong>
                     <select class="form-control" name="pay_method_id" required>
                         <option value="{{null}}" selected> - </option>
                         @foreach($pay_methods as $pay_method)
                             <option value="{{$pay_method->id}}">{{$pay_method->pay_method_name}}</option>
                         @endforeach
                     </select>
                 </div>
             </div>

             <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                 <button type="submit" class="btn btn-primary">Создать</button>
             </div>
		</div>
    </form>

@endsection
