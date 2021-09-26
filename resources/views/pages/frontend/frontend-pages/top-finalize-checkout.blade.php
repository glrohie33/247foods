@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_checkout') .' < '. get_site_title() )

@section('content')
<div class="container">
	
	
	<div class="row">
	@if( Cart::count() >0 )
			
		<div id="content" class="col-sm-12">
			<h1>{{ trans('frontend.shopping_cart') }}
			</h1>
			<div class="col-xs-12">
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
					
						<div class="col-md-6 col-sm-6 col-xs-6 hidden-lg hidden-md hidden-sm" style="text-align:left;"><p> {{ $items->quantity }} </p></div>
						</div>
					   
						<div class="col-sm-2 col-xs-12 hidden-xs"><p> {{ $items->quantity }} </p></div>
						<div class="col-sm-2 col-xs-12 hidden-xs" style="font-size:16px ; font-weight:bold; line-height:16px;">{!! price_html( get_product_price_html_by_filter( $items->price ), get_frontend_selected_currency() ) !!}</div>
						<div class="col-sm-2 col-xs-12 hidden-xs" style="font-size:16px ; font-weight:bold; line-height:16px;" >{!! price_html(  get_product_price_html_by_filter(Cart::getRowPrice($items->quantity, $items->price)), get_frontend_selected_currency() ) !!}</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-8">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td class="text-right"><strong>Sub-Total:</strong></td>
								<td class="text-right">{!! trans('frontend.cart_sub_total') !!}:</div><div class="value">{!! price_html( get_product_price_html_by_filter(Cart::getTotal()), get_frontend_selected_currency() ) !!}</td>
							</tr>
							@if(Cart::is_coupon_applyed())
																						<tr class="cart-coupon">
																							<td class="text-right">{!! trans('frontend.coupon_label') !!}:</td>
																							<td class="value text-right">- {!! price_html( get_product_price_html_by_filter(Cart::couponPrice()), get_frontend_selected_currency() ) !!}  <a><button class="remove-coupon btn btn-default btn-xs" type="button">{!! trans('frontend.remove_coupon_label') !!}</button></a><p style="font-size:12px;"><i>{{ Cart::couponType() }}</i></p></td> 

																						</tr>
																					@endif
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
							<tr>
								<td class="text-right"><strong>Total:</strong></td>
								<td class="text-right">{!! price_html( get_product_price_html_by_filter(Cart::getCartTotal()), get_frontend_selected_currency() ) !!}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="buttons clearfix">
				<div class="pull-left"><a href="{{ URL::asset('/')}}" class="btn btn-default">Continue Shopping</a></div>
				@if(!empty($function))
				<div class="pull-right"><a onclick="{{ $function }}"  class="btn btn-primary">Pay</a></div>
				@endif
			</div>
		</div>
		@elseif($function == "offline_transfer")
		<div style="padding:30px 20px; background:#fff;" id="content">
			<p>Thank you for shopping on 247Foods.ng, kindly reach our customer support line on +2349094333555 or +2348120000303’ to confirm your payment.</p>
		</div>
		<div class="buttons clearfix">
				<div class="pull-left"><a href="{{ URL::asset('/')}}" class="btn btn-default">Continue Shopping</a></div>
			</div>
		@else
		<br>
		@include('pages-message.notify-msg-error')
		<h2 class="cart-shopping-label2">{{ trans('frontend.shopping_cart') }}</h2>
		<div class="empty-cart-msg">{{ trans('frontend.empty_cart_msg') }}</div>
		<div class="cart-return-shop"><a class="btn btn-secondary check_out" >Pay Now</a></div>
	  @endif
		
	</div>
	
</div>
<?php
if($function == "payWithGtpay()"){
$merch_id="14219";
$tranx_id= $order_id['process_id'];
$amt= Cart::getCartTotal() * 100;
$curr="566";
$cus_id=$order_id['user_id'];
$memo ="Sale Payment";
$noti_url = url("/").'/finalize-checkout/'.$order_id['order_id']."/".$order_id['process_id']."/gtpay";
$cust_name = "$firstname $lastname";
$hashkey = "FE52A57780B01E7E64B25CFAB51DBC4CB4603AF9B4873F17DB419A25E19C3614264EF78C0832CD5402A9E4A7103DDAB874852542EBC94F8A16DE5ADDD5126D78";
$hash= $merch_id.$tranx_id.$amt.$curr.$cus_id.$noti_url.$hashkey;
$gt_hash= hash('sha512',$hash);
// $_SESSION['tranx_id'] = $tranx_id;
// $_SESSION['amount'] = $amt;
// $_SESSION['tranx_hash'] = $gt_hash;
?>

<html>
<body onload="">
<form name="submit2gtpay_form" id="payform" action=" https://ibank.gtbank.com/GTPay/Tranx.aspx" target="_self" 
                                    name="request" method="post">
<input type="hidden" name="gtpay_mert_id" value="<?=$merch_id?>" />
<input type="hidden" name="gtpay_tranx_id" value="<?=$tranx_id?>" />
<input type="hidden" name="gtpay_tranx_amt" value="<?=$amt?>" />
<input type="hidden" name="gtpay_tranx_curr" value="566" />
<input type="hidden" name="gtpay_cust_id" value="<?=$cus_id?>" />
<input type="hidden" name="gtpay_cust_name" value="<?=$cust_name?>" />
<input type="hidden" name="gtpay_tranx_memo" value="<?=$memo?>" />
<input type="hidden" name="gtpay_no_show_gtbank" value="yes" />
<input type="hidden" name="gtpay_echo_data" value="247 Foods Checkout" />
<input type="hidden" name="gtpay_gway_name" value="" />
<input type="hidden" name="gtpay_hash" value="<?=$gt_hash?>" />
<input type="hidden" name="gtpay_tranx_noti_url" value="<?=$noti_url?>" />
<input type="submit" hidden value="Pay Via GTPay" name="btnSubmit"/>
<input type="hidden" name="gtpay_echo_data" value="thank you for patronising us">
</form>
<?php
}
?>


<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
function payWithGtpay(){
	document.getElementById("payform").submit();
}
function payWithPaystack()
		{
			var ref = Date.now();
			var email ="{{ $email }}";
			var phone_number = "{{ $phone }}";
			var first_name = "{{ $firstname }}";
			var last_name = "{{ $lastname }}";
			var order_id = "{{ $order_id['order_id'] }}";
			var process_id = "{{ $order_id['process_id'] }}";
			var url = `{{ url("/") }}/finalize-checkout/${order_id}/${process_id}/paystack`;
			var amount ={{ Cart::getCartTotal() }};
			var handler = PaystackPop.setup({
			key: 'pk_live_dd1dc04552505bf098c8e484095f674ef9f19635', // Replace with your public key
			email: email,
			amount: amount * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
			currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
			firstname: first_name,
			lastname: last_name,
			reference: process_id, // Replace with a reference you generated
			callback: function (response)
			{
				//this happens after the payment is completed successfully

				var reference = response.reference;
				$('#paystack_ref_code').val(reference);
				$("#proceed").val("checkout_proceed");
				alert('Congratulations your payment was successful');
				window.location = url;
				// Make an AJAX call to your server with the reference to verify the transaction
			},
			onClose: function ()
			{

				alert('Transaction was not completed, window closed.');
			}
			});

			handler.openIframe();
		}
</script>

@endsection 