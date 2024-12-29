<!DOCTYPE html>
<html lang="en" class="">

<head>
    @include('partials.links')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* Mobile responsive styles */
        @media screen and (max-width: 767.98px) {
    .table-responsive-custom thead {
        display: none;
    }

    .table-responsive-custom tbody tr {
        display: flex;
        flex-direction: column-reverse;
        margin-bottom: 1rem;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
    }

    .table-responsive-custom tbody td {
        display: block;
        text-align: right;
        padding: 2rem 2.5rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .table-responsive-custom tbody td:first-child {
        border-bottom: none;
    }

    .table-responsive-custom tbody td::before {
        float: right;
        font-weight: bold;
        margin-left: 1rem;
    }
}
    </style>
</head>

<body>

    <!--==================== Preloader Start ====================-->
    <div class="preloader">
        <img src="{{ asset('assets/pages/images/icon/preloader.gif') }}" alt="">
        <!-- <div class="loader"></div> -->
    </div>
    <!--==================== Preloader End ====================-->

    <!--==================== Overlay Start ====================-->
    <div class="overlay"></div>
    <!--==================== Overlay End ====================-->

    <!--==================== Sidebar Overlay End ====================-->
    <div class="side-overlay"></div>
    <!--==================== Sidebar Overlay End ====================-->

    <!-- ==================== Scroll to Top End Here ==================== -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>



    <form action="#" class="search-box">
        <button type="button"
            class="search-box__close position-absolute inset-block-start-0 inset-inline-end-0 m-16 w-48 h-48 border border-gray-100 rounded-circle flex-center text-white hover-text-gray-800 hover-bg-white text-2xl transition-1">
            <i class="ph ph-x"></i>
        </button>
        <div class="container">
            <div class="position-relative">
                <input type="text" class="form-control py-16 px-24 text-xl rounded-pill pe-64"
                    placeholder="Search for a product or brand">
                <button type="submit"
                    class="w-48 h-48 bg-main-600 rounded-circle flex-center text-xl text-white position-absolute top-50 translate-middle-y inset-inline-end-0 me-8">
                    <i class="ph ph-magnifying-glass"></i>
                </button>
            </div>

        </div>
    </form>

    <div class="mobile-menu scroll-sm d-lg-none d-block">
        <button type="button" class="close-button"> <i class="ph ph-x"></i> </button>
        <div class="mobile-menu__inner">
            <a href="index.html" class="mobile-menu__logo">
                <img src="{{ asset('assets/pages/images/logo/logo.png') }}" alt="Logo">
            </a>
            <div class="mobile-menu__menu">
                <!-- Nav Menu Start -->
                <ul class="nav-menu flex-align nav-menu--mobile">
                    <li class="on-hover-item nav-menu__item has-submenu">
                        <a href="/" class="nav-menu__link">Home</a>
                    </li>
                    <li class="on-hover-item nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Shop</a>
                        <ul class="on-hover-dropdown common-dropdown nav-submenu scroll-sm">
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="shop.html"
                                    class="common-dropdown__link nav-submenu__link hover-bg-neutral-100">
                                    Shop</a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="product-details.html"
                                    class="common-dropdown__link nav-submenu__link hover-bg-neutral-100"> Shop
                                    Details</a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="product-details-two.html"
                                    class="common-dropdown__link nav-submenu__link hover-bg-neutral-100"> Shop Details
                                    Two</a>
                            </li>
                        </ul>
                    </li>
                    <li class="on-hover-item nav-menu__item has-submenu">
                        <span
                            class="badge-notification bg-warning-600 text-white text-sm py-2 px-8 rounded-4">New</span>
                        <a href="javascript:void(0)" class="nav-menu__link">Pages</a>
                        <ul class="on-hover-dropdown common-dropdown nav-submenu scroll-sm">
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="/cart" class="common-dropdown__link nav-submenu__link hover-bg-neutral-100">
                                    Cart</a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="checkout.html"
                                    class="common-dropdown__link nav-submenu__link hover-bg-neutral-100"> Checkout </a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="account.html"
                                    class="common-dropdown__link nav-submenu__link hover-bg-neutral-100">
                                    Account</a>
                            </li>
                        </ul>
                    </li>
                    <li class="on-hover-item nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Blog</a>
                        <ul class="on-hover-dropdown common-dropdown nav-submenu scroll-sm">
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="blog.html"
                                    class="common-dropdown__link nav-submenu__link hover-bg-neutral-100">
                                    Blog</a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="blog-details.html"
                                    class="common-dropdown__link nav-submenu__link hover-bg-neutral-100"> Blog
                                    Details</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-menu__item">
                        <a href="contact.html" class="nav-menu__link">Contact Us</a>
                    </li>
                </ul>
                <!-- Nav Menu End -->
            </div>
        </div>
    </div>

    <div class="header-top bg-main-600 flex-between">
        <div class="container container-lg">
            <div class="flex-between flex-wrap gap-8">
                <ul class="flex-align flex-wrap d-none d-md-flex">
                    <li class="border-right-item"><a href="#shipping"
                            class="text-white text-sm hover-text-decoration-underline">Become A Seller</a></li>
                    <li class="border-right-item"><a href="#shipping"
                            class="text-white text-sm hover-text-decoration-underline">About us</a></li>
                    <li class="border-right-item"><a href="#shipping"
                            class="text-white text-sm hover-text-decoration-underline">Free Delivery</a></li>
                    <li class="border-right-item"><a href="#shipping"
                            class="text-white text-sm hover-text-decoration-underline">Returns Policy</a></li>
                </ul>
                <ul class="header-top__right flex-align flex-wrap">
                    <li class="on-hover-item border-right-item border-right-item-sm-space has-submenu arrow-white">
                        <a href="javascript:void(0)" class="text-white text-sm py-8">Help Center</a>
                        <ul class="on-hover-dropdown common-dropdown common-dropdown--sm max-h-200 scroll-sm px-0 py-8">
                            <li class="nav-submenu__item">
                                <a href="#"
                                    class="nav-submenu__link hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0">
                                    <span class="text-sm d-flex"><i class="ph ph-headset"></i></span>
                                    Call Center
                                </a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="#"
                                    class="nav-submenu__link hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0">
                                    <span class="text-sm d-flex"><i class="ph ph-chat-circle-dots"></i></span>
                                    Live Chat
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="on-hover-item border-right-item border-right-item-sm-space has-submenu arrow-white">
                        <a href="javascript:void(0)" class="selected-text text-white text-sm py-8">Eng</a>
                        <ul
                            class="selectable-text-list on-hover-dropdown common-dropdown common-dropdown--sm max-h-200 scroll-sm px-0 py-8">
                            <li>
                                <a href="javascript:void(0)"
                                    class="hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0">
                                    <img src="{{ asset('assets/pages/images/thumbs/flag1.png') }}" alt=""
                                        class="w-16 h-12 rounded-4 border border-gray-100">
                                    English
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0">
                                    <img src="{{ asset('assets/pages/images/thumbs/flag2.png') }}" alt=""
                                        class="w-16 h-12 rounded-4 border border-gray-100">
                                    Japan
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0">
                                    <img src="{{ asset('assets/pages/images/thumbs/flag3.png') }}" alt=""
                                        class="w-16 h-12 rounded-4 border border-gray-100">
                                    French
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0">
                                    <img src="{{ asset('assets/pages/images/thumbs/flag4.png') }}" alt=""
                                        class="w-16 h-12 rounded-4 border border-gray-100">
                                    Germany
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0">
                                    <img src="{{ asset('assets/pages/images/thumbs/flag6.png') }}" alt=""
                                        class="w-16 h-12 rounded-4 border border-gray-100">
                                    Bangladesh
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0">
                                    <img src="{{ asset('assets/pages/images/thumbs/flag5.png') }}" alt=""
                                        class="w-16 h-12 rounded-4 border border-gray-100">
                                    South Korea
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="on-hover-item border-right-item border-right-item-sm-space has-submenu arrow-white">
                        <a href="javascript:void(0)" class="selected-text text-white text-sm py-8">USD</a>
                        <ul
                            class="selectable-text-list on-hover-dropdown common-dropdown common-dropdown--sm max-h-200 scroll-sm px-0 py-8">
                            <li>
                                <a href="javascript:void(0)"
                                    class="hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0">
                                    <img src="{{ asset('assets/pages/images/thumbs/flag1.png') }}" alt=""
                                        class="w-16 h-12 rounded-4 border border-gray-100">
                                    USD
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0">
                                    <img src="{{ asset('assets/pages/images/thumbs/flag2.png') }}" alt=""
                                        class="w-16 h-12 rounded-4 border border-gray-100">
                                    Yen
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0">
                                    <img src="{{ asset('assets/pages/images/thumbs/flag3.png') }}" alt=""
                                        class="w-16 h-12 rounded-4 border border-gray-100">
                                    Franc
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0">
                                    <img src="{{ asset('assets/pages/images/thumbs/flag4.png') }}" alt=""
                                        class="w-16 h-12 rounded-4 border border-gray-100">
                                    EURO
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0">
                                    <img src="{{ asset('assets/pages/images/thumbs/flag6.png') }}" alt=""
                                        class="w-16 h-12 rounded-4 border border-gray-100">
                                    BDT
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="hover-bg-gray-100 text-gray-500 text-xs py-6 px-16 flex-align gap-8 rounded-0">
                                    <img src="{{ asset('assets/pages/images/thumbs/flag5.png') }}" alt=""
                                        class="w-16 h-12 rounded-4 border border-gray-100">
                                    WON
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="border-right-item">
                        <a href="account.html" class="text-white text-sm py-8 flex-align gap-6">
                            <span class="icon text-md d-flex"> <i class="ph ph-user-circle"></i> </span>
                            <span class="hover-text-decoration-underline">My Account</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <header class="header-middle bg-color-one border-bottom border-gray-100">
        <div class="container container-lg">
            <nav class="header-inner flex-between">
                <!-- Logo Start -->
                <div class="logo">
                    <a href="index.html" class="link">
                        <img src="{{ asset('assets/pages/images/logo/logo.png') }}" alt="Logo">
                    </a>
                </div>
                <!-- Logo End  -->

                <!-- form location Start -->
                <form action="#" class="flex-align w-50 flex-wrap form-location-wrapper">
                    <div
                        class="search-category w-100 d-flex h-48 select-border-end-0 radius-end-0 search-form d-sm-flex d-none">
                        <select class="js-example-basic-single border border-gray-200 border-end-0" name="state">
                            <option value="1" selected disabled>All Categories</option>
                            <option value="1">Grocery</option>
                            <option value="1">Breakfast & Dairy</option>
                            <option value="1">Vegetables</option>
                            <option value="1">Milks and Dairies</option>
                            <option value="1">Pet Foods & Toy</option>
                            <option value="1">Breads & Bakery</option>
                            <option value="1">Fresh Seafood</option>
                            <option value="1">Fronzen Foods</option>
                            <option value="1">Noodles & Rice</option>
                            <option value="1">Ice Cream</option>
                        </select>

                        <div class="search-form__wrapper position-relative w-100 text-end">
                            <input type="text" id="search-input"
                                class="search-form__input common-input w-100 h-100 py-13 ps-16 pe-18 rounded-end-pill pe-44"
                                placeholder="Search for a product or brand">
                            <button type="submit"
                                class="w-32 h-32 bg-main-600 rounded-circle flex-center text-xl text-white position-absolute top-50 translate-middle-y inset-inline-end-0 me-8"><i
                                    class="ph ph-magnifying-glass"></i>
                            </button>
                            <div id="search-results"
                                class="position-absolute w-100 mt-2 bg-white rounded shadow-sm d-none z-2 "></div>
                        </div>
                    </div>


                </form>
                <!-- form location start -->

                <!-- Header Middle Right start -->
                <div class="header-right flex-align d-lg-block d-none">
                    <div class="flex-align flex-wrap gap-12">
                        <button type="button" class="search-icon flex-align d-lg-none d-flex gap-4 item-hover">
                            <span class="text-2xl text-gray-700 d-flex position-relative item-hover__text">
                                <i class="ph ph-magnifying-glass"></i>
                            </span>
                        </button>
                        <a href="/wishlist" class="flex-align gap-4 item-hover">
                            <span class="text-2xl text-gray-700 d-flex position-relative me-6 mt-6 item-hover__text">
                                <i class="ph ph-heart"></i>
                                <span
                                    class="w-16 h-16 flex-center rounded-circle bg-main-600 text-white text-xs position-absolute top-n6 end-n4">2</span>
                            </span>
                            <span class="text-md text-gray-500 item-hover__text d-none d-lg-flex">Wishlist</span>
                        </a>
                        <a href="/cart" class="flex-align gap-4 item-hover">
                            <span class="text-2xl text-gray-700 d-flex position-relative me-6 mt-6 item-hover__text">
                                <i class="ph ph-shopping-cart-simple"></i>
                                <span
                                    class="w-16 h-16 flex-center rounded-circle bg-main-600 text-white text-xs position-absolute top-n6 end-n4">2</span>
                            </span>
                            <span class="text-md text-gray-500 item-hover__text d-none d-lg-flex">Cart</span>
                        </a>
                    </div>
                </div>
                <!-- Header Middle Right End  -->
            </nav>
        </div>
    </header>

    <header class="header bg-white border-bottom border-gray-100">
        <div class="container container-lg">
            <nav class="header-inner d-flex justify-content-between gap-8">
                <div class="flex-align menu-category-wrapper">

                    <!-- Menu Start  -->
                    <div class="header-menu d-lg-block d-none">
                        <!-- Nav Menu Start -->
                        <ul class="nav-menu flex-align ">
                            <li class="on-hover-item nav-menu__item">
                                <a href="/" class="nav-menu__link">Home</a>
                            </li>
                            <li class="on-hover-item nav-menu__item">
                                <a href="/shop" class="nav-menu__link">Shop</a>
                            </li>
                            <!-- -->
                            <li class="nav-menu__item">
                                <a href="contact.html" class="nav-menu__link">Contact Us</a>
                            </li>
                        </ul>
                        <!-- Nav Menu End -->
                    </div>
                    <!-- Menu End  -->
                </div>

                <!-- Header Right start -->
                <div class="header-right flex-align">
                    <a href="tel:01234567890"
                        class="bg-main-600 text-white p-12 h-100 hover-bg-main-800 flex-align gap-8 text-lg d-lg-flex d-none">
                        <div class="d-flex text-32"><i class="ph ph-phone-call"></i></div>
                        01- 234 567 890
                    </a>
                    <div class="me-16 d-lg-none d-block">
                        <div class="flex-align flex-wrap gap-12">
                            <button type="button" class="search-icon flex-align d-lg-none d-flex gap-4 item-hover">
                                <span class="text-2xl text-gray-700 d-flex position-relative item-hover__text">
                                    <i class="ph ph-magnifying-glass"></i>
                                </span>
                            </button>
                            <a href="/cart" class="flex-align gap-4 item-hover">
                                <span
                                    class="text-2xl text-gray-700 d-flex position-relative me-6 mt-6 item-hover__text">
                                    <i class="ph ph-heart"></i>
                                    <span
                                        class="w-16 h-16 flex-center rounded-circle bg-main-600 text-white text-xs position-absolute top-n6 end-n4">2</span>
                                </span>
                                <span class="text-md text-gray-500 item-hover__text d-none d-lg-flex">Wishlist</span>
                            </a>
                            <a href="/cart" class="flex-align gap-4 item-hover">
                                <span
                                    class="text-2xl text-gray-700 d-flex position-relative me-6 mt-6 item-hover__text">
                                    <i class="ph ph-shopping-cart-simple"></i>
                                    <span
                                        class="w-16 h-16 flex-center rounded-circle bg-main-600 text-white text-xs position-absolute top-n6 end-n4">2</span>
                                </span>
                                <span class="text-md text-gray-500 item-hover__text d-none d-lg-flex">Cart</span>
                            </a>
                        </div>
                    </div>
                    <button type="button" class="toggle-mobileMenu d-lg-none ms-3n text-gray-800 text-4xl d-flex"> <i
                            class="ph ph-list"></i> </button>
                </div>
                <!-- Header Right End  -->
            </nav>
        </div>
    </header>
    <div id="search-results">
        <!-- Results will appear here -->
    </div>

    @yield('content')
    <!-- ==================== Footer Start Here ==================== -->
    <footer class="footer py-120">
        <img src="{{ asset('assets/pages/images/bg/body-bottom-bg.png') }}" alt="BG" class="body-bottom-bg">
        <div class="container container-lg">
            <div class="footer-item-wrapper d-flex align-items-start flex-wrap">
                <div class="footer-item">
                    <div class="footer-item__logo">
                        <a href="index.html"> <img src="{{ asset('assets/pages/images/logo/logo.png') }}" alt=""></a>
                    </div>
                    <p class="mb-24">We're Grocery Shop, an innovative team of food supliers.</p>
                    <div class="flex-align gap-16 mb-16">
                        <span
                            class="w-32 h-32 flex-center rounded-circle bg-main-600 text-white text-md flex-shrink-0"><i
                                class="ph-fill ph-map-pin"></i></span>
                        <span class="text-md text-gray-900 ">789 Inner Lane, Biyes park, California, USA</span>
                    </div>
                    <div class="flex-align gap-16 mb-16">
                        <span
                            class="w-32 h-32 flex-center rounded-circle bg-main-600 text-white text-md flex-shrink-0"><i
                                class="ph-fill ph-phone-call"></i></span>
                        <div class="flex-align gap-16 flex-wrap">
                            <a href="tel:+00123456789" class="text-md text-gray-900 hover-text-main-600">+00 123 456
                                789</a>
                            <span class="text-md text-main-600 ">or</span>
                            <a href="tel:+00987654012" class="text-md text-gray-900 hover-text-main-600">+00 987 654
                                012</a>
                        </div>
                    </div>
                    <div class="flex-align gap-16 mb-16">
                        <span
                            class="w-32 h-32 flex-center rounded-circle bg-main-600 text-white text-md flex-shrink-0"><i
                                class="ph-fill ph-envelope"></i></span>
                        <a href="mailto:support24@marketpro.com"
                            class="text-md text-gray-900 hover-text-main-600">support24@marketpro.com</a>
                    </div>
                </div>

                <div class="footer-item">
                    <h6 class="footer-item__title">Information</h6>
                    <ul class="footer-menu">
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Become a Vendor</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Affiliate Program</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Privacy Policy</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Our Suppliers</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Extended Plan</a>
                        </li>
                        <li class="">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Community</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-item">
                    <h6 class="footer-item__title">Customer Support</h6>
                    <ul class="footer-menu">
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Help Center</a>
                        </li>
                        <li class="mb-16">
                            <a href="contact.html" class="text-gray-600 hover-text-main-600">Contact Us</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Report Abuse</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Submit and Dispute</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Policies & Rules</a>
                        </li>
                        <li class="">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Online Shopping</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-item">
                    <h6 class="footer-item__title">My Account</h6>
                    <ul class="footer-menu">
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">My Account</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Order History</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Shoping Cart</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Compare</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Help Ticket</a>
                        </li>
                        <li class="">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Wishlist</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-item">
                    <h6 class="footer-item__title">Daily Groceries</h6>
                    <ul class="footer-menu">
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Dairy & Eggs</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Meat & Seafood</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Breakfast Food</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Household Supplies</a>
                        </li>
                        <li class="mb-16">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Bread & Bakery</a>
                        </li>
                        <li class="">
                            <a href="shop.html" class="text-gray-600 hover-text-main-600">Pantry Staples</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-item">
                    <h6 class="">Shop on The Go</h6>
                    <p class="mb-16">Marketpro App is available. Get it now</p>
                    <div class="flex-align gap-8 my-32">
                        <a href="https://www.apple.com/store" class="">
                            <img src="{{ asset('assets/pages/images/thumbs/store-img1.png') }}" alt="">
                        </a>
                        <a href="https://play.google.com/store/apps?hl=en" class="">
                            <img src="{{ asset('assets/pages/images/thumbs/store-img2.png') }}" alt="">
                        </a>
                    </div>

                    <ul class="flex-align gap-16">
                        <li>
                            <a href="https://www.facebook.com"
                                class="w-44 h-44 flex-center bg-main-100 text-main-600 text-xl rounded-circle hover-bg-main-600 hover-text-white">
                                <i class="ph-fill ph-facebook-logo"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com"
                                class="w-44 h-44 flex-center bg-main-100 text-main-600 text-xl rounded-circle hover-bg-main-600 hover-text-white">
                                <i class="ph-fill ph-twitter-logo"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com"
                                class="w-44 h-44 flex-center bg-main-100 text-main-600 text-xl rounded-circle hover-bg-main-600 hover-text-white">
                                <i class="ph-fill ph-instagram-logo"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com"
                                class="w-44 h-44 flex-center bg-main-100 text-main-600 text-xl rounded-circle hover-bg-main-600 hover-text-white">
                                <i class="ph-fill ph-linkedin-logo"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- bottom Footer -->
    <div class="bottom-footer bg-color-one py-8">
        <div class="container container-lg">
            <div class="bottom-footer__inner flex-between flex-wrap gap-16 py-16">
                <p class="bottom-footer__text ">Marketpro eCommerce &copy; 2024. All Rights Reserved </p>
                <div class="flex-align gap-8 flex-wrap">
                    <span class="text-heading text-sm">We Are Acepting</span>
                    <img src="{{ asset('assets/pages/images/thumbs/payment-method.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- ==================== Footer End Here ==================== -->

    @include('partials.notify')


    @include('partials.footer-links')


    <!--  -->
    <script src="{{ asset('assets/pages/js/script.js') }}"></script>


</body>

</html>