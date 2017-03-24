$(document).ready(function() {
  $.fn.exists = function(){return this.length>0;};
  var container = $('.container').width();

  if ( ($('body').hasClass('homePage')) ){
    var windowWidth = $(window).width(),
        windowHeight = $(window).height(),
        minHeight = Math.min(windowWidth, windowHeight);
    $('.landscape .top_home').css({'height': windowHeight});

  }

  // header nav
  $(document).on('click', '.open_nav', function (e){
    var nav = $(this).parent();

    nav.toggleClass('open');
    if(nav.hasClass('open')){
      nav.children('ul').slideDown(300);
    } else{
      nav.children('ul').slideUp(300);
    }
  });




  if ($('.success_project').exists()) {
    $('.success_project li a').bind("click", function (e) {
      e.preventDefault();
      var anchor = $(this),
        name = anchor.attr('href').replace(new RegExp("#", 'gi'), ''),
          theOffset = $('div[name=' + name + ']').offset();
      $('html, body').stop().animate({
        scrollTop: theOffset.top
      }, 1000);
      return false;
    });
  };


  var policiesSlider = $('.policies__slider ul'),
      slider = [],
      policiesOption = {
        pager: false,
        nextText: '<i class="fa fa-angle-down"></i>',
        prevText: '<i class="fa fa-angle-up"></i>',
        mode: 'vertical',
        slideWidth: 485
      };
  if (policiesSlider.exists()) {
    if(container >1100){
      policiesSlider.each(function(i){
        slider[i] = $(this).bxSlider({
          pager: false,
          nextText: '<i class="fa fa-angle-down"></i>',
          prevText: '<i class="fa fa-angle-up"></i>',
          mode: 'vertical',
          slideWidth: 485
        });
      });
    } else if(container < 1100){
      policiesSlider.each(function(i){
        slider[i] = $(this).bxSlider({
          pager: false,
          nextText: '<i class="fa fa-angle-right"></i>',
          prevText: '<i class="fa fa-angle-left"></i>',
          mode: 'horizontal',
          slideWidth: 260,
          maxSlides: 5
        });
      });
    }
  };

  $('.tehnology_slider ul').bxSlider({
    controls: false,
    mode: 'vertical',
    auto: true,
    adaptiveHeight: false
  });


  $('.safetyLogo ul').bxSlider({
    slideWidth: 200,
    maxSlides: 6,
    pager: false,
    nextText: '<i class="fa fa-angle-right"></i>',
    prevText: '<i class="fa fa-angle-left"></i>'
  });








  var markerNav = 0,
      markerSlider = 0;
  $(window).resize(function(){
    container = $('.container').width();

    if ( (container>900) && (markerNav !=1) ) {
      // nav
      $('.nav ul').show(0);
      $('.nav').removeClass('open');

      markerNav = 1;
    } else if ( (container<900) && (markerNav !=2) ){
      // nav
      $('.nav ul').hide(0);

      markerNav = 2;
    }



    if ( (container >1099) && (markerSlider !=1) ){

      $(slider).each(function(i){
        this.reloadSlider({
          pager: false,
          nextText: '<i class="fa fa-angle-down"></i>',
          prevText: '<i class="fa fa-angle-up"></i>',
          mode: 'vertical',
          slideWidth: 485
        });
      });

      markerSlider = 1;
    } else if( (container < 1100) && (markerSlider !=2) ){

      $(slider).each(function(i){
        this.reloadSlider({
          pager: false,
          nextText: '<i class="fa fa-angle-right"></i>',
          prevText: '<i class="fa fa-angle-left"></i>',
          mode: 'horizontal',
          slideWidth: 260,
          maxSlides: 5
        });
      });

      markerSlider = 2;
    }
  });
});
// map (page: home and contact)
function initMap() {

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: mapSettings.zoom,
    scrollwheel: false,
    scaleControl: false,
    draggable: false,
    center: mapSettings.centerCoord
  });

  var marker = new google.maps.Marker({
    position:mapSettings.marker.coord,
    map: map,
    title: mapSettings.marker.title,
    icon: mapSettings.marker.icon
  });
}




