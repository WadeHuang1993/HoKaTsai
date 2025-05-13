@extends('adminlte::page')

@section('title', '諮商專欄管理')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>諮商專欄管理</h1>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> 新增專欄
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th>標題</th>
                        <th style="width: 100px">標籤</th>
                        <th style="width: 100px">狀態</th>
                        <th style="width: 120px">建立日期</th>
                        <th style="width: 120px">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->tag }}</td>
                            <td>
                                @if($article->status)
                                    <span class="badge badge-success">已發布</span>
                                @else
                                    <span class="badge badge-secondary">草稿</span>
                                @endif
                            </td>
                            <td>{{ $article->created_at->format('Y-m-d H:i:s') }}</td>
                            <td>
                                <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i> 編輯
                                </a>
                                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('確定要刪除這個專欄嗎？')">
                                        <i class="fas fa-trash"></i> 刪除
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">暫無資料</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .table th {
            background-color: #f4f6f9;
        }
    </style>
@stop

@section('js')
    <script>
        // 如果有成功訊息，顯示提示
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '成功！',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        @endif

        // 如果有錯誤訊息，顯示提示
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: '錯誤！',
                text: '{{ session('error') }}',
                showConfirmButton: true
            });
        @endif
    </script>
@stop
