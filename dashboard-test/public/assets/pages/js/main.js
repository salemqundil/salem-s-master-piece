(function ($) {
  "use strict";
  
  // ==========================================
  //      Start Document Ready function
  // ==========================================
  $(document).ready(function () {
    wishlistCss();
  // ============== Mobile Menu Sidebar & Offcanvas Js Start ========
  $('.toggle-mobileMenu').on('click', function () {
    $('.mobile-menu').addClass('active');
    $('.side-overlay').addClass('show');
    $('body').addClass('scroll-hide-sm');
  }); 

  $('.close-button, .side-overlay').on('click', function () {
    $('.mobile-menu').removeClass('active');
    $('.side-overlay').removeClass('show');
    $('body').removeClass('scroll-hide-sm');
  }); 
  // ============== Mobile Menu Sidebar & Offcanvas Js End ========
  
  // ============== Mobile Nav Menu Dropdown Js Start =======================
  var windowWidth = $(window).width(); 
  
  $('.has-submenu').on('click', function () {
    var thisItem = $(this); 
    
    if(windowWidth < 992) {
      if(thisItem.hasClass('active')) {
        thisItem.removeClass('active')
      } else {
        $('.has-submenu').removeClass('active')
        $(thisItem).addClass('active')
      }
      
      var submenu = thisItem.find('.nav-submenu');
      
      $('.nav-submenu').not(submenu).slideUp(300);
      submenu.slideToggle(300);
    }
    
  });
  // ============== Mobile Nav Menu Dropdown Js End =======================
    
  // ===================== Scroll Back to Top Js Start ======================
  var progressPath = document.querySelector('.progress-wrap path');
  var pathLength = progressPath.getTotalLength();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
  progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
  progressPath.style.strokeDashoffset = pathLength;
  progressPath.getBoundingClientRect();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
  var updateProgress = function () {
    var scroll = $(window).scrollTop();
    var height = $(document).height() - $(window).height();
    var progress = pathLength - (scroll * pathLength / height);
    progressPath.style.strokeDashoffset = progress;
  }
  updateProgress();
  $(window).scroll(updateProgress);
  var offset = 50;
  var duration = 550;
  jQuery(window).on('scroll', function() {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.progress-wrap').addClass('active-progress');
    } else {
      jQuery('.progress-wrap').removeClass('active-progress');
    }
  });
  jQuery('.progress-wrap').on('click', function(event) {
    event.preventDefault();
    jQuery('html, body').animate({scrollTop: 0}, duration);
    return false;
  })
  // ===================== Scroll Back to Top Js End ======================

  // ========================== add active class to ul>li top Active current page Js Start =====================
  function dynamicActiveMenuClass(selector) {
    let FileName = window.location.pathname.split("/").reverse()[0];

    selector.find("li").each(function () {
      let anchor = $(this).find("a");
      if ($(anchor).attr("href") == FileName) {
        $(this).addClass("activePage");
      }
    });
    // if any li has activePage element add class
    selector.children("li").each(function () {
      if ($(this).find(".activePage").length) {
        $(this).addClass("activePage");
      }
    });
    // if no file name return
    if ("" == FileName) {
      selector.find("li").eq(0).addClass("activePage");
    }
  }
  if ($('ul').length) {
    dynamicActiveMenuClass($('ul'));
  }
  // ========================== add active class to ul>li top Active current page Js End =====================

  
  // ========================== Select2 Js Start =================================
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
  // ========================== Select2 Js End =================================

  
  // ========================== Select2 Js End =================================
  $('.search-icon').on('click', function () {
    $('.search-box').addClass('active'); 
  }); 
  $('.search-box__close').on('click', function () {
    $('.search-box').removeClass('active'); 
  }); 
  // ========================== Select2 Js End =================================

  
  // ========================== Category Dropdown Responsive Js Start =================================
  $('.responsive-dropdown .has-submenus-submenu').on('click', function () {

    var windowWidth = $(window).width(); 
    if(windowWidth < 992) { 
      if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $(this).children('.submenus-submenu').slideUp();
      } else {
        $('.responsive-dropdown .has-submenus-submenu').removeClass('active');
        $('.responsive-dropdown .has-submenus-submenu').children('.submenus-submenu').slideUp();
  
        $(this).addClass('active');
        $(this).children('.submenus-submenu').slideDown();
      }
    }
  });
  // ========================== Category Dropdown Responsive Js End =================================

  // ========================== On Click Category menu show Js Start =================================
  $('.category__button').on('click', function () {    
    $('.responsive-dropdown').addClass('active'); 
    $('.side-overlay').addClass('show');
    $('body').addClass('scroll-hide-sm');
  }); 
  $('.side-overlay, .close-responsive-dropdown').on('click', function () {    
    $('.responsive-dropdown').removeClass('active'); 
    $('.side-overlay').removeClass('show');
    $('body').removeClass('scroll-hide-sm');
  }); 
  // ========================== On Click Category menu show Js End =================================

  
  // ========================== Set Language in dropdown Js Start =================================
  $('.selectable-text-list li').each(function () {
    var thisItem = $(this); 

    thisItem.on('click', function () {
      const listText = thisItem.text(); 
      var item = thisItem.parent().parent().find('.selected-text').text(listText); 
    }); 
  }); 
  // ========================== Set Language in dropdown Js End =================================

  
  // ========================= Banner Slider Js Start ==============
  $('.banner-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    nextArrow: '#banner-next',
    prevArrow: '#banner-prev',
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });  
  // ========================= Banner Slider Js End ===================


   // ========================= hot deals Slider Js Start ==============
   $('.feature-item-wrapper').slick({
    slidesToShow: 10,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    nextArrow: '#feature-item-wrapper-next',
    prevArrow: '#feature-item-wrapper-prev',
    responsive: [
      {
        breakpoint: 1699,
        settings: {
          slidesToShow: 9,
        }
      },
      {
        breakpoint: 1599,
        settings: {
          slidesToShow: 8,
        }
      },
      {
        breakpoint: 1399,
        settings: {
          slidesToShow: 6,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 5,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 424,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 359,
        settings: {
          slidesToShow: 1,
        }
      },
    ]
  });  
  // ========================= hot deals Slider Js End ===================

  
  // ========================= Banner Slider Js Start ==============
  $('.banner-item-two__slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: true,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    nextArrow: '#banner-next',
    prevArrow: '#banner-prev',
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });  
  // ========================= Banner Slider Js End ===================

  
  // ========================= flash Sale Four Slider Js Start ==============
  $('.flash-sales__slider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    nextArrow: '#flash-next',
    prevArrow: '#flash-prev',
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          arrows: false,
        }
      }
    ]
  });  
  // ========================= flash Sale Four Slider Js End ==================
    
  // ========================= hot deals Slider Js Start ==============
  $('.hot-deals-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    nextArrow: '#deals-next',
    prevArrow: '#deals-prev',
    responsive: [
      {
        breakpoint: 1399,
        settings: {
          slidesToShow: 3,
          arrows: false,
        }
      },
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 2,
          arrows: false,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          arrows: false,
        }
      },
    ]
  });  
  // ========================= hot deals Slider Js End ===================
    
    
  // ========================= hot deals Slider Js Start ==============
  $('.deals-week-slider').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    nextArrow: '#deal-week-next',
    prevArrow: '#deal-week-prev',
    responsive: [
      {
        breakpoint: 1599,
        settings: {
          slidesToShow: 5,
          arrows: false,
        }
      },
      {
        breakpoint: 1399,
        settings: {
          slidesToShow: 3,
          arrows: false,
        }
      },
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 2,
          arrows: false,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          arrows: false,
        }
      },
    ]
  });  
  // ========================= hot deals Slider Js End ===================
    

  // ========================= hot deals Slider Js Start ==============
  $('.top-selling-product-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    nextArrow: '#top-selling-next',
    prevArrow: '#top-selling-prev',
    responsive: [
      {
        breakpoint: 1399,
        settings: {
          slidesToShow: 3,
          arrows: false,
        }
      },
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 2,
          arrows: false,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          arrows: false,
        }
      },
    ]
  });  
  // ========================= hot deals Slider Js End ===================

  
  // ========================= hot deals Slider Js Start ==============
  $('.organic-food__slider').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    nextArrow: '#organic-next',
    prevArrow: '#organic-prev',
    responsive: [
      {
        breakpoint: 1599,
        settings: {
          slidesToShow: 6,
          arrows: false,
        }
      },
      {
        breakpoint: 1399,
        settings: {
          slidesToShow: 4,
          arrows: false,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          arrows: false,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 2,
          arrows: false,
        }
      },
      {
        breakpoint: 424,
        settings: {
          slidesToShow: 1,
          arrows: false,
        }
      },
    ]
  });  
  // ========================= hot deals Slider Js End ===================

  
  // ========================= New arrival Slider Js Start ==============
  $('.new-arrival__slider').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    nextArrow: '#new-arrival-next',
    prevArrow: '#new-arrival-prev',
    responsive: [
      {
        breakpoint: 1599,
        settings: {
          slidesToShow: 6,
          arrows: false,
        }
      },
      {
        breakpoint: 1399,
        settings: {
          slidesToShow: 4,
          arrows: false,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          arrows: false,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 2,
          arrows: false,
        }
      },
      {
        breakpoint: 424,
        settings: {
          slidesToShow: 1,
          arrows: false,
        }
      },
    ]
  });  
  // ========================= New arrival Slider Js End ===================

  
  // ========================= hot deals Slider Js Start ==============
  $('.short-product-list').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    prevArrow: '<button type="button" class="slick-prev border border-gray-100 w-30 h-30 bg-transparent rounded-pill position-absolute hover-bg-main-600 hover-text-white hover-border-main-600 transition-1"><i class="ph ph-caret-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next border border-gray-100 w-30 h-30 bg-transparent rounded-pill position-absolute hover-bg-main-600 hover-text-white hover-border-main-600 transition-1"><i class="ph ph-caret-right"></i></button>',
  });  
  
// ========================= hot deals Slider Js End ===================

  
  // ========================= hot deals Slider Js Start ==============
  $('.brand-slider').slick({
    slidesToShow: 8,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    nextArrow: '#brand-next',
    prevArrow: '#brand-prev',
    responsive: [
      {
        breakpoint: 1599,
        settings: {
          slidesToShow: 7,
          arrows: false,
        }
      },
      {
        breakpoint: 1399,
        settings: {
          slidesToShow: 6,
          arrows: false,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 5,
          arrows: false,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 4,
          arrows: false,
        }
      },
      {
        breakpoint: 424,
        settings: {
          slidesToShow: 3,
          arrows: false,
        }
      },
      {
        breakpoint: 359,
        settings: {
          slidesToShow: 2,
          arrows: false,
        }
      },
    ]
  });  
  // ========================= hot deals Slider Js End ===================

  
  // ========================= Category Dropdown Two Js Start ===============================
  $('.category-two .category__button').on('click', function () {
    $('.category-two .category__button').toggleClass('active')
    $('.responsive-dropdown.style-two').addClass('active').slideToggle(400); 
  }); 
  // ========================= Category Dropdown Two Js End ===============================
  
  
  // ========================= Featured Products Slider Js Start ==============
  $('.featured-product-slider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    nextArrow: '#featured-products-next',
    prevArrow: '#featured-products-prev',
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          arrows: false,
        }
      }
    ]
  });  
  // ========================= Featured Products Slider Js End ==================

  
  // ========================= hot deals Slider Js Start ==============
  $('.recommended-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    nextArrow: '#recommended-next',
    prevArrow: '#recommended-prev',
    responsive: [
      {
        breakpoint: 1399,
        settings: {
          slidesToShow: 3,
          arrows: false,
        }
      },
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 2,
          arrows: false,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          arrows: false,
        }
      },
    ]
  });  
  // ========================= hot deals Slider Js End ===================
  
  // ========================= hot deals Slider Js Start ==============
  $('.vendor-card__list.style-two').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    nextArrow: '#vendor-next',
    prevArrow: '#vendor-prev',
  });  
  // ========================= hot deals Slider Js End ===================
  
  
  // ========================= hot deals Slider Js Start ==============
  $('.top-brand__slider').slick({
    slidesToShow: 8,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1500,
    dots: false,
    pauseOnHover: true,
    arrows: true,
    draggable: true,
    rtl: $('html').attr('dir') === 'rtl' ? true : false,
    speed: 900,
    infinite: true,
    nextArrow: '#topBrand-next',
    prevArrow: '#topBrand-prev',
    responsive: [
      {
        breakpoint: 1599,
        settings: {
          slidesToShow: 7,
          arrows: false,
        }
      },
      {
        breakpoint: 1399,
        settings: {
          slidesToShow: 6,
          arrows: false,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 5,
          arrows: false,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 4,
          arrows: false,
        }
      },
      {
        breakpoint: 424,
        settings: {
          slidesToShow: 3,
          arrows: false,
        }
      },
      {
        breakpoint: 359,
        settings: {
          slidesToShow: 2,
          arrows: false,
        }
      },
    ]
  });  
  // ========================= hot deals Slider Js End ===================
 

  // ========================= Product Details Thumbs Slider Js Start ===================
  $('.product-details__thumb-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.product-details__images-slider'
  });

  $('.product-details__images-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.product-details__thumb-slider',
    dots: false,
    arrows: false,
    focusOnSelect: true
  });
  // ========================= Product Details Thumbs Slider Js End ===================

  
  // ========================= Increment & Decrement Js Start ===================
  var minus = $('.quantity__minus');
  var plus = $('.quantity__plus');

  $(plus).on('click', function () {
    var input = $(this).siblings('.quantity__input');
    var value = input.val(); 
    value++;
    input.val(value); 
  }); 

  $(minus).on('click', function () {
    var input = $(this).siblings('.quantity__input');
    var value = input.val(); 
    if(value > 1) {
      value--;
    }
    input.val(value); 
  }); 
  // ========================= Increment & Decrement Js End ===================

  
  // ========================= Color List Js Start ===================
  $('.color-list__button').on('click', function () {
    $('.color-list__button').removeClass('border-gray-900'); 

    if(!$(this).hasClass('border-gray-900')) {
      $(this).addClass('border-gray-900');
      $(this).removeClass('border-gray-50');
    } else {
      $(this).removeClass('border-gray-900');
      $(this).addClass('border-gray-50');
    };
  }); 
  // ========================= Color List Js End ===================

  // ========================== Range Slider Js Start =====================
  $(function() {
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 25,
        values: [ 0, 25 ],
        slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
    " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });
  // ========================== Range Slider Js End =====================

  
  // ========================== List Grid Js Start ================================
  $('.list-btn').on('click', function () {
    $('.grid-btn').addClass('border-gray-100'); 
    $('.grid-btn').removeClass('border-main-600 text-white bg-main-600'); 
    $('.list-grid-wrapper').removeClass('list-view'); 
    
    $(this).removeClass('border-gray-100'); 
    $(this).addClass('border-main-600 text-white bg-main-600'); 
    $('.list-grid-wrapper').addClass('list-view'); 
  }); 

  $('.grid-btn').on('click', function () {
    $('.list-btn').addClass('border-gray-100'); 
    $('.list-btn').removeClass('border-main-600 text-white bg-main-600'); 
    $('.list-grid-wrapper').removeClass('list-view'); 

    $(this).removeClass('border-gray-100'); 
    $(this).addClass('border-main-600 text-white bg-main-600'); 
  }); 
  // ========================== List Grid Js End ================================

  
  // ========================== Shop Sidebar Js Start ================================
  $('.sidebar-btn').on('click', function () {
    $(this).addClass('bg-main-600 text-white');
    $('.shop-sidebar').addClass('active');
    $('.side-overlay').addClass('show');
    $('body').addClass('scroll-hide-sm'); 
  }); 

  $('.side-overlay, .shop-sidebar__close').on('click', function () {
    $('.sidebar-btn').removeClass('bg-main-600 text-white');
    $('.shop-sidebar').removeClass('active');
    $('.side-overlay').removeClass('show');
    $('body').removeClass('scroll-hide-sm');
  }); 
  // ========================== Shop Sidebar Js End ================================

  
  // ========================== Remove Tr Js Start ================================
  $('.remove-tr-btn').on('click', function () {
    $(this).closest('tr').addClass('d-none')
  }); 
  // ========================== Remove Tr Js End ================================

  
  // ========================== Checkout Payment Method Js Start ================================
  $('.payment-item .form-check-input:checked').closest('.payment-item').find('.payment-item__content').show();

  $('.payment-item .form-check-input').on('change', function () {
      $('.payment-item__content').hide();
      $(this).closest('.payment-item').find('.payment-item__content').show();
  });
  // ========================== Checkout Payment Method Js End ================================

  
  // ================== Password Show Hide Js Start ==========
  $(".toggle-password").on('click', function() {
    $(this).toggleClass("active");
    var input = $($(this).attr("id"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  // ========================= Password Show Hide Js End ===========================
  

  });
  // ==========================================
  //      End Document Ready function
  // ==========================================

  // ========================= Preloader Js Start =====================
    $(window).on("load", function(){
      $('.preloader').fadeOut(); 
    })
    // ========================= Preloader Js End=====================

    // ========================= Header Sticky Js Start ==============
    $(window).on('scroll', function() {
      if ($(window).scrollTop() >= 260) {
        $('.header').addClass('fixed-header');
      }
      else {
          $('.header').removeClass('fixed-header');
      }
    }); 
    // ========================= Header Sticky Js End===================
    $('.filter-category').on('click', function() {
      // الحصول على ID الفئة
      let categoryId = $(this).data('category-id');
      // إرسال استدعاء Ajax إلى الخادم
      filter(categoryId);
  });

  // استخدام التفويض للنقر على أزرار الترقيم
  $('#pagination_1').on('click', '.page-link', function() {
      // الحصول على ID الفئة ورقم الصفحة
      let categoryId = $(this).data('category-id');
      let pageNum = $(this).data('page-id');
      console.log(pageNum);
      // إرسال استدعاء Ajax إلى الخادم
      filter(categoryId, pageNum);

  });

  function filter(categoryId, pageNum) {
      $.ajax({
          url: '/shop', // استبدل بعنوان API الخاص بك
          method: 'GET',
          data: {
              category_id: categoryId,
              page: pageNum
          }, // إرسال ID الفئة ورقم الصفحة
          success: function(data) {
              // إزالة المنتجات القديمة
              $('#products-list').empty();
              $('#pagination_1').empty();

              // التحقق من وجود روابط الترقيم
              if (data.links.length > 3) {
                  for (var i = 1; i <= data.last_page; i++) {
                      var page = `
                      <li class="page-item">
                          <a class="page-link h-64 w-64 flex-center text-md rounded-8 fw-medium text-neutral-600 border border-gray-100"
                            data-category-id="${data.data[0].category_id}" data-page-id="${i}">${i}</a>
                      </li>`;
                      $('#pagination_1').append(page);
                  }
              }

              // إضافة المنتجات الجديدة
              data.data.forEach(function(product) {
                  if (product.product_images[0].image.startsWith('http')) {
                      var image = product.product_images[0].image;
                  } else {
                      var image =
                          `http://127.0.0.1:8000/upload/products/${product.product_images[0].image}`;
                  }

                  if (product.discount > 0) {
                    var finalPrice = getFirstTwoDigits(product.price,product.discount);
                      var span =
                          `<span class="product-card__badge bg-danger-600 px-8 py-4 text-sm text-white text-end position-absolute inset-inline-start-0 inset-block-start-0">${product.discount.slice(0, 2)}% خصم</span>`;
                          var price = `<span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                    ${product.price}</span>
                                <span
                                    class="text-heading text-md fw-semibold ">${finalPrice}
                                    <span class="text-gray-500 fw-normal">/ د أ </span> </span>`;
                  } else {
                      var span = '';
                      var price = `<span class="text-heading text-lg  fw-semibold ">${product.price } <span
                                        class="text-gray-500 fw-normal">/ د أ </span> </span>`;
                  }
                                
                  var productItem = `
                      <div class="product-card text-end h-100 p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                          <a href="/product/${product.id}" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                              ${span}
                              <img src="${image}" alt="" style="height:90%;" class="w-auto max-w-275">
                          </a>
                          <div class="product-card__content mt-16 w-100">
                              <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                  <a href="product-details.html" class="link text-line-2" tabindex="0">${product.name}</a>
                              </h6>
                              <div class="flex-align flex-row-reverse gap-4 align-content-end align-items-end">
                              <span class="text-main-600 text-md d-flex">
                                  <div class="border border-gray-100 rounded-pill py-6 px-9 flex-align">
                                      <button type="button"
                                          class="quantity__minus p-1 text-gray-700 hover-text-main-600 flex-center"><i
                                              class="ph ph-minus"></i></button>
                                      <input id="quantity-${product.id}" type="number"
                                          class="quantity__input border-0 text-center w-32" value="1">
                                      <button type="button"
                                          class="quantity__plus p-1 text-gray-700 hover-text-main-600 flex-center"><i
                                              class="ph ph-plus"></i></button>
                                  </div>
                              </span>
                              <span class="text-gray-500 text-xs"></span>
                          </div>
                              <div class="mt-8">
                                  <div class="progress w-100 bg-color-three rounded-pill h-4" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                      <div class="progress-bar bg-main-two-600 rounded-pill" style="width: 35%"></div>
                                  </div>
                                  <span class="text-gray-900 text-xs fw-medium mt-8">Sold: 18/35</span>
                              </div>
                              <div class="product-card__price my-20">
                                  ${price}</div>
                              
                              <a data-product-id="${product.id}" class="add-to-cart product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 px-24 rounded-8 flex-center gap-8 fw-medium" tabindex="0">
                                  Add To Cart <i class="ph ph-shopping-cart"></i>
                              </a>
                          </div>
                      </div>`;
                  $('#products-list').append(productItem);

              });
              var minus = $('.quantity__minus');
              var plus = $('.quantity__plus');
            
              $(plus).on('click', function () {
                var input = $(this).siblings('.quantity__input');
                var value = input.val(); 
                value++;
                input.val(value); 
              }); 
            
              $(minus).on('click', function () {
                var input = $(this).siblings('.quantity__input');
                var value = input.val(); 
                if(value > 1) {
                  value--;
                }
                input.val(value); 
              }); 
              $('.add-to-cart').on('click', function() {
                var productId = $(this).data('product-id');
                var quantity = $('#quantity-' + productId).val();
                // Send the AJAX request to add the product to the cart
                $.ajax({
                    url: 'cart/add',
                    type: 'POST',
                    data: {
                      _token: $('meta[name="csrf-token"]').attr('content'), // إضافة رمز CSRF
                      product_id: productId,
                        quantity: quantity
                    },
                    success: function() {
                      Toast.fire({
                        icon: 'success', 
                        title: 'Product added to cart successfully!',
                    });
                        // alert(response.message);
    
                    },
                    error: function(e) {
                      toastr.success(e);
                        console.log(e);
                    }
                })
            });

          }
      });

  }
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


  $('.ph-heart_2').on('click', function(e) {
    e.preventDefault();

    var productId = $(this).data('product-id'); // معرف المنتج
    console.log(productId);
    // التحقق من تسجيل الدخول
    $.ajax({
        url: '/favorites/update', // مسار إضافة المنتج إلى المفضلة
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            product_id: productId
        },
        success: function(response) {
            if (response.delete) {
                $('#favorite-item-' + productId).remove();

                $(`#heart-${productId}`).removeClass('text-main-600 bg-main-50 hover-bg-main-600')
                    .css({
                        'background-color': 'red',
                        'color': 'white'
                    });
                    $(`#ph-heart-${productId}`).addClass('ph-fill');
                    $(`#ph-heart-${productId}`).removeClass('ph');

            } else {
              $(`#ph-heart-${productId}`).removeClass('ph-fill');
              $(`#ph-heart-${productId}`).addClass('ph');
                $(`#heart-${productId}`).addClass('text-main-600 bg-main-50 hover-bg-main-600')
            .css({
                    'background-color': '',
                    'color': ''
                });
            }

            Toast.fire({
                icon: 'success',
                title: response.message
            });
        },
        error: function() {
            Toast.fire({
                icon: 'error',
                title: 'Failed to add product to favorites!'
            });
        }
    });

});
$('.Guest').on('click', function(e) {
    e.preventDefault();
    Toast.fire({
        icon: 'error',
        title: 'عليك تسجيل الدخول أولاً'
    });

});

function wishlistCss(){
  $.ajax({
    url: '/favorites/css', // مسار إضافة المنتج إلى المفضلة
    type: 'POST',
    data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
    },
    success: function(response) {
      if(response.products != ''){
        response.products.forEach(element => {
          $(`#heart-${element}`).removeClass('ph text-main-600 bg-main-50 hover-bg-main-600')
                  .css({
                      'background-color': 'red',
                      'color': 'white'
                  });
                  $(`#ph-heart-${element}`).addClass('ph-fill');
                  $(`#ph-heart-${element}`).removeClass('ph');      });
  
      }
      
    },
    error: function(response) {
        Toast.fire({
            icon: 'error',
            title: response.message,
        });
    }
});
}
  // Handle quantity increase
  // Update cart quantity via AJAX
  

})(jQuery);

function getFirstTwoDigits(num1, num2) {
  // ضرب العددين
  let result = num1 - (num1 *  num2 / 100);
  // تحويل النتيجة إلى سلسلة نصية
  let resultString = result.toString();
  
  // التحقق إذا كانت النتيجة تحتوي على فاصلة (عدد عشري)
  if (resultString.includes('.')) {
      // أخذ الجزء العشري بعد الفاصلة
      let [integerPart, decimalPart] = resultString.split('.');
      
      // إزالة الأصفار الزائدة في الجزء العشري
      decimalPart = decimalPart.replace(/0+$/, '');
      
      // إذا كان الجزء العشري غير فارغ، أخذ أول رقمين
      if (decimalPart.length > 0) {
          return parseFloat(integerPart + '.' + decimalPart.slice(0, 2));
      } else {
          // إذا كان الجزء العشري فارغًا بعد إزالة الأصفار
          return parseFloat(integerPart);
      }
  } else {
      // إذا كانت النتيجة عدد صحيح
      return parseFloat(resultString);
  }
}
