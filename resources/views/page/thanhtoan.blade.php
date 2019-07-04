@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{ route('index') }}">Trang chủ</a> / <span><a href="{!! route('list.shopping.cart') !!}">Quay lại giỏ hàng</a></span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        @if (count($errors)>0)
        <div class="row">
            <div class="col-md-12">
               <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {!! $error !!} <br>
                @endforeach
               </div>
            </div>
        </div>   
        @endif
        @if (session('thongbao'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning">
                        {!! session('thongbao') !!}
                </div>
            </div>
        </div>
            
        @endif
        <form action="{!! route('senemail.thanhtoan.cart') !!}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="row">
                @if(Cart::count()>=1)
                <div class="col-sm-6">
                    <h4>Đặt hàng</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" id="name" name="name" placeholder="Họ tên"  >
                    </div>

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="text" id="email" name="email"  placeholder="expample@gmail.com">
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" name="address" id="adress" placeholder="Street Address" >
                    </div>

                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" id="phone" name="phone_number" >
                    </div>
                    <div class="form-block">
                        <label for="phone">Ghi chú*</label>
                        <textarea name="note"  placeholder="Ghi chú" rows="10"></textarea>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                            @foreach ($products as $item)
                            <div class="col-md-12">
                                <!--  one item	 -->
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <img  src="page_asset/image/product/{!! $item->options->image !!}" alt="" class="img-responsive" height="150px">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">Tên sản phẩm: {!! $item->name !!} </div>
                                            <div class="col-md-12">Số lượng: x{!! $item->qty !!}</div>
                                            <div class="col-md-12">Giá:{!! number_format($item->price)  !!} đ</div>
                                        </div>
                                    </div>
                                <!-- end one item -->
                            </div>   
                            @endforeach
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black">{!! Cart::subtotal() !!} đ</h5></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
                        
                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>						
                                </li> 
                            </ul>
                        </div>
                        <div class="text-center"> <button type="submit" class="beta-btn primary">Thanh toán<i class="fa fa-chevron-right"></i></button></div>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Không có sản phẩm nào trong giỏ hàng để thanh toán</h2>
                                </div>
                            </div>
                        
                        @endif
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
<!-- include js files -->
<script src="assets/dest/js/jquery.js"></script>
<script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
<script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
<script src="assets/dest/vendors/animo/Animo.js"></script>
<script src="assets/dest/vendors/dug/dug.js"></script>
<script src="assets/dest/js/scripts.min.js"></script>
<!--customjs-->
<script type="text/javascript">
$(function() {
    // this will get the full URL at the address bar
    var url = window.location.href;

    // passes on every "a" tag
    $(".main-menu a").each(function() {
        // checks if its the same on the address bar
        if (url == (this.href)) {
            $(this).closest("li").addClass("active");
            $(this).parents('li').addClass('parent-active');
        }
    });
});   


</script>
<script>
 jQuery(document).ready(function($) {
            'use strict';
            
// color box

//color
  jQuery('#style-selector').animate({
  left: '-213px'
});

jQuery('#style-selector a.close').click(function(e){
  e.preventDefault();
  var div = jQuery('#style-selector');
  if (div.css('left') === '-213px') {
    jQuery('#style-selector').animate({
      left: '0'
    });
    jQuery(this).removeClass('icon-angle-left');
    jQuery(this).addClass('icon-angle-right');
  } else {
    jQuery('#style-selector').animate({
      left: '-213px'
    });
    jQuery(this).removeClass('icon-angle-right');
    jQuery(this).addClass('icon-angle-left');
  }
});
            });
</script>
    
@endsection
