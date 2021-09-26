<header id="header" class=" typeheader-2">
    
    <!--Start of Tawk.to Script-->
<!--End of Tawk.to Script-->
<style>
#searchResult,#mobileSearchResult{
    position: absolute;
    width: 100%;
    left: 0px;
    top: 100%;
    background: #fff;
    display:none;
    max-height:500px;
    overflow: auto;
}

#searchResult li a,#mobileSearchResult li a{
    padding: 5px 10px;
    display: block;
    text-transform:capitalize;
}
</style>
           
        <div class="header-bonus hidden-compact">
            <div class="module no-margin">
                <div class="socustom_html">
                    <div class="top-info" style="display: block;" style="background:#B81D22;">
                        <marquee behavior="scroll" direction="left" scrollamount="3" >Stay at home let us worry about your food and groceries! &nbsp;&nbsp;&nbsp;&nbsp; 
                        Call us, to place order - 09094333555 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Send us a message on Whatsapp - 08120000303</marquee>
                    </div>
                </div>
            </div>
        </div>   
        <!-- Header center -->
        <div class="header-center header" >
            <div class="container">
                <div class="row">
                    <!-- LOGO -->
                    
                    <div class="navbar-logo col-lg-2 col-md-2 col-sm-2 col-xs-5">
                        @if(get_site_logo_image())
                            <a href="{{ URL::to("/") }} "><img src="{{ get_site_logo_image() }}" title="{{ trans('frontend.your_store_label') }}" alt="{{ trans('frontend.your_store_label') }}"></a>
                        @endif
                    </div>
                    <div class="header-button col-lg-1 col-md-1 col-sm-2 col-xs-2">
                                        <a href="{{ URL::to("/") }}" class="float-left">
                                                <svg viewbox="0 0 30 30" class="md">
                                                    <use xlink:href="{{ asset("image/icon/homepage.svg#Capa_1") }}">
                                                    </use>
                                                </svg>
                                                    <h2 class="title hidden-md hidden-sm">Home</h2>
                                        </a>
                                </div>

                    <div class="header-center-right col-lg-6 col-md-5 col-sm-5 col-xs-6  hidden-xs">
                        <!-- BOX CONTENT MENU -->
                        <div class="header_search">

                            <div id="sosearchpro" class="sosearchpro-wrapper so-search ">

                                <form method="GET" action="{{ route('shop-page') }}">
                                    <div id="search0" class="search input-group form-group" style="position:relative;">

                                        <input class="autosearch-input form-control" type="text" value=""
                                            size="50" autocomplete="off" placeholder="Search" name="srch_term" id="srch_term" onkeyup="search
                                            (this.value)" onblur="hideSearch()">
                                        <span class="input-group-btn">
                                            <button type="submit" class="button-search btn btn-default btn-lg"
                                                ><i class="fa fa-search"></i><span
                                                    class="hidden">Search</span></button>
                                        </span>
                                        <ul id="searchResult">
                                            <li><a href="">search search</a></li>
                                            <li><a href="">search search</a></li>
                                            <li><a href="">search search</a></li>
                                            <li><a href="">search search</a></li>
                                        </ul>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="header-cart-phone col-lg-3 col-md-4 col-sm-3 col-xs-5">
                        <div id="cart" class="header-button">
                            <a data-loading-text="Loading... " class="btn-group top_cart float-left dropdown-toggle"
                                data-toggle="dropdown">
                                    <svg viewbox="0 0 30 30" class="md">
                                        <use xlink:href="{{ asset("image/icon/phone.svg#Capa_1") }}">
                                        </use>
                                    </svg>
                                        <h2 class="title-cart2 hidden-md hidden-sm title">phone order</h2>
                                    
                            </a>
                            <ul class="dropdown-menu pull-right shoppingcart-box">
                                <li><a href="tel:09094333555">Call 09094333555</a></li>
                                <li><a>to place your order</a></li>
                            </ul>
                        </div>
                        <div class="header-button float-left">
                                <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle float-left"
                                    data-toggle="dropdown">
                                        <svg viewbox="0 0 30 30" class="md">
                                            <use xlink:href="{{ asset("image/icon/user.svg#Capa_1") }}">

                                            </use>
                                        </svg>
                                        <h2 class="title-cart2 hidden-md hidden-sm title">Login</h2>
                                </a>

                                <ul class="dropdown-menu pull-right shoppingcart-box">
                                    @if (Session::has('shopist_frontend_user_id'))
                                    <li><a href="{{ route('user-account-page') }}">{!! trans('frontend.user_account_label') !!}</a></li>
                                    @else
                                    <li><a href="{{ route('user-login-page') }}">{!! trans('frontend.frontend_user_login') !!}</a></li>
                                    @endif

                                    @if (Session::has('shopist_admin_user_id') && !empty(get_current_vendor_user_info()['user_role_slug']) && get_current_vendor_user_info()['user_role_slug'] == 'vendor')
                                    <li><a target="_blank" href="{{ route('admin.dashboard') }}">Sell at 247foods</a></li>
                                    @else
                                    <li><a target="_blank" href="{{ route('admin.login') }}">Sell at 247foods</a></li>
                                    @endif
                                    <li><a href="{{ route('vendor-registration-page') }}">{!! trans('frontend.vendor_registration') !!}</a></li>
                                </ul>
                            </div>
                        <div class="bt-head header-cart">
                            <div id="cart" class="btn-shopping-cart">
                                <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle"
                                    data-toggle="dropdown">
                                    <div class="shopcart">
                                        <svg viewbox="0 0 30 30">
                                            <use xlink:href="{{ asset("image/icon/cart.svg#Capa_1") }}">

                                            </use>
                                        </svg>
                                        <div class="cart-info">
                                            <h2 class="title-cart2 hidden-md hidden-sm">Cart</h2>
                                            
                                            <span class="total-shopping-cart cart-total-full">
                                                <span class="items_cart">0 </span>
            
                                            </span>
                                        </div>
                                    </div>
                                </a>

                                <ul class="dropdown-menu pull-right menu-cart shoppingcart-box">
                                    <li>
                                        <p class="text-center empty">Your shopping cart is empty!</p>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Header center -->
        <!-- Header bottom-->
        <script>
                if(window.innerWidth < 1200){
                    document.write(`<div class="header-bottom hidden-compact">
                    <div class="container">
                        <div class="header-bottom-inner">
                            <div class="row">
                                <div class="header-bottom-left menu-vertical col-md-3 col-sm-5 col-xs-3">
                                    <div class="navbar-header">
                                        <button type="button" id="show-verticalmenu"
                                            data-toggle="collapse" class="navbar-toggle">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="header-bottom-right col-md-9 col-sm-7 col-xs-9">
                                        <div class="header_search  hidden-lg hidden-md hidden-sm" >
        
                                                <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                    
                                                    <form method="GET" action="{{ route('shop-page') }}">
                                            <div id="search0" class="search input-group form-group" style="position:relative;">
        
                                                <input class="autosearch-input form-control" type="text" value=""
                                                    size="50" autocomplete="off" placeholder="Search" name="srch_term" id="srch_term" onkeyup="search(this.value,true)">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="button-search btn btn-default btn-lg"
                                                        ><i class="fa fa-search"></i><span
                                                            class="hidden">Search</span></button>
                                                </span>
                                                <ul id="mobileSearchResult">
                                                </ul>
                                            </div>
        
                                        </form>
                                                </div>
                    
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`);
                }
                </script>
        <!-- Facebook Pixel Code -->

    </header>
    
    <script defer>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1170954816610599');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1170954816610599&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
    
     <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K6SWF2M"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
       
    <input hidden class="" id="hf_base_url" value="{{ URL::to("/") }}" >
    <script>
   
    </script>
    