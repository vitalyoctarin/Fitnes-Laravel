@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Добавление новую подкатегорию</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary mb-2" href="{{ route('subcategories.index') }}"> Список подкатегорий</a>
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


    <form action="{{ route('subcategories.store') }}" method="POST">
    	@csrf

         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Название подкатегории:</strong>
                     <input type="text" name="subcategory_name" class="form-control" placeholder="Название подкатегории" required>
                 </div>
             </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Создать</button>
		    </div>
		</div>


    </form>

@endsection
