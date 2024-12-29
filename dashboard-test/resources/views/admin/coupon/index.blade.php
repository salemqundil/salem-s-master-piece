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
                                <th>@lang('Coupon Name')</th>
                                <th>@lang('Discount')</th>
                                <th>@lang('Expire Date')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($coupons as $item)
                           <tr>
                              <td>{{__($item->coupon)}}</td>
                              <td>{{__($item->discount)}}%</td>
                              <td>{{showDateTime(__($item->expire_date))}}</td>
                              <td>
                                @if($item->status ==1)
                                <span class="badge badge--success">@lang('Active')</span>
                                @else
                                <span class="badge badge--danger">@lang('Deactive')</span>
                                @endif
                              </td>
                              <td>
                                 <div class="button--group">
                                    <button type="button" class="btn btn-sm btn--primary updateCategory"data-id="{{$item->id}}"data-coupon="{{$item->coupon}}" data-validity_days="{{$item->validity_days}}" data-discount="{{$item->discount}}" data-status="{{$item->status}}"><i class="las la-edit"></i></button>
                                    <a href="" class="btn btn-sm btn--danger"><i class="las la-trash"></i></a>
                                 </div>
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
        </div><!-- card end -->
    </div>
</div>


{{-- Add METHOD MODAL --}}
<div id="addCupon" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> @lang('Add Coupon')</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form action="{{route('admin.coupon.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label  for="name"> @lang('Coupon Name'):</label>
                        <input type="text" class="form-control" name="coupon" placeholder="@lang('Coupon Name')" required>
                    </div>
                    <div class="form-group">
                        <label  for="name"> @lang('Coupon Discount') %:</label>
                        <input type="text" class="form-control" name="discount" placeholder="@lang('Coupon Discount')" required>
                    </div>
                    <div class="form-group">
                        <label  for="name"> @lang('Coupon Validity') -  @lang('days')</label>
                        <input type="text" class="form-control" name="validity_days" placeholder="@lang('Coupon Validity')" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary btn-global">@lang('Save')</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Update METHOD MODAL --}}
<div id="updateCategory" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> @lang('Update')</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form action="{{route('admin.coupon.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label  for="name"> @lang('Coupon Name'):</label>
                        <input type="text" class="form-control" name="coupon" placeholder="@lang('Coupon Name')" required>
                    </div>
                    <div class="form-group">
                        <label  for="name"> @lang('Coupon Discount') %:</label>
                        <input type="text" class="form-control" name="discount" placeholder="@lang('Coupon Discount')" required>
                    </div>
                    <div class="form-group">
                        <label  for="name"> @lang('Coupon Validity') - @lang('days')</label>
                        <input type="text" class="form-control" name="validity_days" placeholder="@lang('Coupon Validity')" required>
                    </div>
                    <div class="form-group">
                        <label> @lang('Status')</label>
                        <label class="switch m-0" for="statuss">
                            <input type="checkbox" class="toggle-switch" name="status" id="statuss">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary btn-global">@lang('Save')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('breadcrumb-plugins')
<button type="button" class="btn btn-sm btn--primary addCupon"><i class="las la-plus"></i>@lang('Add
    New')</button>
@endpush
@push('script')
<script>
    (function($){
        "use strict";

        $('.addCupon').on('click', function() {
        $('#addCupon').modal('show');
    });
    $('.updateCategory').on('click', function() {
        var modal = $('#updateCategory');
        modal.find('input[name=id]').val($(this).data('id'));
        modal.find('input[name=coupon]').val($(this).data('coupon'));
        modal.find('input[name=discount]').val($(this).data('discount'));
        modal.find('input[name=validity_days]').val($(this).data('validity_days'));
        modal.find('input[name=status]').prop('checked', $(this).data('status') == 1 ? true : false );
        modal.find('input[name=status]').val($(this).data('status') == 1 ? 1 : 0);
        modal.modal('show');
    });
    })(jQuery);
</script>
@endpush
