@extends('adminlte::page')

@section('title', '編輯最新消息')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>編輯最新消息</h1>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> 返回列表
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">標題</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           id="title" name="title" value="{{ old('title', $news->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">內容</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="8">{{ old('content', $news->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">圖片</label>
                    @if($news->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $news->image) }}" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                    @endif
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                               id="image" name="image" accept="image/*">
                        <label class="custom-file-label" for="image">選擇檔案</label>
                    </div>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">建議尺寸：800x600 像素</small>
                </div>

                <div class="form-group">
                    <label for="status">狀態</label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" name="status" value="1"
                               {{ old('status', $news->status) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="status">發布</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> 儲存
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                language: 'zh-tw',
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote',
                    '|', 'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var fileInput = document.querySelector('.custom-file-input');
            if(fileInput) {
                fileInput.addEventListener('change', function(e) {
                    var fileName = e.target.files[0]?.name || '';
                    var nextSibling = e.target.nextElementSibling;
                    if(nextSibling && fileName) {
                        nextSibling.innerText = fileName;
                    }
                });
            }
        });
    </script>
@endsection
