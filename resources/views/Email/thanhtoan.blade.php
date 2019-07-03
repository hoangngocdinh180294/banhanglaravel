
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BetaDesign &mdash; Shopping Cart</title>
    <base href="{!! asset('') !!}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="page_asset/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="page_asset/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" title="style" href="page_asset/assets/dest/css/style.css">
	<link rel="stylesheet" href="page_asset/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="page_asset/assets/dest/css/huong-style.css">
</head>
<body>
	<h2>Tên khách hang: {!! $name !!}</h2>
    <br>
    <h2>Địa chi: {!! $diachi !!}</h2>
    <br>
    <h2>Số điện thoai:{!! $phone !!} </h2>
    <br>

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đơn hàng</h6>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">STT</th>
							<th class="product-price">Tên sản phẩm</th>
							<th class="product-status">Hình ảnh</th>
							<th class="product-quantity">Đơn giá</th>
							<th class="product-subtotal">Số lượng</th>
							<th class="product-remove">Thành tiền</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($cart as $item)
                    <tr class="cart_item">
                        <td>{!! $loop->index+1 !!}</td>
                        <td class="product-name">
                            <div class="media">
                                <div class="media-body">
                                    {!! $item->name !!}
                                </div>
                            </div>
                        </td>
                        <td class="product-status">
                            <img src="page_asset/image/product/{!! $item->options->image !!}" alt="">
                        </td>
                        <td class="product-price">
                            <span class="amount">{!! $item->price !!}</span>
                        </td>
                        <td class="product-quantity">
                                {!! $item->qty !!}
                        </td>
                        <td class="product-subtotal">
                            <span class="amount">{!! $item->price*$item->qty !!}</span>
                        </td>
                    </tr>
                    @endforeach
					</tbody>
				</table>
				<!-- End of Shop Table Products -->
			</div>

			<!-- Cart Collaterals -->
			<div class="cart-collaterals">


				<div class="cart-totals pull-right">
					<div class="cart-totals-row"><h5 class="cart-total-title">Thông tin</h5></div>
					<div class="cart-totals-row"><span>Cart Subtotal:</span> <span>{!! $total !!}</span></div>
					<div class="cart-totals-row"><span>Shipping:</span> <span>Free Shipping</span></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>

		</div> <!-- #content -->
	</div> <!-- .container -->




	<!-- include js files -->
	<script src="page_asset/assets/dest/js/jquery.js"></script>
	<script src="page_asset/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="page_asset/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="page_asset/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="page_asset/assets/dest/vendors/animo/Animo.js"></script>
	<script src="page_asset/assets/dest/vendors/dug/dug.js"></script>
	<script src="page_asset/assets/dest/js/scripts.min.js"></script>
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
</body>
</html>

