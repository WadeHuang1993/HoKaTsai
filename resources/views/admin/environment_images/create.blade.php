@extends('adminlte::page')

@section('title', '新增環境照片')

@section('content_header')
    <h1>新增環境照片</h1>
@stop

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.environment-images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>標題 <span class="text-danger">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>描述</label>
                    <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label>請先壓縮圖片，大圖檔會降低瀏覽速度：</label>
                    <span>
                        <a href="https://tinyjpg.com/">點這裡壓縮圖片</a>
                    </span>
                </div>
                <div class="form-group">
                    <label>照片 <span class="text-danger">*</span></label>
                    <input type="file" name="image" accept="image/*" class="form-control-file" required>
                </div>
                <div class="form-group">
                    <label>首頁排序（數字越小越前面）</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}" class="form-control" min="0">
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.environment-images.index') }}" class="btn btn-secondary mr-2">返回列表</a>
                    <button type="submit" class="btn btn-primary">新增</button>
                </div>
            </form>
        </div>
    </div>
@stop
