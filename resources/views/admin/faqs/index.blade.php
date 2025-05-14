@extends('adminlte::page')

@section('title', 'FAQ 管理')

@section('content_header')
    <h1>FAQ 管理</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">FAQ 列表</h3>
                    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> 新增 FAQ
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('admin.faqs.order') }}" method="POST">
                        @csrf
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 60px">順序</th>
                                    <th>問題</th>
                                    <th>狀態</th>
                                    <th style="width: 180px">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($faqs as $faq)
                                    <tr>
                                        <td>
                                            <input type="number" name="orders[{{ $faq->_id }}]" value="{{ $faq->order }}" class="form-control form-control-sm" style="width:70px;">
                                        </td>
                                        <td>{{ $faq->question }}</td>
                                        <td>
                                            @if($faq->status)
                                                <span class="badge badge-success">顯示</span>
                                            @else
                                                <span class="badge badge-secondary">隱藏</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.faqs.edit', $faq->_id) }}" class="btn btn-info btn-sm">編輯</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">儲存順序</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
