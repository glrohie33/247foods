@extends('layouts.frontend.master')
@section('title',  'Brand Single '. get_site_title() )

@section('content')
        
        
	
	<div class="container product-detail">
		<div class="row">
			<aside class="col-md-4 col-sm-12 col-xs-12 content-aside left_column ">
                <div class="brand-details">
                  <div class="brand-info">
                    <div class="brand-logo">
                      @if($brand_details_by_slug['brand_details']['brand_logo_img_url'])
                      <img src="{{ get_image_url($brand_details_by_slug['brand_details']['brand_logo_img_url']) }}" alt="brand-logo">
                      @else
                      <img src="{{ default_placeholder_img_src() }}" alt="no-brand-logo">
                      @endif
                    </div>
                    <div class="brand-name">{!! $brand_details_by_slug['brand_details']['name'] !!},</div>
                    <div class="brand-country"> {!! $brand_details_by_slug['brand_details']['brand_country_name'] !!}</div>
                  </div>
                  <div class="brand-description">
                    <p>{!! string_decode($brand_details_by_slug['brand_details']['brand_short_description']) !!}</p>
                  </div>
                </div>
			</aside>
			<div id="content" class="col-md-8 col-sm-12 col-xs-12">
      
				
        
				<div class="products-category">
					
					<div class="products-category">
						
						<div class="products-list grid row number-col-3 so-filter-gird">
                                @foreach($brand_details_by_slug['products'] as $products)
							<div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-6">
								<div class="product-item-container">
									<div class="left-block">
										<div class="product-image-container  second_img  ">
											<a href="" title=" ">
												<img src="{{ get_image_url(get_product_image($products->id)) }} " alt=" " class="img-1 img-responsive">
												<img src="{{ get_image_url(get_product_image($products->id)) }}" alt=" " class="img-2 img-responsive">
											</a>
										</div>
										<div class="box-label">
											
										</div> 
									</div>
									
									<div class="right-block">
										<div class="caption">
											<h4><a href="{{ route('details-page', $products->slug) }}" title="{{ get_product_title($products->id) }}" data-toggle="tooltip" data-placement="top">{!! get_product_title($products->id) !!}</a></h4>
											<div class="total-price">
												<div class="price price-left">
                                                    <div class="price price-left">
                                                    <span class="price-new">{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products->price)), get_frontend_selected_currency()) !!}</span> 
                                                    {{-- <span class="price-old">$122.00 </span> --}}
												</div>
												</div>
												
											</div>
											
											<div class="list-block hidden">
                                        <button class="addToCart" type="button" data-toggle="tooltip" title="" onclick="cart.add({{ $products->id}}, '1');" data-original-title="Add to Cart "><span>Add to Cart </span></button>
												
											</div>
										</div>
										<div class="button-group">
											
											<button class="addToCart btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add({{ $products->id}}, '1');" data-original-title="Add to Cart"><span class="hidden">Add to Cart </span></button>
										</div>
									</div>
								</div>
                            </div>
                            @endforeach
					
                        </div>
                        <div class="products-pagination">{!! $brand_details_by_slug['products']->appends(Request::capture()->except('page'))->render() !!}</div>
					</div>
					
				</div>
			</div>
		</div>
    </div>
@endsection