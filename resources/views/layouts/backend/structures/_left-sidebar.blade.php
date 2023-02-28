<aside class="left-sidebar" data-sidebarbg="skin5">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ beRoute('dashboard') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Trang chủ</span>
                    </a>
                </li>

{{--                <li class="sidebar-item">--}}
{{--                    <a class="sidebar-link waves-effect waves-dark" href="{{ beRoute('user.index') }}">--}}
{{--                        <i class="mdi mdi-view-dashboard"></i>--}}
{{--                        <span class="hide-menu">Người dùng</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ beRoute('teacher.index') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Quản lý giáo viên</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ beRoute('logout') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
