@extends('adminlte::page')

@section('title', '新增課程')

@section('content_header')
    <h1>新增課程</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">課程標題</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="start_date">開始時間</label>
                    <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                    @error('start_date')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end_date">結束時間</label>
                    <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                    @error('end_date')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="location">地點</label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" required>
                    @error('location')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">課程封面圖</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" required>
                        <label class="custom-file-label" for="image">選擇檔案</label>
                    </div>
                    @error('image')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">課程介紹</label>
                    <div class="mb-2">
                        <button type="button" class="btn btn-info" id="apply-template">
                            <i class="fas fa-file-alt"></i> 套用範本
                        </button>
                    </div>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ old('description'),  }}</textarea>
                    @error('description')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="team_member_id">講師</label>
                    <select class="form-control @error('team_member_id') is-invalid @enderror" id="team_member_id" name="team_member_id" required>
                        <option value="">請選擇講師</option>
                        @foreach($teamMembers as $teamMember)
                            <option value="{{ $teamMember->_id }}" {{ old('team_member_id') == $teamMember->_id ? 'selected' : '' }}>
                                {{ $teamMember->name }} - {{ $teamMember->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('team_member_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>課程流程</label>
                    <div id="schedule-container">
                        <div class="schedule-item mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="schedule[0][time]" placeholder="時間範例：14:00-14:30" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="schedule[0][content]" placeholder="內容範例：壓力管理技巧實作" required>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger remove-schedule" style="display: none;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="add-schedule">
                        <i class="fas fa-plus"></i> 新增時段
                    </button>
                </div>

                <div class="form-group">
                    <label for="max_participants">最大參與人數</label>
                    <input type="number" class="form-control @error('max_participants') is-invalid @enderror" id="max_participants" name="max_participants" value="{{ old('max_participants') }}" min="1" required>
                    @error('max_participants')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="remaining_slots">剩餘名額</label>
                    <input type="number" class="form-control @error('remaining_slots') is-invalid @enderror" id="remaining_slots" name="remaining_slots" value="{{ old('remaining_slots') }}" min="0" required>
                    @error('remaining_slots')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">課程價格</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" min="0" required>
                    @error('price')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>注意事項</label>
                    <div id="notes-container">
                        <div class="note-item mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="notes[]" placeholder="注意事項" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-danger remove-note" style="display: none;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="add-note">
                        <i class="fas fa-plus"></i> 新增注意事項
                    </button>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">建立課程</button>
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">返回列表</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            let editor;
            // 初始化 CKEditor
            ClassicEditor
                .create(document.querySelector('#description'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo'],
                    language: 'zh-TW'
                })
                .then(newEditor => {
                    editor = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });

            // 套用範本按鈕點擊事件
            $('#apply-template').click(function() {
                const template = `<p>受過傳統諮商訓練的助人工作者，帶著個別諮商的理論訓練與技術與家庭工作時，常會有格格不入或力有未逮的時刻。此外，在做孩童、青少年、性少數乃至於在關係中受暴的成年男女，系統論的家族治療師，總迴避不了對性別創傷之凝視。</p><p>女性主義取向家族治療將治療視窗延伸至社會與性別文化體制，藉由提升助人工作者的性別與權力敏感度，得以看見關係中既存的偏見、權力失衡與壓迫，試圖翻轉父權思想對家庭系統的壓迫，進而改變伴侶以及家庭關係與互動，不再讓IP(identified patient)繼續靠著調適自己的心態順應不合理的的家庭運作規則。</p><p><strong>課程目標</strong></p><p>&nbsp; (一)認識家庭系統的觀點與運作</p><p>&nbsp; (二)打開女性主義家族治療的視框</p><p>&nbsp; (三)了解伴侶婚姻及家庭的性別與權力運作</p><p>&nbsp; (四)練習女性主義取向家族治療之技術</p><p>&nbsp; (五)提升助人工作者性別敏感度以及性別意識</p><p><strong>課程進行方式：</strong></p><p>&nbsp; &nbsp;透過講解、示範以及實作演練，培養助人工作者在伴侶諮商以及家族治療的性別、</p><p>&nbsp; &nbsp;權力敏感度，認識及學習女性主義家族治療的理論與實務工作方法。</p><p><br data-cke-filler="true"></p><p><strong>課程資訊</strong></p><p>辦理日期：114年10月11日(六)-10月12日，9：30-16：30，共計12小時。</p><p>課程費用：4,500元(含午餐、研習證書)</p><p>辦理地點：臺南「張老師」中心(台南市東區崇學路169號4樓)</p><p>參加對象：</p><p>(一)心理師、社會工作師、精神科醫師、醫護人員、輔導教師，其他相關領域實務工作者。</p><p>(二)相關科系研究生。</p><p>人數限額：最多30人/班（額滿截止，依完成報名繳費的先後順序）</p>`;

                if (editor) {
                    editor.setData(template);
                }
            });

            // 在表單提交前更新 textarea 的值
            $('form').on('submit', function() {
                if (editor) {
                    editor.updateSourceElement();
                }
            });

            // 檔案上傳名稱顯示
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').html(fileName);
            });

            // 新增課程流程
            let scheduleCount = 1;
            $('#add-schedule').click(function() {
                let scheduleHtml = `
                    <div class="schedule-item mb-3">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="schedule[${scheduleCount}][time]" placeholder="時間" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="schedule[${scheduleCount}][content]" placeholder="內容" required>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger remove-schedule">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                $('#schedule-container').append(scheduleHtml);
                scheduleCount++;
                updateRemoveButtons();
            });

            // 新增注意事項
            $('#add-note').click(function() {
                let noteHtml = `
                    <div class="note-item mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="notes[]" placeholder="注意事項" required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger remove-note">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                $('#notes-container').append(noteHtml);
                updateRemoveButtons();
            });

            // 更新刪除按鈕顯示
            function updateRemoveButtons() {
                if ($('.schedule-item').length > 1) {
                    $('.remove-schedule').show();
                } else {
                    $('.remove-schedule').hide();
                }

                if ($('.note-item').length > 1) {
                    $('.remove-note').show();
                } else {
                    $('.remove-note').hide();
                }
            }

            // 刪除課程流程
            $(document).on('click', '.remove-schedule', function() {
                $(this).closest('.schedule-item').remove();
                updateRemoveButtons();
            });

            // 刪除注意事項
            $(document).on('click', '.remove-note', function() {
                $(this).closest('.note-item').remove();
                updateRemoveButtons();
            });
        });
    </script>
@stop
