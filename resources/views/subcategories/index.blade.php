@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Работники</h2>
            </div>
            <div class="pull-right mb-2">
                @can('subcategory-create')
                    <a class="btn btn-success" href="{{ route('subcategories.create') }}">Добавить новую подкатегорию</a>
                @endcan
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
            <th>Id</th>
            <th>Название подкатегории</th>
            <th width="280px">Действия</th>
        </tr>
	    @foreach ($subcategories as $subcategory)
	    <tr>
	        <td>{{ $subcategory->id }}</td>
	        <td>{{ $subcategory->subcategory_name }}</td>
	        <td>
                <form action="{{ route('subcategories.destroy',$subcategory->id) }}" method="POST">
                    <div class="d-flex justify-content-around">
                        <a class="btn btn-primary" href="{{ route('subcategories.show',$subcategory->id) }}">Подробнее</a>
                        @can('subcategory-edit')
                        <a class="btn btn-warning" href="{{ route('subcategories.edit',$subcategory->id) }}">Изменить</a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('subcategory-delete')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                        @endcan
                    </div>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

    <div class="d-flex justify-content-center">{{$subcategories->links("pagination::bootstrap-4")}}</div>

@endsection
