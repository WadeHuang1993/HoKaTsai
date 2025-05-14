@extends('adminlte::page')

@section('title', '編輯 FAQ')

@section('content_header')
    <h1>編輯 FAQ</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.faqs.update', $faq->_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="question">問題 <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('question') is-invalid @enderror" id="question" name="question" value="{{ old('question', $faq->question) }}" required>
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="answer">答案 <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" rows="5" required>{{ old('answer', $faq->answer) }}</textarea>
                            @error('answer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="order">順序</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $faq->order) }}">
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="status" name="status" value="1" {{ old('status', $faq->status) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">顯示</label>
                        </div>
                        <button type="submit" class="btn btn-primary">更新</button>
                        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">返回</a>
                    </form>
                    <form action="{{ route('admin.faqs.destroy', $faq->_id) }}" method="POST" class="mt-3" onsubmit="return confirm('確定要刪除這則 FAQ 嗎？')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">刪除</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop 