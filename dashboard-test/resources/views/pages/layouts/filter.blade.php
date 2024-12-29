 <!-- Sidebar Start -->
 <div class="col-lg-3">
     <div class="shop-sidebar">
         <button type="button"
             class="shop-sidebar__close d-lg-none d-flex w-32 h-32 flex-center border border-gray-100 rounded-circle hover-bg-main-600 position-absolute inset-inline-end-0 me-10 mt-8 hover-text-white hover-border-main-600">
             <i class="ph ph-x"></i>
         </button>
         <div class="shop-sidebar__box border border-gray-100 rounded-8 p-32 mb-32">
             <h6 class="text-xl border-bottom border-gray-100 pb-24 mb-24">Product Category</h6>
             <ul class="max-h-540 overflow-y-auto scroll-sm">
                <li class="mb-24">
                    <a
                        class="filter-category w-100 fw-bold fs-5 text-gray-900 hover-text-main-600 text-end"
                        data-category-id="0">
                        عرض الكل
                    </a>
                </li>
                 @foreach($categories as $category)
                 <li class="mb-24">
                     <a
                         class="filter-category w-100 fw-bold fs-5 text-gray-900 hover-text-main-600 text-end"
                         data-category-id="{{ $category->id }}">
                         {{$category->name}} ({{ $category->products_count }})
                     </a>
                 </li>
                 @endforeach
             </ul>
         </div>

         <div class="shop-sidebar__box border border-gray-100 rounded-8 p-32 mb-32">
             <h6 class="text-xl border-bottom border-gray-100 pb-24 mb-24">Filter by Price</h6>
             <div class="custom--range">
                 <div id="slider-range"></div>
                 <div class="flex-between flex-wrap-reverse gap-8 mt-24 ">
                     <button type="button" class="btn btn-main h-40 flex-align">Filter </button>
                     <div class="custom--range__content flex-align gap-8">
                         <span class="text-gray-500 text-md flex-shrink-0">Price:</span>
                         <input type="text" class="custom--range__prices text-neutral-600 text-start text-md fw-medium"
                             id="amount" readonly>
                     </div>
                 </div>
             </div>
         </div>
         <div class="shop-sidebar__box rounded-8">
             <img src="assets/pages/images/thumbs/advertise-img1.png" alt="">
         </div>
     </div>
 </div>
 <!-- Sidebar End -->