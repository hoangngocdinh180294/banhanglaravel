@extends('admin.layout.index')
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-lg-8 col-md-offset-3">
                        <div class="container123  col-md-6" style="">
                            <h4></h4>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="col-md-4">Chi tiết hóa đơn</th>
                                    <th class="col-md-6"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Thông tin người đặt hàng</td>
                                    <td>{!! $bills->customer->name !!}</td>
                                </tr>
                                <tr>
                                    <td>Ngày đặt hàng</td>
                                    <td>{!! $bills->date_order !!}</td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td>{!! $bills->customer->phone_number !!}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>{!! $bills->customer->address !!}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{!! $bills->customer->email !!}</td>
                                </tr>
                                <tr>
                                    <td>Tình trạng</td>
                                    <td>{!! $bills->options !!}</td>
                                </tr>
                                <tr>
                                    <td>Ghi chú</td>
                                    <td>{!! $bills->customer->note !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <table id="myTable" class="table table-bordered table-hover dataTable" role="grid"
                               aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting col-md-1">STT</th>
                                <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                                <th class="sorting col-md-2">Số lượng</th>
                                <th class="sorting col-md-2">Đơn giá</th>
                                <th class="sorting col-md-2">Thành tiền</th>

                            </thead>
                            <tbody>
                            @foreach ($customers as $item)
                                <tr>
                                    <td>{!! $loop->index+1 !!}</td>
                                    <td>{!! $item->product->name !!}</td>
                                    <td>{!! $item->quantily !!}</td>
                                    <td>{!!number_format($item->price)  !!} đ</td>
                                    <td>{!!number_format($item->price*$item->quantily)  !!} đ</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"><b>Tổng tiền</b></td>
                                <td colspan="3"><b class="text-red">{!!number_format($bills->total)  !!} đ</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection