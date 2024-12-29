@extends('pages.layouts.header')

@section('content')
<!-- ========================= Breadcrumb Start =============================== -->
<div class="breadcrumb py-26 bg-main-two-50">
    <div class="container container-lg">
        <div class="breadcrumb-wrapper flex-between flex-wrap gap-16">
            <h6 class="mb-0">Cart</h6>
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
                <li class="text-sm text-main-600"> Product Cart </li>
            </ul>
        </div>
    </div>
</div>
<!-- ========================= Breadcrumb End =============================== -->

<!-- ================================ Cart Section Start ================================ -->
<section class="cart py-80">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-xl-9 col-lg-8">
                <div class="cart-table border border-gray-100 rounded-8 px-40 py-48">
                    <div class="overflow-x-auto scroll-sm scroll-sm-horizontal">

                        <table class="table style-three">
                            <thead>
                                <tr>
                                    <th class="h6 mb-0 text-lg fw-bold">Delete</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Product Name</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Price</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Quantity</th>
                                    <th class="h6 mb-0 text-lg fw-bold">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                <tr data-product-id="{{ $item['product']['id'] }}">
                                    <td>
                                        <button type="button"
                                            class="remove-cart-btn flex-align gap-12 hover-text-danger-600">
                                            <i class="ph ph-x-circle text-2xl d-flex"></i>
                                            Remove
                                        </button>
                                    </td>
                                    <td>
                                        <div class="table-product d-flex align-items-center gap-24">
                                            <a href="/product/{{ $item['product']['id'] }}"
                                                class="table-product__thumb border border-gray-100 rounded-8 flex-center ">
                                                <img src="{{ strpos($item['product']['productImages'][0]['image'], 'http') === 0 ? $item['product']['productImages'][0]['image'] : asset('upload/products/' . $item['product']['productImages'][0]['image']) }}"
                                                    style="max-width:90%;max-height:96%" class="w-100" alt="">
                                            </a>
                                            <div class="table-product__content text-start">

                                                <h6 class="title text-lg fw-semibold mb-8">
                                                    <a href="/product/{{ $item['product']['id'] }}" class="link text-line-2"
                                                        tabindex="0">{{$item['product']['name']}}</a>
                                                </h6>

                                                <div class="flex-align gap-16 mb-16">
                                                    <div class="flex-align gap-6">
                                                        <span class="text-md fw-medium text-warning-600 d-flex"><i
                                                                class="ph-fill ph-star"></i></span>
                                                        <span class="text-md fw-semibold text-gray-900">4.8</span>
                                                    </div>
                                                    <span class="text-sm fw-medium text-gray-200">|</span>
                                                    <span class="text-neutral-600 text-sm">128 Reviews</span>
                                                </div>

                                                <div class="flex-align gap-16">
                                                    <a href="http://127.0.0.1:8000/shop?category={{ $item['product']['category']['id'] }}"
                                                        class="product-card__cart btn bg-gray-50 text-heading text-sm hover-bg-main-600 hover-text-white py-7 px-8 rounded-8 flex-center gap-8 fw-medium">
                                                        {{$item['product']['category']['name']}}
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="price text-lg h6 mb-0 fw-semibold">{{$item['product']['price']}}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex rounded-4 overflow-hidden">
                                            <button type="button"
                                                class="quantity__minus_2 border border-end border-gray-100 flex-shrink-0 h-48 w-48 text-neutral-600 flex-center hover-bg-main-600 hover-text-white">
                                                <i class="ph ph-minus"></i>
                                            </button>
                                            <input type="number"
                                                class="quantity__input flex-grow-1 border border-gray-100 border-start-0 border-end-0 text-center w-32 px-4"
                                                value="{{$item['quantity']}}" min="1">
                                            <button type="button"
                                                class="quantity__plus_2 border border-end border-gray-100 flex-shrink-0 h-48 w-48 text-neutral-600 flex-center hover-bg-main-600 hover-text-white">
                                                <i class="ph ph-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="final_price text-lg h6 mb-0 fw-semibold">{{$item['total_price']}}</span><span>/
                                            د أ</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="cart-sidebar border border-gray-100 rounded-8 px-24 py-40">
                    <h6 class="text-xl mb-32">Cart Totals</h6>
                    <div class="bg-color-three rounded-8 p-24">
                        <div class="mb-32 flex-between gap-8">
                            <span class="text-gray-900 font-heading-two">Total Items</span>
                            <span id="total_cart" class="text-gray-900 fw-semibold">{{count($cartItems)}}</span>
                        </div>
                    </div>
                    <div class="bg-color-three rounded-8 p-24 mt-24">
                        <div class="flex-between gap-8">
                            <span class="text-gray-900 text-xl fw-semibold">Total</span>
                            <span id="total_price" class="text-gray-900 text-xl fw-semibold">$250.00</span>
                        </div>
                    </div>
                    <div class="flex-between flex-wrap gap-16 mt-16">
                        <div class="flex-align gap-16">
                            <input type="text" class="common-input" placeholder="Coupon Code">
                            <button type="submit" class="btn btn-main py-18 w-100 rounded-8">أضف كوبون</button>
                        </div>
                        <button type="submit" class="text-lg text-gray-500 hover-text-main-600">Update Cart</button>
                    </div>
                    <a href="checkout.html" class="btn btn-main mt-40 py-18 w-100 rounded-8">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================ Cart Section End ================================ -->

<script>
$(document).ready(function() {
    calculateTotal();
    // Handle the removal of an item
    $('.remove-cart-btn').on('click', function() {
        var row = $(this).closest('tr'); // Get the row of the cart item
        var productId = row.data('product-id'); // Assuming each row has a product ID data attribute
        // Send AJAX request to remove item from the cart
        $.ajax({
            url: 'cart/remove', // Laravel route for removing item
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId
            },
            success: function(response) {
                $('#total_cart').text(Object.keys(response.cart).length);
                // toastr.error("removing item from cart!");
                Toast.fire({
                    icon: 'success', // أيقونة النجاح
                    title: 'Product removed from cart!' // الرسالة
                });
                console.log(Object.keys(response.cart).length);
                console.log(response.cart);
                calculateTotal();
                // On success, remove the row from the cart
                row.remove();
                // alert(response.message);  // Optionally, show a message
            },
            error: function() {
                alert('Error removing item from cart');
            }
        });
    });

    // Handle quantity increase
    $('.quantity__plus_2').on('click', function() {
        var inputField = $(this).closest('td').find('.quantity__input');
        var newQuantity = parseInt(inputField.val()) + 1;
        var final = $(this).closest('tr').find('.final_price');
        var price = $(this).closest('tr').find('.price').text();
        final.text((price * newQuantity).toFixed(2));
        inputField.val(newQuantity);
        updateCartQuantity(inputField, newQuantity);
        calculateTotal();
    });

    // Handle quantity decrease
    $('.quantity__minus_2').on('click', function() {
        var inputField = $(this).closest('td').find('.quantity__input');
        var newQuantity = Math.max(1, parseInt(inputField.val()) - 1);
        var final = $(this).closest('tr').find('.final_price');
        var price = $(this).closest('tr').find('.price').text();
        final.text((price * newQuantity).toFixed(2));
        inputField.val(newQuantity);
        updateCartQuantity(inputField, newQuantity);
        calculateTotal();
    });

    // Update cart quantity via AJAX
    function updateCartQuantity(inputField, quantity) {
        var row = inputField.closest('tr');
        var productId = row.data('product-id'); // Assuming the row has the product ID data attribute

        $.ajax({
            url: 'cart/update', // Laravel route for updating quantity
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: productId,
                quantity: quantity
            },
            success: function(response) {
                // Update the total price for the item
                row.find('.price-total').text('$' + response.newTotal);
                // alert('Cart updated!');
            },
            error: function() {
                alert('Error updating cart');
            }
        });
    }
    // Function to calculate the total
    function calculateTotal() {
    let total = 0; // إجمالي السعر لكل المنتجات

    // المرور على كل صف في جدول السلة
    $('.cart-table tbody tr').each(function () {
        // الحصول على السعر من الصف الحالي
        let priceText = $(this).find('.price').text().trim(); 
        let price = parseFloat(priceText.replace(/[^\d.]/g, '')); // إزالة أي رموز أو أحرف غير رقمية
        // الحصول على الكمية من الحقل الخاص بها
        let quantity = parseInt($(this).find('.quantity__input').val()); 
        
        // التحقق من أن السعر والكمية أرقام صحيحة
        if (!isNaN(price) && !isNaN(quantity)) {
            total += price * quantity; // إضافة حاصل الضرب للإجمالي
        }
    });

        // Update the total in the sidebar or wherever needed
        $('#total_price').text(total.toFixed(2));
    }

});
</script>

@endsection