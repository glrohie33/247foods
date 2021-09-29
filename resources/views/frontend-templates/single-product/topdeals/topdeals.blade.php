<div class="breadcrumbs">
		<div class="container">
			<div class="title-breadcrumb">   
                    {{ $single_product_details['post_title'] }}
			</div>
			<ul class="breadcrumb-cate">
				<li><a href="https://247foods.ng"><i class="fa fa-home"></i></a></li>
				
			</ul>
		</div>
	</div>
	
	<div class="container product-detail">
	   <div class="row">
		
	<div id="content" class="col-md-9 col-sm-8 col-xs-12">
  			<div class="sidebar-overlay "></div>
  			<div class="product-view product-detail">
  				<div class="product-view-inner clearfix">
  				   <div class="content-product-left  col-md-5 col-sm-6 col-xs-12">
  					  <div class="so-loadeding"></div>
  					  <div class="large-image  class-honizol">
  						 <div class="box-label">
  							{{-- <span class="label-product label-sale">
  							-30%
  							</span> --}}
                           </div>
                        @if(get_product_image($single_product_details['id']))
  						 <img class="product-image-zoom" src="{{ get_image_url($single_product_details['_product_related_images_url']->product_image) }}" data-zoom-image="{{ get_image_url($single_product_details['_product_related_images_url']->product_image) }}" title="" alt="">
                        @endif
                        </div>
  					  <div id="thumb-slider" class="full_slider category-slider-inner products-list yt-content-slider" data-rtl="no" data-autoplay="no" data-pagination="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="3" data-items_column1="3" data-items_column2="3" data-items_column3="3" data-items_column4="2" data-arrows="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                        @if(count($single_product_details['_product_related_images_url']->product_gallery_images) > 0)
                            <?php $count = 1;?>
                            @foreach($single_product_details['_product_related_images_url']->product_gallery_images as $key => $row)
                                @if($count == 1)
                                <div class="owl2-item " >
  								  <div class="image-additional">  
                                    @if(!empty($row->url) && (basename($row->url) !== 'no-image.png')) 
  									      
                                       <a data-index="0" class="img thumbnail active" data-image="{{ get_image_url($row->url) }}"" alt="<?=isset($row->alt)?$row->alt:''?>">
                                        
                                        </a>
                                        @endif  
  								  </div> 
                                 </div>
                                 @else
                                    <div class="owl2-item " >
                                    <div class="image-additional">  
                                        @if(!empty($row->url) && (basename($row->url) !== 'no-image.png')) 
                                            
                                        <a data-index="0" class="img thumbnail " data-image="{{ get_image_url($row->url) }}" title="">
                                            <img src="{{ get_image_url($row->url) }}" title="" alt="<?=isset($row->alt)?$row->alt:''?>">
                                            
                                            </a>
                                            @endif  
                                    </div> 
                                    </div>
                                    @endif
                                @endforeach
                            @endif
  							
  						 
  					  </div>
  				   </div>
  				   <div class="content-product-right col-md-7 col-sm-6 col-xs-12">
  					  {{-- <div class="countdown_box">
  						 <div class="countdown_inner">
  							<div class="Countdown-1">
  							</div>
  						 </div>
  					  </div> --}}
  					  <div class="title-product">
  						 <h1>{{ $single_product_details['post_title'] }}</h1>
                   </div>
                   
                        @if(!is_null($single_product_details['offer_price']))
                            <div class="product_page_price price" itemscope="">
                            <span class="price-old"><span id="price-old">{!! price_html( $single_product_details['offer_price'] ) !!}</span></span>
                            </div>
                        @endif
                        
                        <div class="product_page_price price" itemscope="" >
  						               <span class="price-new"><span id="price-special">{!! price_html( $single_product_details['solid_price'] ) !!}</span></span>
                           
                          </div>
                          @if($single_product_details['post_regular_price'] && $single_product_details['post_sale_price'] && $single_product_details['post_regular_price'] > $single_product_details['post_sale_price'] && $single_product_details['_product_sale_price_start_date'] && $single_product_details['_product_sale_price_end_date'] && $single_product_details['_product_sale_price_end_date'] >= date("Y-m-d"))
                            
                            @endif
  					  <div class="product-box-desc">
  						 <div class="inner-box-desc">
                                    <div class="model">
                                       
                                          <span>Weight:</span> {{ $single_product_details['product_weight'] }} Kg
                                    </div>
                                    @if( $single_product_details['post_stock_availability'] == 'in_stock' || ($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'only_allow' && $single_product_details['post_stock_availability'] == 'in_stock') || ($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'allow_notify_customer' && $single_product_details['post_stock_availability'] == 'in_stock') )
                                        <div class="stock"><span>Availability:</span> <i class="fa fa-check-square-o"></i>In Stock</div>
                                    @endif
                               </div>
  					  </div>
  					  <div class="short_description form-group">
  						 <h3>OverView</h3>
  					  </div>
                   @if( $single_product_details['post_stock_availability'] == 'in_stock' || ($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'only_allow' && $single_product_details['post_stock_availability'] == 'in_stock') || ($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'allow_notify_customer' && $single_product_details['post_stock_availability'] == 'in_stock') )
                  <div id="product">
  						 <div class="box-cart clearfix">
  							<div class="form-group box-info-product">
  							   <div class="option quantity">
  								  <div class="input-group quantity-control" unselectable="on" style="user-select: none;">
  									 <input class="form-control" type="text" name="quantity" value="1" onchange="setquantity(this)">
  									 <input type="hidden" name="product_id" value="108">
  									 <span class="input-group-addon product_quantity_down fa fa-caret-down"></span>
  									 <span class="input-group-addon product_quantity_up fa fa-caret-up"></span>
  								  </div>
  							   </div>
  							   <div class="cart">
  								  <input type="button" value="Add to Cart" class="addToCart btn btn-mega btn-lg " data-toggle="tooltip" title="" onclick="cart.add({{ $single_product_details['id'] }});" data-original-title="Add to cart">
  							   </div>
  							</div>
  							<div class="clearfix"></div>
  						 </div>
                   </div>
                   @else
                   <p>Out of Stock</p>
                   @endif
  				   </div>
  				</div>
  			 </div>
  			<div class="product-attribute module">
  				<div class="row content-product-midde clearfix">
  				   <div class="col-xs-12">
  					  <div class="producttab ">
  						 <div class="tabsslider  vertical-tabs ">
  							<ul class="nav nav-tabs font-sn col-lg-3 col-sm-4 " style="padding: 0">
  							   <li class="active"><a data-toggle="tab" href="#tab-description">Description</a></li>
  							   <li><a href="#tab-review" data-toggle="tab">Reviews (0)</a></li>
  							</ul>
  							<div class="tab-content col-lg-9 col-sm-8 col-xs-12 ">
  							   <div class="tab-pane active" id="tab-description">
                                    {!! string_decode($single_product_details['post_content']) !!}
  							   </div>
  							   <div class="tab-pane" id="tab-review">
  								
  							   </div>
  							</div>
  						 </div>
  					  </div>
  				   </div>
  				</div>
  			</div>
  			 
  			<div class="content-product-bottom bottom-product clearfix module">
  				<ul class="nav nav-tabs">
  					<li class="active"><a data-toggle="tab" href="#product-related">Related Products</a></li> 
  				</ul>
  				<div class="tab-content product-list">
  					<div id="product-related" class="row ">
					 @if(count($related_items) > 0)
                        @foreach($related_items as $products)
						<div class="item-inner product-layout transition product-grid col-lg-3 col-md-3 col-sm-4 col-xs-6">
							<div class=product-item-container>
							<div class=left-block>
							<div class="image product-image-container">
							<a class=lt-image href="{{ route('details-page', $products['post_slug']) }}" target=_self>
							<img class="lazy-load-image" src="https://dummyimage.com/500x333/ffffff/ff2f00.jpg&text=247foods" data-src="{{ get_image_url( $products['_product_related_images_url']->product_image ) }}" alt="$products->image_alt }}">
							</a>
							</div>
							</div>
							<div class=right-block>
							<h4 class="title"><a href="{{ route('details-page', $products['post_slug']) }}" target=_self>{!! get_product_title($products['id']) !!}</a></h4>
							<div class="total-price clearfix">
							<div class="price price-left">
							<span class=price-new>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products['id'], $products['post_price']))) !!}</span>
							@if($products['post_sale_price'] > 0 && $products['post_sale_price'] != '')
							<span class=price-old>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products['id'], $products['post_regular_price']))) !!}</span>
							@endif
							</div>
							</div>
							</div>
							</div>
							</div> 
                           @endforeach
                        @endif
  						</div>
  					</div>
  				</div>
			  </div>
			  <aside class="col-md-3 col-sm-4 col-xs-12 content-aside left_column sidebar-offcanvas" style="margin-top:15px;">
                <span id="close-sidebar" class="fa fa-times"></span>
                <div class="module">
                        @include('includes.frontend.categories-page')
                        @yield('categories-page-content')
                </div> 
			</aside>
		</div>
	</div>