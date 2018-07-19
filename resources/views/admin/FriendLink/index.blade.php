@extends('admin.layout.header');
@section('layout')

<table class="table table-bordered">
    
    <tr>
        <th class="col-md-2">ID</th>
        <th class="col-md-4">链接名称</th>
        <th class="col-md-4">链接地址</th>
        <th class="col-md-2">操作</th>
    </tr>
        @foreach($flink as $k=>$v)
    <tr>
        <td>{{ $v->id }}</td>
        <td>{{ $v->name }}</td>
        <td>{{ $v->url }}</td>
        <td>
            <form action="/admin/friendlink/destroy/{{ $v->id }}" method='get' style='display:inline'>
                        
                {{csrf_field()}}

                {{method_field('DELETE')}}
                <button class='btn btn-danger btn-lg'>删除</button>
            </form>
                <button type="submit" class="btn btn-Info btn-lg"><a href="/admin/friendlink/edit/{{$v->id}}">修改</a></button>
            
        </td>
    </tr>
        @endforeach
    
</table>
<div class="dataTables_paginate paging_full_numbers" id="paginate">

    {!! $flink->links() !!}
   
</div>

@endsection
