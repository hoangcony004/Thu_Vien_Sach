<!--- Sidemenu -->
<ul class="side-nav">
    <li class="side-nav-item">
        <a href="{{ route('dashboard') }}" class="side-nav-link">
            <i class="uil-home-alt"></i>
            <span> Dashboards </span>
        </a>
    </li>

    <!-- <li class="side-nav-item">
        <a href="apps-calendar.html" class="side-nav-link">
            <i class='uil uil-calendar-alt'></i>
            <span> Thời khóa biểu </span>
        </a>
    </li> -->

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce"
            class="side-nav-link">
            <i class='uil uil-file-edit-alt'></i>
            <span> Quản Lý Thư Viện </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarEcommerce">
            <ul class="side-nav-second-level">
                <li>
                    <a href="{{ route('sach') }}">Kho Sách</a>
                </li>
                <li>
                    <a href="{{ route('tacgia') }}">Tác Giả</a>
                </li>
                <li>
                    <a href="{{ route('theloai') }}">Thể Loại</a>
                </li>
                <li>
                    <a href="{{ route('nhaXuatBan') }}">Nhà Xuất Bản</a>
                </li>
                <li>
                    <a href="apps-ecommerce-shopping-cart.html">Shopping Cart</a>
                </li>
                <li>
                    <a href="apps-ecommerce-checkout.html">Checkout</a>
                </li>
                <li>
                    <a href="apps-ecommerce-sellers.html">Sellers</a>
                </li>
            </ul>
        </div>

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects"
            class="side-nav-link">
            <i class="dripicons-menu"></i>
            <span> Quản Lý Mượn Sách</span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarProjects">
            <ul class="side-nav-second-level">
                <li>
                    <a href="#">Thêm Người Dùng Mới</a>
                </li>
                <li>
                    <a href="#">Thêm Lớp Học Mới</a>
                </li>
                <li>
                    <a href="#">Thêm Liên Hệ</a>
                </li>
                <li>
                    <a href="#">Thêm Nhân Viên<span
                            class="badge rounded-pill badge-light-lighten font-10 float-end">New</span></a>
                </li>
                <li>
                    <a href="#">Thêm Phản Hồi<span
                            class="badge rounded-pill badge-success-lighten font-10 float-end">New</span></a>
                </li>
            </ul>
        </div>
    </li>

    <!-- <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false" aria-controls="sidebarMultiLevel"
            class="side-nav-link">
            <i class="dripicons-graduation"></i>
            <span> Trường học </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarMultiLevel">
            <ul class="side-nav-second-level">
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarSecondLevel1" aria-expanded="false"
                        aria-controls="sidebarSecondLevel1">
                        <span> Khối 10 </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSecondLevel1">
                        <ul class="side-nav-third-level">
                            <li>
                                <a href="javascript: void(0);">Item 1</a>
                            </li>
                            <li>
                                <a href="javascript: void(0);">Item 2</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarSecondLevel2" aria-expanded="false"
                        aria-controls="sidebarSecondLevel2">
                        <span> Khối 11 </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSecondLevel2">
                        <ul class="side-nav-third-level">
                            <li>
                                <a href="javascript: void(0);">Item 1</a>
                            </li>
                            <li>
                                <a href="javascript: void(0);">Item 2</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false"
                        aria-controls="sidebarThirdLevel">
                        <span> Khối 12 </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarThirdLevel">
                        <ul class="side-nav-third-level">
                            <li>
                                <a href="javascript: void(0);">Item 1</a>
                            </li>

                            <li>
                                <a href="javascript: void(0);">Item 1</a>
                            </li>

                            <li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false"
                                    aria-controls="sidebarFourthLevel">
                                    <span> Lớp ôn luyện </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarFourthLevel">
                                    <ul class="side-nav-forth-level">
                                        <li>
                                            <a href="javascript: void(0);">Item 2.1</a>
                                        </li>
                                        <li>
                                            <a href="javascript: void(0);">Item 2.2</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </li> -->
</ul>