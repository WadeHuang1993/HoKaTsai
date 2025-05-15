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
                        <th>處理狀態</th>
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
                            <td>
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
            form.submit();
        });
    });
</script>
@endsection 