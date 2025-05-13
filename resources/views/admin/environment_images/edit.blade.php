@extends('adminlte::page')

@section('title', '編輯環境照片')

@section('content_header')
    <h1>編輯環境照片</h1>
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
            <form action="{{ route('admin.environment-images.update', $image->_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>標題 <span class="text-danger">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $image->title) }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>描述</label>
                    <textarea name="description" rows="3" class="form-control">{{ old('description', $image->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label>目前照片</label><br>
                    <img src="{{ $image->image ? Storage::url($image->image) : '/images/no-image.png' }}" alt="{{ $image->title }}" class="mb-2 img-thumbnail" style="max-width: 300px; height: auto;">
                </div>
                <div class="form-group">
                    <label>更換照片</label>
                    <input type="file" name="image" accept="image/*" class="form-control-file">
                    <small class="form-text text-muted">如不更換可留空</small>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.environment-images.index') }}" class="btn btn-secondary mr-2">返回列表</a>
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>
            </form>
        </div>
    </div>
@stop
