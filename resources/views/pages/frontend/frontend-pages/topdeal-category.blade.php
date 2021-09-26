@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_category_products') .' < '. get_site_title() )

@section('content')
    
	
	<div class="container product-detail">
		<div class="row">
			<aside class="col-md-3 col-sm-4 col-xs-12 content-aside left_column sidebar-offcanvas">
                <span id="close-sidebar" class="fa fa-times"></span>
                <div class="module">
                        @include('includes.frontend.categories-page')
                        @yield('categories-page-content')
                </div> 
			</aside>
			<div id="content" class="col-md-9 col-sm-12 col-xs-12">
        <div class="module banners-effect-9 form-group">
          <div class="banners">
            <div>
              <a href="#"><img src="{{ URL::asset($product_by_cat_id['image']) }}"></a>
            </div>
          </div>
        </div>
				<a href="javascript:void(0)" class="open-sidebar hidden-lg hidden-md"><i class="fa fa-bars"></i>Sidebar</a>
        
				<div class="products-category">
					<div class="form-group clearfix">
						<h3 class="title-category ">{{ $product_by_cat_id['name'] }}</h3>
					</div>
					<div class="products-category">
						<div class="product-filter filters-panel">
							<div class="row">
								<div class="col-sm-2 view-mode hidden-sm hidden-xs">
									<div class="list-view">
										<button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
                                        <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
									</div>
								</div>
							
								<div class="short-by-show form-inline text-right col-md-10 col-sm-12">
									<div class="form-group short-by">
										<label class="control-label" for="input-sort">Sort By:</label>
										<select id="input-sort" class="form-control" onchange="location = '?sort_by=' + this.value;">
											@if($product_by_cat_id['sort_by'] == 'all')  
                                            <option selected="selected" value="all">{{ trans('frontend.sort_filter_all_label') }}</option>
                                            @else
                                            <option value="all">{{ trans('frontend.sort_filter_all_label') }}</option>
                                            @endif
                            
                                            @if($product_by_cat_id['sort_by'] == 'alpaz')  
                                            <option selected="selected" value="alpaz">{{ trans('frontend.sort_filter_alpaz_label') }}</option>
                                            @else
                                            <option value="alpaz">{{ trans('frontend.sort_filter_alpaz_label') }}</option>
                                            @endif
                            
                                            @if($product_by_cat_id['sort_by'] == 'alpza')  
                                            <option selected="selected" value="alpza">{{ trans('frontend.sort_filter_alpza_label') }}</option>
                                            @else
                                            <option value="alpza">{{ trans('frontend.sort_filter_alpza_label') }}</option>
                                            @endif
                            
                                            @if($product_by_cat_id['sort_by'] == 'low-high')  
                                            <option selected="selected" value="low-high">{{ trans('frontend.sort_filter_low_high_label') }}</option>
                                            @else
                                            <option value="low-high">{{ trans('frontend.sort_filter_low_high_label') }}</option>
                                            @endif
                            
                                            @if($product_by_cat_id['sort_by'] == 'high-low')  
                                            <option selected="selected" value="high-low">{{ trans('frontend.sort_filter_high_low_label') }}</option>
                                            @else
                                            <option value="high-low">{{ trans('frontend.sort_filter_high_low_label') }}</option>
                                            @endif
                            
                                            @if($product_by_cat_id['sort_by'] == 'old-new')  
                                            <option selected="selected" value="old-new">{{ trans('frontend.sort_filter_old_new_label') }}</option>
                                            @else
                                            <option value="old-new">{{ trans('frontend.sort_filter_old_new_label') }}</option>
                                            @endif
                            
                                            @if($product_by_cat_id['sort_by'] == 'new-old')
                                            <option selected="selected" value="new-old">{{ trans('frontend.sort_filter_new_old_label') }}</option>
                                            @else
                                            <option value="new-old">{{ trans('frontend.sort_filter_new_old_label') }}</option>
                                            @endif
										</select>
									</div>
									
									
								</div>
							
							</div>
						</div>
						<div class="products-list grid row number-col-3 so-filter-gird">
                                @foreach($product_by_cat_id['products'] as $products)
							<div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-6">
								<div class="product-item-container">
									<div class="left-block">
										<div class="product-image-container  second_img  ">
											<a href="{{ route('details-page', $products['slug']) }}" title="">
												<img src="{{ get_image_url(get_product_image($products['id'])) }} " alt="{{$products['image_alt']}}" class="img-1 img-responsive">
												<img src="{{ get_image_url(get_product_image($products['id'])) }}" alt="{{$products['image_alt']}}" class="img-2 img-responsive">
											</a>
										</div>
										<div class="box-label">
											
										</div> 
									</div>
									
									<div class="right-block">
										<div class="caption">
											<h4><a href="{{ route('details-page', $products['slug']) }}" title="{{ get_product_title($products['id']) }}" data-toggle="tooltip" data-placement="top">{!! get_product_title($products['id']) !!}</a></h4>
											<div class="total-price">
												<div class="price price-left">
                                                    <span class="price-new">{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products['id'], $products['price'])), get_frontend_selected_currency()) !!}</span> 
                                                    {{-- <span class="price-old">$122.00 </span> --}}
												</div>
												
											</div>
											
											<div class="list-block hidden">
                                        <button class="addToCart" type="button" data-toggle="tooltip" title="" onclick="cart.add({{ $products['id']}}, '1');" data-original-title="Add to Cart "><span>Add to Cart </span></button>
												
											</div>
										</div>
										<div class="button-group">
											
											<button class="addToCart btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add({{ $products['id'] }}, '1');" data-original-title="Add to Cart"><span class="hidden">Add to Cart </span></button>
										</div>
									</div>
								</div>
                            </div>
                            @endforeach
					
                        </div>
                        <div class="products-pagination">{!! $product_by_cat_id['products']->appends(Request::capture()->except('page'))->render() !!}</div>
					</div>
					
				</div>
			</div>
		</div>
    </div>
@endsection