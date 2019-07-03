@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Giới thiệu
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
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Nội Dung</th>
                            <th>Ngày đăng</th>
                            <th>Ngày sửa</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gioithieu as $item)
                            <tr class="odd gradeX" >
                                <td>{!! $loop->index+1 !!}</td>
                                <td>{!! $item->name !!}</td>
                                <td>
                                <img width="150px" height="100px" src="page_asset/image/gioithieu/{!! $item->image !!}" />
                                </td>
                                <td>{!! $item->title !!}</td>
                                <td>{!! $item->created_at !!}</td>
                                <td>{!! $item->updated_at !!}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('gioithieukhachhang.edit',['id'=>$item->id]) !!}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! route('gioithieukhachhang.delete',['id'=>$item->id]) !!}"> Delete</a></td>
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