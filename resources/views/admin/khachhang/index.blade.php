@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách hàng
                    <small>Danh sách </small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if (session('thongbao'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            {!! session('thongbao') !!}
                        </div>
                    </div>
                </div> 
            @endif
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ghi chú</th>
                        <th>Ngày mua hàng</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($khachhang as $item) 
                    <tr class="odd gradeX" >
                        <td>{!! $loop->index +1 !!}</td>
                        <td>{!! $item->name !!}</td>
                        <td>{!! $item->email !!}</td>
                        <td>{!! $item->address !!}</td>
                        <td>0{!! $item->phone_number!!}</td>
                        <td>{!! $item->note !!}</td>
                        <th>{!! $item->created_at !!}</th>        
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! route('khachhang.delete',['id'=>$item->id]) !!}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
