jQuery.fn.accordionJs = function(el){
	this.each(function(){
				
		var $this = jQuery(this);
		
		var $content = $this.find('.accordion__block'),
		$buttons = $this.find('.accordion__button');
			
		var lastActive =  0;
		
		function setAccordionActive(current){

			$content.not(current).removeClass('open');
			current.toggleClass('open');
			$content.not(current).children('div').slideUp(400);
			current.children('div').slideToggle(400);
		}
					
		$buttons.click(function(){
			var current = jQuery(this).parent($content);
			setAccordionActive(current);
		});
		
	})
};

jQuery(document).ready(function(){
	jQuery('.accordion').accordionJs();
});

function jsSelect() {
    jQuery('.jsSelect').each(function(){
        var $this = jQuery(this),
            value_sel = $this.find('.jsSelect__value'),
            val = value_sel.val(),
            dataVal = value_sel.attr('data-value');
        if( (val == '')  ){
            val = $this.find('li:first a').html();
            dataVal = $this.find('li:first a').attr('data-value');
            value_sel.html(val).attr('data-value', dataVal);
        }
    });

    jQuery(document).on('click', '.jsSelect__open', function (e){
        var parent = jQuery(this).parent();
        if( parent.hasClass('open')){
            parent.removeClass('open');
        } else {
            jQuery('.jsSelect').removeClass('open');
            parent.addClass('open');
        }
    });

    jQuery(document).on('click', '.jsSelect li a', function (e){
        var $this = jQuery(this),
            parent = $this.parents('.jsSelect'),
            val = $this.html(),
            dataVal = $this.attr('data-value');

        parent.find('.jsSelect__value').html(val).attr('data-value', dataVal);
        parent.removeClass('open');
    });


    jQuery(document).bind("click touchend", function (e) {
        var cont = jQuery('.jsSelect');
        if ( (!cont.is(e.target)) && (cont.has(e.target).length === 0) ){
            jQuery('.jsSelect').removeClass('open');
        }
    });
}
jQuery(document).ready(function() {
    jsSelect();
});
jQuery(document).ready(function() {
  jQuery.fn.exists = function(){return this.length>0;};
  var container = jQuery('.container').width();






  if (jQuery('.success_project').exists()) {
    jQuery('.success_project li a').bind("click", function (e) {
      e.preventDefault();
      var anchor = jQuery(this),
        name = anchor.attr('href').replace(new RegExp("#", 'gi'), ''),
          theOffset = jQuery('div[name=' + name + ']').offset();
      jQuery('html, body').stop().animate({
        scrollTop: theOffset.top
      }, 1000);
      return false;
    });
  };


  var policiesSlider = jQuery('.policies__slider ul'),
      slider = [];
  if (policiesSlider.exists()) {
    if(container >1100){
      policiesSlider.each(function(i){
        slider[i] = jQuery(this).bxSlider({
          pager: false,
          nextText: '<i class="fa fa-angle-down"></i>',
          prevText: '<i class="fa fa-angle-up"></i>',
          mode: 'vertical',
          slideWidth: 485
        });
      });
    } else if(container < 1100){
      policiesSlider.each(function(i){
        slider[i] = jQuery(this).bxSlider({
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

  jQuery('.tehnology_slider ul').bxSlider({
    controls: false,
    mode: 'vertical'
  });



  var time = setTimeout(function(){
    showImg();
  }, 1000);

});
function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}

function showImg(){
  var curent = getRandomInt(1, 7);
  jQuery('.homeTop__img').eq(curent - 1).addClass('hover');

  var time1 = setTimeout(function(){
    jQuery('.homeTop__img').removeClass('hover');
  }, 3000);
  var time2 = setTimeout(function(){
    showImg();
  }, 4000);
}


// header nav
jQuery(document).on('click', '.nav__open', function (e){
    var nav = jQuery(this).parent();

    nav.toggleClass('open');
    if(nav.hasClass('open')){
        nav.find('.nav__list').slideDown(300);
    } else{
        nav.find('.nav__list').slideUp(300);
    }
});

var markerNav = 0,
    container;
jQuery(window).resize(function(){
    container = jQuery('.container').width();

    if ( (container>900) && (markerNav !=1) ) {
        // nav
        jQuery('.nav__list').css({'display': 'table'});
        jQuery('.nav').removeClass('open');

        markerNav = 1;
    } else if ( (container<900) && (markerNav !=2) ){
        // nav
        jQuery('.nav__list').css({'display': 'none'});

        markerNav = 2;
    }
});


var scrollPosition = 0,
    oldScrollPosition = 0,
    header = jQuery('.header'),
    headerHeight = header.outerHeight(),
    className = 'scroll';
jQuery(window).scroll(function(e){
    scrollPosition =$(this).scrollTop();


    if (scrollPosition>headerHeight){
        if(scrollPosition>oldScrollPosition){
            header.addClass(className);
        } else{
            header.removeClass(className);
        }
    } else {
        header.removeClass(className);
    }
});

jQuery(document).on('click', '.openPopup', function (e){
    e.preventDefault();

    if ( jQuery(e.target).attr('data-popup') ){
        succesForm(e);
    } else {
        openPopup(e);
    }

});

jQuery(document).on('click', '.popup__close, .closePopup, .closeFonPopup', function (e){
    jQuery(this).parents('.popup').fadeOut(300);
    jQuery('html').removeClass('blur');
});


function succesForm (e){
    var name = jQuery(e.target).attr('data-popup');// for button type submit

    jQuery('html').addClass('blur');
    jQuery('#' + name).fadeIn(300);
    var timer = setTimeout(function(){
        jQuery('#' + name).fadeOut(300);
        jQuery('html').removeClass('blur');
    },3000)
}



function openPopup (e){
    var name = jQuery(e.target).attr('href');

    jQuery('html').addClass('blur');
    jQuery(name).fadeIn(300);
}
jQuery.fn.tabs = function(el){
	this.each(function(){
				
		var $this = jQuery(this);
		
		var $content = $this.find('ul.tabs__content>li'),
		$buttons = $this.find('ul.tabs__link>li');
			
		var lastActive =  0;
				
		setTabActive(lastActive);
		
		function setTabActive(index){
			//arguments.length
								
			if (typeof +index != 'number') {
				return false;
			}
			
			$buttons.removeClass('active');
			$buttons.eq(index).addClass('active');
			
			$content.removeClass('visible');
			$content.eq(index).addClass('visible');
		}
					
		$buttons.children('a').click(function(){
			var current = jQuery(this).parent().index();
			setTabActive(current);
							
		});	
		
	})
};

jQuery(document).ready(function(){
	jQuery('.tabs').tabs();
});



/* задержка для правильного отображения
 $buttons.click(function(){
		var current = $(this).index();
		setTabActive(current);
		setTimeout(function(){
			$('.scroll-block').jScrollPane();
			if ($('#map').exists()) {mapload()};
		},300);
	});
 */