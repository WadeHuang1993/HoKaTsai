@extends('adminlte::page')

@section('title', '儀表板')

@section('content_header')
    <h1>儀表板</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">歡迎使用後台管理系統！</p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('page_js')
    <script>
        console.log('Dashboard loaded!');
    </script>
@stop
