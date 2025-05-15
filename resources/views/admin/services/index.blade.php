@extends('adminlte::page')

@section('title', '諮商服務管理')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>諮商服務管理</h1>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> 新增服務項目
        </a>
    </div>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> 成功！</h5>
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.services.update-order') }}" method="POST" class="formUpdateOrder">
                @csrf
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 100px">排序</th>
                            <th style="width: 100px">圖片</th>
                            <th>標題</th>
                            <th>描述</th>
                            <th style="width: 150px">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>
                                    <input type="number" name="orders[{{ $service->_id }}]" value="{{ $service->order ?? 0 }}" class="form-control" style="width: 80px;">
                                </td>
                                <td>
                                    @if($service->image)
                                        <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" class="img-thumbnail" style="max-height: 50px;">
                                    @else
                                        <span class="text-muted">無圖片</span>
                                    @endif
                                </td>
                                <td>{{ $service->title }}</td>
                                <td>{{ Str::limit($service->description, 100) }}</td>
                                <td>
                                    <a href="{{ route('admin.services.edit', $service->_id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i> 編輯
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" class="text-right">
                                <button type="button" class="btn btn-success btnUpdateOrder">儲存排序</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.btnUpdateOrder').addEventListener('click', function() {
            document.querySelector('.formUpdateOrder').submit();
        });
    });
</script>
@stop
