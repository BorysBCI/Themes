jQuery(function() {

    jQuery(".mapcompany_search_state, .mapcompany_search_input").change(function(){
        jQuery("button[name=search_button]").click();
    });

    jQuery("button[name=search_button]").click(function() {
        var search = jQuery(".mapcompany_search_functionality input[name=search_input]").val(),
            state = jQuery('.mapcompany_search_state option:selected').val();

        jQuery.ajax({
            type: "POST",
            url: "../../wp-content/themes/basis/mapcompany/search.php",
            data: {"search": search,"state": state},
            cache: false,
            success: function(data) {

                var data_json = JSON.parse(data);
                var data_arr = jQuery.makeArray(data_json);

                var tbody = jQuery('.mapcompany_search_table tbody');
                    tbody.empty();

                if (data.length <= 3) {
                    if (jQuery('.mapcompany_search_table tbody tr').length == 0 ) {

                        jQuery('.mapcompany_search_table tbody').append('<tr><td colspan="100" class="no_results_mapcompany">no results</td></tr>');
                        // jQuery('.mapcompany_search_table tbody tr td:eq(1)').addClass('no_results_mapcompany');
                        // jQuery('.mapcompany_search_table tbody tr td:eq(2)').addClass('no_results_mapcompany_last');
                    }

                }
                cleare_marks();

                for (var i = 0; i < data_arr.length; i++) {

                    var tr = jQuery('<tr>');
                        jQuery('<td>').addClass('name_company').html(
                            jQuery('<a>')
                                .attr('href', 'http://' + data_arr[i].website)
                                .attr('target', '_blank')
                                .html(data_arr[i].nameCompany))
                        .appendTo(tr);
                        jQuery('<td>').addClass('city_company').html(data_arr[i].city).appendTo(tr);
                        var td = jQuery('<td>').addClass('state_company').html(data_arr[i].state).appendTo(tr);

                    tr.appendTo(tbody);

                    create_mark( data_arr[i], tr );


                }
            }
        });
        return false;

    });


    jQuery('.mapcompany_search_table tbody').find('tr').each(function(){
        var options = $(this).data();
            options.nameCompany = $(this).find('.name_company').html();
            options.address = $(this).attr('data-address');
            options.state = $(this).attr('data-state');
        create_mark(options, $(this));
    });
});

var marks = [];

function cleare_marks()
{
    while (marks.length) {
        var mark = marks.pop();
            mark.mark.setMap(null);
    }
}

function create_mark(options, tr)
{

    var lat = parseFloat(options.lat),
        lng = parseFloat(options.lng);

    var infowindow = new google.maps.InfoWindow({
        content:'<div>'
                    + '<div class="title">' + options.nameCompany + '</div>'
                    + '<div class="address">' + options.address + '</div>'
                + '</div>'
    });
    var marker_blue = "../../wp-content/themes/basis/mapcompany/img/marker-blue.png",
        marker_orange = "../../wp-content/themes/basis/mapcompany/img/marker-ora.png",
        marker_red = "../../wp-content/themes/basis/mapcompany/img/marker-red.png";
        marker_color = "";

        if (options.state == "MD" || options.state == "Md" || options.state == "mD" || options.state == "md") {
            marker_color = marker_red;
        }
        else if (options.state == "VA" || options.state == "Va" || options.state == "vA" || options.state == "va") {
            marker_color = marker_orange;
        }
        else {
            marker_color = marker_blue;
        }

    var mark = new google.maps.Marker({
        position: {
            lat: lat,
            lng: lng,
        },
        map: map,
        title: options.nameCompany,
        icon: marker_color,

    });

    mark.addListener('click', function(){
        //info.open(map, mark);
		infowindow.open(map, mark);
    });

    marks.push({
        mark: mark,
        tr: tr,
    });
}

// Show row on table and marks
jQuery(function(){

    jQuery('.mapcompany_search_quantity').change(function(){
        var quantity = Math.min(marks.length, parseInt(jQuery(this).val()) || marks.length);

        if (quantity < marks.length && quantity < 100) {
            jQuery('.show_all_row').show();
        }

        var tbody = jQuery('.mapcompany_search_table tbody');

        for (var n = quantity; n < marks.length; n++) {

            if (!marks[n].is_hidden)
            {
                marks[n].is_hidden = true;
                marks[n].mark.setMap(null);
                marks[n].tr.hide();

            }
        }

        for (var n = 0; n < quantity; n++) {
            if (marks[n].is_hidden)
            {
                marks[n].is_hidden = false;
                marks[n].mark.setMap(map);
                marks[n].tr.show();
            }
        }


    });
});
