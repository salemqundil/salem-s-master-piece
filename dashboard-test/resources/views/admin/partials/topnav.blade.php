<!-- navbar-wrapper start -->
<nav class="navbar-wrapper">
    <div class="navbar__left">
        <button type="button" class="res-sidebar-open-btn me-3"><i class="las la-bars"></i></button>
        <form class="navbar-search">
            <input type="search" name="#0" class="navbar-search-field" id="searchInput" autocomplete="off"
                placeholder="@lang('Search Options')...">
            <i class="fas fa-search text--primary"></i>
            <ul class="search-list"></ul>
        </form>
    </div>
    <div class="navbar__right">
        <ul class="navbar__action-list">
            <li>
                <a title="@lang('Visit Site')" href="{{ route('home') }}" target="_blank" class="btn btn-sm btn--primary"><i class="fas fa-globe-americas"></i></a>
            </li>
            <li class="dropdown">
                <button type="button" class="primary--layer" data-bs-toggle="dropdown" data-display="static"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-bell text--primary"></i>
                </button>
                <div class="dropdown-menu dropdown-menu--md p-0 border-0 box--shadow1 dropdown-menu-right">
                    <div class="dropdown-menu__header">
                        <span class="caption">@lang('Notification')</span>
                    </div>
                    <div class="dropdown-menu__body">
                        
                    </div>
                    <div class="dropdown-menu__footer">
                        <a href="" class="view-all-message">@lang('View all
                            notification')</a>
                    </div>
                </div>
            </li>


            <li class="dropdown">
                <button type="button" class="" data-bs-toggle="dropdown" data-display="static" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="navbar-user">
                        <span class="navbar-user__thumb"><img
                                src=""
                                alt="image"></span>
                        <span class="navbar-user__info">
                            <span class="navbar-user__name">{{ auth()->user()->username }}</span>
                        </span>
                        <span class="icon"><i class="las la-angle-down"></i></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
                    <a href=""
                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon las la-user"></i>
                        <span class="dropdown-menu__caption">@lang('Profile')</span>
                    </a>
                    <a href="{{ route('admin.logout') }}"
                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <!-- <i class="dropdown-menu__icon las la-sign-out-alt"></i> -->
                        <i class="dropdown-menu__icon las la-chevron-circle-right"></i>
                        <span class="dropdown-menu__caption">@lang('Logout')</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- navbar-wrapper end -->
