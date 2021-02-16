@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Отчеты</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Назад</a>
            </div>
        </div>
    </div>
    <div id="chart" style="height: 300px;"></div>
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
        const chart = new Chartisan({
            el: '#chart',
            url: "@chart('sample_chart')",

        });
    </script>
@endsection
