@extends('adminlte::page')

@section('title', '編輯團隊成員')

@section('content_header')
    <h1>編輯團隊成員</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">修改團隊成員資料</h3>
        </div>
        <form action="{{ route('admin.team-members.update', $teamMember) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">姓名 <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $teamMember->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">職稱 <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $teamMember->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">照片</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                        <label class="custom-file-label" for="image">選擇檔案</label>
                    </div>
                    @if($teamMember->image)
                        <div class="mt-2">
                            <img src="{{ Storage::url($teamMember->image) }}" alt="{{ $teamMember->name }}" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                    @endif
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="specialties">專長 <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('specialties') is-invalid @enderror" id="specialties" name="specialties" rows="3" required placeholder="請輸入專長，每行一個">{{ old('specialties', $teamMember->specialties) }}</textarea>
                    @error('specialties')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="education">學歷</label>
                    <textarea class="form-control @error('education') is-invalid @enderror" id="education" name="education" rows="3">{{ old('education', $teamMember->education) }}</textarea>
                    @error('education')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="work_experience">工作經歷</label>
                    <textarea class="form-control @error('work_experience') is-invalid @enderror" id="work_experience" name="work_experience" rows="3">{{ old('work_experience', $teamMember->work_experience) }}</textarea>
                    @error('work_experience')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="self_introduction">自我介紹</label>
                    <textarea class="form-control @error('self_introduction') is-invalid @enderror" id="self_introduction" name="self_introduction" rows="3">{{ old('self_introduction', $teamMember->self_introduction) }}</textarea>
                    @error('self_introduction')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="show_in_homepage" name="show_in_homepage" {{ $teamMember->show_in_homepage ? 'checked' : '' }}>
                        <label class="custom-control-label" for="show_in_homepage">在首頁顯示</label>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">更新</button>
                <a href="{{ route('admin.team-members.index') }}" class="btn btn-default">返回</a>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        // 檔案上傳名稱顯示
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@stop
