function initializeJS() {

    //tool tips
    jQuery('.tooltips').tooltip();

    //popovers
    jQuery('.popovers').popover();

    //custom scrollbar
    //for html
    jQuery("html").niceScroll({ styler: "fb", cursorcolor: "#007AFF", cursorwidth: '6', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: '', zindex: '1000' });
    //for sidebar
    jQuery("#sidebar").niceScroll({ styler: "fb", cursorcolor: "#007AFF", cursorwidth: '3', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: '' });
    // for scroll panel
    jQuery(".scroll-panel").niceScroll({ styler: "fb", cursorcolor: "#007AFF", cursorwidth: '3', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: '' });

    //sidebar dropdown menu
    jQuery('#sidebar .sub-menu > a').click(function() {
        var last = jQuery('.sub-menu.open', jQuery('#sidebar'));
        jQuery('.menu-arrow').removeClass('arrow_carrot-right');
        jQuery('.sub', last).slideUp(200);
        var sub = jQuery(this).next();
        if (sub.is(":visible")) {
            jQuery('.menu-arrow').addClass('arrow_carrot-right');
            sub.slideUp(200);
        } else {
            jQuery('.menu-arrow').addClass('arrow_carrot-down');
            sub.slideDown(200);
        }
        var o = (jQuery(this).offset());
        diff = 200 - o.top;
        if (diff > 0)
            jQuery("#sidebar").scrollTo("-=" + Math.abs(diff), 500);
        else
            jQuery("#sidebar").scrollTo("+=" + Math.abs(diff), 500);
    });

    // sidebar menu toggle
    jQuery(function() {
        function responsiveView() {
            var wSize = jQuery(window).width();
            if (wSize <= 768) {
                jQuery('#container').addClass('sidebar-close');
                jQuery('#sidebar > ul').hide();
            }

            if (wSize > 768) {
                jQuery('#container').removeClass('sidebar-close');
                jQuery('#sidebar > ul').show();
            }
        }
        jQuery(window).on('load', responsiveView);
        jQuery(window).on('resize', responsiveView);
    });

    jQuery('.toggle-nav').click(function() {
        if (jQuery('#sidebar > ul').is(":visible") === true) {
            jQuery('#main-content').css({
                'margin-left': '0px'
            });
            jQuery('#sidebar').css({
                'margin-left': '-180px'
            });
            jQuery('#sidebar > ul').hide();
            jQuery("#container").addClass("sidebar-closed");
        } else {
            jQuery('#main-content').css({
                'margin-left': '180px'
            });
            jQuery('#sidebar > ul').show();
            jQuery('#sidebar').css({
                'margin-left': '0'
            });
            jQuery("#container").removeClass("sidebar-closed");
        }
    });

    //bar chart
    if (jQuery(".custom-custom-bar-chart")) {
        jQuery(".bar").each(function() {
            var i = jQuery(this).find(".value").html();
            jQuery(this).find(".value").html("");
            jQuery(this).find(".value").animate({
                height: i
            }, 2000)
        })
    }

}

jQuery(document).ready(function() {
    initializeJS();
});


///////////////////////////////////////////////////////
////////////////////////////////////////////////
///////////////////////////////MY JQUERY/////////////////////

$(document).ready(function() {

    var user_href;
    var user_href_splitted;
    var user_id;
    var image_src;
    var image_href_splitted;
    var image_name;
    var photo_id;

    $(".modal_thumbnails").click(function() {

        $("#set_user_image").prop('disabled', false);

        $(this).addClass('selected');
        user_href = $("#user-id").prop('href');
        user_href_splitted = user_href.split("=");
        user_id = user_href_splitted[user_href_splitted.length - 1];

        image_src = $(this).prop("src");
        image_href_splitted = image_src.split("/");
        image_name = image_href_splitted[image_href_splitted.length - 1];

        photo_id = $(this).attr("data");

        $.ajax({

            url: "includes/ajax_code.php",
            data: { photo_id: photo_id },
            type: "POST",
            success: function(data) {
                if (!data.error) {

                    $("#modal_sidebar").html(data);

                }
            }

        });

    });

    $("#set_user_image").click(function() {

        $.ajax({

            url: "includes/ajax_code.php",
            data: { image_name: image_name, user_id: user_id },
            type: "POST",
            success: function(data) {
                if (!data.error) {

                    $(".user_image_box").prop('src', data);


                    location.reload(true);

                }
            }

        });


    });

    //////DELEET FUNCTION//////
    $(".delete_link").click(function() {

        alert("Are sure you want to delete?");

    });



    tinymce.init({ selector: 'textarea' });
});