@extends('adminlte::page')

@section('title', '環境照片管理')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>環境照片管理</h1>
        <a href="{{ route('admin.environment-images.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> 新增照片
        </a>
    </div>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.environment-images.updateOrder') }}" method="POST" class="formUpdateOrder">
                @csrf
                @method('PATCH')
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>圖片</th>
                            <th>標題</th>
                            <th>描述</th>
                            <th>首頁露出順序(數字小優先）</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($images as $img)
                            <tr>
                                <td>
                                    <img src="{{ $img->image ? Storage::url($img->image) : '/images/no-image.png' }}" alt="{{ $img->title }}" style="max-width: 200px; height: auto;">
                                </td>
                                <td>{{ $img->title }}</td>
                                <td>{{ $img->description }}</td>
                                <td>
                                    <input type="number" name="orders[{{ $img->_id }}]" value="{{ $img->order ?? 0 }}" class="form-control" style="width: 80px;">
                                </td>
                                <td>
                                    <a href="{{ route('admin.environment-images.edit', $img->_id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i> 編輯
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger btnDeleteImage" data-id="{{ $img->_id }}">
                                        <i class="fas fa-trash"></i> 刪除
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" class="text-right">
                                <button type="button" class="btn btn-success btnUpdateOrder">儲存排序</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            @foreach($images as $img)
                <form action="{{ route('admin.environment-images.destroy', $img->_id) }}" method="POST" class="d-none formDeleteImageForm" id="delete-form-{{ $img->_id }}">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach
        </div>
        <div class="card-footer">
            {{ $images->links() }}
        </div>
    </div>
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.btnUpdateOrder').addEventListener('click', function() {
            document.querySelector('.formUpdateOrder').submit();
        });
        document.querySelectorAll('.btnDeleteImage').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var id = btn.getAttribute('data-id');
                if(confirm('確定要刪除這張照片嗎？')) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        });
    });
</script>
@endsection
