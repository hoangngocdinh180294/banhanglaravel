@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hóa đơn
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
                    
                    <form action="{!! route('bill.update',['id'=>$bills->id]) !!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Tên khách hàng</label>
                            <input type="text" class="form-control" name="name" value="{!! $bills->customer->name !!}"   readonly/>
                        </div>
                        <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="address" value="{!! $bills->customer->address !!}"   readonly/>
                        </div>
                        <div class="form-group">
                                <label>Ngày đặt hàng</label>
                                <input type="text" class="form-control" name="date_order" value="{!! $bills->date_order !!}"   readonly/>
                        </div>
                        <div class="form-group">
                                <label>Tổng tiền</label>
                                <input type="text" class="form-control" name="total" value="{!! $bills->total !!}"  readonly/>
                        </div>
                        <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{!! $bills->customer->email !!}" readonly  />
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <input type="text" class="form-control" name="options" value="{!! $bills->options !!}"  />
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