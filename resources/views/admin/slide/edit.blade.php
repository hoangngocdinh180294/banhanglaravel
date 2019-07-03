@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slider
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
                    <form action="{!! route('slide.update',['id'=>$slide->id]) !!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                            <label>Link</label>
                            <input type="text" class="form-control" name="link" value="{!! $slide->link !!}" />
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <p><img width="300px" src="page_asset/image/slide/{{$slide->image}}"></p>
                            <input type="file" class="form-control" name="image"   />
                        </div>
    
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection