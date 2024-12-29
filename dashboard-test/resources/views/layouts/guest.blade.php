<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.links')
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

    <div class="promotional-banner pt-80">
        <div
            class="sm:max-w-md mt-6 px-6 py-4 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg flex-align justify-content-center">
            {{ $slot }}
        </div>
    </div>
    @include('partials.footer-links')
    <img src="{{ asset('assets/pages/images/bg/body-bottom-bg.png') }}" alt="BG" class="body-bottom-bg">

</body>

</html>