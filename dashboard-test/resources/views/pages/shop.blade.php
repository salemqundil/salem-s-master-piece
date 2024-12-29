@extends('pages.layouts.header')
@section('content')

<!-- ========================= Breadcrumb Start =============================== -->
<div class="breadcrumb py-26 bg-main-two-50">
    <div class="container container-lg">
        <div class="breadcrumb-wrapper flex-between flex-wrap gap-16">
            <h6 class="mb-0">Shop</h6>
            <ul class="flex-align gap-8 flex-wrap">
                <li class="text-sm">
                    <a href="index.html" class="text-gray-900 flex-align gap-8 hover-text-main-600">
                        <i class="ph ph-house"></i>
                        Home
                    </a>
                </li>
                <li class="flex-align">
                    <i class="ph ph-caret-right"></i>
                </li>
                <li class="text-sm text-main-600"> Product Shop </li>
            </ul>
        </div>
    </div>
</div>
<!-- ========================= Breadcrumb End =============================== -->
<section class="shop py-80">
    <div class="container container-lg">
        <div class="row">
            <!-- Content Start -->
            <div class="col-lg-9">
                <!-- Top Start -->
                
                <!-- Top End -->

                <div id="products-list" class="list-grid-wrapper ">
                    @foreach($products as $product)
                    <div
                        class="product-card text-end h-100 p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="/product/{{$product->id}}"
                            class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                            @if($product->discount > 0)
                            <span
                                class="product-card__badge bg-danger-600 px-8 py-4 text-sm text-white position-absolute inset-inline-start-0 inset-block-start-0">
                                {{__(substr($product->discount, 0, 2))}}% خصم</span>@endif
                            <img src="{{ strpos($product->productImages[0]->image, 'http') === 0 ? $product->productImages[0]->image : asset('upload/products/' . $product->productImages[0]->image) }}"
                                alt="" style="height:90%;" class="w-auto max-w-275">
                        </a>
                        <div class="product-card__content mt-16 w-100">
                            <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                <a href="/product/{{$product->id}}" class="link text-line-2"
                                    tabindex="0">{{ $product->name}}</a>
                            </h6>
                            <div class="flex-align flex-row-reverse gap-4 align-content-end align-items-end">
                                <span class="text-main-600 text-md d-flex">
                                    <div class="border border-gray-100 rounded-pill py-6 px-9 flex-align">
                                        <button type="button"
                                            class="quantity__minus p-1 text-gray-700 hover-text-main-600 flex-center"><i
                                                class="ph ph-minus"></i></button>
                                        <input id="quantity-{{$product->id}}" type="number"
                                            class="quantity__input border-0 text-center w-32" value="1">
                                        <button type="button"
                                            class="quantity__plus p-1 text-gray-700 hover-text-main-600 flex-center"><i
                                                class="ph ph-plus"></i></button>
                                    </div>
                                </span>
                                <span class="text-gray-500 text-xs"></span>
                            </div>


                            <div class="product-card__price my-20">
                                @if($product->discount > 0)
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                    {{ $product->price}}</span>
                                <span
                                    class="text-heading text-md fw-semibold ">{{$product->price - ($product->price *  $product->discount / 100)}}
                                    <span class="text-gray-500 fw-normal">/ د أ </span> </span>
                                @else
                                <span class="text-heading text-lg  fw-semibold ">{{$product->price }} <span
                                        class="text-gray-500 fw-normal">/ د أ </span> </span>
                                @endif
                            </div>
                            <a data-product-id="{{$product->id}}"
                                class="add-to-cart product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 px-24 rounded-8 flex-center gap-8 fw-medium"
                                tabindex="0">
                                أضف إلى السلة <i class="ph ph-shopping-cart"></i>
                            </a>
                            <div class="mt-8">
                                <div class="progress w-100 bg-color-three rounded-pill h-4" role="progressbar"
                                    aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-main-two-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <span class="text-gray-900 text-xs fw-medium mt-8">Sold: 18/35</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination Start -->
                @if ($products->hasPages())
                <ul id="pagination_1" class="pagination flex-center flex-wrap gap-16">
                    <li class="page-item">
                        <a class="page-link h-64 w-64 flex-center text-xxl rounded-8 fw-medium text-neutral-600 border border-gray-100"
                            href="{{ $products->url($products->currentPage()-1) }}">
                            <i class="ph-bold ph-arrow-left"></i>
                        </a>
                    </li>
                    @for($i = 1; $i <= $products->lastPage(); $i++)
                        <li class="page-item @if ($products->currentPage() == $i) active @endif">
                            <a class="page-link h-64 w-64 flex-center text-md rounded-8 fw-medium text-neutral-600 border border-gray-100"
                                href="{{ $products->url($i) }}">{{$i}}</a>
                        </li>
                        @endfor
                        <li class="page-item">
                            <a class="page-link h-64 w-64 flex-center text-xxl rounded-8 fw-medium text-neutral-600 border border-gray-100"
                                href="{{ $products->url($products->currentPage()+1) }}">
                                <i class="ph-bold ph-arrow-right"></i>
                            </a>
                        </li>
                </ul>
                @endif
                <!-- Pagination End -->
            </div>
            <!-- Content End -->
            @include('pages.layouts.filter')

        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection