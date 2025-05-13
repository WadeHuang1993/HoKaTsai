@extends('adminlte::page')

@section('title', '編輯諮商專欄')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>編輯諮商專欄</h1>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> 返回列表
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">標題</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" value="{{ old('title', $article->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tag">標籤</label>
                    <input type="text" class="form-control @error('tag') is-invalid @enderror" 
                           id="tag" name="tag" value="{{ old('tag', $article->tag) }}" placeholder="例如：性治療、家庭治療">
                    @error('tag')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>常用標籤</label>
                    <div class="d-flex flex-wrap">
                        @foreach($oftenTags as $tag)
                            <button type="button" class="btn btn-outline-secondary mr-2 mb-2 tag-btn" 
                                    data-tag="{{ $tag['tag'] }}">
                                {{ $tag['tag'] }} ({{ $tag['counts'] }})
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="content">內容</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" 
                              id="content" name="content" rows="10" required>{{ old('content', $article->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">圖片</label>
                    @if($article->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $article->image) }}" alt="目前圖片" class="img-thumbnail" style="max-height: 200px;">
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
                    <small class="form-text text-muted">建議尺寸：800x600 像素，檔案大小不超過 2MB</small>
                </div>

                <div class="form-group">
                    <label for="status">狀態</label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" name="status" value="1" 
                               {{ old('status', $article->status) ? 'checked' : '' }}>
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
    <script>
        // 檔案名稱顯示
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });

        // 常用標籤點擊事件
        document.querySelectorAll('.tag-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.getElementById('tag').value = this.dataset.tag;
            });
        });
    </script>
@stop 