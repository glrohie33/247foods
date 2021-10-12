<div id=content>
<div class=so-page-builder>
<div class="container page-builder-ltr slider-banner">
<div class="row row_a90w row-style">
<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 col_vnxd">
<div class="row row_f8gy">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_gafz col-style megamenu-style-dev megamenu-dev">
<div class=responsive>
<div class="so-vertical-menu no-gutter">
<nav class=navbar-default>
<div class="container-megamenu container vertical">
<div class=vertical-wrapper>
<span id=remove-verticalmenu class="fa fa-times"></span>
<div class=megamenu-pattern>
<div class=container>
<ul class=megamenu data-transition=slide data-animationtime=300>
@foreach($vertical_menu as $menu)
<li class="item-vertical css-menu with-sub-menu hover" data-id="<?=$menu['term_id']?>">
<p class=close-menu></p>
<a href="{{ route('categories-page', $menu['slug']) }}" class=clearfix>
<span>
<strong>
{{ $menu['name'] }}
</strong>
</span>
</a>
<div class=sub-menu style=width:250px>
<div class=content>
                
</div>
</div>
</li>
@endforeach
<li class=loadmore><i class="fa fa-plus-square"></i><span class=more-view> More Categories</span></li>
</ul>
</div>
</div>
</div>
</div>
</nav>
</div>
</div>
</div>
</div>
</div>

<div class="col-lg-7 col-md-9 col-sm-12 col-xs-12 col_anla slider-right home-slider  slider" data-time="3000">
@if($appearance_all_data['header_details']['slider_visibility'] == true && Request::is('/'))
@foreach($slider_images as $img)
<a href="<?=($img->link)?$img->link:'';?>" class="item" >
<img class="responsive lazy-load-image" src="<?=img_loading()?>"  data-src="{{ get_image_url($img->url) }}" >
</a>
@endforeach @endif

</div>

<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col_anla slider-right">
<div class="row row_ci4f banner-row">
<div class="col-md-6 col-sm-6 col-xs-6 img-cover">
<a href="<?=($home_banner[0]['url'])? $home_banner[0]['url'] : "" ;?>">
<img class="lazy-load-image img-thumbnail" src="<?=img_loading()?>" data-src="<?=($home_banner[0]['image'])? URL::asset($home_banner[0]['image']) : "" ;?>" class=img-thumbnail alt="" srcset="">
</a>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 img-cover">
<a href="<?=($home_banner[1]['url'])? $home_banner[1]['url'] : "" ;?>">
<img class="lazy-load-image img-thumbnail" src="<?=img_loading()?>" data-src="<?=($home_banner[1]['image'])? URL::asset($home_banner[1]['image']) : "" ;?>" class=img-thumbnail alt="" srcset="">
</a>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 img-cover">
<a href="<?=($home_banner[2]['url'])? $home_banner[2]['url'] : "" ;?>">
<img class="lazy-load-image  img-thumbnail" src="<?=img_loading()?>" dat-src="<?=($home_banner[2]['image'])? URL::asset($home_banner[2]['image']) : "" ;?>" class=img-thumbnail alt="" srcset="">
</a>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 img-cover">
<a href="<?=($home_banner[3]['url'])? $home_banner[3]['url'] : "" ;?>">
<img class="lazy-load-image  img-thumbnail" src="<?=img_loading()?>" data-src="<?=($home_banner[3]['image'])? URL::asset($home_banner[3]['image']) : "" ;?>" class=img-thumbnail alt="" srcset="">
</a>
</div>
</div>
</div>
</div>
</div>
<div class="container page-builder-ltr products"> 
        <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 module so-listing-tabs-ltr default-nav clearfix img-float label-1 home-lt1">
                        <div class="head-title font-ct">
                                <h2 class=modtitle>Todays Deal</h2>
                                <div class="view-more">
                                        <a class="label" href="{{ route('shop-page', 'todays-deal') }}">see more</a>
                                </div>
                        </div>
                        <div class="product-list">
                                @if(count($advancedData['todays_deal']) > 0) @foreach($advancedData['todays_deal'] as $key => $latest_product)
                                <div class="item-inner product-layout transition product-grid col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                <div class=product-item-container>
                                <div class=left-block>
                                <div class="image product-image-container">
                                <a class=lt-image href="{{ route('details-page', $latest_product->slug) }}" target=_self>
                                <img src="{{ get_image_url( $latest_product->image_url ) }}" alt="$latest_product->image_alt }}">
                                </a>
                                </div>
                                </div>
                                <div class=right-block>
                                <h4 class="title"><a href="{{ route('details-page', $latest_product->slug) }}" target=_self>{!! $latest_product->title !!}</a></h4>
                                <div class="total-price clearfix">
                                <div class="price price-left">
                                <span class=price-new>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</span>
                                @if($latest_product->sale_price > 0 && $latest_product->sale_price != '')
                                <span class=price-old>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->regular_price)), $selected_currency) !!}</span>
                                @endif
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                @endforeach @endif
                        </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 module so-listing-tabs-ltr default-nav clearfix img-float label-1 home-lt1">
                        <div class="head-title font-ct">
                                <h2 class=modtitle>Best Selling</h2>
                                <div class="view-more">
                                        <a class="label" href="{{ route('shop-page', 'features') }}">see more</a>
                                </div>
                        </div>
                        <div class="product-list">
                                @if(count($advancedData['features_items']) > 0) @foreach($advancedData['best_selling'] as $key => $latest_product)
                                <div class="item-inner product-layout transition product-grid col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                <div class=product-item-container>
                                <div class=left-block>
                                <div class="image product-image-container">
                                <a class=lt-image href="{{ route('details-page', $latest_product->slug) }}" target=_self>
                                <img class="lazy-load-image" src="<?=img_loading()?>" data-src="{{ get_image_url( $latest_product->image_url ) }}" alt="$latest_product->image_alt }}">
                                </a>
                                </div>
                                </div>
                                <div class=right-block>
                                <h4 class="title"><a href="{{ route('details-page', $latest_product->slug) }}" target=_self>{!! $latest_product->title !!}</a></h4>
                                <div class="total-price clearfix">
                                <div class="price price-left">
                                <span class=price-new>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</span>
                                @if($latest_product->sale_price > 0 && $latest_product->sale_price != '')
                                <span class=price-old>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->regular_price)), $selected_currency) !!}</span>
                                @endif
                                </div>
                                </div>
                                </div>
                                </div>
                                </div> 
                                @endforeach @endif
                        </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 module so-listing-tabs-ltr default-nav clearfix img-float label-1 home-lt1">
                                <div class="head-title font-ct">
                                        <h2 class=modtitle>Featured Product</h2>
                                        <div class="view-more">
                                                <a class="label" href="{{ route('shop-page', 'features') }}">see more</a>
                                        </div>
                                </div>
                                <div class="product-list">
                                        @if(count($advancedData['features_items']) > 0) @foreach($advancedData['features_items'] as $key => $latest_product)
                                        <div class="item-inner product-layout transition product-grid col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                        <div class=product-item-container>
                                        <div class=left-block>
                                        <div class="image product-image-container">
                                        <a class=lt-image href="{{ route('details-page', $latest_product->slug) }}" target=_self>
                                        <img class="lazy-load-image" src="<?=img_loading()?>" data-src="{{ get_image_url( $latest_product->image_url ) }}" alt="$latest_product->image_alt }}">
                                        </a>
                                        </div>
                                        </div>
                                        <div class=right-block>
                                        <h4 class="title"><a href="{{ route('details-page', $latest_product->slug) }}" target=_self>{!! $latest_product->title !!}</a></h4>
                                        <div class="total-price clearfix">
                                        <div class="price price-left">
                                        <span class=price-new>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), $selected_currency) !!}</span>
                                        @if($latest_product->sale_price > 0 && $latest_product->sale_price != '')
                                        <span class=price-old>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->regular_price)), $selected_currency) !!}</span>
                                        @endif
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        @endforeach @endif
                                </div>
                        </div>
                        <div class="item-1 col-lg-6 col-md-6 col-sm-6 banners">
                        <div>
                        <a title="Static Image" href="<?=($home_banner[4]['url'])? $home_banner[4]['url'] : "" ;?>"><img class="lazy-load-image" src="<?=img_loading()?>" data-src="<?=($home_banner[4]['image'])? URL::asset($home_banner[4]['image']) : "" ;?>" alt="Static Image"></a>
                        </div>
                        </div>
                        <div class="item-2 col-lg-6 col-md-6 col-sm-6 banners">
                        <div>
                        <a title="Static Image" href="<?=($home_banner[5]['url'])? $home_banner[5]['url'] : "" ;?>"><img class="lazy-load-image" src="<?=img_loading()?>" data-src="<?=($home_banner[5]['image'])? URL::asset($home_banner[5]['image']) : "" ;?>" alt="Static Image"></a>
                        </div>
                        </div>

                        @foreach($homePageCategories as $cat_details)
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 module so-listing-tabs-ltr default-nav clearfix img-float label-1 home-lt1">
                                        <div class="head-title font-ct">
                                                <h2 class=modtitle>{!! $cat_details['name'] !!}</h2>
                                                <div class="view-more">
                                                        <a class="label" href="{{ route('categories-page', $cat_details['slug']) }}">see more</a>
                                                </div>
                                        </div>
                                        <div class="product-list cat-list" data-id="<?=$cat_details['term_id']?>">
                                                
                                        </div>
                                </div>
                        @endforeach
                        <div class="item-1 col-lg-6 col-md-6 col-sm-6 banners">
                        <div>
                        <a title="Static Image" href="<?=($home_banner[6]['url'])? $home_banner[6]['url'] : "" ;?>"><img class="lazy-load-image" src="<?=img_loading()?>" data-src="<?=($home_banner[6]['image'])? URL::asset($home_banner[6]['image']) : "" ;?>" alt="Static Image"></a>
                        </div>
                        </div>
                        <div class="item-2 col-lg-6 col-md-6 col-sm-6 banners">
                        <div>
                        <a title="Static Image" href="<?=($home_banner[7]['url'])? $home_banner[7]['url'] : "" ;?>"><img class="lazy-load-image" src="<?=img_loading()?>" data-src="<?=($home_banner[7]['image'])? URL::asset($home_banner[7]['image']) : "" ;?>" alt="Static Image"></a>
                        </div>
                        </div>
        </div>
</div>