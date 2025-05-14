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
                    <label for="title">職業 <span class="text-danger">*</span></label>
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
                            <img src="{{ $teamMember->image }}" alt="{{ $teamMember->name }}" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                    @endif
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="license_number">證照字號</label>
                    <input type="text" class="form-control @error('license_number') is-invalid @enderror" id="license_number" name="license_number" value="{{ old('license_number', $teamMember->license_number) }}">
                    @error('license_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="organization">所屬單位職稱</label>
                    <input type="text" class="form-control @error('organization') is-invalid @enderror" id="organization" name="organization" value="{{ old('organization', $teamMember->organization) }}">
                    @error('organization')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="education">學歷</label>
                    <textarea class="form-control @error('education') is-invalid @enderror" id="education" name="education" rows="3" placeholder="請輸入學歷，每行一個">{{ old('education', is_array($teamMember->education) ? implode("\n", $teamMember->education) : $teamMember->education) }}</textarea>
                    @error('education')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="available_times">可預約時間</label>
                    <textarea rows="10" class="form-control @error('available_times') is-invalid @enderror" id="available_times" name="available_times" rows="3" placeholder="請輸入可預約時間，每行一個">{{ old('available_times', is_array($teamMember->available_times) ? implode("\n", $teamMember->available_times) : $teamMember->available_times) }}</textarea>
                    @error('available_times')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="specialties">關注議題 <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('specialties') is-invalid @enderror" id="specialties" name="specialties" rows="3" required placeholder="請輸入關注議題，每行一個">{{ old('specialties', is_array($teamMember->specialties) ? implode("\n", $teamMember->specialties) : $teamMember->specialties) }}</textarea>
                    @error('specialties')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                 <div class="form-group">
                    <label for="specialized_approaches">專長取向</label>
                    <textarea class="form-control @error('specialized_approaches') is-invalid @enderror" id="specialized_approaches" name="specialized_approaches" rows="3" placeholder="請輸入專長取向，每行一個">{{ old('specialized_approaches', is_array($teamMember->specialized_approaches) ? implode("\n", $teamMember->specialized_approaches) : $teamMember->specialized_approaches) }}</textarea>
                    @error('specialized_approaches')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="professional_trainings">專業訓練</label>
                    <textarea class="form-control @error('professional_trainings') is-invalid @enderror" id="professional_trainings" name="professional_trainings" rows="3" placeholder="請輸入專業訓練，每行一個">{{ old('professional_trainings', is_array($teamMember->professional_trainings) ? implode("\n", $teamMember->professional_trainings) : $teamMember->professional_trainings) }}</textarea>
                    @error('professional_trainings')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="work_experience">重要經歷</label>
                    <textarea class="form-control @error('work_experience') is-invalid @enderror" id="work_experience" name="work_experience" rows="3" placeholder="請輸入重要經歷，每行一個">{{ old('work_experience', is_array($teamMember->work_experience) ? implode("\n", $teamMember->work_experience) : $teamMember->work_experience) }}</textarea>
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
