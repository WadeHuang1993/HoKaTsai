@extends('adminlte::page')

@section('title', '諮商費用管理')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>諮商費用管理</h1>
        <a href="{{ route('admin.service-fees.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> 新增收費項目
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
            <form action="{{ route('admin.service-fees.updateOrder') }}" method="POST" class="formUpdateOrder">
                @csrf
                @method('PATCH')
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>標題</th>
                            <th>副標題</th>
                            <th>說明</th>
                            <th>價格區間</th>
                            <th>排序(數字小優先)</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fees as $fee)
                            <tr>
                                <td>{{ $fee->title }}</td>
                                <td>{{ $fee->subtitle }}</td>
                                <td>{{ $fee->description }}</td>
                                <td>{{ $fee->price }}</td>
                                <td>
                                    <input type="number" name="orders[{{ $fee->_id }}]" value="{{ $fee->order ?? 0 }}" class="form-control" style="width: 80px;">
                                </td>
                                <td>
                                    <a href="{{ route('admin.service-fees.edit', $fee->_id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i> 編輯
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" class="text-right">
                                <button type="button" class="btn btn-success btnUpdateOrder">儲存排序</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.btnUpdateOrder').addEventListener('click', function() {
            document.querySelector('.formUpdateOrder').submit();
        });
    });
</script>
@endsection 