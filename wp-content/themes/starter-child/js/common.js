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

    $('#contact-info-form').bootstrapValidator({
//        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok text-success inline-block req',
            invalid: 'glyphicon glyphicon-remove text-danger inline-block req',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            re_title: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            re_name: {
                validators: {
                    notEmpty: {
                        message: 'The full name is required and cannot be empty'
                    }
                }
            },
            re_email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            re_content: {
                validators: {
                    notEmpty: {
                        message: 'The content is required and cannot be empty'
                    },
                    stringLength: {
                        max: 500,
                        message: 'The content must be less than 500 characters long'
                    }
                }
            }
        }
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