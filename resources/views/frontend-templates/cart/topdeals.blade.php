<div class="container">
	<ul class="breadcrumb">
		<li><a href="index.html"><i class="fa fa-home"></i></a></li>
		<li><a href="#">Shopping Cart</a></li>
	</ul>
	
	<div class="row">
	@if( Cart::count() >0 )
			<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
				@include('includes.csrf-token')
		<div id="content" class="col-sm-12">
			<div id="cart_page">
					<h1>{{ trans('frontend.shopping_cart') }}
						</h1>
						<div class="col-xs-12"  >
							<div class="cart-data" style="position:fixed; top:110px; left:0px; z-index:9999999; width:100%; text-align:center;">
			
							</div>
							<div class="row">
								<div class="sm-hidden hidden-xs col-md-12" >
									<div class="col-md-6 col-sm-6"><strong>Product</strong></div>
									<div class="col-md-2 col-sm-2"><strong>Quantity</strong></div>
									<div class="col-md-2 col-sm-2"><strong>Unit Price</strong></div>
									<div class="col-md-2 col-sm-2"><strong>Total</strong></div>
								</div>
								@foreach(Cart::items() as $index => $items)
								<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 6px 3px;background: #fff; margin-bottom:4px;box-shadow: 0px 0px 2px #000;border-radius: 3px;">
									<div class="col-sm-6 col-xs-12" style="padding:2px;">
										<div class="col-sm-12 col-xs-12" style="padding:2px;">
											<div class="col-sm-3 col-xs-4">
												<img src="{{ get_image_url($items->img_src) }}" alt="" title="" class="img-thumbnail" >
											</div>
											<div class="col-sm-9 col-xs-8" style="padding:2px;">
												<p style="font-size:16px ; font-weight:bold;line-height:16px;">{!! $items->name !!}</p>
												<p class="hidden-sm hidden-md hidden-lg" style="font-size:16px ; font-weight:bold; line-height:16px;">{!! price_html( get_product_price_html_by_filter( $items->price ), get_frontend_selected_currency() ) !!}</p>
											</div>
										</div>
									<div class="col-md-6 col-sm-6 col-xs-6" ><a type="button" data-toggle="tooltip" title="" style="" class="btn btn-danger" href="{{ route('removed-item-from-cart', $index)}}" data-original-title="Remove"><i class="fa fa-trash"></i></button></a></div>
									<div class="col-md-6 col-sm-6 col-xs-6 hidden-lg hidden-md hidden-sm" style="text-align:left;"><input type="text" name="cart_quantity[{{ $index }}]" value="{{ $items->quantity }}" onchange="" id="{{ $items->id }}" size="1" style="max-width: 60px;float:right;"class="form-control"></div>
									</div>
								   
									<div class="col-sm-2 col-xs-12 hidden-xs"><input type="text" name="cart_quantity[{{ $index }}]" value="{{ $items->quantity }}" onchange="" id="{{ $items->id }}" size="1" style="max-width: 60px;"class="form-control"></div>
									<div class="col-sm-2 col-xs-12 hidden-xs" style="font-size:16px ; font-weight:bold; line-height:16px;">{!! price_html( get_product_price_html_by_filter( $items->price ), get_frontend_selected_currency() ) !!}</div>
									<div class="col-sm-2 col-xs-12 hidden-xs" style="font-size:16px ; font-weight:bold; line-height:16px;" >{!! price_html(  get_product_price_html_by_filter(Cart::getRowPrice($items->quantity, $items->price)), get_frontend_selected_currency() ) !!}</div>
								</div>
								@endforeach
							</div>
							
							<span class="input-group-btn"><button type="submit" data-toggle="tooltip" title="" class="btn btn-primary" data-original-titl
											="Update" name="update_cart" value="{{ trans('frontend.update_cart') }}" ><i class="fa fa-refresh"></i>Update Cart</button>
									
											</span</div>
						</div>
						<div class="panel-group" id="accordion">         
						 <div class="panel panel-default" >
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#collapse-coupon" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Use Coupon Code <i class="fa fa-caret-down"></i></a></h4>
							</div>
							<div id="collapse-coupon" class="panel-collapse">
								<div class="panel-body">
									<label class="col-sm-2 control-label" for="input-coupon">Enter your coupon here</label>
									<div class="input-group">
										<input type="text" name="apply_coupon_post" value="" placeholder="Enter your coupon here" id="apply_coupon_code" class="form-control">
										<span class="input-group-btn">
											<input type="button" value="Apply Coupon" name="apply_coupon_post" id="apply_coupon_post" data-loading-text="Loading..." class="btn btn-primary">
										</span>
									</div>
								</div>
							</div>
						 </div>
			
						</div>
						
						<div class="row">
							<div class="col-sm-4 col-sm-offset-8 cart-total-content">
								<table class="table table-bordered">
									<tbody>
										<tr>
											<td class="text-right"><strong>Sub-Total:</strong></td>
											<td class="text-right">{!! trans('frontend.cart_sub_total') !!}:</div><div class="value">{!! price_html( get_product_price_html_by_filter(Cart::getTotal()), get_frontend_selected_currency() ) !!}</td>
										</tr>
										{{-- <tr>
											<td class="text-right"><strong>Eco Tax (-2.00):</strong></td>
											<td class="text-right">$2.00</td>
										</tr> --}}
										<tr>
											<td class="text-right"><strong>Shipping Fee: </strong></td>
											@if($shipping_data['flat_rate']['enable_option'] && $shipping_data['flat_rate']['method_cost'])
											@if(Cart::getShippingMethod()['shipping_method'] == 'flat_rate')
												<td class="text-right">{!! price_html( get_product_price_html_by_filter($shipping_data['flat_rate']['method_cost']), get_frontend_selected_currency() ) !!}}</td>
											@endif
											@endif
			
											@if( $shipping_data['free_shipping']['enable_option'] && ( Cart::getSubTotalAndTax() <= $shipping_data['free_shipping']['order_amount'] ) )
											@if(Cart::getShippingMethod()['shipping_method'] == 'free_shipping')
												<td>Free Shipping</td>
												@endif
												@endif
			
												@if($shipping_data['local_delivery']['enable_option'] && $shipping_data['local_delivery']['fee_type'] === 'fixed_amount' && $shipping_data['local_delivery']['delivery_fee'] )
												@if(Cart::getShippingMethod()['shipping_method'] == 'local_delivery')
															<td class="text-right" >{!! price_html( get_product_price_html_by_filter($shipping_data['local_delivery']['delivery_fee']), get_frontend_selected_currency() ) !!}</td>
												@endif
												@elseif($shipping_data['local_delivery']['enable_option'] && $shipping_data['local_delivery']['fee_type'] === 'per_product' && $shipping_data['local_delivery']['delivery_fee'])
												@if(Cart::getShippingMethod()['shipping_method'] == 'local_delivery')
															<td class="text-right" >{!! price_html( get_product_price_html_by_filter(Cart::getLocalDeliveryShippingPerProductTotal()), get_frontend_selected_currency() ) !!}</td>
												@endif
												@elseif($shipping_data['local_delivery']['enable_option'] && $shipping_data['local_delivery']['fee_type'] === 'cart_total' && $shipping_data['local_delivery']['delivery_fee'])
												@if(Cart::getShippingMethod()['shipping_method'] == 'local_delivery')
															<td class="text-right" > {!! price_html( get_product_price_html_by_filter(Cart::getLocalDeliveryShippingPercentageTotal()), get_frontend_selected_currency() ) !!}</td>
													@endif
												@elseif($shipping_data['local_delivery']['enable_option'] && $shipping_data['local_delivery']['fee_type'] === 'per_weight' && $shipping_data['local_delivery']['delivery_fee'])
													@if(Cart::getShippingMethod()['shipping_method'] == 'local_delivery')
														<td class="text-right" > {!! price_html( get_product_price_html_by_filter(Cart::getLocalDeliveryShippingPerProductWeight()), get_frontend_selected_currency() ) !!}</td>
													@endif
													@endif
													</tr>
													@if(Cart::is_coupon_applyed())
													<tr class="cart-coupon">
														<td class="text-right">{!! trans('frontend.coupon_label') !!}:</td>
														<td class="value text-right">- {!! price_html( get_product_price_html_by_filter(Cart::couponPrice()), get_frontend_selected_currency() ) !!}  <a><button class="remove-coupon btn btn-default btn-xs" type="button">{!! trans('frontend.remove_coupon_label') !!}</button></a><p style="font-size:12px;"><i>{{ Cart::couponType() }}</i></p></td> 
														
													</tr>
													@endif
										<tr class="cart-grand-total">
											<td class="text-right"><strong>Total:</strong></td>
											<td class="text-right value" >{!! price_html( get_product_price_html_by_filter(Cart::getCartTotal()), get_frontend_selected_currency() ) !!}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
			
						<div class="buttons clearfix">
							<div class="pull-left"><a href="{{ URL::asset('/')}}" class="btn btn-default">Continue Shopping</a></div>
							<div class="pull-right"><a href="{{ route('checkout-page') }}" class="btn btn-primary">Checkout</a></div>
						</div>
			</div>
			
		</div>
		@else
		<br>
		@include('pages-message.notify-msg-error')
		<h2 class="cart-shopping-label2">{{ trans('frontend.shopping_cart') }}</h2>
		<div class="empty-cart-msg">{{ trans('frontend.empty_cart_msg') }}</div>
		<div class="cart-return-shop"><a class="btn btn-secondary check_out" href="{{ route('shop-page') }}">{{ trans('frontend.return_to_shop') }}</a></div>
	  @endif
		
	</div>
	
</div>

<script>
	
if ($('#apply_coupon_post').length > 0)
    {
      $('#apply_coupon_post').on('click', function (e)
      {
		  
        e.preventDefault();
        if ($('#apply_coupon_code').val().length == 0 && $('#apply_coupon_code').val() == '')
        {
          $('#apply_coupon_code').css({ 'border': '1px solid #f06953' });
          return false
        }
        else
        {
          $('#apply_coupon_code').css({ 'border': '1px solid #cccccc' });
          applyCoupon($('#apply_coupon_code').val());
        }
      });
	}
	
	function applyCoupon(val)
    {
      var msgStr = '<div class="alert alert-danger" style="max-width:600px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="message-header"><i class="fa fa-exclamation-triangle"></i>&nbsp;<strong>' + frontendLocalizationString.error_message_text + '</strong></div><p class="error-msg-coupon"></p></div>';

    //   $('.cart-total-area-overlay').show();
    //   $('#loader-1-cart').show();

      $.ajax({
        url: $('#hf_base_url').val() + '/ajax/applyCoupon',
        type: 'POST',
        cache: false,
        dataType: 'json',
        data: { _couponCode: val },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function (data)
        {
          if ($('#cart_page, #checkout_page').find('.error-msg-coupon').length > 0)
          {
            $('#cart_page, #checkout_page').find('.error-msg-coupon').parents('.alert-danger').remove();
          }

          if (data.error == true && data.error_type == 'no_coupon_data')
          {
            $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
            $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_not_exists_msg);
          }
          else if (data.error == true && data.error_type == 'less_from_min_amount' && data.min_amount)
          {
            $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
            $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_min_spend_msg + ' ' + data.min_amount);
          }
          else if (data.error == true && data.error_type == 'exceed_from_max_amount' && data.max_amount)
          {
            $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
            $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_max_spend_msg + ' ' + data.max_amount);
          }
          else if (data.error == true && data.error_type == 'no_login')
          {
            $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
            $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_no_login_msg);
          }
          else if (data.error == true && data.error_type == 'user_role_not_match' && data.role_name)
          {
            $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
            $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(data.role_name + ' ' + frontendLocalizationString.coupon_no_login_msg);
          }
          else if (data.error == true && data.error_type == 'coupon_expired')
          {
            $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
            $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_expired_msg);
          }
          else if (data.error == true && data.error_type == 'coupon_already_apply')
          {
            $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
            $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_already_sxist_label);
          }

          else if (data.success == true && (data.success_type == 'discount_from_product' || data.success_type == 'percentage_discount_from_product' || data.success_type == 'percentage_discount_from_product' || data.success_type == 'discount_from_total_cart' || data.success_type == 'percentage_discount_from_total_cart'|| data.success_type == 'percentage_discount_from_shipping'|| data.success_type == 'discount_from_shipping'))
          {
            $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
            $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_added_msg);
            $('#cart_page .cart-grand-total, #checkout_page .cart-grand-total').before('<tr class="cart-coupon"><td class="text-right"><strong>' + frontendLocalizationString.coupon_label + '</strong></td><td class="value text-right"> - ' + data.discount_price + ' <a><button class="remove-coupon btn btn-default btn-xs" type="button">' + frontendLocalizationString.remove_coupon_label + '</button></a><p style="font-size:12px;"><i>'+data.success_type+'</i></p></td></tr>');
            $('#cart_page .cart-total-content .cart-grand-total .value, #checkout_page .cart-total-content .cart-grand-total .value').html(data.grand_total);
           	remove_user_coupon();
          }
          else if (data.error == true && data.error_type == 'exceed_from_cart_total')
          {
            $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
            $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.exceed_from_cart_total_msg);
          }
        },
        error: function () { }
      });
	}
	

	function remove_user_coupon()
    {
      if ($('.remove-coupon').length > 0)
      {
        $('.remove-coupon').on('click', function (e)
        {
          e.preventDefault();
          removeCoupon();
        });
      }
	}

	
	function removeCoupon()
    {
      

      $.ajax({
        url: $('#hf_base_url').val() + '/ajax/removeCoupon',
        type: 'POST',
        cache: false,
        dataType: 'json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function (data)
        {
          if (data.success == true)
          {
            if ($('#cart_page, #checkout_page').find('.cart-data .error-msg-coupon').length > 0)
            {
              $('#cart_page, #checkout_page').find('.cart-data .error-msg-coupon').parents('li').remove();
            }

            $('#cart_page .cart-total-content .cart-coupon, #checkout_page .cart-total-content .cart-coupon').remove();
            $('#cart_page .cart-total-content .cart-grand-total .value, #checkout_page .cart-total-content .cart-grand-total .value').html(data.grand_total);

          }
        },
        error: function () { }
      });
	}

	remove_user_coupon();

</script>