// ---------------------------------
// -------- Document ready ---------
// ---------------------------------


jQuery(document).ready(function () {

    jQuery('body').css('overflowY', 'hidden');
    jQuery.waitForImages.hasImgProperties = ['background', 'backgroundImage'];
    jQuery('body').waitForImages(function () {
        jQuery(".page-mask").fadeOut(500);
        jQuery('body').css('overflowY', 'auto');
    });


    //Tob bar shrinking
    $(function () {
        window.addEventListener('scroll', function (e) {
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = $('header').height() - 150,
                header = document.querySelector(".header-nav");
            if (header !== null) {
                if (distanceY > shrinkOn) {
                    classie.add(header, "smaller");
                } else {
                    if (classie.has(header, "smaller")) {
                        classie.remove(header, "smaller");
                    }
                }
            }
        });
    });



    //Localscroll initialization

    $.localScroll({

        queue: true,
        duration: 1000,
        hash: false,
        onBefore: function (e, anchor, $target) {
            // The 'this' is the settings object, can be modified
        },
        onAfter: function (anchor, settings) {
            // The 'this' contains the scrolled element (#content)
        }
    });


    //Menu functionality
    var menu = document.querySelector(".menu"),
        menuCont = document.querySelector(".menu-container"),
        toggle = document.querySelector(".menu-bar");

    function toggleToggle() {
        toggle.classList.toggle("menu-open");

        var open = $('.menu-text').text();
        var close = $('.menu-text').attr('data-text');

        if ($('.menu-text').text(open)) {
            $('.menu-text').text(close);
        } else {
            $('.menu-text').text(open);
        }
        $('.menu-text').attr('data-text', open);
    };

    function toggleMenu() {
        menu.classList.toggle("active");
        menuCont.classList.toggle('overlay_bg');
    };

    if (toggle !== null) {
        toggle.addEventListener("click", toggleToggle, false);
        toggle.addEventListener("click", toggleMenu, false);
    }

    if (menuCont !== null) {
        menuCont.addEventListener("click", toggleToggle, false);
        menuCont.addEventListener("click", toggleMenu, false);
    }


    /* ---------------------------------------------
     Height 100%
     --------------------------------------------- */
    function js_height_init() {
        (function ($) {
            $(".js-full-height").height($(window).height());
            $(".js-parent-height").each(function () {
                $(this).height($(this).parent().first().height());
            });
        })(jQuery);
    }

    js_height_init();


    $(window).resize(function () {

        js_height_init();

    });

    /*-------------------------------------------------*/
    /* =  Animated content
     /*-------------------------------------------------*/

    wow = new WOW(
        {
            animateClass: 'animated',
            offset: 100
        }
    );

    wow.init();


    /* --------------------------------
     Ajax MailChimp Integration
     -------------------------------- */


    $('#mc-form').ajaxChimp({
        language: 'ft',
        url: '//themesell.us9.list-manage.com/subscribe/post?u=cead90b06050d379afef2a074&amp;id=1bd02867ab',
        callback: clearSubsForm
        //http://xxx.xxx.list-manage.com/subscribe/post?u=xxx&id=xxx
    });


    $.ajaxChimp.translations.ft = {
        'submit': 'Submitting...',
        0: '<i class="fa fa-envelope"></i> Awesome! We have sent you a confirmation email',
        1: '<i class="fa fa-exclamation-triangle"></i> Please enter a value',
        2: '<i class="fa fa-exclamation-triangle"></i> An email address must contain a single @',
        3: '<i class="fa fa-exclamation-triangle"></i> The domain portion of the email address is invalid (the portion after the @: )',
        4: '<i class="fa fa-exclamation-triangle"></i> The username portion of the email address is invalid (the portion before the @: )',
        5: '<i class="fa fa-exclamation-triangle"></i> This email address looks fake or invalid. Please enter a real email address'
    };

    //Clear subscription form input field
    function clearSubsForm(ev) {
        if (ev.result === 'success') {
            $("#mc-email").val('');
        }
    }


    //Tooltip

    $('[data-toggle="tooltip"]').tooltip();


    //Youtube Video initialization
    $(".player").mb_YTPlayer();


    $(function () {

        // Check if viewport greater or equal 1025px
        // if so, then apply function phoneSail();
        // else, disable phoneSail(); function

        var width = $(window).width();

        if (width <= 991) {
            $("#phone").css("display", "none");
        }
        else {
            phoneSail();
        }
        ;


        // -----------------------------------------
        // -------- Phone Sailing Function ---------
        // -----------------------------------------

        function phoneSail() {

            var pageNameId = new Array;
            $('[id*=feature]').each(function () {
                pageNameId.push($(this).attr('id'));

            });
            var feature_img_path = 'img/phone/';
            var featureImg = ['screenshot-1.png', 'screenshot-2.png'];

            $(window).on("scroll resize", function () {
                var pos = $('#trigger').offset();
                $('[id*=feature]').each(function (index) {
                    if (pos.top >= $(this).offset().top && pos.top <= $(this).next().offset().top && $(this).is('#feature-' + index)) {
                        var imagego = $(".bu").attr("src", feature_img_path + featureImg[index]);
                    }
                });
            });


            //$("#phone").hide();
            $('#' + pageNameId[0]).waypoint(function (direction) {

                if (direction == "down") {
                    $("#phone").css({"position": "fixed", "top": "0", "margin-top": "0"});
                }
                else if (direction == "up") {
                    $("#phone").css({"position": "relative", "top": "0", "margin-top": "0"});
                }
            }, {offset: '-10%'});

            //console.log("dhur" + pageNameId[pageNameId.length-2]);

            $('#' + pageNameId[pageNameId.length - 1]).waypoint(function (direction) {
                if (direction === "down") {
                    jQuery(".phone-wrap-inner").detach().appendTo('.phone-holder-alt');
                    $("#phone").css({"position": "relative", "top": "0", "margin-top": "0"}).animate();
                }
                else if (direction === "up") {
                    jQuery(".phone-wrap-inner").detach().appendTo('.phone-holder');
                    $("#phone").css({"position": "fixed", "top": "28%", "margin-top": "-299px"});
                }
                ;

            }, {offset: '0%'});


        }; //end of phoneSail


        function changeFeaturedImg() {
            /* Img change on click */

            var featureNameId = new Array;
            $('[id*=fib]').each(function () {
                featureNameId.push($(this).attr('id'));

            });

            var feature_content_img_path = 'img/features/';
            var featureContentImg = ['feature-1.png', 'feature-2.png', 'feature-3.png', 'feature-4.png'];

            var images = new Array()

            function preload() {
                for (i = 0; i < preload.arguments.length; i++) {
                    images[i] = new Image()
                    images[i].src = preload.arguments[i]
                }
            }

            preload(
                feature_content_img_path + 'feature-1.png',
                feature_content_img_path + 'feature-2.png',
                feature_content_img_path + 'feature-3.png',
                feature_content_img_path + 'feature-4.png'
            );

            $('[id*=fib]').each(function (index) {

                $(this).hover(function () {
                    var chngimg = $(".bu").attr("src", feature_content_img_path + featureContentImg[index]);
                })
            });
        }

        changeFeaturedImg();


        /*----------------------------------------------------*/
        /*  Animated Count To
         /*----------------------------------------------------*/


        jQuery('.stat-box').each(function () {
            jQuery('.stats-bg').fappear(function (direction) {
                jQuery('.stats').countTo();
            }, {offset: "100px"});
        });

        jQuery('.hero-bottom-social').each(function () {
            jQuery('.social-links').fappear(function (direction) {
                jQuery('.social-stats').countTo();
            }, {offset: "100px"});
        });


        //Screenshot carousel
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            margin: 0,
            nav: true,
            navText: [
                "<i class='sht sht-arrow_left-icon'></i>",
                "<i class='fa sht-arrow_right-icon'></i>"
            ],
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })


    });


    /*----------------------------------------------------*/
    /*	Video Background
     /*----------------------------------------------------*/

    /*+ bg video*/
    if ((navigator.userAgent.match(/iPhone/i)) ||
        (navigator.userAgent.match(/iPad/i)) ||
        (navigator.userAgent.match(/iPod/i))) {
        $('.b-bg-video').addClass('device-ios');
    }

    $('.video-controls i').on('click', function () {
        var video = $("#video1")[0];
        if (video.paused) {
            video.play();
        } else {
            video.pause();
        }
        $(this).hide().siblings().css('display', 'inline-block');
    });

    var $video1 = $('#video1');

    $video1.on('scrollSpy:enter', function () {
        if ($(this)[0].paused) {
            $(this)[0].play();
        }
        $('#video1-play').hide();
        $('#video1-pause').show();
    });

    $video1.on('scrollSpy:exit', function () {
        $(this)[0].pause();
        $('#video1-play').show();
        $('#video1-pause').hide();
    });

    $('#video1-play').click(function () {
        $('.video-section .section-title h2, .video-section .section-title p').animate().css({visibility: "hidden"});
    });

    $('#video1-pause').click(function () {
        $('.video-section .section-title h2, .video-section .section-title p').animate().css({visibility: "visible"});
    });


});


//Features Timeline
jQuery(document).ready(function ($) {
    var $timeline_block = $('.cHouse-timeline-block');

    //hide timeline blocks which are outside the viewport
    $timeline_block.each(function () {
        if ($(this).offset().top > $(window).scrollTop() + $(window).height() * 0.75) {
            $(this).find('.cHouse-timeline-img, .cHouse-timeline-content').addClass('is-hidden');
        }
    });

    //on scolling, show/animate timeline blocks when enter the viewport
    $(window).on('scroll', function () {
        $timeline_block.each(function () {
            if ($(this).offset().top <= $(window).scrollTop() + $(window).height() * 0.75 && $(this).find('.cHouse-timeline-img').hasClass('is-hidden')) {
                $(this).find('.cHouse-timeline-img, .cHouse-timeline-content').removeClass('is-hidden').addClass('bounce-in');
            }
        });
    });
});


//Testimonial box carousel
$(document).ready(function () {
    $('#Carousel-testimonial').carousel({
        interval: 5000
    });
    $('.floating-menu li').on('click', function () {
        $('li.current').removeClass('current');
        $(this).addClass('current');
    });
    //scrollup js
    jQuery('.stats-bg').parallax("50%", 0.1);

    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 200) {
            jQuery('.scrollup').fadeIn();
        } else {
            jQuery('.scrollup').fadeOut();
        }
    });

    jQuery('.scrollup').click(function () {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });


    //share functionality

    var $theTile = jQuery('.share-love');
    var $tileShares = jQuery('.tile-share');
    var $scaleDur = .65;

    $tileShares.hoverIntent(shareOver, shareOut);
    $theTile.hoverIntent(tileOver, tileOut);

    function shareOver(event) {
        if (!$theTile.hasClass('nojs')) {
            var $thisHovered = jQuery(this);

            var $colBGOver = $thisHovered.find('.social-color-bg');
            if (!$colBGOver.hasClass('current')) {
                jQuery('.social-color-bg').removeClass('prev-current');
                jQuery('.social-color-bg.current').addClass('prev-current');
                jQuery('.social-color-bg').removeClass('current');
                $colBGOver.width(0);
                $colBGOver.height(0);
                $colBGOver.addClass('current');
            }

            if ($thisHovered.attr('data-timer') != 'true') {
                TweenMax.to($colBGOver, $scaleDur, {
                    width: $theTile.width() * 2,
                    height: $theTile.width() * 2,
                    ease: Strong.easeIn,
                    onComplete: hoverComplete,
                    onCompleteParams: $thisHovered
                });
            }
        }
    }

    function shareOut() {
        var $thisUnhovered = jQuery(this);
        if ($thisUnhovered.attr('data-timer') != 'false') {
            TweenMax.allTo(jQuery('.social-color-bg'), $scaleDur, {
                width: 0,
                height: 0,
                ease: Strong.easeIn,
                onComplete: unhoverComplete,
                onCompleteParams: $thisUnhovered
            });
        }
    }

    function hoverComplete($object) {
        jQuery($object).attr('data-timer', true);
    }

    function unhoverComplete($object) {
        jQuery($object).attr('data-timer', false);
    }

    function tileOver() {
        //nothing
    }

    function tileOut() {
        jQuery('.social-color-bg').each(function () {
            var $thisBG = jQuery(this);
            if (!$thisBG.hasClass('current')) {
                TweenMax.set($thisBG, {width: 0, height: 0});
            }
        });
        TweenMax.to(jQuery('.social-color-bg.current'), $scaleDur, {width: 0, height: 0, ease: Strong.easeIn});
    }


});


jQuery(document).ready(function (t) {
    t(window).scroll(function () {
        var e = 600;
        t(".magical.iphone").each(function () {
            if (t(this).offset().top < t(window).scrollTop() + e) {
                t(window).scrollTop() + e - t(this).offset().top;
                var i = 200,
                    n = t(this).attr("data-expand-from");
                t(this).find("#screen-2").css(n, i / 3), t(this).find("#screen-3").css(n, i / 1.5), t(this).find("#screen-4").css(n, i);
                var s = this;
                setTimeout(function () {
                    t(s).addClass("open")
                }, 1200)
            }
        })
    })
});


jQuery(document).ready(function (u) {
    u(window).scroll(function () {
        var e = 600;
        u(".magical.iphone").each(function () {
            if (u(this).offset().top < u(window).scrollTop() + e) {
                u(window).scrollTop() + e - u(this).offset().top;
                var i = 200,
                    n = u(this).attr("data-expand-from");
                u(this).find("#screen-6").css(n, i / 3), u(this).find("#screen-7").css(n, i / 1.5), u(this).find("#screen-8").css(n, i);
                var s = this;
                setTimeout(function () {
                    u(s).addClass("open")
                }, 1200)
            }
        })
    })
});





