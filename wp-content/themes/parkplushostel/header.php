<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Park_plus_hostel
 * @since Park_plus_hostel 1.0
 */
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="keywords" content="" />
        <meta name="description" content="и цены" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&subset=latin,cyrillic,latin-ext" rel="stylesheet" type="text/css">
        <title>
            <?php wp_title(); ?>
        </title>
        <!-- Styles -->
        <link rel="stylesheet" href="/wp-content/uploads/misc/css/bootstrap-datepicker3.standalone.css">
        <link rel="stylesheet" href="/wp-content/uploads/misc/css/style.css">
        <link rel="stylesheet" href="/wp-content/uploads/misc/css/media.css">
        <link rel="stylesheet" href="/wp-content/uploads/misc/css/sand.css">
        <link rel="stylesheet" href="/wp-content/uploads/misc/css/apart.css">
        <link rel="stylesheet" href="/wp-content/uploads/misc/css/style_save.css">
        <style>
            #over {
                display: none !importnat
            }
            
            header.room_header {
                background: url(/wp-content/uploads/misc/img/room/1.jpg) no-repeat center center / cover
            }
            
            header.rulles {
                background: url(/wp-content/uploads/misc/img/room/1.jpg) no-repeat center center / cover
            }
            
            header.hostel {
                background: url(/wp-content/uploads/misc/img/room/1.jpg) no-repeat center center / cover
            }
        </style>
        <script>
        (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-72174896-1', 'auto');
        ga('send', 'pageview');
        </script>
        <link rel="stylesheet" href="/wp-content/uploads/misc/css/style_ser.css">
        <link rel="stylesheet" href="/wp-content/uploads/misc/slick/slick.css">
        <link rel="stylesheet" href="/wp-content/uploads/misc/slick/slick-theme.css">
        <link rel="stylesheet" href="/wp-content/uploads/misc/css/jquery.formstyler.css">
        <script src="/wp-content/uploads/misc/js/jquery-1.12.2.min.js"></script>
        <script src="/wp-content/uploads/misc/js/pace.js"></script>
        <script src="/wp-content/uploads/misc/js/common.js"></script>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <link href="/wp-content/uploads/misc/css/pace-theme-minimal.css" rel=stylesheet />
        <style>
            .pace {
                -webkit-pointer-events: none;
                pointer-events: none;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none
            }
            
            .pace-inactive {
                display: none
            }
            
            .pace .pace-progress {
                background: #fff;
                position: fixed;
                z-index: 2000;
                top: 0;
                right: 100%;
                width: 100%;
                height: 2px
            }
        </style>
        <!-- //preload -->
        <style>
            #preloader {
                position: fixed;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                z-index: 1999;
                background: #425162 url(/wp-content/uploads/misc/img/logo.png) no-repeat center center
            }
            
            #preloader.preloaderFading {
                opacity: 0;
                transition: .5s;
                z-index: -1;
                transform: scale(10);
            }
        </style>
        <!-- Important Owl stylesheet -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/owl-carousel/owl.carousel.css">
        <!-- Default Theme -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/owl-carousel/owl.theme.css">
        <!--  jQuery 1.7+  -->
        <script src="<?php echo get_template_directory_uri(); ?>/owl-carousel/assets/js/jquery-1.9.1.min.js"></script>
        <!-- Include js plugin -->
        <script src="<?php echo get_template_directory_uri(); ?>/owl-carousel/owl.carousel.js"></script>
        <style>
            div[id^=sync1_] .owl-item {
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                text-align: center;
                cursor: pointer;
                width: 95%;
                height: auto;
            }
            
            div[id^=sync2_] .owl-item {
                margin: 1px;
                color: #FFF;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                text-align: center;
                cursor: pointer;
                width: 95%;
                height: auto;
            }
        </style>
        <script>
            $(document).ready(function () {
                $("header .title h1, header .title h2, header.main .title_main h1, header.main .title_main h2").removeAttr('style');
                var sync1 = $("div[id^=sync1_]");
                var sync2 = $("div[id^=sync2_]");
                sync1.owlCarousel({
                    singleItem: true
                    , slideSpeed: 1000
                    , navigation: true
                    , pagination: false
                    , afterAction: syncPosition
                    , responsiveRefreshRate: 200
                    , navigation: false
                , });
                sync2.owlCarousel({
                    items: 4
                    , itemsDesktop: [1199, 10]
                    , itemsDesktopSmall: [979, 10]
                    , itemsTablet: [768, 8]
                    , itemsMobile: [479, 4]
                    , pagination: false
                    , responsiveRefreshRate: 100
                    , afterInit: function (el) {
                        el.find(".owl-item").eq(0).addClass("synced");
                    }
                });

                function syncPosition(el) {
                    var current = this.currentItem;
                    $("div[id^=sync2_]").find(".owl-item").removeClass("synced").eq(current).addClass("synced")
                    if ($("div[id^=sync2_]").data("owlCarousel") !== undefined) {
                        center(current)
                    }
                }
                $("div[id^=sync2_]").on("click", ".owl-item", function (e) {
                    e.preventDefault();
                    var number = $(this).data("owlItem");
                    sync1.trigger("owl.goTo", number);
                });

                function center(number) {
                    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
                    var num = number;
                    var found = false;
                    for (var i in sync2visible) {
                        if (num === sync2visible[i]) {
                            var found = true;
                        }
                    }
                    if (found === false) {
                        if (num > sync2visible[sync2visible.length - 1]) {
                            sync2.trigger("owl.goTo", num - sync2visible.length + 2)
                        }
                        else {
                            if (num - 1 === -1) {
                                num = 0;
                            }
                            sync2.trigger("owl.goTo", num);
                        }
                    }
                    else if (num === sync2visible[sync2visible.length - 1]) {
                        sync2.trigger("owl.goTo", sync2visible[1])
                    }
                    else if (num === sync2visible[0]) {
                        sync2.trigger("owl.goTo", num - 1)
                    }
                }
                $('.address_wrap').append($('.address'));
                $('.cell_wrap').append($('.contact'));
                $('.hostel_h').mouseover(function () {
                    $('.address.hostel p').addClass('hostel_hovered');
                    $('.contact.hostel span').addClass('hostel_hovered');
                });
                $('.hostel_h').mouseout(function () {
                    $('.address.hostel p').removeClass('hostel_hovered');
                    $('.contact.hostel span').removeClass('hostel_hovered');
                });
                $('.apart_h').mouseover(function () {
                    $('.address.apart p').addClass('apart_hovered');
                    $('.contact.apart span').addClass('apart_hovered');
                });
                $('.apart_h').mouseout(function () {
                    $('.address.apart p').removeClass('apart_hovered');
                    $('.contact.apart span').removeClass('apart_hovered');
                });
                $('.lang_wrap').append($('.language').html());
                $('.language').remove();
                $('.lang_wrap .lang_list').each(function () {
                    $(this).siblings('p').text($(this).children('option:selected').text());
                });
                $('.lang_wrap .lang_list').change(function () {
                    $(this).siblings('p').text($(this).children('option:selected').text());
                    var path=window.location.pathname;
                    path=path.replace('<?=ICL_LANGUAGE_CODE?>','');
                    $(location).attr('href', '/' + $(this).children('option:selected').attr('value')+'/'+path);
                });
                $('.lang_list').children('option').each(function(){ console.log($(this).attr('value'));
                    if ($(this).attr('value')=='<?=ICL_LANGUAGE_CODE?>') 
                    {
                        $(this).attr('selected', true);
                        $(this).closest('select').val('<?=ICL_LANGUAGE_CODE?>');
                        $('.lang_list').siblings('p').text($(this).text());
                    }
                });
//                $(document).ready(function () {
                    if($('.title_main .links').length){
                        $('a.popup').click(function (event) {
                            //            console.log('target');
                            event.preventDefault();
                            $('#overlay').fadeIn(400, function () {
                                $('#modal_form').css('display', 'block').animate({
                                    opacity: 1
                                    , top: '50%'
                                }, 200);
                            });
                        });
                        $('#modal_close, #overlay').click(function () {
                            $('#modal_form').animate({
                                opacity: 0
                                , top: '45%'
                            }, 200);
                            $(this).css('display', 'none');
                            $('#overlay').fadeOut(400);
                        });
                    }
//                });

                if ($('#google_map').length) {
                    function initialize() {

                        var mapCanvas = document.getElementById('google_map');

                        var mapOptions = {

                            center: new google.maps.LatLng(49.84047344, 24.03023243),

                            zoom: 13,

                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };

                        var map = new google.maps.Map(mapCanvas, mapOptions);
                        // var markerImage = new google.maps.MarkerImage(
                        //     'images/map.png',
                        //     new google.maps.Size(33,39),
                        //     new google.maps.Point(0,0),
                        //     new google.maps.Point(0,33)
                        // );


                        var markers = [],
                            myPlaces = [];

                        myPlaces.push(new Place('Park Plus Hostel', 49.83808452, 24.02242854));
                        myPlaces.push(new Place('Park Plus Apart', 49.84061, 24.0333895));

                        for (var i = 0, n = myPlaces.length; i < n; i++) {
                            var marker = new google.maps.Marker({

                                //icon: markerImage,
                                position: new google.maps.LatLng(myPlaces[i].latitude, myPlaces[i].longitude),
                                map: map,

                                title: myPlaces[i].name
                            });

                            var infowindow = new google.maps.InfoWindow({
                                content: '<h4>' + myPlaces[i].name + '</h4><br/>'
                            });

                            makeInfoWindowEvent(map, infowindow, marker);
                            markers.push(marker);
                        }
                    }
                    function makeInfoWindowEvent(map, infowindow, marker) {

                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow.open(map, marker);
                        });
                    }

                    function Place(name, latitude, longitude, description){
                        this.name = name;
                        this.latitude = latitude;
                        this.longitude = longitude;
                        this.description = description;
                    }

                    google.maps.event.addDomListener(window, 'load', initialize);
                }
            });
        </script>
        <?php //wp_head(); ?>
    </head>

    <body>
        <!--preloader-->
        <div id="preloader"></div>
        <!--MOBILE MUNU-->
        <button class="toggle_mnu"> <span class="sandwich">
<span class="sw-topper"></span> <span class="sw-bottom"></span> <span class="sw-footer"></span> </span>
        </button>
        <nav class="top_mnu">
            <!--
	<ul>
		<li>
			<a href="--//<?php echo get_blog_details(1)->siteurl; ?>/хостел/">Хостел</a>
		</li>
		<li>
			<a href="<?php echo get_blog_details(1)->siteurl; ?>/правила-проживания/">Правила проживания</a>
		</li>
		<li class="active">
			<a href="<?php echo get_blog_details(1)->siteurl; ?>/хостел/">Комнаты и цены</a>
		</li>
		<li>
			<a href="<?php echo get_blog_details(1)->siteurl; ?>/события-львова/">События Львова</a>
		</li>
		<li>
			<a href="<?php echo get_blog_details(1)->siteurl; ?>/исторические-карты">Исторические места</a>
		</li>
		<li>
			<a href="<?php echo get_blog_details(1)->siteurl; ?>/контакты/">Контакты</a>
		</li>
	</ul>
-->
            <nav class="top_mnu">
                <ul>
                    <li> <a class="hostel_h" href="<?php echo get_blog_details(1)->siteurl; ?>/хостел/">Хостел</a> </li>
                    <li> <a class="apart_h" href="<?php echo get_blog_details(1)->siteurl; ?>/апартаменты/">Апартаменты</a> </li>
                    <li> <a class="hostel_h" href="<?php echo get_blog_details(1)->siteurl; ?>/хостел/">Хостел: цены</a> </li>
                    <li> <a class="apart_h" href="<?php echo get_blog_details(2)->siteurl; ?>">Апартаменты: цены</a> </li>
                    <li> <a href="<?php echo get_blog_details(1)->siteurl; ?>/события-львова/">События Львова</a> </li>
                    <li> <a href="<?php echo get_blog_details(1)->siteurl; ?>/исторические-карты">Исторические места</a> </li>
                    <li> <a href="<?php echo get_blog_details(1)->siteurl; ?>/контакты/">Контакты</a> </li>
                </ul>
            </nav>
        </nav> <?php $temp_blog=get_current_blog_id(); switch_to_blog(1); $modal_arr=PH_Get_Modals($post->ID); switch_to_blog($temp_blog)?>
        <div id="modal_form"> <span id="modal_close">X</span>
            <div class="reserv">
                <form method="POST" action="<?php echo get_admin_url(1,'admin-post.php'); ?>">
                    <h3></h3>
                    <div class="sandbox-container">
                        <div class="input-daterange input-group datepicker">
                            <label><?=$modal_arr['modal_1_data_zaizdu']?>
                                <input type=text value="" class="input-sm form-control" name="start" readonly /> </label>
                            <label><?=$modal_arr['modal_1_data_vyizdu']?>
                                <input type=text value="" class="input-sm form-control" name="end" readonly /> </label>
                            <label><?=$modal_arr['modal_1_reserv']?>
                                <select class="input-sm form-control" name="reserv_type">
                                    <option value="1"><?=$modal_arr['modal_1_select_1']?></option>
                                    <option value="2"><?=$modal_arr['modal_1_select_2']?></option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo site_url(); ?>/rezultat-poshuku.html" class="reservation_url">
                    <input type="hidden" name="action" value="select"><input type="hidden" name="lang" value="<?=ICL_LANGUAGE_CODE?>">
                    <input type="submit" value="<?=$modal_arr['modal_1_show_button']?>" class="reservation_submit"> </form> <img class="saleFiveImg" src="/wp-content/uploads/misc/img/group.png">
                <div class="saleFive">
                    <p class="saleFiveText" style="color: #fff; font-size: 15px;">- 5 % discount for site booking</p>
                </div>
            </div>
            <!-- //reserv -->
        </div>
        <div id="overlay"></div>
        <div class="header">
            <div class="container">
                <div class="contact_info_wrap">
                    <div class="address_wrap col-md-5"></div>
                    <div class="cell_wrap col-md-6"></div>
                    <div class="lang_wrap col-md-1"></div>
                    <?
                    if ((get_current_blog_id()==1)&&(is_page(array(26,38,34)))) {
                        echo	get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'header_address_line',true).
                            get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'apart_header_address',true);
                    }else
if ((get_current_blog_id()==1)&&((is_front_page()))) {
echo	get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'header_address_line',true).
	get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'apart_header_address',true);}
    else
       if ((get_current_blog_id()==1)&&((is_singular('post')))) {
                        echo	get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'header_address_line',true).
                            get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'apart_header_address',true);
}else
if (get_current_blog_id()==1) echo get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'header_address_line',true); else
{ switch_to_blog(1);
	echo get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'apart_header_address',true);switch_to_blog(2);
}
?>
                </div>
            </div>
        </div>