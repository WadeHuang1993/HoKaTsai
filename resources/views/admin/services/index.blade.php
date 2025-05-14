@extends('adminlte::page')

@section('title', '諮商服務管理')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>諮商服務管理</h1>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> 新增服務項目
        </a>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> 成功！</h5>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 50px">排序</th>
                                    <th style="width: 100px">圖片</th>
                                    <th>標題</th>
                                    <th>描述</th>
                                    <th style="width: 150px">操作</th>
                                </tr>
                            </thead>
                            <tbody id="sortable">
                                @foreach($services as $service)
                                    <tr data-id="{{ $service->_id }}">
                                        <td class="text-center">
                                            <i class="fas fa-grip-vertical handle" style="cursor: move"></i>
                                        </td>
                                        <td>
                                            @if($service->image)
                                                <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" class="img-thumbnail" style="max-height: 50px;">
                                            @else
                                                <span class="text-muted">無圖片</span>
                                            @endif
                                        </td>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ Str::limit($service->description, 100) }}</td>
                                        <td>
                                            <a href="{{ route('admin.services.edit', $service->_id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i> 編輯
                                            </a>
                                            <form action="{{ route('admin.services.destroy', $service->_id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('確定要刪除此服務項目嗎？')">
                                                    <i class="fas fa-trash"></i> 刪除
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.css">
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script>
        $(document).ready(function() {
            new Sortable(document.getElementById('sortable'), {
                handle: '.handle',
                animation: 150,
                onEnd: function(evt) {
                    let items = [];
                    $('#sortable tr').each(function(index) {
                        items.push({
                            id: $(this).data('id'),
                            order: index
                        });
                    });

                    $.ajax({
                        url: '{{ route("admin.services.update-order") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            items: items
                        },
                        success: function(response) {
                            toastr.success('排序已更新');
                        },
                        error: function() {
                            toastr.error('更新排序失敗');
                        }
                    });
                }
            });
        });
    </script>
@stop
