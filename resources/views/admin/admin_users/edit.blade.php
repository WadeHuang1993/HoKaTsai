@extends('adminlte::page')

@section('title', '編輯管理員帳號')

@section('content_header')
    <h1>編輯管理員帳號</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.admin-users.update', $admin_user->_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $admin_user->email) }}" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">新密碼（不修改可留空）</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">密碼確認</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">更新</button>
                <a href="{{ route('admin.admin-users.index') }}" class="btn btn-secondary">返回</a>
            </form>
        </div>
    </div>
@stop 