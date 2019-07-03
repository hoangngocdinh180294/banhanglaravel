@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Liên hệ
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
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lienhe as $item)
                        <tr class="odd gradeX">
                            <td>{!! $loop->index +1 !!}</td>
                            <td>{!! $item->name !!}</td>
                            <td>{!! $item->email !!}</td>
                            <td>{!! $item->title!!}</td>
                            <td>{!! $item->noidung !!} VNĐ</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                        href="{!! route('lienhekhachhang.delete',['id'=>$item->id]) !!}"> Delete</a>
                            </td>
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