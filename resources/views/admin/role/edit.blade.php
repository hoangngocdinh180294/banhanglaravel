@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Các quyền
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>      
                @endif
                
                <form action="{!! route('role.update',['id'=>$roles->id]) !!}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="name" placeholder="Nhập họ và tên" value="{!! $roles->name !!}" />
                    </div>
                    <div class="form-group">
                        <label>Chức năng quyền</label>
                        <input type="text" class="form-control" name="display_name" placeholder="Nhập Email" value="{!! $roles->display_name !!}" />
                    </div>

                            @foreach ($permission as $item)
                                <div class="form-check">      
                                    <input 
                                    {!! $listPermissionOfRole->contains($item->id) ? 'checked' : '' !!} 
                                    type="checkbox"
                                    class="form-check-input" name="permission[]" value="{!! $item->id !!}">
                                    <label class="form-check-label" for="exampleCheck1">{!! $item->display_name !!}</label>
                                </div>
                            @endforeach                 
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm Mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
