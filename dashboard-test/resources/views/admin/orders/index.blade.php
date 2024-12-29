
@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body p-0">
                <div class="table-responsive--sm table-responsive">
                    <table class="table table--light style--two custom-data-table">
                        <thead>
                            <tr>
                                <th>@lang('Full Name')</th>
                                <th>@lang('Order Number')</th>
                                <th>@lang('Order Date')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                           <tr>
                            <td>{{__($order->firstname.$order->lastname)}}</td>
                            <td>#{{__($order->order_number)}}</td>
                            <td>{{ showDateTime($order->created_at)}}</td>
                            <td>${{__($order->product_price)}}</td>
                            <td>
                            @if($order->status == 0)
                                <span class="badge badge--warning">Pending</span>
                            @elseif($order->status == 1)
                                <span class="badge badge--success">Processing</span>
                            @elseif($order->status == 2)
                                <span class="badge badge--danger">Shipped</span>
                            @elseif($order->status == 3)
                                <span class="badge badge--dark">Delivered</span>
                            @else
                                <span class="badge badge--danger">Cancel</span>
                            @endif
                            </td>
                            <td>
                                <a href="{{route('admin.orders.detail',$order->id)}}" class="btn btn-sm btn--primary ms-1">
                                    <i class="la la-eye"></i>
                                </a>
                            </td>
                         </tr>
                         @empty
                         <tr>
                           <td class="text-muted text-center" colspan="100%">No Data</td>
                        </tr>
                         @endforelse
                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
            @if ($orders->hasPages())
            <div class="card-footer py-4">
             @php echo paginateLinks($orders) @endphp
         </div>
         @endif
        </div><!-- card end -->
    </div>
</div>
@endsection


