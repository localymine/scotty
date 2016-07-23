jQuery(document).ready(function ($) {
    'use strict';

    $('.menu-item-has-children ul.sub-menu li a, .goto').on('click', function () {
        var target = this.hash,
                $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 70
        }, 900, 'swing', function () {
            window.location.hash = target;
        });
    });


});

jQuery(window).load(function () {
    'use strict';
    var target = this.hash,
            $target = window.location.hash;

    $('html, body').stop().animate({
        'scrollTop': $target.offset().top - 70
    }, 900, 'swing', function () {
        window.location.hash = target;
    });
});