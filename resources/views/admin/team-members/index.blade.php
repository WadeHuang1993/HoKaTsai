@extends('adminlte::page')

@section('title', '團隊成員管理')

@section('content_header')
    <h1>團隊成員管理</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">團隊成員列表</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> 新增團隊成員
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>照片</th>
                                <th>姓名</th>
                                <th>職稱</th>
                                <th>在首頁顯示</th>
                                <th style="width: 200px">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teamMembers as $member)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($member->image)
                                        <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}" class="img-thumbnail" style="max-width: 100px;">
                                    @else
                                        <span class="text-muted">無照片</span>
                                    @endif
                                </td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->title }}</td>
                                <td>
                                    @if($member->show_in_homepage)
                                        <span class="badge badge-success">啟用</span>
                                    @else
                                        <span class="badge badge-danger">停用</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.team-members.edit', $member) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i> 編輯
                                    </a>
                                    <form action="{{ route('admin.team-members.destroy', $member) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('確定要刪除此團隊成員嗎？')">
                                            <i class="fas fa-trash"></i> 刪除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $teamMembers->links() }}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Chinese-traditional.json"
                }
            });
        });
    </script>
@stop
