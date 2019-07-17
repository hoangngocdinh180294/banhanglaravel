@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{!! route('index') !!}">Home</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach ($loaisanpham as $item)
                        <li><a href="{!! route('loaisanpham',['id'=>$item->id]) !!}">{!! $item->name !!}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {!! count($loaisanphammoi) !!} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                                @foreach ($loaisanphammoi as $item)
								<div class="col-sm-3">
										<div class="single-item">
											@if ($item->promotion_price!=0 )
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											<div class="single-item-header">
												<a href="{!! route('chitietloaisanpham',['id'=>$item->id]) !!}"><img src="page_asset/image/product/{!! $item->image !!}" alt="" height="200px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{!! $item->name !!}</p>
												<p class="single-item-price">
													@if ($item->promotion_price==0)
														<span class="text-center" style="font-size:18px">{!! number_format($item->unit_price)  !!} đ</span>
													@else
													<span class="flash-del" style="font-size:18px">{!! number_format($item->unit_price) !!} đ</span>
													<span class="flash-sale" style="font-size:18px">{!! number_format($item->promotion_price)!!} đ</span>
													@endif		
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{!! route('add.shopping.cart',['id'=>$item->id]) !!}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{!! route('list.shopping.cart') !!}">Giỏ hàng <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
                                        </div>
                                        <br><br>
									</div>
								@endforeach	
                        </div>
                        <div class="row">{!! $loaisanphammoi->links() !!}</div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khuyển mãi</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {!! count($loaisanphamkhuyenmai) !!} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                                @foreach ($loaisanphamkhuyenmai as $item)	
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="{!! route('chitietloaisanpham',['id'=>$item->id]) !!}"><img src="page_asset/image/product/{!! $item->image !!}" alt="" height="200px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{!! $item->name !!}</p>
											<p class="single-item-price">
												<span class="flash-del" style="font-size:18px">{!! number_format($item->unit_price) !!} đ</span>
												<span class="flash-sale" style="font-size:18px">{!! number_format($item->promotion_price) !!} đ</span>
											</p>
                                        </div>
                                        
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{!! route('add.shopping.cart',['id'=>$item->id]) !!}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{!! route('list.shopping.cart') !!}">Giỏ hàng <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
                                    </div>
                                    <br><br>
								</div>									
								@endforeach
                        </div>
                        <div class="row">{!! $loaisanphamkhuyenmai->links() !!}</div>
                        <div class="space40">&nbsp;</div>
                        
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->
        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection



