@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Создание нового клиента</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients.index') }}"> Список всех клиентов</a>
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


    <form action="{{ route('clients.store') }}" method="POST">
    	@csrf

         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>ФИО:</strong>
                     <input type="text" name="full_name" class="form-control" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Дата рождения:</strong>
                     <input type="date" name="dob" class="form-control" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Услуга:</strong>
                     <select class="form-control" name="subscription_name" required>
                         <option selected value="{{null}}"> - </option>
                         @foreach($services as $service)
                             @foreach($subcategories as $subcategory)
                                 @if($subcategory->id == $service->subcategories_id)
                                     <option value={{$service->id}}>{{$subcategory->subcategory_name}}</option>
                                 @endif
                             @endforeach
                         @endforeach
                     </select>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Номер телефона:</strong>
                     <input type="tel" name="phone_number" class="form-control" pattern="\7\{0,1}9[0-9]{2}{0,1}\d{3}\d{2}\d{2}" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Группа</strong>
                     <select class="form-control" name="group_id" required>
                         <option selected value="{{null}}"> - </option>
                         @foreach($groups as $group)
                             <option value={{$group->id}}>{{$group->group_name}}</option>
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
