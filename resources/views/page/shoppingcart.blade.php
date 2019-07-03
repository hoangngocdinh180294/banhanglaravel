@extends('master')

@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Giỏ Hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{!! route('index') !!}">Home</a> / <span>Giỏ hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<div class="table-responsive">
				<!-- Shop Products Table -->
				@if (session('thongbao'))
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-danger">
							{!! session('thongbao') !!}
						</div>
					</div>
				</div>		
				@endif

				@if (Cart::count()>=1)
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
                            <th class="product-name">STT</th>
                            <th class="product-name">Tên sản phẩm</th>
                            <th class="product-image">Hình ảnh</th>
							<th class="product-price">Giá</th>
							<th class="product-quantity">Số lượng</th>
							<th class="product-subtotal">Thành tiền</th>
							<th class="product-remove">Thao tác</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($products as $item)
						<tr class="cart_item">
                            <td>{{ $loop->index+1 }}</td>
							<td class="product-name">
								<div class="media">
									<img class="pull-left" src="assets/dest/images/shoping1.jpg" alt="">
									<div class="media-body">
										<p class="font-large table-title">{!! $item->name !!}</p>
									</div>
								</div>
                            </td>
                            <td class="product-status">
                                    <img src="page_asset/image/product/{!! $item->options->image !!}" alt="" width="150px" height="150px">
                            </td>

							<td class="product-price">
								<span class="amount" >{!! number_format($item->price) !!} đ</span>
							</td>
							
							<form action="{!! route('update.shopping.cart',$item->rowId) !!}" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
							<td>
                                <input class="form-control" type="number" name="qty" value="{!! number_format($item->qty) !!}"  >
                                <button type="submit" class="beta-btn primary" name="update">Chỉnh sửa <i class="fa fa-chevron-right" ></i></button> 
							</td>
							</form>

							<td class="product-subtotal">
								<span class="amount" >{!! $item->price*$item->qty !!} đ</span>
							</td>

							<td class="product-remove">
                                <a href="{!! route('delete.shopping.cart',['id'=>$item->rowId]) !!}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
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
					<div class="cart-totals-row"><h5 class="cart-total-title">Đơn hàng</h5></div>
					<div class="cart-totals-row"><span>Tổng tiền:</span> <span>{!! Cart::subtotal() !!} đ</span></div>
                    <div class="cart-totals-row"><span>Tiền Ship:</span> <span>Free </span></div>
					<a href="{{ route('list.thanhtoan.cart') }}" class="beta-btn primary" name="update_cart" >Thanh Toán<i class="fa fa-chevron-right"></i></a> 
					<a href="{!! url('shopping/delete/all') !!}" class="beta-btn primary" name="update_cart" >Xóa hết<i class="fa fa-trash-o"></i></i></a> 
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- End of Cart Collaterals -->
				<div class="clearfix"></div>
				@else
				<div class="row">
					<div class="col-md-6 col-md-offset-4">
						<div >
							<h2>Giỏ hàng rỗng</h2>
						</div>
					</div>
				</div>
				@endif
		</div> <!-- #content -->
	</div> <!-- .container -->
    
@endsection