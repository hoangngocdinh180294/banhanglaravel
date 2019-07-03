@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm
                        <small>Thêm</small>
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
                    
                    <form action="{!! route('product.store') !!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name"  />
                        </div>
                        <div class="form-group">
                                <label>Mô tả</label>
                                <input type="text" class="form-control" name="description"  />
                        </div>
                        <div class="form-group">
                                <label>Giá gốc</label>
                                <input type="text" class="form-control" name="unit_price"  />
                        </div>
                        <div class="form-group">
                                <label>Giá khuyến mãi</label>
                                <input type="text" class="form-control" name="promotion_price" />
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="image"   />
                        </div>
                        <div class="form-group">
                                <label>Chủng loại</label>
                                <input type="text" class="form-control" name="unit"  />
                        </div>
                        <select  class="form-control"  name="typeproduct_id" >
                            @foreach ($typeproduct as $item)
                            <option 
                            value="{!! $item->id !!}">
                            {!! $item->name !!}
                            </option>
                            @endforeach
                                    
                         </select>
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