@extends('pages.layouts.header')
@section('content')

<section class="checkout py-40">
    <div class="container">
        <div class="bg-color-three rounded-8 p-24 text-center mb-30">
            <span class="text-gray-900 text-30 fw-semibold">طلبك</span>
        </div>
        <div class="row">

            <div class="col-xl-9 col-lg-8">

                <form action="#" class="text-end">
                    <div class="row gy-3">
                        <div class="col-sm-6 col-xs-6">
                            <span class="common-input border border-gray-100 rounded-8">{{$user->name}} </span>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <span class="common-input border border-gray-100 rounded-8">{{$user->phone}} </span>
                        </div>

                        <div class="col-12">
                            <input type="text" class="common-input border-gray-100 text-end"
                                value="{{$user->address1}}">
                        </div>

                        <div class="col-12">
                            <span class="common-input border border-gray-100 rounded-8">{{$user->email}} </span>
                        </div>

                        <div class="col-12">
                            <div class="my-40">
                                <h6 class="text-lg mb-24">قم بإضافة ملاحظاتك الخاصة هنا</h6>
                                <input type="text" class="common-input border-gray-100 text-end text-lg"
                                    placeholder="ملاحظات حول طلبك، على سبيل المثال. ملاحظات خاصة للتسليم">
                            </div>
                        </div>

                    </div>
                </form>
                <hr>
                <div class="mt-32 text-end">
                <h6>تفاصيل الدفع</h6>

                <div class="payment-item">
                    <div class="form-check common-check common-radio py-16 mb-0 flex-row-reverse">
                        <input class="pay_method form-check-input" type="radio" name="payment" id="payment2">
                        <label class="form-check-label fw-semibold text-neutral-600 text-20 pe-36" for="payment2">نقداً <img src="https://www.talabat.com/assets/images/checkout-cc.svg" ></label>
                    </div>
                </div>
                <div class="payment-item">
                    <div class="form-check common-check common-radio py-16 mb-0 flex-row-reverse">
                        <input id="stripe" class="pay_method form-check-input" type="radio" name="payment" id="payment3" value="Stripe">
                        <label class="form-check-label fw-semibold text-neutral-600 text-20 pe-36" for="payment3">بطاقة الإئتمان <img src="https://www.talabat.com/assets/images/checkout-cc.svg" class="w-40"></label>
                    </div>
                </div>
               
                <div id="stripe_pay" class="d-none p-16 pt-0 border border-gray-100 rounded-8">
                    <br>
                    <div class="form-row row pt-16">
                        <div class="col-xs-12 form-group  required">
                            <label class="control-label">رقم البطاقة</label>
                            <input autocomplete="off" class="form-control card-number" size="20" type="text" />
                        </div>
                    </div>
                    <div class="form-row row pt-16">
                        <div class="col-xs-12 col-md-4 form-group cvc required"><label class="control-label"> CVC رقم تحقق البطاقة </label>
                            <input autocomplete="off" class="form-control card-cvc" placeholder="ex. 311" size="4"
                                type="text" />
                        </div>
                        <div class="col-xs-12 col-md-4 form-group expiration required"><label
                                class="control-label">Expiration Month</label>
                            <input class="form-control card-expiry-month" placeholder="MM" size="2" type="text" />
                        </div>
                        <div class="col-xs-12 col-md-4 form-group expiration required"><label
                                class="control-label">Expiration Year</label>
                            <input class="form-control card-expiry-year" placeholder="YYYY" size="4" type="text" />
                        </div>
                    </div>
                    <div class="form-row row p-16">
                        <div class="col-md-12 error form-group hide">
                            <div class="alert-danger alert">Please correct the errors and try again.</div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="checkout-sidebar">

                    <div class="border border-gray-100 rounded-8 px-24 py-40">
                        <div class="mb-32 pb-32 border-bottom border-gray-100 flex-between gap-8">
                            <span class="text-gray-900 fw-medium text-xl font-heading-two">السعر</span>
                            <span class="text-gray-900 fw-medium text-xl font-heading-two">المنتجات</span>
                        </div>
                        @foreach($cartItems as $item)
                        <div class="flex-between gap-24 mb-32 text-end">
                            <span class="text-gray-900 fw-bold text-md font-heading-two">{{$item['total_price']}}</span>
                            <div class="flex-align gap-12">
                                <span
                                    class="text-gray-900 fw-semibold text-md font-heading-two">{{$item['quantity']}}</span>
                                <span class="text-gray-900 fw-normal text-md font-heading-two"><i
                                        class="ph-bold ph-x"></i></span>
                                <span
                                    class="text-gray-900 fw-normal text-md font-heading-two w-144">{{$item['product']['name']}}</span>
                            </div>
                        </div>
                        @endforeach

                        <div class="border-top border-gray-100 pt-30  mt-30">
                            <div class="mb-32 flex-between gap-8">
                                <span class="text-gray-900 font-heading-two text-md fw-bold">{{$cartPrice}}</span>
                                <span class="text-gray-900 font-heading-two text-xl fw-semibold">المجموع الفرعي</span>

                            </div>
                            <div class="mb-0 flex-between gap-8">
                                <span class="text-gray-900 font-heading-two text-md fw-bold">{{$cartPrice}}</span>
                                <span class="text-gray-900 font-heading-two text-xl fw-semibold">المبلغ الإجمالي</span>
                            </div>
                        </div>
                    </div>


                    <a href="checkout.html" class="btn btn-main mt-40 py-18 w-100 rounded-8 mt-56">Place Order</a>

                </div>
            </div>
         
            <div class="mt-32 pt-32 border-top border-gray-100">
                <p class="text-gray-500">Your personal data will be used to process your order, support your experience
                    throughout this website, and for other purposes described in our <a href="#"
                        class="text-main-600 text-decoration-underline"> privacy policy</a> .</p>
            </div>
        </div>
    </div>
</section>

<style>
        .hide {
            display: none
        }
    </style>



<script type="text/javascript">
$(document).ready(function() {

    $(".pay_method").on('click', function() {
        var payment_method = $(this).val();
        if (payment_method == 'Stripe') {
            $("#stripe_pay").removeClass('d-none');
        } else {
            $("#stripe_pay").addClass('d-none');
        }
    });

});



$(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {

        var pay_method = $('input[name="payment_method"]:checked').val();
        if (pay_method == undefined) {
            alert('Please select a payment method');
            return false;
        } else if (pay_method == 'COD') {

        } else {
            document.getElementById('myButton').disabled = true;

            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {

                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        }



    });



    function stripeResponseHandler(status, response) {
        if (response.error) {

            document.getElementById('myButton').disabled = false;

            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {

            document.getElementById('myButton').disabled = true;
            document.getElementById('myButton').value = 'Please Wait...';

            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

});
</script>
@endsection