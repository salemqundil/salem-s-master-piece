<script>
    $(document).ready(function() {
        $('#search-input').on('keyup', function() {
            let query = $(this).val();
            let resultsDiv = document.getElementById('search-results');

            $.ajax({
                url: '/products/search',
                type: 'GET',
                data: {
                    query: query
                },
                success: function(products) {
                    resultsDiv.innerHTML = '';
                    resultsDiv.classList.remove('d-none');
                    // Debug the response
                    console.log(products[0]['product_images'][0]);
                    $('#search-results').empty();
                    if (products.length > 0) {
                        products.forEach(product => {
                            resultsDiv.innerHTML += `
                             <div>
                <div
                    class="product-card style-two border border-gray-100 hover-border-main-600 position-relative transition-2 flex-align align-content-center align-items-center" style="height:120px">
                    <div class="w-50">
                        </span>
                        <span class="flex-center w-100"><a href="/product/${product.id}" class="product-card__thumb flex-center w-100 p-10 pe-0 z-0">
                                <img src="${product.product_images[0].image}" style="height:60%; width:70%" alt="">
                            </a></span>
                    </div>
                    <div class="product-card__content w-75 p-10 ps-0 pe-20 flex align-content-center align-items-center">
                        <div class="product-card__price mb-8">
                            <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                ${product.price}</span>
                            <span
                                class="text-heading text-md fw-semibold text-28">${product.price - (product.price * product.discount) / 100}<span
                                    class="text-gray-500 fw-normal">/ د أ</span> </span>
                        </div>
                        <h6 class="title text-lg fw-semibold mt-12 mb-8">
                            <a href="product-details.html"
                                class="link text-line-2">${product.name.substring(0, 60)}</a>
                        </h6>
                    </div>
                </div>
            </div>
                           
                        `;
                        });
                    } else {
                        resultsDiv.innerHTML = '<div class="p-3">No products found</div>';

                        $('#search-results').html('<p>No products found.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                    console.error("Response:", xhr.responseText);
                }
            });
        });
    });
</script>
<!-- // <div class="p-3 border-bottom hover-bg-light">
                            //     <strong>${product.name}</strong><br>
                            //     ${product.description}<br>
                            //     Price: $${product.price}
                            // </div> -->