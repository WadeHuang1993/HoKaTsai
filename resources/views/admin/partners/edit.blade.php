@extends('adminlte::page')
@section('title', '編輯合作單位')
@section('content_header')
    <h1>編輯合作單位</h1>
@endsection
@section('content')
<form action="{{ route('admin.partners.update', $partner->_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>名稱</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name', $partner->name) }}">
    </div>
    <div class="form-group">
        <label>Logo</label><br>
        @if($partner->logo)
            <img src="{{ Storage::url($partner->logo) }}" alt="logo" style="height:40px;max-width:80px;" class="mb-2">
        @endif
        <input type="file" name="logo" class="form-control">
        <small class="text-muted">不選擇則保留原圖</small>
    </div>
    <div class="form-group">
        <label>介紹</label>
        <textarea name="description" class="form-control" rows="4">{{ old('description', $partner->description) }}</textarea>
    </div>
    <div class="form-group">
        <label>排序（數字越小越前面）</label>
        <input type="number" name="order" class="form-control" value="{{ old('order', $partner->order) }}">
    </div>
    <button type="submit" class="btn btn-primary">儲存</button>
    <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">返回</a>
</form>
<form action="{{ route('admin.partners.destroy', $partner->_id) }}" method="POST" class="mt-3" onsubmit="return confirm('確定要刪除這個合作單位嗎？')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">刪除</button>
</form>
@endsection
