<footer id="footer" class="footer-wrapper">
    <script type="text/javascript" defer>
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/5f057090760b2b560e6ff328/default';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();
      </script>
  @include( 'frontend-templates.footer.topdeals.topdeals' )
  <script type="text/javascript" src="{{ URL::asset('public/frontend/js/jquery-2.2.4.min.js') }}"></script>
  <script>
      var frontendLocalizationString = "";
        if ($('#hf_base_url').length > 0 )
      {
        $.getJSON($('#hf_base_url').val() + '/resources/lang/en' + '/frontend_js.json', function (data)
        {
         frontendLocalizationString = data;
        });
      }
      </script> 
      
        <script type="text/javascript" src="{{ URL::asset('public/bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/frontend/js/owl-carousel/owl.carousel.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/frontend/js/themejs/custom_so_megamenu.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/frontend/js/themejs/addtocart.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/frontend/js/slick-slider/slick.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/frontend/js/themejs/libs.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/frontend/js/jquery-ui/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/frontend/js/modernizr/modernizr-2.6.2.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/frontend/js/minicolors/jquery.miniColors.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/frontend/js/jquery.nav.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/frontend/js/quickview/jquery.magnific-popup.min.js') }}"></script>
        <!-- Theme files
       ============================================ -->
        <script type="text/javascript" src="{{ URL::asset('public/frontend/js/themejs/application.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/sweetalert/sweetalert.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/frontend/js/themejs/homepage.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/frontend/js/themejs/custom_h2.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/frontend/js/themejs/custom_h1.js') }}"></script>
  <script>
      // Catch errors since some browsers throw when using the new `type` option.
// https://bugs.webkit.org/show_bug.cgi?id=209216
        try {
          // Create the performance observer.
          const po = new PerformanceObserver((list) => {
            for (const entry of list.getEntries()) {
              // Logs all server timing data for this response
              console.log('Server Timing', entry.serverTiming);
            }
          });
          // Start listening for `navigation` entries to be dispatched.
          po.observe({type: 'navigation', buffered: true});
        } catch (e) {
          // Do nothing if the browser doesn't support this API.
        }
  </script>
  <script>

  var verticalMenu = <?=json_encode($vertical_menu)?>;

  function setChild(children){
    var childrenHtml = "";
    children.forEach(itm=>{
      childrenHtml+=`<li>
                        <a href="/product/categories/${itm.slug}" class="main-menu">${itm.name}</a>
                      </li>`;
    });
    return childrenHtml;
  }

  function setMenu(){
    var menuhtml ="";
                    verticalMenu.forEach(itm => {
                      menuhtml+= `<li class="item-vertical css-menu with-sub-menu hover">
                        <p class="close-menu"></p>
                        <a class="clearfix" href="/products/categories/${itm.slug}">
                            <span>
                                <strong>${itm.name}</strong>
                            </span>
                        </a>
                        <div class="sub-menu" style="width: 250px;">
                            <div class="col-sm-12 hover-menu">
                                <div class="menu">
                                    <ul>
                                        ${setChild(itm.children)}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>`;
                    });
      return menuhtml;
  }

  function search(value,mobile=false){
            if(mobile){
                var search = $("#mobileSearchResult");
            }else{
                var search = $("#searchResult");
            }
           
           search.html("");
            $.ajax({
				url: $('#hf_base_url').val() + '/ajax/search_products?search='+value,
				type: 'GET',
				cache: false,
				dataType: 'json',
				success: function (data)
				{
                    var base_url = "<?=route('shop-page')?>";
                    var results = "";
                    if(data.success){
                        data.data.forEach(d=>{
                            results += `<li><a href="${base_url}?srch_term=${d.title}">${d.title}</a></li>`
                        })
                    }
                    search.html(results);
				},
				error: function () { }
              });
            search.show();
        }

        $("body").on('click',function(){
            $("#searchResult").hide();
            $("#mobileSearchResult").hide();
        });

      var menu = `<ul class="megamenu" data-transition="slide" data-animationtime="300">
                    ${setMenu()}
                </ul>`;

      var nav = $(".slider").append(`<div class="prev nav" ><i class="fa fa-chevron-left" onclick="changeSlider('prev')"></i></div> <div class="next nav"><i class="fa fa-chevron-right" onclick="changeSlider('next')"></i></div>`);

      var sliders = document.querySelectorAll('.home-slider .item');
      var totalSlider = sliders.length;
      var currentSlider = 0;
      var slideInterval ="";

      function changeSlider(value){
        var value;
        if(!!slideInterval){
          clearInterval(slideInterval);
        }
        if(value == 'next'){
          value = ((currentSlider+1) >= totalSlider)?0:currentSlider+1;
        }else if(value == 'prev'){
          value = value = ((currentSlider-1) < 0)?totalSlider - 1:currentSlider-1;
        }
        currentSlider = value;
        setSlider();
        setSliderInterval();
      }

      function setSlider(){
        if(sliders.length > 0){
          sliders.forEach(slider=>{
          slider.classList.remove('active');
        });
        sliders[currentSlider].classList.add('active');
        }
        
      }

      function setSliderInterval(){
        slideInterval = setInterval(function(){
          changeSlider('next');
        },4000);
      }
      setSlider();
      setSliderInterval();

      function loadImage(ele){
        var windowScroll = window.pageYOffset;
        var windowHeight = window.innerHeight;
        var elePos = ele.getBoundingClientRect().top;
        if( elePos > 0 && elePos < windowHeight){
          if(!!ele.getAttribute('data-src')){
            ele.src = ele.getAttribute("data-src");
          }
        }

      }


      function loadImages(){
      var elements = document.querySelectorAll(".lazy-load-image");
        elements.forEach(ele=>{
          loadImage(ele);
        });
      }

      loadImages();
      window.onscroll = ()=>{
        loadImages();
      }
  </script>
</footer>