@extends('admin.layouts.app')
@section('panel')
<div class="row gy-4">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('Monthly Deposit Report') (@lang('This year'))</h5>
                <div id="account-chart"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('Daily Logins') (@lang('Last 10 days'))</h5>
                <div id="login-chart"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="row gy-4 ">
            <div class="col-sm-6">
                <a href="">
                    <div class="card prod-p-card background-pattern">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5">@lang('Total Orders')</h6>
                                    <h3 class="m-b-0">{{__($order['total_orders'])}}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="dashboard-widget__icon las la-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="{{route('admin.orders.index')}}">
                    <div class="card prod-p-card background-pattern-white bg--primary">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5 text-white">@lang('Total Delivered')</h6>
                                    <h3 class="m-b-0 text-white">{{__($order['total_delivered'])}}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="dashboard-widget__icon las la-truck text-white"></i>

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="{{route('admin.category.index')}}">
                    <div class="card prod-p-card background-pattern">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5">@lang('Total Categories')</h6>
                                    <h3 class="m-b-0">{{__($order['total_categories'])}}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class=" dashboard-widget__icon las la-align-left menu-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="{{route('admin.product.index')}}">
                    <div class="card prod-p-card background-pattern">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5">@lang('Total Products')</h6>
                                    <h3 class="m-b-0">{{$order['total_products']}}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class=" dashboard-widget__icon la la-product-hunt menu-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12">
                <div class="card p-3 rounded-3">
                    <div class="row g-0">
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-users"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.users.all')}}"></a>
                                    <h5>{{$widget['total_users']}}</h5>
                                    <span>@lang('Total Users')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4 ">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-user-check"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.users.active')}}"></a>
                                    <span>@lang('Active Users')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-envelope"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href=""></a>
                                    <h5></h5>
                                    <span>@lang('Email Unverified')</span>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-ticket-alt"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.deposit.pending')}}"></a>
                                    <span>@lang('Tickets Open')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-spinner"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.deposit.pending')}}"></a>
                                    <h5></h5>
                                    <span>@lang('Pending Deposits')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-ban"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="">
                                    </a>
                                    <h5></h5>
                                    <span>@lang('Rejected Deposits')</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <a href="{{route('admin.deposit.list')}}">
                    <div class="card prod-p-card background-pattern">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5">@lang('Total Deposit')</h6>
                                    <h3 class="m-b-0"></h3>
                                </div>
                                <div class="col-auto">
                                    <i class="dashboard-widget__icon fas fa-hand-holding-usd"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="{{route('admin.deposit.list')}}">
                    <div class="card prod-p-card background-pattern-white">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5">@lang('Deposit Charge')</h6>
                                    <h3 class="m-b-0"></h3>
                                </div>
                                <div class="col-auto">
                                    <i class="dashboard-widget__icon fas fa-percentage"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12">
                <a href="">
                    <div class="card prod-p-card background-pattern-white bg--primary">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5 text-white">@lang('Total Sales')</h6>
                                    <h3 class="m-b-0 text-white"></h3>
                                </div>
                                <div class="col-auto">
                                    <i class="dashboard-widget__icon lar la-credit-card text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

<script src="{{asset('assets/admin/js/apexcharts.min.js')}}"></script>

<script>
    "use strict";
    // [ account-chart ] start
    (function () {
        var options = {
            chart: {
                type: 'area',
                stacked: false,
                height: '310px'
            },
            stroke: {
                width: [0, 3],
                curve: 'smooth'
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%'
                }
            },
            colors: ['#00adad', '#67BAA7'],
            series: [{
                name: '@lang("Deposits")',
                type: 'area',
    }],
    fill: {
        opacity: [0.85, 1],
                },
    
    markers: {
        size: 0
    },
    xaxis: {
        type: 'text'
    },
    yaxis: {
        min: 0
    },
    tooltip: {
        shared: true,
            intersect: false,
                y: {
            formatter: function (y) {
                if (typeof y !== "undefined") {
                    return "$ " + y.toFixed(0);
                }
                return y;

            }
        }
    },
    legend: {
        labels: {
            useSeriesColors: true
        },
        markers: {
            customHTML: [
                function () {
                    return ''
                },
                function () {
                    return ''
                }
            ]
        }
    }
            }
    var chart = new ApexCharts(
        document.querySelector("#account-chart"),
        options
    );
    chart.render();
        }) ();

    // [ login-chart ] start
    (function () {
        var options = {
            series: [{
                name: "User Count",
    }],
    chart: {
        height: '367px',
            type: 'area',
                zoom: {
            enabled: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    colors: ['#67BAA7'],
    xaxis: {
        type: 'date',
            },
    yaxis: {
        opposite: true
    },
    legend: {
        horizontalAlign: 'left'
    }
        };

    var chart = new ApexCharts(document.querySelector("#login-chart"), options);
    chart.render();
    }) ();
</script>
@endpush
