@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Отправка заявки</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('applications.index') }}"> Назад</a>
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


    <form action="{{ route('applications.store') }}" method="POST">
    	@csrf

        <div class="row justify-content-center">
            <div class="cont">
                <img class="img_service" src="https://st.depositphotos.com/1825047/3610/i/600/depositphotos_36108459-stock-photo-the-yoga-woman.jpg" alt="" />
                <p class="title">Йога</p>
                <div class="overlay"></div>
{{--                <div class="buttton" data-bs-toggle="modal" data-bs-target="#exampleModal"><a href="#"> BUTTON </a></div>--}}
                <button type="button" class="btn btn-primary buttton" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Оформить
                </button>
            </div>
		</div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Форма оформления заяки</h5>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>ФИО</strong>
                                    <input type="text" name="full_name" id="full_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Номер телефона</strong>
                                    <input type="tel" name="phone_number" class="form-control" pattern="\7\{0,1}9[0-9]{2}{0,1}\d{3}\d{2}\d{2}" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Услуга</strong>
                                    <input type="text" name="service_id" class="form-control" value="1" readonly required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
