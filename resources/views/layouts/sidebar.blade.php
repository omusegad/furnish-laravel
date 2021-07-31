  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">

    <div data-simplebar class="sidebar-menu-scroll">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="uil-home-alt"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}">
                        <i class="uil-home-alt"></i>
                        <span>{{ __('Add User') }}</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-window-section"></i>
                        <span>{{ __('Products') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('products-category.index') }}">
                                <i class="uil-home-alt"></i>
                                <span>{{ __('Category') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}">
                                <i class="uil-home-alt"></i>
                                <span>{{ __('Products') }}</span>
                            </a>
                        </li>

                        <li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->

    </div>
</div>
<!-- Left Sidebar End -->
