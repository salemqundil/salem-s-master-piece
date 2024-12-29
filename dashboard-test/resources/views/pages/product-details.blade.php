@extends('pages.layouts.header')
@section('content')

<section class="product-details py-80">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-lg-9">
                <div class="row gy-4">
                    <div class="col-xl-6">
                        <div class="product-details__left">

                            <div class="product-details__thumb-slider border border-gray-100 rounded-16">
                                <div class="">
                                    <div class="product-details__thumb flex-center h-100">
                                        <img src="{{ strpos($product->productImages[0]->image, 'http') === 0 ? $product->productImages[0]->image : asset('upload/products/' . $product->productImages[0]->image) }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="product-details__content">
                            <h5 class="mb-12">{{$product->name}}</h5>
                            <span class="mt-32 pt-32 text-gray-700 border-top border-gray-100 d-block"></span>
                            <p class="text-gray-700">Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus
                                malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent</p>
                            <div class="mt-32 flex-align flex-wrap gap-32">
                                <div class="flex-align gap-8">
                                    <h4 class="mb-0">{{$product->price}}/ د أ </h4>
                                    <span
                                        class="text-md text-gray-500 text-decoration-line-through">{{$product->price}}/
                                        د أ </span>
                                </div>
                                <!-- <a href="#" class="btn btn-main rounded-pill">Order on What'sApp</a> -->
                            </div>
                            <span class="text-gray-900 d-block mb-8 mt-24"><br></span>
                            <div class="flex-between gap-16 flex-wrap">
                                <div class="flex-align flex-wrap gap-16">
                                    <div class="border border-gray-100 rounded-pill py-9 px-16 flex-align">
                                        <button type="button"
                                            class="quantity__minus p-4 text-gray-700 hover-text-main-600 flex-center"><i
                                                class="ph ph-minus"></i></button>
                                        <input id="quantity-{{$product->id}}" type="number"
                                            class="quantity__input border-0 text-center w-32" value="1">
                                        <button type="button"
                                            class="quantity__plus p-4 text-gray-700 hover-text-main-600 flex-center"><i
                                                class="ph ph-plus"></i></button>
                                    </div>
                                    <a data-product-id="{{$product->id}}"
                                        class="add-to-cart btn btn-main rounded-pill flex-align d-inline-flex gap-8 px-48">
                                        <i class="ph ph-shopping-cart"></i> Add To Cart</a>
                                    <a id="heart-{{$product->id}}"
                                        class="no-caret w-52 h-52 p-1 bg-main-50 text-main-600 text-xl hover-bg-main-600 hover-text-white flex-center rounded-circle">
                                        <i id="ph-heart-{{$product->id}}" data-product-id="{{$product->id}}"
                                            class="ph ph-heart {{ Auth::check() ? 'ph-heart_2' : 'Guest' }}"></i>
                                    </a>
                                </div>
                            </div>
                            @if($product->discount != 0)
                            <span class="mt-32 pt-32 text-gray-700 border-top border-gray-100 d-block"></span>
                            <div class="flex-align flex-wrap gap-16 bg-color-one rounded-8 py-16 px-24">
                                <div class="flex-align gap-16">
                                    <span class="text-main-600 text-sm">Special Offer:</span>
                                </div>
                                <div class="countdown" id="countdown11">
                                    <ul class="countdown-list flex-align flex-wrap">
                                        <li
                                            class="countdown-list__item text-heading flex-align gap-4 text-xs fw-medium w-28 h-28 rounded-4 border border-main-600 p-0 flex-center">
                                            <span class="days"></span></li>
                                        <li
                                            class="countdown-list__item text-heading flex-align gap-4 text-xs fw-medium w-28 h-28 rounded-4 border border-main-600 p-0 flex-center">
                                            <span class="hours"></span></li>
                                        <li
                                            class="countdown-list__item text-heading flex-align gap-4 text-xs fw-medium w-28 h-28 rounded-4 border border-main-600 p-0 flex-center">
                                            <span class="minutes"></span></li>
                                        <li
                                            class="countdown-list__item text-heading flex-align gap-4 text-xs fw-medium w-28 h-28 rounded-4 border border-main-600 p-0 flex-center">
                                            <span class="seconds"></span></li>
                                    </ul>
                                </div>
                                <span class="text-gray-900 text-xs">Remains untill the end of the offer</span>
                            </div>
                            @endif
                            @if($product->quantity < 11) <div class="mb-24">
                                <div class="mt-32 flex-align gap-12 mb-16">
                                    <span
                                        class="w-32 h-32 bg-white flex-center rounded-circle text-main-600 box-shadow-xl"><i
                                            class="ph-fill ph-lightning"></i></span>
                                    <h6 class="text-md mb-0 fw-bold text-gray-900">Products are almost sold out</h6>
                                </div>
                                <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar"
                                    aria-label="Basic example" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-main-two-600 rounded-pill" style="width: 81%"></div>
                                </div>
                                <span class="text-sm text-gray-700 mt-8">Available only:{{$product->quantity}}</span>
                        </div>
                        @endif


                        <span class="mt-32 pt-32 text-gray-700 border-top border-gray-100 d-block"></span>

                        <div class="flex-between gap-16 p-12 border border-main-two-600 border-dashed rounded-8 mb-16">
                            <div class="flex-align gap-12">
                                <button type="button"
                                    class="w-18 h-18 flex-center border border-gray-900 text-xs rounded-circle hover-bg-gray-100">
                                    <i class="ph ph-plus"></i>
                                </button>
                                <span class="text-gray-900 fw-medium text-xs">Mfr. coupon. $3.00 off 5</span>
                            </div>
                            <a href="cart.html"
                                class="text-xs fw-semibold text-main-two-600 text-decoration-underline hover-text-main-two-700">View
                                Details</a>
                        </div>
                        <ul class="list-inside ms-12">
                            <li class="text-gray-900 text-sm mb-8">Buy 1, Get 1 FREE</li>
                            <li class="text-gray-900 text-sm mb-0">Buy 1, Get 1 FREE</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="product-details__sidebar border border-gray-100 rounded-16 overflow-hidden">
                <div class="p-24">
                    <div class="flex-between bg-main-600 rounded-pill p-8">
                        <div class="flex-align gap-8">
                            <span class="w-44 h-44 bg-white rounded-circle flex-center text-2xl"><i
                                    class="ph ph-storefront"></i></span>
                            <span class="text-white">by Marketpro</span>
                        </div>
                        <a href="shop.html" class="btn btn-white rounded-pill text-uppercase">View Store</a>
                    </div>
                </div>
                <div class="p-24 bg-color-one d-flex align-items-start gap-24 border-bottom border-gray-100">
                    <span class="w-44 h-44 bg-white text-main-600 rounded-circle flex-center text-2xl flex-shrink-0">
                        <i class="ph-fill ph-truck"></i>
                    </span>
                    <div class="">
                        <h6 class="text-sm mb-8">Fast Delivery</h6>
                        <p class="text-gray-700">Lightning-fast shipping, guaranteed.</p>
                    </div>
                </div>
                <div class="p-24 bg-color-one d-flex align-items-start gap-24 border-bottom border-gray-100">
                    <span class="w-44 h-44 bg-white text-main-600 rounded-circle flex-center text-2xl flex-shrink-0">
                        <i class="ph-fill ph-credit-card"></i>
                    </span>
                    <div class="">
                        <h6 class="text-sm mb-8">Payment</h6>
                        <p class="text-gray-700">Payment upon receipt of goods, Payment by card in the department,
                            Google Pay, Online card.</p>
                    </div>
                </div>
                <div class="p-24 bg-color-one d-flex align-items-start gap-24 border-bottom border-gray-100">
                    <span class="w-44 h-44 bg-white text-main-600 rounded-circle flex-center text-2xl flex-shrink-0">
                        <i class="ph-fill ph-check-circle"></i>
                    </span>
                    <div class="">
                        <h6 class="text-sm mb-8">Warranty</h6>
                        <p class="text-gray-700">The Consumer Protection Act does not provide for the return of this
                            product of proper quality.</p>
                    </div>
                </div>
                <div class="p-24 bg-color-one d-flex align-items-start gap-24 border-bottom border-gray-100">
                    <span class="w-44 h-44 bg-white text-main-600 rounded-circle flex-center text-2xl flex-shrink-0">
                        <i class="ph-fill ph-package"></i>
                    </span>
                    <div class="">
                        <h6 class="text-sm mb-8">Packaging</h6>
                        <p class="text-gray-700">Research & development value proposition graphical user interface
                            investor.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection