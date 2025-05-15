@extends('adminlte::page')
@section('title', '新增合作單位')
@section('content_header')
    <h1>新增合作單位</h1>
@endsection
@section('content')
<form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>名稱</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label>Logo</label>
        <input type="file" name="logo" class="form-control" required>
    </div>
    <div class="form-group">
        <label>介紹</label>
        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
    </div>
    <div class="form-group">
        <label>排序（數字越小越前面）</label>
        <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
    </div>
    <button type="submit" class="btn btn-primary">儲存</button>
    <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">返回</a>
</form>
@endsection 