$(document).ready(function () {
    $(document).on('submit', '#js-subscribeForm', function() {
        var $data = $(this).serialize();
        $.ajax({
            url: '/subscribe.php',
            type: 'POST',
            data: $data,
            beforeSend: function( xhr ) {
        },
        success: function( data ) {
            console.log( data );
        }
    });
        return false;
    })
});
