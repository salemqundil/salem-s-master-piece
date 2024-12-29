<div class="sidebar">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
       
        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{menuActive('admin.dashboard')}}">
                    <a href="{{route('admin.dashboard')}}" class="nav-link ">
                        <i class="menu-icon las la-chart-line"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>
                <li class="sidebar__menu-header">@lang('Users Management')</li>
                <li class="sidebar-menu-item {{menuActive('admin.users.*')}}">
                    <a href="{{route('admin.users.all')}}" class="nav-link ">
                        <i class="menu-icon las la-user"></i>
                        <span class="menu-title">@lang('All Users')</span>
                    </a>
                </li>
                <li class="sidebar-menu-item {{menuActive('admin.users.*')}}">
                    <a href="{{route('admin.users.all')}}" class="nav-link ">
                        <i class="menu-icon las la-comment"></i>
                        <span class="menu-title">@lang('All Messages')</span>
                    </a>
                </li>
                <li class="sidebar-menu-item {{menuActive('admin.users.*')}}">
                    <a href="{{route('admin.users.all')}}" class="nav-link ">
                        <i class="menu-icon las la-star"></i>
                        <span class="menu-title">@lang('All Reviews')</span>
                    </a>
                </li>

                <li class="sidebar__menu-header">@lang('Shop Management')</li>
                <li class="sidebar-menu-item {{menuActive('admin.category*')}}">
                    <a href="{{route('admin.category.index')}}" class="nav-link ">
                        <i class="las la-align-left menu-icon"></i>
                        <span class="menu-title">@lang('Categories')</span>
                    </a>
                </li>
                <li class="sidebar-menu-item {{menuActive('admin.shipping*')}}">
                    <a href="{{ route('admin.coupon.index')}}" class="nav-link ">
                        <i class=" las la-ticket-alt menu-icon"></i>
                        <span class="menu-title">@lang('Coupons')</span>
                    </a>
                </li>
                <li class="sidebar-menu-item {{menuActive('admin.shipping*')}}">
                    <a href="" class="nav-link ">
                        <i class=" las la-truck menu-icon"></i>
                        <span class="menu-title">@lang('Shipping')</span>
                    </a>
                </li>

                <li class="sidebar__menu-header">@lang('Products')</li>
                <li class="sidebar-menu-item {{menuActive('admin.product*')}}">
                    <a href="{{route('admin.product.index')}}" class="nav-link ">
                        <i class="la la-product-hunt menu-icon"></i>
                        <span class="menu-title">@lang('All Products')</span>
                    </a>
                </li>
                <li class="sidebar-menu-item {{menuActive('admin.orders.index')}}">
                    <a href="{{route('admin.orders.index')}}" class="nav-link ">
                        <i class="la la-cart-plus menu-icon"></i>
                        <span class="menu-title">@lang('All Orders')</span>
                    </a>
                </li>
                <li class="sidebar__menu-header">@lang('Subscription')</li>
                <li class="sidebar-menu-item {{menuActive(['admin.packages.index'])}}">
                    <a href="{{route('admin.packages.index')}}" class="nav-link">
                        <i class="menu-icon las la-credit-card"></i>
                        <span class="menu-title">@lang('Packages')</span>
                    </a>
                </li>
                <li class="sidebar-menu-item {{menuActive(['admin.subscriptions.index'])}}">
                    <a href="" class="nav-link">
                        <i class="menu-icon fas fa-gift"></i>
                        <span class="menu-title">@lang('Subscriptions')</span>
                    </a>
                </li>

                <li class="sidebar__menu-header">@lang('Transactions')</li>
                <li class="sidebar-menu-item {{menuActive('admin.deposit.*')}}">
                    <a href="{{route('admin.deposit.pending')}}" class="nav-link ">
                        <i class="menu-icon las la-wallet"></i>
                        <span class="menu-title">@lang('Deposits')</span>
                    </a>
                </li>

</ul>
</div>
</div>
</div>
<!-- sidebar end -->

@push('script')
<script>
    if ($('li').hasClass('active')) {
        $('#sidebar__menuWrapper').animate({
            scrollTop: eval($(".active").offset().top - 320)
        }, 500);
    }
</script>
@endpush
