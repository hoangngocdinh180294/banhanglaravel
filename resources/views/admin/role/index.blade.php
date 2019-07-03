        @extends('admin.layout.index')
        @section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhóm Quyền
                            <small>Danh sách Nhóm quyền</small>
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
                                <th>Name</th>
                                <th>Nhóm QUyền</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $item) 
                            <tr class="odd gradeX" >
                                <td>{!! $loop->index +1 !!}</td>
                                <td>{!! $item->name !!}</td>
                                <td>{!! $item->display_name !!}</td>
                                <th>{!! $item->created_at !!}</th>
                                <th>{!! $item->updated_at !!}</th>           
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('role.edit',['id'=>$item->id]) !!}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! route('role.delete',['id'=>$item->id]) !!}">Delete</a></td>
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
