@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Добавить новый абонемент</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('subscriptions.index') }}"> Список абонементов</a>
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


    <form action="{{ route('subscriptions.store') }}" method="POST">
    	@csrf


         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Название абонемента:</strong>
                     <input type="text" name="subscription_name" id="subscription_name" class="form-control" placeholder="Название абонемента" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Скидка (%):</strong>
                     <input type="number" max="100" min="1" name="discount" class="form-control" placeholder="Скидка (%)" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Кол-во тренировок:</strong>
                     <input type="number" name="count_training" class="form-control" min="1" max="25" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Для услуги:</strong>
                     <select class="form-control" name="service_id" required>
                         @foreach($services as $service)
                             @foreach($subcategories as $subcategory)
                                 @if($subcategory->id == $service->subcategories_id) <option value={{$service->id}}> {{$subcategory->subcategory_name}}</option> @endif
                             @endforeach
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
