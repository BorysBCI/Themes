jQuery(function(){

    var modal_window_singin = jQuery('.modal_window_singin'),
        modal_window_register = jQuery('.modal_window_register'),
        // modal_window_maps = jQuery('.modal_window_maps'),
        modal_window_wrapper = jQuery('.modal_window_wrapper');

    //open modal window sing in
    jQuery('.mapcompany_btn_access, .mapcompany_btn_access2, .mapcompany_empty_block_login').click(function(){
        modal_window_singin.css('display','block');
        modal_window_wrapper.css('display','block');
        localStorage.setItem("modal_log", "visible");
    });
    //register modal window
    jQuery('.modal_window_singin_inside_btn_register').click(function(){
        modal_window_singin.css('display','none');
        //modal_window_register.css('display','block');
        //modal_window_wrapper.css('display','block');
        localStorage.setItem("modal_reg", "visible");
    });
	
	
	//recover
	/* jQuery('.modal_window_singin_inside_btn_recover').click(function(){
        modal_window_singin.css('display','none');
		modal_window_register.css('display','none');
        modal_window_recovery.css('display','block');
        modal_window_wrapper.css('display','block');
        localStorage.setItem("modal_reg", "visible");
    }); */
	
/* $(document).ready(function(){ */
    /* jQuery("#submit").submit(function(){
        alert("Thank you for registering");
		jQuery(this).hide();
		modal_window_register.hide();
		modal_window_wrapper.hide();
    }); */
/* }); */
	 
	 
	
    // open modal window map
    // jQuery('.mapcompany_search_btn_map').click(function(){
    //     modal_window_maps.css('visibility','visible');
    //     modal_window_wrapper.css('display','block');
    // });

    //close modal window
    jQuery('.modal_window_wrapper').click(function(){
        jQuery(this).css('display','none');
        modal_window_singin.css('display','none');
        modal_window_register.css('display','none');
		modal_window_register.hide();
		modal_window_wrapper.hide();
        //modal_window_recovery.css('display','none');
        // modal_window_maps.css('visibility','hidden');
        localStorage.removeItem("modal_reg");
        localStorage.removeItem("modal_log");
    });
});


/* 
jQuery('.mapcompany_registration' ).on( '#submit', function( event ) {
	var $form = $( this );
      
  event.preventDefault();
  jQuery('.js-alert').addClass('hidden');
  jQuery('.js-btn').button('loading');
  
  jQuery.ajax({
    url: '/echo/json/',
    type: 'POST',
    data: {
    	json: $form.serialize(),
			delay: 2
    },
    success: function(response){
      jQuery('.js-alert').removeClass('hidden');
  		jQuery('.js-btn').button('reset');
    }
  });
 }); */










//Show all table row
jQuery(function(){
    jQuery('.show_all_row').click(function(){
        jQuery('.mapcompany_search_quantity').val('').change();
        jQuery(this).hide();
    });
});

// Google API
var map;
var map_block;

jQuery(function(){
    map_block = jQuery('#modal_window_maps_inside');
});

function initMap() {
    map_block = map_block && map_block.length ? map_block : jQuery('#modal_window_maps_inside');

    if (map_block && map_block.length)
    {
        map = new google.maps.Map(map_block[0], {
            center: {lat: 38.3111896, lng: -79.5477892},
            zoom: 7
        });
    }
    else
    {
        setTimeout(function(){
            initMap();
        }, 200);
    }
}

//Working with Files
var start_download = null;
jQuery(function(){
    /* if (jQuery('#form_download_file input[type=file]').val().length == 'undefined') {
        $("#download_file_btn").prop("disabled", true).addClass('download_file_btn_disable');
    } */
    /* else */ /* { */
        $("#download_file_btn").prop("disabled", false).removeClass('download_file_btn_disable');
    /* } */

    var filesExt = ['xls', 'xlsx'];
    jQuery('#form_download_file input[type=file]').change(function () {

        if (jQuery('#form_download_file input[type=file]').val().length < 1) {
            $("#download_file_btn").prop("disabled", true).addClass('download_file_btn_disable');
        }
        else {
            $("#download_file_btn").prop("disabled", false).removeClass('download_file_btn_disable');
        }

        var parts = jQuery(this).val().split('.');

        if (filesExt.join().search(parts[parts.length - 1]) != -1) {
        }
        else {
            alert('WTF?!');
        }
    });

    jQuery('#download_file_btn').click(function(event){
        event.preventDefault();

        jQuery('.loader_file').css('display','inline-block');

        var form = jQuery('#form_download_file');
        form.ajaxSubmit({
            url: form.attr('action'),
            type: form.attr('method'),
            success: function(){
                jQuery('.loader_file').hide();
            },
        });

        start_download = true;
        show_progress( 1000, form );

        return false;
    });
});

function show_progress(interval, form, progress, new_key)
{
    // console.group('function show_progress(form, progress)');

    var db_file = form.find('[name=db_file]');
    var progress_bar = form.find('.progress_db_file');

    // console.log('db_file', db_file.length, db_file);
    // console.log('progress_bar', progress_bar.length, progress_bar);

    if (!progress_bar.length)
    {
        progress_bar = jQuery("<div class='progress_db_file'>").css({
            width: db_file.outerWidth(true) + 'px',
        }).insertBefore(db_file);

        jQuery("<div class='progress_db_file_mark'>").appendTo(progress_bar);

        // console.log('NEW progress', progress_bar);
        // console.log('progress_bar < 100', progress_bar < 100);

        db_file.hide();
    }

    if (start_download)
    {
        progress_bar.find('.progress_db_file_mark').addClass('in-progress');
    }

    if (typeof progress == 'undefined' || progress === null || progress < 100)
    {
        // console.log('progress', progress);
        // console.log("progress_bar.find('.progress_db_file_mark')", progress_bar.find('.progress_db_file_mark').length, progress_bar.find('.progress_db_file_mark'));
        //
        // progress_bar.find('.progress_db_file_mark').css('width', (progress ? progress : 0) + '%');
        //
        // document.cookie = "PHPSESSID="+(Math.random()*1000)+"; path=/; expires=-1";
        setTimeout(function(){
            jQuery.ajax({
                url: '../../wp-content/themes/basis/mapcompany/mapcompany_progress.php',
                type: 'POST',
                data: {
                    key: form.find('[name="key"]').val(),
                },
                dataType: 'json',
            })
            .done(function(result){
                show_progress(interval, form, result.progress, result.key);
            })
            .fail(function(){
                show_progress(interval, form);
            });
        }, interval);
    }
    else
    {
        progress_bar.remove();

        if (new_key)
        {
            form.find('[name="key"]').val(new_key);
        }

        db_file.show();
    }

    // console.groupEnd();
}

//coockie
jQuery(function(){
    if (localStorage.getItem("modal_log") != null) {
        jQuery('.modal_window_singin').css('display','block');
        jQuery('.modal_window_wrapper').css('display','block');
    }
    else if (localStorage.getItem("modal_reg") != null) {
        jQuery('.modal_window_register').css('display','block');
        jQuery('.modal_window_wrapper').css('display','block');
    }
});
