@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hóa Đơn
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
                    @if (session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Tên Khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tổng tiền</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết đơn hàng</th>
                        <th>Thay đổi trạng thái</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bills as $item)
                    <tr class="odd gradeX" >
                            <td style="font-size:11px">{!! $loop->index +1 !!}</td>
                            <td style="font-size:11px">{!! $item->customer->name !!}</td>
                            <td style="font-size:11px">{!! $item->customer->address !!}</td>
                            <td style="font-size:11px">{!! $item->date_order !!}</td>
                            <td style="font-size:11px">{!!number_format($item->total)  !!} đ</td>
                            <td style="font-size:11px">{!! $item->customer->email !!}</td>
                            <th style="font-size:11px">{!! $item->options !!}</th>
                            <td class="center" style="font-size:11px"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('bill_details.index',['id'=>$item->id]) !!}">Xem</a></td>
                            <td class="center" style="font-size:11px"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('bill.edit',['id'=>$item->id]) !!}">Edit</a></td>
                            <td class="center" style="font-size:11px"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! route('bill.delete',['id'=>$item->id]) !!}"> Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection