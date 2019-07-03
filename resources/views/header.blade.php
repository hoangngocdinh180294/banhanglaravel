<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a ><i class="fa fa-home"></i> Đại học công nghiệp Hà Nôi</a></li>
                    <li><a ><i class="fa fa-phone"></i> 036.286.1946</a></li>
                </ul>
            </div>
            {{-- <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                        <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
                    <li><a href="{!! route('getdangky')!!}">Đăng kí</a></li>
                    <li><a href="{!! route('getdangnhap')!!}">Đăng nhập</a></li>
                    <li><a href="{!! route('getlaypass') !!}">Quên mật khẩu</a></li>
                    <li><a href="{!! route('getdangxuat') !!}"><i class="fa fa-user"></i>Đăng xuất</a></li>

                        {{-- <li><a href="{!! route('getdangky')!!}">Đăng kí</a></li>
                        <li><a href="{!! route('getdangnhap')!!}">Đăng nhập</a></li> 
                </ul>
            </div> --}}


            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{!! route('index') !!}" id="logo"><img src="page_asset/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{!! route('timkiem') !!}">
                        <input type="text" value="{{ old('timkiem')}} " name="timkiem"  id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>
                <div class="beta-comp">
                    <div class="cart">

                        <div><i class="fa fa-shopping-cart" ><a href="{!! route('list.shopping.cart') !!}"></i> Giỏ hàng ({!! Cart::count() !!})</i></a></div>      
                    </div> <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{!! route('index') !!}">Trang chủ</a></li>
                    <li><a > Loại sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach ($loai_sanpham as $item)
                            <li><a href="{!! route('loaisanpham',['id'=>$item->id]) !!}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{!! route('gioithieu') !!}">Giới thiệu</a></li>
                    <li><a href="{!! route('getlienhe') !!}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->
