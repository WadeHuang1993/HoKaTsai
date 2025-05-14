@extends('layouts.layout')

@section('title', '預約諮商')

@section('content')
<div class="max-w-lg mx-auto py-16">
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-3xl font-bold text-center text-[var(--primary-color)] mb-6">預約諮商</h1>
        <div class="guide-text mb-8 text-[var(--primary-light)] leading-relaxed text-center">
            <p class="mb-4">我們的諮商預約採「預約制」</p>

            <p class="mb-4">
                您可以 Line
                <a href="https://lin.ee/2VKNxkK" target="_blank" style="display: inline-flex; align-items: center;">
                    <img src="https://scdn.line-apps.com/n/line_add_friends/btn/zh-Hant.png" alt="加入好友" style="height: 2em; vertical-align: middle; margin-right: 0.2em;">
                </a>
                或請您留下以下資訊：
            </p>
            <p>我們的個案管理師會於上班時間陸續與您接洽</p>
            <p>請您稍等</p>
        </div>
        @if(session('success'))
            <div class="alert alert-success text-green-700 bg-green-100 border border-green-300 rounded p-4 mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('appointment.submit') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block mb-2 font-semibold">稱呼 <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror" required>
                @error('name')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block mb-2 font-semibold">電子信箱 <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2 @error('email') border-red-500 @enderror" required>
                @error('email')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block mb-2 font-semibold">電話號碼 <span class="text-red-500">*</span></label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border rounded px-3 py-2 @error('phone') border-red-500 @enderror" required>
                @error('phone')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block mb-2 font-semibold">要預約的諮商心理師 <span class="text-red-500">*</span></label>
                <div class="space-y-2">
                    <label class="inline-flex items-start">
                        <input type="radio" name="counselor" value="不指定" {{ old('counselor', '不指定') == '不指定' ? 'checked' : '' }} class="mr-2 mt-1">不指定
                    </label><br>
                    <label class="inline-flex items-start">
                        <input type="radio" name="counselor" value="陳巧翊心理師" {{ old('counselor') == '陳巧翊心理師' ? 'checked' : '' }} class="mr-2 mt-1">
                        <span>
                            陳巧翊心理師<br>
                            <span class="block text-sm text-gray-500 ml-6">每週四、五 11:00 - 21:00</span>
                        </span>
                    </label><br>
                    <label class="inline-flex items-start">
                        <input type="radio" name="counselor" value="徐于涵心理師" {{ old('counselor') == '徐于涵心理師' ? 'checked' : '' }} class="mr-2 mt-1">
                        <span>
                            徐于涵心理師<br>
                            <span class="block text-sm text-gray-500 ml-6">每週一、三 9:00 - 17:00；每週四、五 9:00 - 12:00</span>
                        </span>
                    </label>
                </div>
                @error('counselor')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block mb-2 font-semibold">要預約的時間 <span class="text-red-500">*</span></label>
                <input type="text" name="time" value="{{ old('time') }}" class="w-full border rounded px-3 py-2 @error('time') border-red-500 @enderror" placeholder="例如：週四 14:00-16:00、週五 11:00 前" required>
                @error('time')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block mb-2 font-semibold">方便聯繫的時段</label>
                <input type="text" name="contact_time" value="{{ old('contact_time') }}" class="w-full border rounded px-3 py-2 @error('contact_time') border-red-500 @enderror" placeholder="例如：週四 14:00-16:00、週五 11:00 前">
                @error('contact_time')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block mb-2 font-semibold">您想諮商的議題（可複選）</label>
                <div class="space-y-3">
                    <label class="block">
                        <input type="checkbox" name="topics[]" value="情緒與壓力調適" {{ is_array(old('topics')) && in_array('情緒與壓力調適', old('topics', [])) ? 'checked' : '' }} class="mr-2">
                        1. 情緒與壓力調適
                        <div class="text-xs text-gray-500 ml-6">如焦慮、憂鬱、失眠、生活／工作壓力</div>
                    </label>
                    <label class="block">
                        <input type="checkbox" name="topics[]" value="人際與家庭關係" {{ is_array(old('topics')) && in_array('人際與家庭關係', old('topics', [])) ? 'checked' : '' }} class="mr-2">
                        2. 人際與家庭關係
                        <div class="text-xs text-gray-500 ml-6">如朋友衝突、家庭界限、情緒勒索、原生家庭</div>
                    </label>
                    <label class="block">
                        <input type="checkbox" name="topics[]" value="親密關係與愛情議題" {{ is_array(old('topics')) && in_array('親密關係與愛情議題', old('topics', [])) ? 'checked' : '' }} class="mr-2">
                        3. 親密關係與愛情議題
                        <div class="text-xs text-gray-500 ml-6">如伴侶溝通、失戀分手、開放關係、同志伴侶</div>
                    </label>
                    <label class="block">
                        <input type="checkbox" name="topics[]" value="性諮商與性別議題" {{ is_array(old('topics')) && in_array('性諮商與性別議題', old('topics', [])) ? 'checked' : '' }} class="mr-2">
                        4. 性諮商與性別議題
                        <div class="text-xs text-gray-500 ml-6">如性慾不合、自慰困擾、性取向探索、女性主義觀點</div>
                    </label>
                    <label class="block">
                        <input type="checkbox" name="topics[]" value="自我探索與自信建立" {{ is_array(old('topics')) && in_array('自我探索與自信建立', old('topics', [])) ? 'checked' : '' }} class="mr-2">
                        5. 自我探索與自信建立
                        <div class="text-xs text-gray-500 ml-6">如自我價值、愛情價值觀、生涯方向、情慾探索</div>
                    </label>
                    <label class="block">
                        <input type="checkbox" name="topics[]" value="兒童與青少年議題" {{ is_array(old('topics')) && in_array('兒童與青少年議題', old('topics', [])) ? 'checked' : '' }} class="mr-2">
                        6. 兒童與青少年議題
                        <div class="text-xs text-gray-500 ml-6">如情緒、人際、性別認同、校園適應、網路使用</div>
                    </label>
                    <label class="block">
                        <input type="checkbox" name="topics[]" value="親職教養與家庭互動" {{ is_array(old('topics')) && in_array('親職教養與家庭互動', old('topics', [])) ? 'checked' : '' }} class="mr-2">
                        7. 親職教養與家庭互動
                        <div class="text-xs text-gray-500 ml-6">如教養困擾、與孩子互動、父母角色壓力</div>
                    </label>
                    <label class="block">
                        <input type="checkbox" name="topics[]" value="職場與生涯發展" {{ is_array(old('topics')) && in_array('職場與生涯發展', old('topics', [])) ? 'checked' : '' }} class="mr-2">
                        8. 職場與生涯發展
                        <div class="text-xs text-gray-500 ml-6">如工作倦怠、人際壓力、生涯轉換、生涯規劃</div>
                    </label>
                    <label class="block">
                        <input type="checkbox" name="topics[]" value="其他" {{ is_array(old('topics')) && in_array('其他', old('topics', [])) ? 'checked' : '' }} class="mr-2" id="topic-other-checkbox">
                        9. 其他，請說明
                        <input type="text" name="topic_other" value="{{ old('topic_other') }}" class="ml-2 border rounded px-2 py-1 w-48 @error('topic_other') border-red-500 @enderror" placeholder="請說明">
                    </label>
                </div>
                @error('topics')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
                @error('topic_other')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="flex justify-center mt-8">
                <button type="submit" class="bg-[var(--primary-color)] text-white px-8 py-3 rounded-full font-semibold hover:bg-[var(--primary-light)] transition">送出表單</button>
            </div>
        </form>
    </div>
</div>
@endsection
