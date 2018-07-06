@extends('admin.layout.header');
@section('layout')

<table class="table table-bordered">
    

    
    <tr>
        <th class="col-md-1">ID</th>
        <th class="col-md-1">图片名称</th>
        <th class="col-md-1">图片链接</th>
        <th class="col-md-1">图片</th>
        <th class="col-md-1">操作</th>
    </tr>
        @foreach($banner as $k=>$v)
    <tr>
        <td>{{ $v->id }}</td>
        <td>{{ $v->name }}</td>
        <td>{{ $v->url }}</td>
        <td><img src="{{ $v->pic }}" style="width:120px;height: 150px;"/></td> 
        <td>
            <form action="/admin/banner/destroy/{{ $v->id }}" method='get' style='display:inline'>
                        
                {{csrf_field()}}

                {{method_field('DELETE')}}
                <button class='btn btn-danger btn-lg"'>删除</button>
                
            </form>
                <button type="submit" class="btn btn-Info btn-lg"><a href="/admin/banner/edit/{{$v->id}}">修改</a></button>
            
        </td>
    </tr>
        @endforeach
    
</table>
<div class="dataTables_paginate paging_full_numbers" id="paginate">

    {!! $banner->links() !!}
   
</div>

@endsection
