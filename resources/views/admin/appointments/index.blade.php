@extends('adminlte::page')

@section('title', '預約管理')

@section('content_header')
    <h1>預約管理</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>稱呼</th>
                        <th>電子信箱</th>
                        <th>電話號碼</th>
                        <th>諮商心理師</th>
                        <th>預約時間</th>
                        <th>方便聯繫時段</th>
                        <th>諮商議題</th>
                        <th>建立時間</th>
                        <th width="100px">處理狀態</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->counselor }}</td>
                            <td>{{ $item->time }}</td>
                            <td>{{ $item->contact_time }}</td>
                            <td>
                                @if(is_array($item->topics))
                                    {{ implode(', ', $item->topics) }}
                                @else
                                    {{ $item->topics }}
                                @endif
                            </td>
                            <td>{{ $item->created_at ? $item->created_at->format('Y-m-d H:i') : '' }}</td>
                            <td class="status-td" style="{{ $item->status === 'done' ? 'background-color: #d1fae5;' : '' }}">
                                <form action="{{ route('admin.appointments.updateStatus', $item->_id) }}" method="POST" class="form-inline formStatus" data-id="{{ $item->_id }}">
                                    @csrf
                                    @method('PATCH')
                                    <label class="mr-2">
                                        <input type="radio" name="status" value="pending" {{ $item->status !== 'done' ? 'checked' : '' }}> 待處理
                                    </label>
                                    <label>
                                        <input type="radio" name="status" value="done" {{ $item->status === 'done' ? 'checked' : '' }}> 已處理
                                    </label>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('admin.appointments.destroy', $item->_id) }}" method="POST" onsubmit="return confirm('確定要刪除這筆預約嗎？')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $appointments->links() }}
        </div>
    </div>
@stop
@section('js')
<script>
    document.querySelectorAll('.formStatus input[type=radio]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            var form = radio.closest('form');
            var url = form.action;
            var formData = new FormData(form);

            // 依 radio 狀態切換 td 顏色
            var td = form.closest('td');
            if(form.querySelector('input[value=done]').checked) {
                td.style.backgroundColor = '#d1fae5';
            } else {
                td.style.backgroundColor = '';
            }

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': form.querySelector('[name=_token]').value,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // 建立與 Laravel session flash message 相同結構的訊息
                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-success alert-dismissible fade show';
                    alertDiv.innerHTML = `
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> 成功！</h5>
                        ${data.message || '狀態已更新'}
                    `;
                    
                    // 插入到頁面頂部
                    const contentHeader = document.querySelector('.content-header');
                    if (contentHeader) {
                        contentHeader.insertAdjacentElement('afterend', alertDiv);
                    }
                }
            });
        });
    });
</script>
@endsection
