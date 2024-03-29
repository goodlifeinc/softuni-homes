jQuery(document).ready(function($) {
    $('.like-button').on('click', function(e){
        e.preventDefault();
        // console.log( 'clicked' ); // just to be sure

        let home_id = jQuery(this).attr('id') // we'll need this later

        // AJAX Magic
        jQuery.ajax({
            type: 'post',
            dataType: 'json',
            url: my_ajax_object.ajax_url,
            data: {
                action:'softuni_home_like', // PHP function
                home_id: home_id // we need to make this dynamic
            },
            success: function(msg){
                msg?.likes && $('#likes-count').text(msg.likes);
                console.log(msg);
            }
        });
    });
});