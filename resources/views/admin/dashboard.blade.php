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
                    <div class="alert mb-4" role="alert">
                        上傳圖片前請先壓縮圖片，大圖檔會降低瀏覽速度。<br>
                        可以使用 <a href="https://tinyjpg.com/" target="_blank" rel="noopener" class="text-primary">https://tinyjpg.com/</a> 進行壓縮。
                    </div>
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
