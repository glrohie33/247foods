<meta charset="UTF-8">
<title>@yield('title')</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<meta name="csrf-token" content="{{ csrf_token() }}">

@if((Request::is('product/details/*') || Request::is('product/customize/*')) && !empty($single_product_details['meta_keywords']))
<meta name="keywords" content="{{ $single_product_details['meta_keywords'] }}">

@elseif( Request::is('blog/*') && !empty($blog_details_by_slug['meta_keywords']))
<meta name="keywords" content="{{ $blog_details_by_slug['meta_keywords'] }}">

@elseif((Request::is('store/details/home/*') || Request::is('store/details/products/*') || Request::is('store/details/reviews/*') || Request::is('store/details/cat/products/*')) && !empty($store_seo_meta_keywords))
<meta name="keywords" content="{{ $store_seo_meta_keywords }}">

@elseif(Request::is('/') &&!empty($seo_data) && $seo_data['meta_tag']['meta_keywords'])
<meta name="keywords" content="{{ $seo_data['meta_tag']['meta_keywords']}}">
@endif

@if(Request::is('/') && !empty($seo_data) && $seo_data['meta_tag']['meta_description'])
<meta name="description" content="{{ $seo_data['meta_tag']['meta_description'] }}">
@endif

@if((Request::is('product/details/*') || Request::is('product/customize/*')) && !empty($single_product_details['_product_seo_description']))
<meta name="description" content="{{ $single_product_details['_product_seo_description'] }}">
@endif

@if((Request::is('product/details/*') || Request::is('product/customize/*')) && !empty($single_product_details['post_slug']))
<link rel="canonical" href="{{ route('details-page', $single_product_details['post_slug']) }}">
@endif

@if(Request::is('blog/*') && !empty($blog_details_by_slug['blog_seo_description']))
<meta name="description" content="{{ $blog_details_by_slug['blog_seo_description'] }}">
@endif

@if(Request::is('blog/*') && !empty($blog_details_by_slug['blog_seo_url']))
<link rel="canonical" href="{{ route('blog-single-page', $blog_details_by_slug['blog_seo_url']) }}">
@endif

@if((Request::is('store/details/home/*') || Request::is('store/details/products/*') || Request::is('store/details/reviews/*') || Request::is('store/details/cat/products/*')) && !empty($store_seo_meta_description))
<meta name="description" content="{{ $store_seo_meta_description }}">
@endif


<link rel="stylesheet" href="{{ URL::asset('public/bootstrap/css/bootstrap.min.css') }}" />
<link href="{{ URL::asset('public/frontend/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{URL::asset( 'public/frontend/js/datetimepickerbootstrap-datetimepicker.min.css') }}" rel="stylesheet">
{{-- <link href="{{ URL::asset('public/frontend/js/owl-carousel/owl.carousel.css') }}" rel="stylesheet"> --}}
<link href="{{ URL::asset('public/frontend/css/themecss/lib.css') }}" rel="stylesheet">
{{-- <link href="{{ URL::asset('public/frontend/js/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet"> --}}
<link href="{{URL::asset( 'public/frontend/js/minicolors/miniColors.css') }}" rel="stylesheet">
<link href="{{ URL::asset('public/frontend/js/slick-slider/slick.css') }}" rel="stylesheet">
<link href="{{ URL::asset('public/sweetalert/sweetalert.css') }}" rel="stylesheet">
<!-- Theme CSS
 ============================================ -->
{{-- <link href="{{URL::asset( 'public/frontend/css/themecss/so_searchpro.css') }}" rel="stylesheet"> --}}
<link href="{{URL::asset( 'public/frontend/css/themecss/so_megamenu.css') }}" rel="stylesheet">
<link href="{{URL::asset( 'public/frontend/css/themecss/so-listing-tabs.css') }}" rel="stylesheet">
{{-- <link href="{{URL::asset( 'public/frontend/css/themecss/so-newletter-popup.css' )}}" rel="stylesheet"> --}}

<link href="{{URL::asset( 'public/frontend/css/themecss/so_onepagecheckout.css' )}}" rel="stylesheet">
<link href="{{URL::asset( 'public/templates-assets/footer/topdeals/footer2.css') }}" rel="stylesheet">
<link href="{{ URL::asset('public/templates-assets/header/topdeals/header2.css') }}" rel="stylesheet">
<link href="{{ URL::asset('public/templates-assets/header/topdeals/header.css') }}" rel="stylesheet">

<!-- <link id="color_scheme" href="css/home2.css" rel="stylesheet"> -->
<link id="color_scheme" href="{{URL::asset( 'public/templates-assets/home/topdeals/theme.css') }}" rel="stylesheet">
<link href="{{ URL::asset('public/frontend/css/responsive.css') }}" rel="stylesheet">
<!--<link href="{{ URL::asset('public/frontend/css/quickview/quickview.css') }}" rel="stylesheet">-->
<!-- Google web fonts
 ============================================ -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700' rel='stylesheet' type='text/css'>
<<style>
* {
        font-family: 'Open Sans', sans-serif !important;
    }

.fa{
  font-family:FontAwesome !important;
}
</style>

        <script type='application/ld+json'> 
{
   "@context": "http://tracking.247foods.ng/tracking/click?d=YmQ1hKItaNGYgJjM_Hf4yFRpFhU5jEyIHXWc7otvT6bfxkkNBFsX9eII-epvjxDsZmG0wT10RcsLylQGhM12J2jqYACcGpcjW2Eu5vhWcwd9vMs5BYOkfVExzI_Ru4vffA2",
   "@type": "GroceryStore",
   "name": "247foods",
   "url": "http://tracking.247foods.ng/tracking/click?d=OhTD1Gaf832R2NtjHwHsjd6l4xIYt8F2o4KI-Nny3mxx6kdJsPA75fa1OHIN3AMXIJtmQ9ON6xzlMP_jGrPbFU5tFjXEX0RD0KaR3gJ7Fwwo88yGjb1OPQOTBnJ_q8fHkQ2",
   "logo":
"http://tracking.247foods.ng/tracking/click?d=BZeRiMSsBp17tnEjCD9qSWs0TWmjjBDftfCUH2EuEhm0KUFjEGq_nE_hiAxrdy6CUCjb4F-yULFxCcIVHGh1T9infKTvB6uzGCv-pyE8Eb2dKZmVDn-ou4dWZhxhqRvb-PAkHvBJqOO3OMJ5a13nyhgAtoRbqmQs9hbyVuX5AaLjYcAtUzznkkk0CuK4m9ovIQWLLUiArE1uPe1kZOjRh_fjhScFJ-m_xjdvclJMUrZbfT9jdyfcOEckKJDpze2DtI7b7wFcZcQHRsEHl-vuwWBPX7JHRV-EKCWaDbIS4QC_ybfOW-Pru6McGF7SLYWu5cxjLFeJqrDvF68hSKkYTivMWXALdBRZ3kvWjPUs0nX65_g98ZMndRf23msGoL_Qc6ZeWZhIa5Sdnz3SkG-pY8A1",
   "image":
"http://tracking.247foods.ng/tracking/click?d=8PFupnJaiqjCY5JtuHmFbKoNDKyI9niHJHneB0GLvpcmkTWlVSdWJZA0uMuXMGIhhJqqEOQwYCW5FTYc_lUJFpM5BYPaG1_ff6gg_iHU-xMTx7SAZSkNHCCEkNzc5cHbwWD69_eHIDTp9JJrVZFOQyPlqi7-3Ordf2M8YzQjST8AU7W_AehkeMPqqrnWACuuBHFv2TO8Ow9HzwqKT5vcUM9JvIuIvw2333iVNDhrjFeF4Tv7YgjbUEDvaeruIE-qF63JNE7i3jbsSpMbTh1HigTAbm36AAcmjPTSQxmbVUI1tpm_LYDWfyVmAwXGesdJbZUzUXxuKqgzNmlZyCdxA0M0uQJvNqlGu52qnIqapUtGrmRjBrhq6dhQbz-5WZpkz95qJ-h5EWWutznx20ZxAW_RwG10E0O8w4yEH2HFot46XjGx4YBHkotHzeRFrPMFN62gP8dtMytMpUghJuQ3uxyzKmWye4haxUSnjPVwClJc52vffIOUAsc3yuTVWBS8q82V49bmV-A0vI-nqirgN3j343Dg_zAoC1LZTVpu3JQd0",
   "description": "247foods.ng the #1 online food and grocery store in Nigeria - Shop online for all kinds of grocery products, local foods and enjoy great prices and offers",
   "address": {
     "@type": "PostalAddress",
     "streetAddress": "2 Molara Anibaba Close",
     "addressLocality": "Ajao Estate",
     "addressRegion": "Lagos",
     "postalCode": "100263",
     "addressCountry": "Nigeria"
   },
   "geo": {
     "@type": "GeoCoordinates",
     "latitude": "6.453056",
     "longitude": "3.395833"
   },
   "openingHours": "Mo, Tu, We, Th, Fr, Sa, Su 23:30-23:30",
   "contactPoint": {
     "@type": "ContactPoint",
     "telephone": "+23409094333555",
     "contactType": "General"
   }
}
  </script>
<!--<script type="text/javascript" src="{{ URL::asset('public/frontend/js/common.js') }}"></script> -->
<!--<script type="text/javascript" src="{{ URL::asset('public/common/base64.js') }}"></script>-->
<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->