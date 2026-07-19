/**
 * 
 * Qt Admin script
 * @version  1.0
 * 
 */
jQuery(function($) {
	"use strict";
    // console.log('Qt Admin');

    if($('#qtt-bulletin-page').length > 0){

        // Load the bulletin content in welcome.php
        $.ajax({
            type: 'GET',
            cache: false,
            beforeSend: function (request) {
                request.withCredentials = false;
            },
            timeout: 120000,
            dataType: "html",
            url: 'https://demo.qantumthemes.xyz/onair2/bulletin/index.php?nocaching=' + Math.round(Math.random() * 9999),

            async: true,
            success: function(html) {
               $('#qtt-bulletin-page').html(html).addClass('loaded');
            }, 
            fail: function(e){
                console.log('Bulletin cannot be loaded');
                console.log(e);
            }
        });
    }

});