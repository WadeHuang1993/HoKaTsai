@extends('adminlte::page')

@section('title', '課程講座管理')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>課程講座管理</h1>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> 新增課程
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
                        <th>課程標題</th>
                        <th>開始時間</th>
                        <th>結束時間</th>
                        <th>地點</th>
                        <th>講師</th>
                        <th>報名狀態</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->start_date->format('Y-m-d H:i') }}</td>
                            <td>{{ $course->end_date->format('Y-m-d H:i') }}</td>
                            <td>{{ $course->location }}</td>
                            <td>{{ $course->teamMember->name }}</td>
                            <td>
                                @if($course->show_in_homepage)
                                    <span class="badge badge-success">是</span>
                                @else
                                    <span class="badge badge-secondary">否</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i> 編輯
                                </a>
                                <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('確定要刪除這個課程嗎？')">
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
            {{ $courses->links() }}
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
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Chinese-traditional.json"
                }
            });
        });
    </script>
@stop
