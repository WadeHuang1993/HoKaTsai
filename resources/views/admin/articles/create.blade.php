@extends('adminlte::page')

@section('title', '新增諮商專欄')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>新增諮商專欄</h1>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> 返回列表
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="team_member_id">作者(<a href="{{route('admin.team-members.index')}}">團隊陣容管理新增</a>)</label>
                    <select class="form-control @error('team_member_id') is-invalid @enderror"
                            id="team_member_id" name="team_member_id" required>
                        <option value="">請選擇作者</option>
                        @foreach($teamMembers as $member)
                            <option value="{{ $member->_id }}" {{ old('team_member_id') == $member->_id ? 'selected' : '' }}>
                                {{ $member->name }} - {{ $member->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('team_member_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">標題</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tags">標籤</label>
                    <input type="text" class="form-control @error('tags') is-invalid @enderror"
                           id="tags" name="tags" value="{{ old('tags') }}" placeholder="例如：性治療、家庭治療（請用逗號分隔）">
                    @error('tags')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">內容</label>
                    <textarea class="form-control @error('content') is-invalid @enderror"
                              id="content" name="content" rows="10">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">圖片</label>
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
                    <label>懶人包圖片</label>
                    <div id="lazy-images-container" class="mb-3">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="lazy-images" name="lazy_images[]" accept="image/*" multiple>
                        <label class="custom-file-label" for="lazy-images">選擇多張圖片</label>
                    </div>
                    <small class="form-text text-muted">建議尺寸：800x600 像素，檔案大小不超過 2MB，可拖曳調整順序</small>
                </div>

                <div class="form-group">
                    <label for="status">狀態</label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" name="status" value="1"
                               {{ old('status') ? 'checked' : '' }}>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        // 檔案名稱顯示
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.custom-file-input').forEach(function(fileInput) {
                fileInput.addEventListener('change', function(e) {
                    var fileName = e.target.files[0]?.name || '';
                    var nextSibling = e.target.nextElementSibling;
                    if(nextSibling && fileName) {
                        nextSibling.innerText = fileName;
                    }
                });
            });

            // 初始化拖曳排序
            new Sortable(document.getElementById('lazy-images-container'), {
                animation: 150,
                handle: '.lazy-image-item',
                onEnd: function() {
                    updateMoveButtons();
                }
            });

            // 預覽上傳的圖片
            document.getElementById('lazy-images').addEventListener('change', function(e) {
                const files = e.target.files;
                if (files.length > 0) {
                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        const reader = new FileReader();
                        
                        reader.onload = function(e) {
                            const container = document.getElementById('lazy-images-container');
                            const div = document.createElement('div');
                            div.className = 'lazy-image-item mb-3 p-2 border rounded';
                            div.innerHTML = `
                                <div class="d-flex align-items-center">
                                    <img src="${e.target.result}" alt="懶人包圖片" class="img-thumbnail mr-3" style="max-height: 100px;">
                                    <div class="flex-grow-1">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary move-up">
                                                <i class="fas fa-arrow-up"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary move-down">
                                                <i class="fas fa-arrow-down"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger remove-image">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            `;
                            container.appendChild(div);
                        };
                        
                        reader.readAsDataURL(file);
                    }
                    updateMoveButtons();
                }
            });

            // 移除圖片
            document.addEventListener('click', function(e) {
                if (e.target.closest('.remove-image')) {
                    if (confirm('確定要移除這張圖片嗎？')) {
                        e.target.closest('.lazy-image-item').remove();
                        updateMoveButtons();
                    }
                }
            });

            // 上下移動按鈕
            document.addEventListener('click', function(e) {
                const item = e.target.closest('.lazy-image-item');
                if (!item) return;

                if (e.target.closest('.move-up')) {
                    const prev = item.previousElementSibling;
                    if (prev) {
                        item.parentNode.insertBefore(item, prev);
                        updateMoveButtons();
                    }
                } else if (e.target.closest('.move-down')) {
                    const next = item.nextElementSibling;
                    if (next) {
                        item.parentNode.insertBefore(next, item);
                        updateMoveButtons();
                    }
                }
            });

            function updateMoveButtons() {
                const items = document.querySelectorAll('.lazy-image-item');
                items.forEach((item, index) => {
                    const upBtn = item.querySelector('.move-up');
                    const downBtn = item.querySelector('.move-down');
                    
                    upBtn.disabled = index === 0;
                    downBtn.disabled = index === items.length - 1;
                });
            }
        });

        // CKEditor 初始化
        ClassicEditor
            .create(document.querySelector('#content'), {
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'outdent',
                        'indent',
                        '|',
                        'blockQuote',
                        'insertTable',
                        'imageUpload',
                        'undo',
                        'redo'
                    ]
                },
                language: 'zh-TW',
                simpleUpload: {
                    uploadUrl: '/admin/articles-upload-image',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@stop
