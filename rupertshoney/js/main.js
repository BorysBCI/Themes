jQuery(document).ready(function() {
  jQuery.fn.exists = function(){return this.length>0;};
  var container = jQuery('.container').width();



  if (jQuery('.nav').exists()){
    visorMovement(container);
  }



  /*if ($('.success_project').exists()) {
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
  };*/


});


// header nav

jQuery(document).on('click', '.nav__list>li>a', function (e){
        var $parent = jQuery(this).parent();
        if($parent.children('ul').length> 0){

            if(container> 1200){
                container = jQuery('.container').width();
                var windowHeight = jQuery(window).height();
                //$parent.children('.nav__drop').css({'max-height': windowHeight - 90 + 'px'});
                //console.log(windowHeight);
            }


            if($parent.hasClass('showDrop')){
                $parent.removeClass('showDrop');
                $parent.children('.nav__drop').slideUp(300);
            } else{
                jQuery('.nav__list>li').removeClass('showDrop');
                jQuery('.nav__drop').slideUp(300);
                $parent.addClass('showDrop');
                $parent.children('.nav__drop').slideDown(300);
            }
        }

    }
);

jQuery(document).on('click', '.nav__open', function (e){
    var nav = jQuery(this).parent();

    nav.toggleClass('open');
    if(nav.hasClass('open')){
        nav.find('.nav__list').slideDown(300);
    } else{
        nav.find('.nav__list').slideUp(300);
    }
});

jQuery(document).bind("click touchend", function (e) {
    var cont = jQuery('.nav'),
        $parent = cont.parent();
    if ( (!cont.is(e.target)) && (cont.has(e.target).length === 0) ){
        cont.find('li').removeClass('showDrop');
        cont.find('.nav__drop').slideUp(300);
    }
});

function visorMovement (){
    jQuery('.nav__list').append('<li class="moving"></li>');
    updateMoving();



    jQuery('.nav__list>li>a').hover(
        function (){
            var childSpan = jQuery(this);
            itemCounting(childSpan);
        }
    );
    jQuery('.nav__list').hover(function (){

    }, function(){
        if( (jQuery('.nav__list>li').hasClass('active')) ){
            var childSpan = jQuery('.nav__list .active>a');
        }
        itemCounting(childSpan);
    });
};

function itemCounting (e){
    container = jQuery('.container').width();
    if ( (container>1200) ){
        var spanWidth,
            spanLeft;

        if (e === undefined ){
            spanWidth = 0;
            spanLeft = 0;
        } else {
            spanWidth = e.outerWidth();
            var spanPadding = parseInt(e.css('padding-left')),
                linkLeft = e.offset().left,
                navLeft = jQuery('.nav').offset().left;

            spanLeft = linkLeft - navLeft + spanPadding;
            spanWidth = spanWidth - (spanPadding*2);
        }
        jQuery('.moving').css({'left': spanLeft, 'width': spanWidth});
    }

};

function updateMoving(){
    var timeNav = setTimeout(function (){
        if( jQuery('.nav__list>li').hasClass('active') ){
            var childSpan = jQuery('.nav__list .active>a');
            itemCounting(childSpan);
        }
    }, 300);
};

var markerNav = 0,
    markerMove,
    container;
jQuery(window).resize(function(){
    container = jQuery('.container').width();

    if ( (container>1200) && (markerNav !=1) ) {
        // nav
        jQuery('.nav .nav__list').show(0);
        jQuery('.nav').removeClass('open');
        jQuery('.nav__drop').hide(0);
        markerNav = 1;
    } else if ( (container<1200) && (markerNav !=2) ){
        // nav
        jQuery('.nav .nav__list').hide(0);
        jQuery('.nav__drop').hide(0);
        markerNav = 2;
    }


    if ( (container>1200) && (markerMove !=1) ) {
        updateMoving();

        markerMove = 1;
    } else if ( (container<1200) && (markerMove !=2) ){
        jQuery('.moving').css({'left': 0, 'width': 0});

        markerMove = 2;
    }
});
jQuery(window).scroll(function(){
    var scrollPos = jQuery(this).scrollTop(),
        $body = jQuery('body'),
        className = 'fixed';

    if (!($body.hasClass(className)) && scrollPos > 50){
        $body.addClass(className);
    }
    else if (($body.hasClass(className)) && scrollPos < 50){
        $body.removeClass(className);
    }
});
