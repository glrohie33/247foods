<!doctype html>
<html>
<head>
    @include('includes.frontend.head')
    
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K6SWF2M');</script>
<!-- End Google Tag Manager -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172723904-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-172723904-1');
</script>


</head>
<body class="common-home ltr layout-2">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K6SWF2M"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
  <div  id="wrapper" class="wrapper-fluid banners-effect-11">
    @if(get_appearance_settings()['general']['custom_css'] == true)
    @include('includes.frontend.content-custom-css')
    @endif
    
    @include('includes.frontend.header')
    
    <section class="content">
        @yield('content')
    </section>
    
    @include('includes.frontend.footer')
    <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
</body>
</html>
<?php die()?>