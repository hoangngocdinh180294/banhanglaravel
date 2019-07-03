@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Liên hê</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{!! route('index') !!}">Trang chủ</a> / <span>Liên hệ</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="beta-map">

        <div class="abs-fullwidth beta-map wow flipInX">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.2808454903247!2d105.71981981437887!3d21.061442392038916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134545178082797%3A0x6e6eeb4f8b0ac035!2zQ8OieSBYxINuZyBMYWkgWMOh!5e0!3m2!1svi!2s!4v1558856055709!5m2!1svi!2s"
                    width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">

            <div class="space50">&nbsp;</div>
            <div class="row">
                <div class="col-sm-8">
                    <h2>Mời bạn điền thông tin </h2>
                    <div class="space20">&nbsp;</div>
                    <p>Chúng tôi rất vui khi nhận được những thông tin phản hồi của khách hàng, để cửa hàng ngày càng
                        nâng cao chất lượng phục vụ.</p>
                    <div class="space20">&nbsp;</div>
                    @if (count($errors)>0)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-danger ">
                                    @foreach ($errors->all() as $error)
                                        {!! $error !!} <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('thongbao'))
                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-success">
                                    {!! session('thongbao') !!}
                                </div>
                            </div>
                        </div>
                    @endif
                    <form action="{!! route('postlienhe') !!}" method="post" class="contact-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-block">
                            <input name="name" type="text" placeholder="Họ tên (required)">
                        </div>
                        <div class="form-block">
                            <input name="email" type="email" placeholder=" Email (required)">
                        </div>
                        <div class="form-block">
                            <input name="title" type="text" placeholder="Tiêu đề">
                        </div>
                        <div class="form-block">
                            <textarea name="noidung" placeholder="Nội dung"></textarea>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="beta-btn primary">Gửi tin nhắn <i
                                        class="fa fa-chevron-right"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4">
                    <h2>Thông tin liên hệ</h2>
                    <div class="space20">&nbsp;</div>

                    <h6 class="contact-title">Địa chỉ</h6>
                    <p>
                        Đại học Công nghiệp Hà Nội,<br>
                        62 Nguyên Xá,<br>
                        Bắc Từ Liêm
                    </p>
                    <div class="space20">&nbsp;</div>
                    <h6 class="contact-title">Cơ sở 2</h6>
                    <p>
                        Ngõ 2, <br>
                        Phạm Văn Đồng. <br>
                        <a href="mailto:biz@betadesign.com">hoangngocdinh180294@gmail.com</a>
                    </p>
                    <div class="space20">&nbsp;</div>
                    <h6 class="contact-title">Cơ sở 3</h6>
                    <p>
                        Đống Đa Hà-Nội <br>
                        Đối diện cây xăng. <br>
                        <a href="hr@betadesign.com">hoangbich@gmail.com</a>
                    </p>
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection