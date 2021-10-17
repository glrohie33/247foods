@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_checkout') .' < '. get_site_title() )

@section('content')
<div class="container">
		<div class="row">
			<div id="content" class="col-sm-12">
							 
						<h1>Checkout</h1>
				@if( Cart::count() >0 )
					<form class="form-horizontal" id="checkout_form" method="post" action="" enctype="multipart/form-data">
							@include('includes.csrf-token') 
							
						<div class="so-onepagecheckout layout1" id="checkout_page">
									<div class="cart-data" style="position:fixed; top:110px; left:0px; z-index:9999999; width:100%; text-align:center;">
											@if (count($errors) > 0)
												<div class="alert alert-danger">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
												<strong>{!! trans('validation.whoops') !!}</strong> {!! trans('validation.input_error') !!}<br /><br />
												<ul>

													@foreach ($errors->all() as $error)
													<li>{!! $error !!}</li>
													@endforeach
												</ul>
												</div>
											@endif
									</div>
									<!--- Michael pasted this here, this is the start --->
									
									<div class="col-left col-lg-6 col-md-6 col-sm-6 col-xs-12">
										
										<section class="section-right">

											<div class="checkout-content checkout-cart">
												<h2 class="secondary-title"><i class="fa fa-shopping-cart"></i>Shopping Cart  (0.00kg) </h2>
												<div class="box-inner">
													<div class=" checkout-product">
													    <div class="col-xs-12" style="padding:2px;">
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
                                            				            <div class="col-sm-12 col-xs-12" style="padding:2px;" >
                                                    				        <div class="col-sm-3 col-xs-4" style="padding:2px;">
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
													    </div>
														<table class="table table-bordered table-hover cart-total-content">
															<tfoot>
																	<tr>
																			<td class="text-right"><strong>Sub-Total:</strong></td>
																			<td class="text-right"><div>{!! trans('frontend.cart_sub_total') !!}:</div><div class="value">{!! price_html( get_product_price_html_by_filter(Cart::getTotal()), get_frontend_selected_currency() ) !!} </div></td>
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
																			<td class="text-right value">{!! price_html( get_product_price_html_by_filter(Cart::getCartTotal()), get_frontend_selected_currency() ) !!}</td>

																		</tr>   
															</tfoot>
														</table>
														<div><a href="{{ route('cart-page') }}" class="btn btn-primary">Edit Cart</a></div>
													</div>
												</div>
											</div>
											
											<script src="https://js.paystack.co/v1/inline.js"></script>


										<style>
																				ul {
										list-style: none;
										font-size: 12px;
										font-family: Arial, Helvetica, sans-serif;
										}

										ul li::before {
										
										font-size: 10px;
										color: red;
										font-weight: bold;
										display: inline-block; 
										width: 1em;
										margin-left: -1em;
										}
										</style>
									 
									<ul>
                                        <li>• Please choose your preferred delivery date and time. Note: While we are certain to deliver on the chosen date, the time within the day may vary. </li>
                                        <li>• For inquiries about your delivery, or to change the details of your delivery such as agreed time and/or date, please call 0909 433 3555. </li>
                                        <li>• Please ensure you are available to receive your order. Return orders attract additional delivery fees, and the quality of items after return are not guaranteed.</li>
                                        <li>• Please note that a minimum of 12 hours notice from time chosen is required to amend any delivery details.</li>
                                    </ul>

								</div>
									
								<!--- Michael Pasted this here, this is the end --->
								
									
								<div class="col-right col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="checkout-content login-box">
										<h2 class="secondary-title"><i class="fa fa-user"></i>Create an Account or Login</h2>
										<div class="box-inner">
											
											@if($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true && $is_user_login == false)
											

											<div class="radio">
												<label>
													<input type="radio" name="account" value="guest" checked >Guest Checkout</label>
											</div>
											<!--<div class="radio">-->
											<!--	<label>-->
											<!--			<a class="btn btn-secondary" href="{{ route('user-login-page') }}">{!! trans('frontend.signin_account_label') !!}</a></label>-->
											
											<!--</div>-->
											<!--<div class="radio">-->
											<!--	<label>-->
														
											<!--<a class="btn btn-secondary" href="{{ route('user-registration-page') }}">{!! trans('frontend.create_account_label') !!}</a></label>-->
											<!--</div>-->
											@endif

										</div>
									</div>

								
										<div class="checkout-content login-box">
											<h2 class="secondary-title"><i class="fa fa-user"></i>Add coupon</h2>
											<div class="box-inner">
												<div class="panel-body">
													<div class="input-group">
														<input type="text" name="apply_coupon_post" value="" placeholder="Enter your coupon here" id="apply_coupon_code" class="form-control">
														<span class="input-group-btn">
															<input type="button" value="Apply Coupon" name="apply_coupon_post" id="apply_coupon_post" data-loading-text="Loading..." class="btn btn-primary">
														</span>
													</div>
												</div>
											</div>
										</div>
									
									
		
									
									<div class="checkout_content">
										<fieldset id="shipping-address" >
											<h2 class="secondary-title"><i class="fa fa-map-marker"></i>Shipping Address</h2>
											<div class=" checkout-shipping-form">
												<div class="box-inner">
													
														<div id="shipping-new" style="display: block">
															
																<div class="form-group required">
																	<select class="form-control" name="delivery_zone" id="user_delivery_zone" onchange="setUsersArea(this)" required>
																		@if(count($delivery_areas) > 0)
																			<option value="">Select Zone</option>
																			@foreach ($delivery_areas as $row)
																				<option value="{{ $row['delivery_zone'] }}">{{ $row['delivery_zone'] }}</option>
																				
																			@endforeach
																		@else
																			<option>No Delivery Zones Yet</option>
																		@endif
																		</select>
																</div>

																<div class="form-group" required>
																		<select class="form-control" name="delivery_area" id="user_delivery_areas" required style="display:none;">
																			</select>
																</div>
																<div class="form-group">
																		<!--<input type="date" onchange="isDateValid(this,'user')" name="delivery_date" class="form-control" id="user_delivery_date" required>-->
																		<input type="date" name="delivery_date" class="form-control" id="user_delivery_date" required>
																		<i id="date_hint" style="color:red;"></i>
																</div>
																<div class="form-group">
																		<!--<input type="time" onchange="isTimeValid(this,'user')"  name="delivery_time" class="form-control" id="user_delivery_time" required>-->
																		<input type="time"  name="delivery_time" class="form-control" id="user_delivery_time" required>
																		<i id="time_hint" style="color:red;" ></i>
																	</div>

														
															
														</div>
													
												</div>
											</div>
											<input type="hidden" name="default_zone_id" id="default_zone_id" value="3655">
										</fieldset>
									</div>
											
									<div class="checkout-content checkout-register">
											<fieldset id="address_form">
												<h2 class="secondary-title" overflow="hidden" ><i class="fa fa-map-marker"></i>Your Address  
													@if($is_user_login == true)
													<input type="radio" name="is_user_login" value="true" checked hidden>Login</label>
														@if(!empty($login_user_account_data) && !empty($login_user_account_data->address_details))
														
															<a href="{{ route('my-address-edit-page') }}" style="float:right;" class="btn btn-secondary btn-sm">{{ trans('frontend.edit_address') }}</a>
														@else
															<a href="{{ route('my-address-add-page') }}" style="float:right;" class="btn btn-secondary btn-sm">{{ trans('frontend.add_address') }}</a>
														@endif
													@endif
												</h2>
											<div class=" checkout-payment-form">
												@if( $_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true && $is_user_login == true )
													<div class="text-right">
														
													  </div>
													@if(!empty($login_user_account_data) && !empty($login_user_account_data->address_details))
														<div class="box-inner">
															<form class="form-horizontal form-payment" id="address_form">
																<div id="payment-new" style="display: block">
																		<?php //die(var_dump($login_user_account_data->address_details))?>
																	<div class="form-group company-input">
																		<input type="text" name="account_bill_first_name" value="{!! $login_user_account_data->address_details->account_bill_first_name !!}" placeholder="firstname" id="account_bill_first_name" required class="form-control">
																	</div>
																	<div class="form-group company-input">
																		<input type="text" name="account_bill_last_name" value="{!! $login_user_account_data->address_details->account_bill_last_name !!}" placeholder="lastname" id="account_bill_last_name" class="form-control">
																	</div>
																	<div class="form-group required">
																		<input type="text" name="account_bill_adddress_line_1" value="{!! $login_user_account_data->address_details->account_bill_adddress_line_1 !!}" placeholder="Address 1 *" id="input-payment-address-1" required class="form-control">
																	</div>
																	<div class="form-group address-2-input">
																		<input type="text" name="account_bill_adddress_line_2" value="{!! $login_user_account_data->address_details->account_bill_adddress_line_2 !!}" placeholder="Address 2" id="input-payment-address-2" class="form-control">
																	</div>
																	<div class="form-group address-2-input">
																			<input type="text" name="account_bill_phone_number" value="{!! $login_user_account_data->address_details->account_bill_phone_number !!}" placeholder="phone number" id="account_bill_phone_number" required class="form-control">
																		</div>
																	<div class="form-group required">
																		<input type="text" name="account_bill_town_or_city" value="{!! $login_user_account_data->address_details->account_bill_town_or_city !!}" placeholder="City *" id="input-payment-city" required class="form-control">
																	</div>
																	<div class="form-group">
																			<input type="email" name="account_bill_email_address" value="{!! $login_user_account_data->address_details->account_bill_email_address !!}" placeholder="email" id="account_bill_email_address" required class="form-control">
																		</div>
																	<div class="form-group required">
																			<select name="account_bill_select_country" id="input-payment-country" class="form-control" >
																					<option value=""> {{ trans('frontend.select_country') }} </option>
																					@foreach(get_country_list() as $key => $val)
																					@if(old('account_bill_select_country') == $key || $login_user_account_data->address_details->account_bill_select_country == $key )
																						<option selected value="{{ $key }}"> {!! $val !!}</option>
																					@else
																						<option value="{{ $key }}"> {!! $val !!}</option>
																					@endif
																					@endforeach
																			</select>
																		</div>
																</div>
															</form>
														</div>
														@else
														<div class="box-inner">
																<p>You have not filled in your shipping address please click on the button to fill it</p>
														</div>

														@endif
												@elseif($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true && $is_user_login == false)
													<div class="box-inner">
														
															<div id="payment-new" style="display: block">
																<div class="form-group company-input">
																	<input type="text" id="account_bill_last_name" name="account_bill_first_name" value="" placeholder="firstname" id="input-payment-company" required class="form-control">
																</div>
																<div class="form-group company-input">
																	<input type="text" id="account_bill_last_name" name="account_bill_last_name" value="" placeholder="lastname" id="input-payment-company" class="form-control">
																</div>
																<div class="form-group required">
																	<input type="text" name="account_bill_adddress_line_1" value="" placeholder="Address 1 *" id="input-payment-address-1" required class="form-control">
																</div>
																<div class="form-group address-2-input">
																	<input type="text" name="account_bill_adddress_line_2" value="" placeholder="Address 2" id="input-payment-address-2"  class="form-control">
																</div>

																<div class="form-group company-input">
																	<input type="text" id="account_bill_phone_number" name="account_bill_phone_number" value="" placeholder="phone number" id="input-payment-company" required class="form-control">
																</div>
																<div class="form-group required">
																	<input type="text" name="account_bill_town_or_city" value="" placeholder="City *" id="input-payment-city" required class="form-control">
																</div>
																<div class="form-group">
																		<input type="email" id="account_bill_email_address" name="account_bill_email_address" value="" placeholder="email address" id="input-payment-postcode" required class="form-control">
																	</div>
																<div class="form-group required">
																	<select name="account_bill_select_country" id="input-payment-country" class="form-control" >
																			<option value=""> {{ trans('frontend.select_country') }} </option>
																			@foreach(get_country_list() as $key => $val)
																			@if(old('account_bill_select_country') == $key)
																				<option selected value="{{ $key }}"> {!! $val !!}</option>
																			@else
																				<option value="{{ $key }}"> {!! $val !!}</option>
																			@endif
																			@endforeach
																	</select>
																</div>
															</div>
														
														</div>
												
												@endif
											</div>
												<input type="hidden" name="default_zone_id" id="default_zone_id" value="3655">
										</fieldset>
									</div>
																	<!--- Michael pasted this here, this is the start --->
																	<!--- Michael pasted this section this is the start	--->	
								<div class="checkout_content">
										<section class="section-left">
												<div class="ship-payment">
													<div class="checkout-content checkout-payment-methods">
														<h2 class="secondary-title"><i class="fa fa-credit-card"></i>Payment Method</h2>
														<div class="box-inner">
															<div class="radio">
																<label style="margin-bottom:10px;"> 
																	<input type="radio" name="payment_option"  value="paystack"  checked="checked" style="margin-top:18px;">
																	<input type="hidden" name="paystack_ref_code" id="paystack_ref_code" value="paystack"  checked="checked" > <img src="{{ url("/image/paystacklogo.png") }}" style="height:50px; width:20%;object-fit:contain;"  alt="" srcset=""> <span style="line-height:17px; display:inline-block;width:75%;">Complete payment using your debit/credit card with secured Paystack Payment Gateway</span>
																</label>
																<label style="margin-bottom:10px;">
																	<input type="radio" name="payment_option" style="margin-top:18px;"  value="gtpay" ><img src="{{ url("/image/gtpay.png") }}" style="height:50px; width:20%;object-fit:contain; " alt="" srcset=""> <span style="line-height:17px; display:inline-block;width:75%;">Complete payment using your debit/credit card with secured GtBank Payment Gateway</span> 
																</label>
																<label style="margin-bottom:10px;">
																	<input type="radio" name="payment_option" style="margin-top:18px;"  value="offline_transfer"  ><span style="line-height:17px; display:inline-block;width:75%;">Complete payment offline by sending money directly into our account details</span> 
																</label>
																<div id="acc_details" style="display: none;" >
																	<h5>Account Details</h5>
																	<li style="list-style-type: none; font-size:16px;"><b>Account Name:</b> GKT Consults Limited</li>
																	<li style="list-style-type: none; font-size:16px;"><b>Account No:</b> 0594025862</li>
																	<li style="list-style-type: none; font-size:16px;"><b>Bank:</b> GTB</li>
																</div>
														    </div>
													    </div>
												    </div>
												</div>
										</section>
									</div>
								<!--- Michael pasted this section this is the end	--->
								
								  <div class="checkout-content confirm-section">
												<!--<div>-->
												<!--	<h2 class="secondary-title"><i class="fa fa-comment"></i>Add Comments About Your Order</h2>-->
												<!--	<label>-->
												<!--		<textarea name="comment" rows="3" class="form-control " style="height:100px;"></textarea>-->
												<!--	</label>-->
												<!--</div>-->
												<div class="confirm-order">
													<button id="so-checkout-confirm-button"  data-loading-text="Loading..." class="btn btn-success button confirm-button">Confirm Order</button> 
													<a href="{{ route('cart-page') }}" class="btn btn-primary">Back to cart</a>
												</div>
												<i style="color:#ff0000;">We do not withhold customers card details</i>
								    </div>
									<input type="text" name="checkout_proceed" id="proceed" style="margin-right:10px;" hidden>
								<!--- Michael pasted this here, this is the end -->
									
							
							
							</div>
					</form>
				@endif
			</div>
			<br>
			<hr>
			<div class="class-sm-12">
			    <div class="row" style="display:flex;justify-content:center;flex-wrap:wrap;">
			        <div class="col-md-2 col-sm-4" >
			            <img src="{{ url("/image/paystacklogo.png") }}" style="height:50px;" >
			        </div>
			        <div class="col-md-2 col-sm-4" >
			            <img src="{{ url("/image/gtpay.png") }}" style="height:50px;" >
			        </div>
			        <div class="col-md-2 col-sm-4" >
			            <img src="{{ url("/image/verve.png") }}" style="height:50px;" >
			        </div>
			        <div class="col-md-2 col-sm-4" >
			            <img src="{{ url("/image/mastercard.jpg") }}" style="height:50px;" >
			        </div>
			        <div class="col-md-2 col-sm-4" >
			            <img src="{{ url("/image/visa.jpg") }}" style="height:50px;" >
			        </div>
			        
			    </div>
			</div>
		</div>
</div>


@endsection

	