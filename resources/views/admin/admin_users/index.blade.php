@extends('adminlte::page')

@section('title', '管理員帳號設定')

@section('content_header')
    <h1>管理員帳號設定</h1>
@stop

@section('content')
    <div class="mb-3">
        <a href="{{ route('admin.admin-users.create') }}" class="btn btn-primary">新增管理員</a>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('admin.admin-users.edit', $user->_id) }}" class="btn btn-sm btn-info">編輯</a>
                                <form action="{{ route('admin.admin-users.destroy', $user->_id) }}" method="POST" class="d-inline" onsubmit="return confirm('確定要刪除這個管理員帳號嗎？')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>
@stop 