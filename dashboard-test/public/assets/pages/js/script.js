$(document).ready(function() {
    // حدث عند النقر على أي فئة
    
    $('.remove-cart-btn').on('click', function() {
        var row = $(this).closest('tr');  // Get the row of the cart item
        var productId = row.data('product-id');  // Assuming each row has a product ID data attribute
  
        // Send AJAX request to remove item from the cart
        $.ajax({
            url: 'cart/remove',  // Laravel route for removing item
            type: 'POST',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: productId
            },
            success: function(response) {
                // On success, remove the row from the cart
                row.remove();
                // alert(response.message);  // Optionally, show a message
            },
            error: function() {
                alert('Error removing item from cart');
            }
        });
    });
        // Handle "Add to Cart" button click
        $('.add-to-cart').on('click', function() {
            var productId = $(this).data('product-id');
            var quantity = $('#quantity-' + productId).val();
            console.log(productId);
            // Send the AJAX request to add the product to the cart
            $.ajax({
                url: '/cart/add',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // إضافة رمز CSRF
                    product_id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    // Display the success message
                    Toast.fire({
                        icon: 'success', // أيقونة النجاح
                        title: 'Product added to cart successfully!' // الرسالة
                    });
                    // alert(response.message);

                },
                error: function() {
                    toastr.success("Error adding lll to cart!");
                    // alert('Error adding to cart');
                }
            })
        });

    });
  
