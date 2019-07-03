@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Đăng nhập thành công</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3> Bạn đã <kbd> đăng nhập</kbd> thành công ! </h3>
                    <h4>Vui lòng thực hiện đúng chức năng của mình.</h4>
                    <div class="col-md-2" style="float: right; padding-bottom:20px ">
                        <a href="{{route('user.index')}}"><button type="button" class="btn btn-danger">Xác Nhận</button></a>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
