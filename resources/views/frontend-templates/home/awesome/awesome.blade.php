<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="single-box">
        <div class="all-service-main">
          <div class="all-service service-style">
            <ul class="service-list">
              <li><span class="service-name service-name-earth"></span><p>{!! trans('frontend.worldwide_service_label') !!}</p></li>
              <li><span class="service-name service-name-users"></span><p>{!! trans('frontend.24_7_help_center_label') !!}</p></li>
              <li><span class="service-name service-name-checkmark-circle"></span><p>{!! trans('frontend.safe_payment_label') !!}</p></li>
              <li><span class="service-name service-name-bicycle"></span><p>{!! trans('frontend.quick_delivery_label') !!}</p></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="clear_both"></div>  
    </div>
  </div>      
  
  @if(!empty($appearance_all_data['home_details']['collection_cat_list']) && count($appearance_all_data['home_details']['collection_cat_list']) > 0)
  <div id="categories_collection" class="categories-collection">
    <div class="row">
      @foreach($appearance_all_data['home_details']['collection_cat_list'] as $collection_cat_details)
        @if($collection_cat_details['status'] == 1)
        <div class="col-md-3 col-sm-12 pb-5">
          <div class="category">
            <a href="{{ route('categories-page', $collection_cat_details['slug']) }}">
              @if(!empty($collection_cat_details['category_img_url']))  
              <img class="d-block" src="{{ get_image_url($collection_cat_details['category_img_url']) }}">
              @else
              <img class="d-block" src="{{ default_placeholder_img_src() }}">
              @endif
              <div class="category-collection-mask"></div>
              <h3 class="category-title">{!! $collection_cat_details['name'] !!} <span>{!! trans('frontend.collection_label') !!}</span></h3>
            </a>
          </div>
        </div>
        @endif
      @endforeach
    </div>
    <div class="clear_both"></div>
  </div>
  @endif
  
  
  @if(!empty($appearance_all_data['home_details']['cat_name_and_products']) && count($appearance_all_data['home_details']['cat_name_and_products']) > 0) 
  <div class="top-cat-content">
    <div class="row">
    @foreach($appearance_all_data['home_details']['cat_name_and_products'] as $cat_details)
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 top-cat-content-title-cover">
        <div class="single-mini-box2">
          <div class="top-cat-list-sub clearfix">
            <div class="img-div">
              @if(!empty($cat_details['cat_deails']['category_img_url']))  
              <img class="d-block" src="{{ get_image_url($cat_details['cat_deails']['category_img_url']) }}">
              @else
              <img class="d-block" src="{{ default_placeholder_img_src() }}">
              @endif
            </div>  
            <div class="img-title">
              <h4>{!! trans('frontend.super_deal_label') !!}</h4>  
              <h2>{!! $cat_details['cat_deails']['name'] !!}</h2>
              <span>{!! trans('frontend.exclusive_collection_label') !!}</span>
              <div class="cat-shop-now">
                <a href="{{ route('categories-page', $cat_details['cat_deails']['slug']) }}">{!! trans('frontend.shop_now_label') !!}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9 col-md-9 col-sm-12 col-xs-12">
        <div class="row top_products_cover">
            @if($cat_details['cat_products']->count() > 0)
            @foreach($cat_details['cat_products'] as $items)
            
              <div class="col-lg-3 col-md-4 col-sm-2 col-xs-2 top-cat-products">
                <div class="single-mini-box2">
                    <div class="hover-product">
                        <div class="hover">
                          @if(!empty($items->image_url))
                          <img class="d-block" src="{{ get_image_url( $items->image_url ) }}" alt="{{ basename( get_image_url( $items->image_url ) ) }}" />
                          @else
                          <img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" />
                          @endif
  
                          <div class="overlay">
                            <button class="info quick-view-popup" data-id="{{ $items->id }}">{{ trans('frontend.quick_view_label') }}</button>
                          </div>
                        </div> 
  
                        <div class="single-product-bottom-section">
                            <a href="{{ route('details-page', $items->slug) }}" class=" product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}">
                            <h3>{!! $items->title !!}</h3></a>
                          
  
                          @if( $items->type == 'simple_product' )
                            <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($items->id, $items->price)), $selected_currency) !!}</p>
                          @elseif( $items->type == 'configurable_product')
                            <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $items->id) !!}</p>
                          @elseif( $items->type == 'customizable_product' || $items->type == 'downloadable_product')
                            @if(count(get_product_variations($items->id))>0)
                              <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $items->id) !!}</p>
                            @else
                              <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($items->id, $items->price)), $selected_currency) !!}</p>
                            @endif
                          @endif
                        </div>
                      </div>
                </div>    
              </div>
            @endforeach
          @endif
        </div>
         
      </div>
      
      <div class="clear_both"></div> <br><br>
    @endforeach
    </div>
  </div>    
  @endif
    
  <div class="row">

      <div id="todays-sales" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h2><span>Todays Deal</span></h2>
          <div class="special-products-slider-control">
            <a  href="{{ route('shop-page', 'todays-deal') }}" >
              see more
            </a>
           
          </div>
          <div class="single-mini-box">
            <div class="todays-sales">
              @if(count($advancedData['todays_deal']) > 0)
              <div id="slider-carousel-latest" class="todays-deal-items  row-line" data-ride="carousel">
                
                    @foreach($advancedData['todays_deal'] as $key => $latest_product)
                      
                        <div class="col-md-2 col-sm-3 col-xs-4 each-product">
                          <div class="hover-product">
                            <div class="hover">
                              @if(!empty($latest_product->image_url))
                              <img class="d-block" src="{{ get_image_url( $latest_product->image_url ) }}" alt="{{ basename( get_image_url( $latest_product->image_url ) ) }}" />
                              @else
                              <img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" />
                              @endif
      
                              <div class="overlay">
                                <button class="info quick-view-popup" data-id="{{ $latest_product->id }}">{{ trans('frontend.quick_view_label') }}</button>
                              </div>
                            </div> 
      
                            <div class="single-product-bottom-section">
                              <h3>{!! $latest_product->title !!}</h3>
      
                              @if( $latest_product->type == 'simple_product' )
                                <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</p>
                              @elseif( $latest_product->type == 'configurable_product')
                                <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $latest_product->id) !!}</p>
                              @elseif( $latest_product->type == 'customizable_product' || $latest_product->type == 'downloadable_product')
                                @if(count(get_product_variations($latest_product->id))>0)
                                  <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $latest_product->id) !!}</p>
                                @else
                                  <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</p>
                                @endif
                              @endif
      
                              <div class="single-product-add-to-cart">
                                @if( $latest_product->type == 'simple_product' )
                                  <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                                
                                  <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>
      
                                @elseif( $latest_product->type == 'configurable_product' )
                                  <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>
      
                                
                                  <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>
      
                                @elseif( $latest_product->type == 'customizable_product' )
                                  @if(is_design_enable_for_this_product($latest_product->id))
                                    <a href="{{ route('customize-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-customize-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.customize') }}"><i class="fa fa-gears"></i></a>
      
                                 
                                    <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>
      
                                  @else
                                    <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
            
                                    <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>
                                  @endif
      
                                @elseif( $latest_product->type == 'downloadable_product' ) 
                                  @if(count(get_product_variations( $latest_product->id ))>0)
                                  <a href="{{ route( 'details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>
                                  <a href="{{ route('details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>
                                  @else
                                  <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                                  
                                  <a href="{{ route('details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>
                                  @endif  
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>  
                      
                    @endforeach
                </div>
              @else
                <p class="not-available">{!! trans('frontend.todays_products_empty_label')  !!}</p>
              @endif
            </div>
          </div>
        </div> 
      <div id="latest" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h2> <span>Features Items</span></h2> 
          <div class="special-products-slider-control">
            <a  href="{{ route('shop-page', 'features') }}">
                            see more
            </a>
            
          </div>

          <div class="single-mini-box">
            <div class="latest">
              @if(count($advancedData['features_items']) > 0)
              <div id="" class="latest-items row-line" >
                  @foreach($advancedData['features_items'] as $key => $latest_product)
                      <div class="col-md-2 each-product">
                        <div class="hover-product">
                          <div class="hover">
                            @if(!empty($latest_product->image_url))
                            <img class="d-block" src="{{ get_image_url( $latest_product->image_url ) }}" alt="{{ basename( get_image_url( $latest_product->image_url ) ) }}" />
                            @else
                            <img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" />
                            @endif

                            <div class="overlay">
                              <button class="info quick-view-popup" data-id="{{ $latest_product->id }}">{{ trans('frontend.quick_view_label') }}</button>
                            </div>
                          </div> 

                          <div class="single-product-bottom-section">
                            <h3>{!! $latest_product->title !!}</h3>

                            @if( $latest_product->type == 'simple_product' )
                              <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</p>
                            @elseif( $latest_product->type == 'configurable_product')
                              <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $latest_product->id) !!}</p>
                            @elseif( $latest_product->type == 'customizable_product' || $latest_product->type == 'downloadable_product')
                              @if(count(get_product_variations($latest_product->id))>0)
                                <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $latest_product->id) !!}</p>
                              @else
                                <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</p>
                              @endif
                            @endif

                            <div class="single-product-add-to-cart">
                              @if( $latest_product->type == 'simple_product' )
                                <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                              
                                <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>

                              @elseif( $latest_product->type == 'configurable_product' )
                                <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>

                              
                                <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>

                              @elseif( $latest_product->type == 'customizable_product' )
                                @if(is_design_enable_for_this_product($latest_product->id))
                                  <a href="{{ route('customize-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-customize-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.customize') }}"><i class="fa fa-gears"></i></a>

                              
                                  <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>

                                @else
                                  <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
          
                                  <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>
                                @endif

                              @elseif( $latest_product->type == 'downloadable_product' ) 
                                @if(count(get_product_variations( $latest_product->id ))>0)
                                <a href="{{ route( 'details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>
                                <a href="{{ route('details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>
                                @else
                                <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                                
                                <a href="{{ route('details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>
                                @endif  
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>  
                  
                  @endforeach
                
              </div>
              @else
                <p class="not-available">{!! trans('frontend.latest_products_empty_label') !!}</p>
              @endif
            </div>
        </div>
    </div>

    <div id="latest" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h2> <span>{!! trans('frontend.latest_label') !!}</span></h2> 
          <div class="special-products-slider-control">
              <a  href="{{ route('shop-page', 'latest') }}">
                  see more
              </a>
          </div>

          <div class="single-mini-box">
            <div class="latest">
              @if(count($advancedData['latest_items']) > 0)
              <div id="" class="latest-items row-line" >
                  @foreach($advancedData['latest_items'] as $key => $latest_product)
                      <div class="col-md-2 each-product">
                        <div class="hover-product">
                          <div class="hover">
                            @if(!empty($latest_product->image_url))
                            <img class="d-block" src="{{ get_image_url( $latest_product->image_url ) }}" alt="{{ basename( get_image_url( $latest_product->image_url ) ) }}" />
                            @else
                            <img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" />
                            @endif

                            <div class="overlay">
                              <button class="info quick-view-popup" data-id="{{ $latest_product->id }}">{{ trans('frontend.quick_view_label') }}</button>
                            </div>
                          </div> 

                          <div class="single-product-bottom-section">
                            <h3>{!! $latest_product->title !!}</h3>

                            @if( $latest_product->type == 'simple_product' )
                              <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</p>
                            @elseif( $latest_product->type == 'configurable_product')
                              <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $latest_product->id) !!}</p>
                            @elseif( $latest_product->type == 'customizable_product' || $latest_product->type == 'downloadable_product')
                              @if(count(get_product_variations($latest_product->id))>0)
                                <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $latest_product->id) !!}</p>
                              @else
                                <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</p>
                              @endif
                            @endif

                            <div class="single-product-add-to-cart">
                              @if( $latest_product->type == 'simple_product' )
                                <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                              
                                <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>

                              @elseif( $latest_product->type == 'configurable_product' )
                                <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>

                              
                                <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>

                              @elseif( $latest_product->type == 'customizable_product' )
                                @if(is_design_enable_for_this_product($latest_product->id))
                                  <a href="{{ route('customize-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-customize-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.customize') }}"><i class="fa fa-gears"></i></a>

                              
                                  <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>

                                @else
                                  <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
          
                                  <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>
                                @endif

                              @elseif( $latest_product->type == 'downloadable_product' ) 
                                @if(count(get_product_variations( $latest_product->id ))>0)
                                <a href="{{ route( 'details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>
                                <a href="{{ route('details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>
                                @else
                                <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                                
                                <a href="{{ route('details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>
                                @endif  
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>  
                  
                  @endforeach
                
              </div>
              @else
                <p class="not-available">{!! trans('frontend.latest_products_empty_label') !!}</p>
              @endif
            </div>
        </div>
    </div>
     

    
    <div id="best-sales" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h2> <span>{!! trans('frontend.best_sales_label') !!}</span></h2>  
      <div class="special-products-slider-control">
      </div>
      <div class="single-mini-box">
        <div class="best-sales">
          @if(count($advancedData['best_sales']) > 0)
          <div id="slider-carousel-latest" class="best-sales-items row-line" data-ride="carousel">
              <?php //var_dump($advancedData['best_sales']); ?>
                @foreach($advancedData['latest_items'] as $key => $latest_product)
                    <div class="col-md-2 col-sm-3 col-xs-4 each-product">
                      <div class="hover-product ">
                        <div class="hover">
                          @if(!empty($latest_product->image_url))
                          <img class="d-block" src="{{ get_image_url( $latest_product->image_url ) }}" alt="{{ basename( get_image_url( $latest_product->image_url ) ) }}" />
                          @else
                          <img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" />
                          @endif
  
                          <div class="overlay">
                            <button class="info quick-view-popup" data-id="{{ $latest_product->id }}">{{ trans('frontend.quick_view_label') }}</button>
                          </div>
                        </div> 
  
                        <div class="single-product-bottom-section">
                          <h3>{!! $latest_product->title !!}</h3>
  
                          @if( $latest_product->type == 'simple_product' )
                            <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</p>
                          @elseif( $latest_product->type == 'configurable_product')
                            <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $latest_product->id) !!}</p>
                          @elseif( $latest_product->type == 'customizable_product' || $latest_product->type == 'downloadable_product')
                            @if(count(get_product_variations($latest_product->id))>0)
                              <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $latest_product->id) !!}</p>
                            @else
                              <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</p>
                            @endif
                          @endif
  
                          <div class="single-product-add-to-cart">
                            @if( $latest_product->type == 'simple_product' )
                              <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                            
                              <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>
  
                            @elseif( $latest_product->type == 'configurable_product' )
                              <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>
  
                            
                              <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>
  
                            @elseif( $latest_product->type == 'customizable_product' )
                              @if(is_design_enable_for_this_product($latest_product->id))
                                <a href="{{ route('customize-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-customize-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.customize') }}"><i class="fa fa-gears"></i></a>
  
                             
                                <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>
  
                              @else
                                <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
        
                                <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>
                              @endif
  
                            @elseif( $latest_product->type == 'downloadable_product' ) 
                              @if(count(get_product_variations( $latest_product->id ))>0)
                              <a href="{{ route( 'details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>
                              <a href="{{ route('details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>
                              @else
                              <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                              
                              <a href="{{ route('details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>
                              @endif  
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>  
                  
                @endforeach
              
            </div>
          @else
            <p class="not-available">{!! trans('frontend.best_sales_products_empty_label') !!}</p>
          @endif
        </div>
      </div>
    </div>  

  <div id="todays-sales" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2><span>{!! trans('frontend.todays_sale_label') !!}</span></h2>
        <div class="special-products-slider-control">
         
        </div>
        <div class="single-mini-box">
        <div class="todays-sales">
          @if(count($advancedData['todays_sales']) > 0)
          <div id="slider-carousel-latest" class="todays-deal-items row-line" data-ride="carousel">
              
                @foreach($advancedData['todays_sales'] as $key => $latest_product)
                
                    <div class="col-md-2 col-sm-3 col-xs-4 each-product">
                      <div class="hover-product">
                        <div class="hover">
                          @if(!empty($latest_product->image_url))
                          <img class="d-block" src="{{ get_image_url( $latest_product->image_url ) }}" alt="{{ basename( get_image_url( $latest_product->image_url ) ) }}" />
                          @else
                          <img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" />
                          @endif
  
                          <div class="overlay">
                            <button class="info quick-view-popup" data-id="{{ $latest_product->id }}">{{ trans('frontend.quick_view_label') }}</button>
                          </div>
                        </div> 
  
                        <div class="single-product-bottom-section">
                          <h3>{!! $latest_product->title !!}</h3>
  
                          @if( $latest_product->type == 'simple_product' )
                            <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</p>
                          @elseif( $latest_product->type == 'configurable_product')
                            <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $latest_product->id) !!}</p>
                          @elseif( $latest_product->type == 'customizable_product' || $latest_product->type == 'downloadable_product')
                            @if(count(get_product_variations($latest_product->id))>0)
                              <p>{!! get_product_variations_min_to_max_price_html($selected_currency, $latest_product->id) !!}</p>
                            @else
                              <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</p>
                            @endif
                          @endif
  
                          <div class="single-product-add-to-cart">
                            @if( $latest_product->type == 'simple_product' )
                              <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                            
                              <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>
  
                            @elseif( $latest_product->type == 'configurable_product' )
                              <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>
  
                            
                              <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>
  
                            @elseif( $latest_product->type == 'customizable_product' )
                              @if(is_design_enable_for_this_product($latest_product->id))
                                <a href="{{ route('customize-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-customize-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.customize') }}"><i class="fa fa-gears"></i></a>
  
                             
                                <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>
  
                              @else
                                <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
        
                                <a href="{{ route('details-page', $latest_product->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i>View</a>
                              @endif
  
                            @elseif( $latest_product->type == 'downloadable_product' ) 
                              @if(count(get_product_variations( $latest_product->id ))>0)
                              <a href="{{ route( 'details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.select_options') }}"><i class="fa fa-hand-o-up"></i></a>
                              <a href="{{ route('details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>
                              @else
                              <a href="" data-id="{{ $latest_product->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                              
                              <a href="{{ route('details-page', $latest_product->slug ) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>
                              @endif  
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>  
                @endforeach
            </div>
          @else
            <p class="not-available">{!! trans('frontend.todays_products_empty_label')  !!}</p>
          @endif
        </div>
      </div>
  </div> 
   

  
    
   
  
  
  
  @if(count($testimonials_data) > 0)
  <div class="testimonials-slider">
      <div class="row">
        <div class="col-12">
          <div class="content-title text-center">
              <h2> <span>{!! trans('frontend.testimonials_label') !!}</span></h2>
          </div>

          <div class="special-products-slider-control">
              <a href="#slider-carousel-testimonials" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
              </a>
              <a href="#slider-carousel-testimonials" data-slide="next">
                  <i class="fa fa-angle-right"></i>
              </a>
          </div>  

          <div id="slider-carousel-testimonials" class="carousel slide" data-ride="carousel">
              <?php $numb = 0; ?>
              <div class="carousel-inner">
                  @foreach($testimonials_data as $row)
                  @if($numb == 0)
                  <div class="carousel-item active">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-5 ml-auto">
                          <div class="testimonials-img text-right">
                              @if(!empty($row->testimonial_image_url))
                              <img src="{{ get_image_url($row->testimonial_image_url) }}" alt="" width="170" height="169">
                              @else
                              <img src="{{ default_placeholder_img_src() }}" alt="" width="170" height="169">
                              @endif
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-5 mr-auto">
                          <div class="testimonials-text">
                              <h2>{!! $row->post_title !!}</h2>
                              <p>{!! get_limit_string( string_decode($row->post_content), 200 ) !!}</p>
                              <a href="{{ route('testimonial-single-page', $row->post_slug)}}" class="btn btn-sm testimonials-read">{!! trans('frontend.read_more_label') !!}</a>
                          </div>
                      </div>
                    </div>      
                  </div>
                  @else
                  <div class="carousel-item">
                    <div class="row">  
                      <div class="col-xs-12 col-sm-12 col-md-5 ml-auto">
                          <div class="testimonials-img text-right">
                              @if(!empty($row->testimonial_image_url))
                              <img src="{{ get_image_url($row->testimonial_image_url) }}" alt="" width="170" height="169">
                              @else
                              <img src="{{ default_placeholder_img_src() }}" alt="" width="170" height="169">
                              @endif
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-5 mr-auto">
                          <div class="testimonials-text">
                              <h2>{!! $row->post_title !!}</h2>
                              <p>{!! get_limit_string(string_decode($row->post_content), 200) !!}</p>
                              <a href="{{ route('testimonial-single-page', $row->post_slug)}}" class="btn btn-sm testimonials-read">{!! trans('frontend.read_more_label') !!}</a>
                          </div>
                      </div>
                    </div>    
                  </div>
                  @endif
                  <?php $numb ++; ?>
                  @endforeach
              </div>
          </div>
        </div>      
      </div>
  </div>
  @endif  
  
  @if(count($blogs_data) > 0)
  {{-- <div class="row">
    <div class="col-12">
      <div class="recent-blog">
          <div class="content-title text-center">
              <h2> <span>{!! trans('frontend.latest_from_the_blog') !!}</span></h2>
          </div>
          <div class="recent-blog-content">
            <div class="row">
              @foreach($blogs_data as $rows)
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4  blog-box pb-5">
                  <a href="{{ route('blog-single-page', $rows['post_slug'])}}">
                      @if(!empty($rows['blog_image']))
                      <img class="d-block" src="{{ get_image_url($rows['blog_image']) }}"  alt="{{basename( $rows['blog_image'] )}}">
                      @else
                      <img class="d-block" src="{{ default_placeholder_img_src() }}"  alt="no image">
                      @endif
                      <div class="blog-bottom-text">
                          <p class="blog-title">{{ $rows['post_title'] }}</p>
                          <p class="blog-date-comments"><span class="blog-date"><i class="fa fa-calendar"></i>&nbsp; {{ Carbon\Carbon::parse($rows['created_at'])->format('d F, Y') }}</span>&nbsp;&nbsp;<span class="blog-comments"> <i class="fa fa-comment"></i>&nbsp; {!! $rows['comments_details']['total'] !!} {!! trans('frontend.comments_label') !!}</span></p>
                      </div>
                  </a>
              </div>
              @endforeach
            </div>  
          </div>
      </div>
    </div>      
  </div>     --}}
  @endif
    

  @if(count($brands_data) > 0)  
  <div class="brands-list">
      <div class="row">
          <div class="col-12">
              <div class="content-title text-center">
                  <h2> <span>{!! trans('frontend.brands') !!}</span></h2>
              </div>
              
              <div class="brands-list-content">
                  @foreach($brands_data as $brand)
                  <div class="brands-images">  
                      @if(!empty($brand->brand_logo_img_url))
                      <a href="{{ route('brands-single-page', $brand->slug) }}"><img  src="{{ get_image_url($brand->brand_logo_img_url) }}" alt="{{ basename($brand->brand_logo_img_url) }}" /></a>
                      @else
                      <a href="{{ route('brands-single-page', $brand->slug) }}"><img  src="{{ default_placeholder_img_src() }}" alt="" /></a>
                      @endif
                  </div>
                  @endforeach
              </div>  
          </div>      
      </div>      
  </div>
  @endif
  
  <div class="extra-message-tab">  
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <ul class="nav nav-tabs tabs-left">
                  <li class="active"><a href="#latest_news" data-toggle="tab">Latest News</a></li>
                  <li><a href="#winter_collection" data-toggle="tab">Winter Collection 2018</a></li>
                  <li><a href="#summer_collection" data-toggle="tab">Summer Collection 2018</a></li>
                  <li><a href="#newslatter" data-toggle="tab">Newsletter</a></li>
              </ul>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
              <div class="tab-content">
                  <div class="tab-pane active" id="latest_news">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                  <div class="tab-pane" id="winter_collection">
                      <div class="row">
                          <div class="col-sm-8">
                              <h3>Winter Collection 2018</h3>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                          </div>
                          <div class="col-sm-4">
                              <img src="{{ asset('public/images/add-sample/winter.jpg') }}" class="d-block w-100" alt="">
                          </div>
                      </div>
                  </div>
                  <div class="tab-pane" id="summer_collection">
                      <div class="row">
                          <div class="col-sm-8">
                              <h3>Summer Collection 2018</h3>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                          </div>
                          <div class="col-sm-4">
                              <img src="{{ asset('public/images/add-sample/summer.jpg') }}" class="d-block w-100" alt="">
                          </div>
                      </div>  
                  </div>
                  <div class="tab-pane" id="newslatter">
                      <div class="row">
                          <div class="col-sm-9">
                              <div class="newsletter-body">
                                  <h3>Newsletter</h3>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                  <form>
                                      <div class="input-group input-group-lg">
                                          <input class="form-control" placeholder="Enter email address" type="text">
                                          <span class="input-group-btn">
                                              <button class="btn btn-primary" type="button">Sign Up</button>
                                          </span>
                                      </div>
                                  </form>
                              </div>
                          </div>
                          {{-- <div class="col-sm-3 newsletter-badge">
                              <span>Subsribe &amp; Get </span>
                              <span class="price">$35</span>
                              <span>discount</span>
                          </div> --}}
                      </div>  
                  </div>
              </div>
          </div>      
          <div class="clear_both"></div>    
      </div>
  </div> 
</div>