/* 
* @Author: J.Y Han
* @Date:   2013-11-02 12:46:44
* @Email:  jiyun@han.im
* @Last modified by:   hanjiyun
* @Last Modified time: 2013-11-16 19:08:25
*/



// presentation.js

(function() {

  function headerNav() {

    // Setup some variables for the function
    var 
      header              = $('.header-navigation'),
      dynamicHeightHeader = $('.navbar-dynamic'),
      transparent         = false,
      homepageHeader      = false,

      scrollPosition      = $(document).scrollTop(),
      headerHeight        = header.height();


    // Change transparent header flag based on DOM
    if ( header.hasClass("navbar-transparent") ) {
        transparent = true;
    }

    // Set homepage header flag
    if ( header.hasClass('navbar-homepage') ) {
      homepageHeader = true;
    }

    function refreshNav() {
      var 
        scrollPosition    = $(document).scrollTop(),
        headerHeight      = dynamicHeightHeader.height();
      
      // Once the user has started scrolling, show the short header
      if ( scrollPosition > 5 ) {
        dynamicHeightHeader.addClass('short');
         headerHeight = dynamicHeightHeader.height(); // Updates header height after '.short' is applied
        if ( transparent ) {
            dynamicHeightHeader.removeClass('navbar-transparent');
        }

      // If the user returns to the top of the page, bring back the initial header
      } else {
        dynamicHeightHeader.removeClass('short');
        if ( transparent ) {
            dynamicHeightHeader.addClass('navbar-transparent');
        }
        if ( $('.sub-nav li').hasClass('active') ) {
          $('.sub-nav li').removeClass('active');
        }
      }
    }

    $(window).scroll(refreshNav);
    refreshNav()


    // Wait a moment for positions and sizes to be calculated before allowing 'emm to be 
    // animated. This reduces the initial flash of unstyled stuff when the page is 
    // loaded somewhere other than at the top.
    setTimeout(function() {
      $('.header-navigation .nav li a, .navbar-brand, .navbar-brand span').addClass('animated');
    }, 1000);
    header.addClass('loaded');

  }

  // Scales hero to maintain specified ratio, regardless of page width
  function heroProportions() {
    function setHeroHeight() {
      var 
        hero                    = $('.dynamic-height'),
        viewportWidth           = $(window).width(),
        viewportHeight          = $(window).height(),
        aspectRatio             = 16 / 9,
        minHeight               = 300,
        maxHeight               = 800,
        heroHeight              = Math.round(viewportWidth / aspectRatio) - 300;

      // if ( heroHeight <= maxHeight ) {
      //   if ( heroHeight >= minHeight ) {
      //     hero.height(heroHeight);
      //   } else {
      //     hero.height(minHeight);
      //   }

      // } else {
      //   hero.height(maxHeight);
      // }
    }

    setHeroHeight();
  }

  $(document).ready(function() {
    headerNav();
    // heroProportions();
    $('body').addClass('loaded');
  })

  var viewportWidth           = $(window).width();

  $(window).resize(function(){
    viewportWidth           = $(window).width();
    // viewportHeight          = $('#postshow .tabbody').height();
    
    $('#postshow .tabbody, #postshow .tabbody .tabcont').width(viewportWidth)
    // $('#postshow .tabbody, #postshow .tabbody .tabcont').height(viewportHeight)
  })

})();

