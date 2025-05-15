@extends('adminlte::page')
@section('title', '合作單位與合作方案')
@section('content_header')
    <h1>合作單位與合作方案</h1>
@endsection
@section('content')
<div class="mb-3">
    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">新增合作單位</a>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.partners.updateOrder') }}" method="POST" class="formUpdateOrder">
            @csrf
            @method('PATCH')
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>排序</th>
                        <th>Logo</th>
                        <th>名稱</th>
                        <th>介紹</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partners as $partner)
                        <tr>
                            <td>
                                <input type="number" name="orders[{{ $partner->_id }}]" value="{{ $partner->order ?? 0 }}" class="form-control" style="width: 80px;">
                            </td>
                            <td>
                                @if($partner->logo)
                                    <img src="{{ Storage::url($partner->logo) }}" alt="logo" style="height:40px;max-width:80px;">
                                @endif
                            </td>
                            <td>{{ $partner->name }}</td>
                            <td style="max-width:300px;">{{ Str::limit($partner->description, 60) }}</td>
                            <td>
                                <a href="{{ route('admin.partners.edit', $partner->_id) }}" class="btn btn-sm btn-info">編輯</a>
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
    </div>
    <div class="card-footer">
        {{ $partners->links() }}
    </div>
</div>
@endsection
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.btnUpdateOrder').addEventListener('click', function() {
            document.querySelector('.formUpdateOrder').submit();
        });
    });
</script>
@endsection
