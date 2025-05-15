@extends('adminlte::page')

@section('title', '編輯收費標準')

@section('content_header')
    <h1>編輯收費標準</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.service-fees.update', $fee->_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">標題 <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $fee->title) }}" required>
                    @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="subtitle">副標題</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ old('subtitle', $fee->subtitle) }}">
                    @error('subtitle')<span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="description">說明</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $fee->description) }}</textarea>
                    @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="price">價格區間 <span class="text-danger">*</span></label>
                    <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $fee->price) }}" required>
                    @error('price')<span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="order">排序</label>
                    <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', $fee->order) }}">
                    @error('order')<span class="invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="form-group d-flex justify-content-between">
                    <a href="{{ route('admin.service-fees.index') }}" class="btn btn-secondary">返回列表</a>
                    <div>
                        <button type="submit" class="btn btn-primary">儲存</button>
                        <form action="{{ route('admin.service-fees.destroy', $fee->_id) }}" method="POST" class="d-inline" onsubmit="return confirm('確定要刪除這個收費標準嗎？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">刪除</button>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop 