@extends('layouts.app')


@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Расписание</h2>
            </div>
            <div class="pull-right mb-2">
                @can('group-create')
                <a class="btn btn-success" href="{{ route('timetable.create') }}">Добавить запись</a>
                @endcan
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="monday-tab" data-bs-toggle="tab" href="#monday" role="tab" aria-controls="monday" aria-selected="true">Понедельник</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tuesday-tab" data-bs-toggle="tab" href="#tuesday" role="tab" aria-controls="tuesday" aria-selected="false">Вторник</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="wednesday-tab" data-bs-toggle="tab" href="#wednesday" role="tab" aria-controls="wednesday" aria-selected="false">Среда</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="thursday-tab" data-bs-toggle="tab" href="#thursday" role="tab" aria-controls="thursday" aria-selected="false">Четверг</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="friday-tab" data-bs-toggle="tab" href="#friday" role="tab" aria-controls="friday" aria-selected="false">Пятница</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="saturday-tab" data-bs-toggle="tab" href="#saturday" role="tab" aria-controls="saturday" aria-selected="false">Суббота</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="monday" role="tabpanel" aria-labelledby="monday-tab">
            <br>
            @if($timetables_monday->isEmpty())
                <p>Расписание скоро будет доступно.</p>
            @else
            @foreach($timetables_monday as $monday)
                <p>{{$monday->start_time}} - {{$monday->end_time}}, {{$group->where('id','=',$monday->group_id)->pluck('group_name')->first()}}</p>
            @endforeach
            @endif
        </div>
        <div class="tab-pane fade" id="tuesday" role="tabpanel" aria-labelledby="tuesday-tab">
            <br>
            @if($timetables_tuesday->isEmpty())
                <p>Расписание скоро будет доступно.</p>
            @else
            @foreach($timetables_tuesday as $tuesday)
                <p>{{$tuesday->start_time}} - {{$tuesday->end_time}}, {{$group->where('id','=',$tuesday->group_id)->pluck('group_name')->first()}}</p>
            @endforeach
            @endif
        </div>
        <div class="tab-pane fade" id="wednesday" role="tabpanel" aria-labelledby="wednesday-tab">

        </div>
        <div class="tab-pane fade" id="thursday" role="tabpanel" aria-labelledby="thursday-tab">

        </div>
        <div class="tab-pane fade" id="friday" role="tabpanel" aria-labelledby="friday-tab">

        </div>
        <div class="tab-pane fade" id="saturday" role="tabpanel" aria-labelledby="saturday-tab">

        </div>
    </div>
{{--    @if($timetables[0] == null)--}}
{{--        <div class="alert alert-secondary justify-content-center d-flex" role="alert">--}}
{{--            Расписание обновляется, пожалуйста, подождите--}}
{{--        </div>--}}
{{--    @else--}}
{{--    <table class="table table-bordered table-striped">--}}
{{--        <tbody>--}}
{{--        <tr>--}}
{{--            <td></td>--}}
{{--            <td>Понедельник</td>--}}
{{--            <td>Вторник</td>--}}
{{--            <td>Среда</td>--}}
{{--            <td>Четверг</td>--}}
{{--            <td>Пятница</td>--}}
{{--            <td>Суббота</td>--}}
{{--            <td>Воскресенье</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>7:00</td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>8:00</td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>9:00</td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>10:00</td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>11:00</td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>12:00</td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>13:00</td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>14:00</td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>15:00</td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>16:00</td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>17:00</td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>18:00</td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--        </tr>--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--    @endif--}}

@endsection
