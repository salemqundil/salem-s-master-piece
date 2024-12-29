@extends('pages.layouts.header')

@section('content')

<section class="cart py-80">
    <div class="container container-lg">
        <div class="row gy-4 flex-center">
            <div class="col-lg-11">
                <div class="cart-table border border-gray-100 rounded-8">
                    <div class="overflow-x-auto scroll-sm scroll-sm-horizontal flex-center">
                        @if(count($products) > 0)
                        <table class="table rounded-8 overflow-hidden table-responsive-custom">
                            <thead>
                                <tr class="border-bottom border-neutral-100">
                                    <th
                                        class="h6 mb-0 text-xl-center fw-bold px-40 py-32 border-end border-neutral-100">
                                        شراء</th>
                                    <th
                                        class="h6 mb-0 text-xl-center fw-bold px-40 py-32 border-end border-neutral-100">
                                        السعر</th>
                                    <th
                                        class="h6 mb-0 text-xl-center fw-bold px-40 py-32 border-end border-neutral-100">
                                        اسم المنتج</th>
                                    <th
                                        class="h6 mb-0 text-xl-center fw-bold px-40 py-32 border-end border-neutral-100">
                                        إزالة من المفضلة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr class="">
                                    <td data-label="شراء" class="px-40 py-32 border-end border-neutral-100 h-100">
                                        <span class="text-lg h6 mb-0 fw-semibold flex-center">
                                            @if($product->quantity > 0)
                                            <a data-product-id="{{$product->id}}"
                                                class="add-to-cart product-card__cart btn btn-main-two py-11 px-24 flex-align gap-8 mt-14 w-75 justify-content-center">
                                                أضف إلى السلة  <i class="ph ph-shopping-cart"></i>
                                            </a>
                                            @else غير متوفر
                                            @endif
                                        </span>
                                    </td>
                                    <td data-label="السعر" class="px-40 py-32 border-end border-neutral-100">
                                        <span class="text-lg h6 mb-0 fw-semibold">
                                            @if($product->discount > 0)
                                            <span
                                                class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                                {{__($product->price)}}
                                            </span>
                                            {{ $product->price - (($product->price) * ($product->discount) / 100)}}
                                            @else {{$product->price}}
                                            @endif
                                        </span>
                                    </td>
                                    <td data-label="اسم المنتج" class="px-40 py-32 border-end border-neutral-100">
                                        <div class="table-product d-flex flex-row-reverse align-items-center gap-24">
                                            <a href="/product/{{$product->id}}"
                                                class="table-product__thumb border border-gray-100 rounded-8 flex-center">
                                                <img src="{{ strpos($product->productImages[0]->image, 'http') === 0 ? $product->productImages[0]->image : asset('upload/products/' . $product->productImages[0]->image) }}"
                                                   style="max-height:100%" alt="">
                                            </a>
                                            <div class="table-product__content text-start">
                                                <h6 class="title text-lg fw-semibold mb-8 text-end">
                                                    <a href="/product/{{$product->id}}" class="link text-line-2"
                                                        tabindex="0">{{$product->name}}</a>
                                                </h6>
                                                <br>
                                                <div class="flex-align gap-16 flex-row-reverse">
                                                    <a href="http://127.0.0.1:8000/shop?category={{ $product->category->id }}"
                                                        class="product-card__cart btn bg-gray-50 text-heading text-sm hover-bg-main-600 hover-text-white py-7 px-8 rounded-8 flex-center gap-8 fw-medium">
                                                        {{$product->category->name}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="إزالة من المفضلة"
                                        class="px-40 py-xxl-5 border-end border-neutral-100 h-100">
                                        <button type="button" data-product-id="{{$product->id}}"
                                            class="ph-heart_2 w-100 remove-tr-btn flex-center gap-12 hover-text-danger-600 text-30 text-end">
                                            حذف
                                            <i class="ph ph-x-circle text-2xl d-flex"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <h3>لا يوجد منتجات في المفضلة</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection