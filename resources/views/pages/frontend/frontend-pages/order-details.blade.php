@extends('layouts.frontend.master')
@section('title',  trans('frontend.shopist_order_received_title') .' < '. get_site_title() )

@section('content')
@if( count($order_details_for_thank_you_page) > 0)
<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Order Infomation</a></li>
		</ul>
		
		<div class="row" style="max-width:800px;margin:0px auto;">
			<!--Middle Part Start-->
			<div id="content" class="col-md-12" style="margin:0px auto;">
				<h2 class="title">Order Information</h2>

				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<td colspan="2" class="text-left">Order Details</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="width: 50%;" class="text-left"> <b>{{ trans('frontend.order_number') }}</b> #{!! $order_details_for_thank_you_page['order_id'] !!}
								<br>
								<b>{{ trans('frontend.date') }}:</b> {!! $order_details_for_thank_you_page['order_date'] !!}</td>
							<td style="width: 50%;" class="text-left"> <b>{{ trans('frontend.payment_method') }} :</b> {!! get_payment_method_title($order_details_for_thank_you_page['_payment_method']) !!}
								
						</tr>
					</tbody>
				</table>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<td style="width: 50%; vertical-align: top;" class="text-left">{{ trans('frontend.billing_address') }}</td>
							<td style="width: 50%; vertical-align: top;" class="text-left">Delivery Choices </td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-left">
                                @if(!empty($order_details_for_thank_you_page['customer_address']))
                                    <p>{!! $order_details_for_thank_you_page['customer_address']['_billing_first_name'].' '. $order_details_for_thank_you_page['customer_address']['_billing_last_name']!!}</p>
                                    @if($order_details_for_thank_you_page['customer_address']['_billing_company'])
                                      <p><strong>{{ trans('frontend.company') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_company'] !!}</p>
                                    @endif
                                    <p><strong>{{ trans('frontend.address_1') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_address_1'] !!}</p>
                                    @if($order_details_for_thank_you_page['customer_address']['_billing_address_2'])
                                      <p><strong>{{ trans('frontend.address_2') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_address_2'] !!}</p>
                                    @endif
                                    <p><strong>{{ trans('frontend.city') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_city'] !!}</p>
                                    <p><strong>{{ trans('frontend.postCode') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_postcode'] !!}</p>
                                    <p><strong>{{ trans('frontend.country') }}:</strong> {!! get_country_by_code( $order_details_for_thank_you_page['customer_address']['_billing_country'] ) !!}</p>
                        
                        
                                    <br>
                        
                                    <p><strong>{{ trans('frontend.phone') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_phone'] !!}</p>
                        
                                    @if($order_details_for_thank_you_page['customer_address']['_billing_fax'])
                                      <p><strong>{{ trans('frontend.fax') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_fax'] !!}</p>
                                    @endif
                                    <p><strong>{{ trans('frontend.email') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_email'] !!}</p>
                                  @endif</td>
							<td class="text-left">
                                @if($order_details_for_thank_you_page['_delivery_zone'])
                                    <p> <strong>Delivery Zone</strong>: {{  $order_details_for_thank_you_page['_delivery_zone']}}</p>
                                @endif
                                @if($order_details_for_thank_you_page['_delivery_area'])
                                    <p> <strong>Delivery Area</strong>: {{ $order_details_for_thank_you_page['_delivery_area']}}</p>
                                @endif
                                @if($order_details_for_thank_you_page['_delivery_date'])
                                    <p> <strong>Delivery Date</strong>: {{ $order_details_for_thank_you_page['_delivery_date']}}</p>
                                @endif
                                @if($order_details_for_thank_you_page['_delivery_time'])
                                    <p> <strong>Delivery Time</strong>:{{  $order_details_for_thank_you_page['_delivery_time'] }}</p>
                                @endif</td>
						</tr>
					</tbody>
				</table>
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
                    @if(count($order_details_for_thank_you_page['ordered_items'])>0)   
                        <thead>
                                <tr class="cart_menu">
                                        <td class="Item">{{ trans('frontend.item') }}</td>
                                        <td class="price">{{ trans('frontend.price') }}</td>
                                        <td class="quantity">{{ trans('frontend.quantity') }}</td>
                                        <td class="total">{{ trans('frontend.total') }}</td>
                                      </tr>
						</thead>
						<tbody>
                                @foreach($order_details_for_thank_you_page['ordered_items'] as $items)
                                <tr>
                                  <td class="cart_description">
                                    <h6>{!! $items['name'] !!}</h6>
                                    <?php $count = 1; ?>
                                    @if(count($items['options']) > 0)
                                    <p>
                                      @foreach($items['options'] as $key => $val)
                                        @if($count == count($items['options']))
                                          {!! $key .' &#8658; '. $val !!}
                                        @else
                                          {!! $key .' &#8658; '. $val. ' , ' !!}
                                        @endif
                                        <?php $count ++ ; ?>
                                      @endforeach
                                    </p>
                                    @endif
                  
                                    @if($items['product_type'] == 'downloadable_product' && $order_details_for_thank_you_page['_customer_ip_address'] == get_ip_address() && (($order_details_for_thank_you_page['settings']['general_settings']['downloadable_products_options']['login_restriction'] == true && is_frontend_user_logged_in() && $order_details_for_thank_you_page['settings']['general_settings']['downloadable_products_options']['grant_access_from_thankyou_page'] == true) || ($order_details_for_thank_you_page['settings']['general_settings']['downloadable_products_options']['login_restriction'] == false && $order_details_for_thank_you_page['settings']['general_settings']['downloadable_products_options']['grant_access_from_thankyou_page'] == true)))
                                    {!! download_file_html( $items['id'], $items['download_data'], $order_details_for_thank_you_page['order_id']) !!}
                                    @endif
                  
                                    @if( count(get_vendor_details_by_product_id($items['product_id'])) >0 )
                                    <p class="vendor-title"><strong>{!! trans('frontend.vendor_label') !!}</strong> : {!! get_vendor_name_by_product_id( $items['product_id'] ) !!}</p>
                                    @endif
                                  </td>
                                  <td class="cart_price">
                                    <p> {!! price_html( $items['order_price'], $order_details_for_thank_you_page['_order_currency'] ) !!} </p>
                                  </td>
                                  <td class="cart_quantity">
                                      <p> {!! $items['quantity'] !!} </p>
                                  </td>
                                  <td class="cart_total">
                                    <p>{!! price_html( ($items['quantity']*$items['order_price']), $order_details_for_thank_you_page['_order_currency'] ) !!}</p>
                                  </td>
                                </tr>
                                @endforeach

                        </tbody>
                    @endif
						<tfoot>
							<tr>
								<td colspan="2"></td>
								<td class="text-right"><b>{{ trans('frontend.tax') }}</b>
								</td>
								<td class="text-right">{!! price_html( $order_details_for_thank_you_page['_final_order_tax'], $order_details_for_thank_you_page['_order_currency'] ) !!}</td>
								
							</tr>
							<tr>
								<td colspan="2"></td>
								<td class="text-right"><b>{{ trans('frontend.shipping_cost') }}</b>
								</td>
								<td class="text-right">{!! price_html( $order_details_for_thank_you_page['_final_order_shipping_cost'], $order_details_for_thank_you_page['_order_currency'] ) !!}</td>
								
							</tr>
							<tr>
								<td colspan="2"></td>
								<td class="text-right"><b>{{ trans('frontend.coupon_discount_label') }}</b>
								</td>
								<td class="text-right">- {!! price_html( $order_details_for_thank_you_page['_final_order_discount'], $order_details_for_thank_you_page['_order_currency'] ) !!}</td>
								
							</tr>
							<tr>
								<td colspan="2"></td>
								<td class="text-right"><b>{{ trans('frontend.order_total') }}</b>
								</td>
								<td class="text-right">{!! price_html( $order_details_for_thank_you_page['_final_order_total'], $order_details_for_thank_you_page['_order_currency'] ) !!}</td>
								
							</tr>
							
						</tfoot>
					</table>
				</div>
				
				<div class="buttons clearfix">
					<div class="pull-right"><a class="btn btn-primary" href="{{ URL::to("/") }}">Continue</a>
					</div>
				</div>



			</div>
			<!--Middle Part End-->
			<!--Right Part Start -->
			
	</div>
</div>
@endif
@endsection