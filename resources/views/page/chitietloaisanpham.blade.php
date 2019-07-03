@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">{!! $chitiet->name !!}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{!! route('index') !!}">Trang chủ</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">            
                        <img src="page_asset/image/product/{!! $chitiet->image !!}" alt="" height="250px">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title"><h1>{!! $chitiet->name !!}</h1></p>
                            <br><br>
                            <p class="single-item-price">
                                    @if ($chitiet->promotion_price==0)
                                    <span class="text-center" style="font-size:18px">{!! number_format($chitiet->unit_price)  !!} đ</span>
                                    @else
                                    <span class="flash-del" style="font-size:18px">{!! number_format($chitiet->unit_price) !!} đ</span>
                                    <span class="flash-sale" style="font-size:18px">{!! number_format($chitiet->promotion_price)!!} đ</span>
                                    @endif
                            </p>
                            <br>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{!!route('add.shopping.cart',['id'=>$chitiet->id]) !!}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{!! route('list.shopping.cart') !!}">Giỏ hàng <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        
                        <div class="space20">&nbsp;</div>

                        <br>
                        <div class="single-item-options">             

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description"><h4> Mô tả</h4></a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        {!! $chitiet->description !!}
                    </div>
        
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h2>Sản phẩm tương tự</h2>
                    <br><br>

                    <div class="row">
                            @foreach ($sanpham_cungloai as $item)
                            <div class="col-sm-4">
                                    <div class="single-item">
                                        @if ($item->promotion_price!=0 )
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{!! route('chitietloaisanpham',['id'=>$item->id]) !!}"><img src="page_asset/image/product/{!! $item->image !!}" alt="" height="250px" ></a>
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
                    <div class="row">{!! $sanpham_cungloai->links() !!}</div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm tồn kho</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($sanpham_cu as $item)

                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{!! route('chitietloaisanpham',['id'=>$item->id])!!}"><img src="page_asset/image/product/{!! $item->image !!}" alt=""></a>
                                <div class="media-body">
                                        <h9>{!! $item->name !!}</h9> <br><br>
                                        <p class="single-item-price">
                                                @if ($item->promotion_price==0)
                                                    <span style="font-size:15px" >{!! number_format($item->unit_price) !!} đ</span>
                                                @else   
                                                    <span style="font-size:15px">{!! number_format($item->promotion_price) !!} đ</span> 
                                                @endif	
                                        </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($sanpham_moi as $item)
                            <div class="media beta-sales-item">
                                    <a class="pull-left" href="{!! route('chitietloaisanpham',['id'=>$item->id])!!}"><img src="page_asset/image/product/{!! $item->image !!}" alt=""></a>
                                    <div class="media-body">
                                        <h9>{!! $item->name !!}</h9> <br><br>
                                        <p class="single-item-price">
                                            @if ($item->promotion_price==0)
                                                <span style="font-size:15px" >{!! number_format($item->unit_price) !!} đ</span>
                                            @else   
                                                <span style="font-size:15px">{!! number_format($item->promotion_price) !!} đ</span> 
                                            @endif	
										</p>
                                    </div>
                                </div> 
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection