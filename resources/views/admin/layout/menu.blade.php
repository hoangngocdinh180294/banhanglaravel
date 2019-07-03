<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a ><i class="fa fa-dashboard fa-fw"></i>Menu</a>
            </li>
            <li>
                <a href="{!! route('user.index') !!}"><i class="fa fa-bar-chart-o fa-fw"></i>Admin<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{!! route('user.index') !!}">Danh Sách Admin</a>
                    </li>
                    <li>
                        <a href="{!! route('user.add') !!}">Thêm Admin</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{!! route('role.index') !!}"><i class="fa fa-cube fa-fw"></i> Admin quyền(Cẩn trọng*)<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{!! route('role.index') !!}">Danh sách Nhóm quyền</a>
                    </li>
                    <li>
                        <a href="{!! route('role.add') !!}">Thêm Nhóm quyền</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{!! route('slide.index') !!}"><i class="fa fa-bar-chart-o fa-fw"></i> Slide<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{!! route('slide.index') !!}">Danh sách </a>
                    </li>
                    <li>
                        <a href="{!! route('slide.add') !!}">Thêm </a>
                    </li>
                </ul>
            </li>
            <li>
                    <a href="{!! route('typeproduct.index') !!}"><i class="fa fa-users fa-fw"></i> Loại Sản phẩm<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{!! route('typeproduct.index') !!}">Danh sách </a>
                        </li>
                        <li>
                            <a href="{!! route('typeproduct.add') !!}">Thêm Loại </a>
                        </li>
                    </ul>
            </li>
            <li>
                    <a href="{!! route('product.index') !!}"><i class="fa fa-cube fa-fw"></i>Sản Phẩm<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{!! route('product.index') !!}">Danh sách </a>
                        </li>
                        <li>
                            <a href="{!! route('product.add') !!}">Thêm </a>
                        </li>
                    </ul>
            </li>
            <li>
                <a href="{!! route('khachhang.index') !!}"><i class="fa fa-users fa-fw"></i>Khách hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{!! route('khachhang.index') !!}">Danh sách </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{!! route('bill.index') !!}"><i class="fa fa-bar-chart-o fa-fw"></i>Quản lý hóa đơn<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{!! route('bill.index') !!}">Danh Sách </a>
                    </li>

                </ul>
            </li>
            <li>
                    <a href="{!! route('lienhekhachhang.index')!!}"><i class="fa fa-cube fa-fw"></i>Liên hệ<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{!! route('lienhekhachhang.index')!!}">Danh sách </a>
                        </li>
                    </ul>
            </li>
            <li>
                    <a href="{!! route('gioithieukhachhang.index') !!}"><i class="fa fa-users fa-fw"></i> Giới thiệu<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{!! route('gioithieukhachhang.index') !!}">Danh sách </a>
                        </li>
                        <li>
                            <a href="{!! route('gioithieukhachhang.add') !!}">Thêm </a>
                        </li>
                    </ul>
            </li>
        </ul>
    </div>
</div>