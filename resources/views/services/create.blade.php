@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Добавить новую услугу</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('services.index') }}"> Назад</a>
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


    <form action="{{ route('services.store') }}" method="POST">
    	@csrf

         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Название услуги</strong>
                     <input type="text" name="services_name" class="form-control" placeholder="Название услуги" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Подкатегория</strong>
                     <select class="form-control" name="subcategories_id" required>
                         <option value="{{null}}" selected> - </option>
                         @foreach($subcategories as $subcategory)
                             <option value={{$subcategory->id}}>{{$subcategory->subcategory_name}}</option>
                         @endforeach
                     </select>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Стоимость</strong>
                     <input type="number" name="cost" class="form-control" placeholder="Стоимость" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Уровень подготовки</strong>
                     <select class="form-control" name="lvl_preparation_id">
                         <option value="{{null}}" selected> - </option>
                         @foreach($level_preparations as $level_preparation)
                             <option value={{$level_preparation->id}}>{{$level_preparation->level_name}}</option>
                         @endforeach
                     </select>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                 <button type="submit" class="btn btn-primary">Добавить</button>
             </div>
		</div>
    </form>

@endsection
