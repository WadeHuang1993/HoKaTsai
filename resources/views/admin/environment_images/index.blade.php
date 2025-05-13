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
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>圖片</th>
                        <th>標題</th>
                        <th>描述</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($images as $img)
                        <tr>
                            <td>
                                <img src="{{ $img->image ? Storage::url($img->image) : '/images/no-image.png' }}" alt="{{ $img->title }}" style="max-width: 800px; height: auto;">
                            </td>
                            <td>{{ $img->title }}</td>
                            <td>{{ $img->description }}</td>
                            <td>
                                <a href="{{ route('admin.environment-images.edit', $img->_id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i> 編輯
                                </a>
                                <form action="{{ route('admin.environment-images.destroy', $img->_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('確定要刪除這張照片嗎？')">
                                        <i class="fas fa-trash"></i> 刪除
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $images->links() }}
        </div>
    </div>
@stop
