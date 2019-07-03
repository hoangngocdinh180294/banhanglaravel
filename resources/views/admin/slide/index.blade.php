@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slider
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
                        <th>Link</th>
                        <th>Ảnh</th>
                        <th>Ngày đăng</th>
                        <th>Ngày sửa</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slide as $sl)
                    <tr class="odd gradeX" >
                            <td>{!! $loop->index+1 !!}</td>
                            <td>{!! $sl->link !!}</td>
                            <td>
                            <img width="150px" src="page_asset/image/slide/{!! $sl->image !!}" />
                            </td>
                            <td>{!! $sl->created_at !!}</td>
                            <td>{!! $sl->updated_at !!}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('slide.edit',['id'=>$sl->id]) !!}">Edit</a></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('slide.delete',['id'=>$sl->id]) }}"> Delete</a></td>
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
