(function ($) {
    'use strict';

    $(document).ready(function () {
        /**
         * Display/hide functionality
         */

            //Display popup if user scrolls to 50% of the page, OR if no scroll space, appear after 10 seconds.

        let container = $('.hb-popup-container');
        let page = $('html');
        let height = page.height();
        let viewHeight = $(window).height();
        let threshold = height / 3;
        let close = $('.hb-close');
        let maxAge = 86400; //1 day (60*60*24)
        let cookieVal = "hb-popup-closed=true, max-age=" + maxAge + ", SameSite=Lax" //Only show popup for as long as the maxAge value

        let hbPopUpAppear = function (delay) {
            if ((document.cookie !== cookieVal && !page.hasClass('hb-popup-closed'))) { //If user has closed popup already, don't show again until cookie expires
                container.addClass('anim');
                setTimeout(() => {
                    container.addClass('active');
                    if (container.hasClass('active')) {
                        page.addClass('hb-popup-active');
                    }
                }, delay)
            }
        }

        if (height > viewHeight) {
            $(window).on('scroll', function () {
                if (scrollY >= threshold) {
                    hbPopUpAppear(0);
                }
            });
        } else {
            hbPopUpAppear(10000);
        }

        //Close functionality

        close.on('click', function () {
            if (container.hasClass('active')) {
                container.removeClass('active');
                page.removeClass('hb-popup-active').addClass('hb-popup-closed');
                document.cookie = cookieVal;
            }
        });

        /**
         * Form behaviour
         */

            //Validation

        let form = $('.popup-form');
        let field = $('#hb-email');
        let submit = $('#hb-submit');
        let errorText = $('.error-text');
        let regexEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
        let popupCont = $('.hb-popup-inner');

        $(submit).on('click', function (event) {
            event.preventDefault();
            submit.addClass('wait');
            if (field.hasClass('error')) {
                field.removeClass('error');
            }

            if (errorText.hasClass('active')) {
                errorText.addClass('active');
            }

            if ((field).val().match(regexEmail)) {
                setTimeout(() => {
                    submit.removeClass('wait');
                    popupCont.removeClass('cta-active').addClass('success-active');
                }, 1000)
            } else {
                setTimeout(() => {
                    submit.removeClass('wait');
                    field.addClass('error');
                    errorText.addClass('active');
                }, 1000);

            }
        });

    });

})(jQuery);
