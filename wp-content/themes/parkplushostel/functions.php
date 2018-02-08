<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
add_theme_support( 'post-thumbnails' );

function register_theme_sidebar()
{

    register_sidebar(array(
        'name' => 'sidebar-1',
        'id' => 'sidebar-1',
        'description' => '1 column',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title'=>'',
        'after_title'=>'',
    ),
        array(
            'before_widget' => '',
            'after_widget' => '',

        )
    );
    register_sidebar(array(
        'name' => 'Sidebar-2',
        'id' => 'sidebar-2',
        'description' => '2 column',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
    ));
    register_sidebar(array(
        'name' => 'Sidebar-3',
        'id' => 'sidebar-3',
        'description' => '3 column',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
    ));
    register_sidebar(array(
        'name' => 'Sidebar-4',
        'id' => 'sidebar-4',
        'description' => '4 column',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
    ));

}

add_action('widgets_init', 'register_theme_sidebar');

function PH_Get_Modals($id=0)
{ if ($id>0)
   return  array(
       'modal_1_data_zaizdu'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_1_data_zaizdu',true),
       'modal_1_data_vyizdu'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_1_data_vyizdu',true),
       'modal_1_reserv'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_1_reserv',true),
       'modal_1_select_1'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_1_select_1',true),
       'modal_1_select_2'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_1_select_2',true),
       'modal_1_show_button'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_1_show_button',true),
       'modal_2_room_type'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_2_room_type',true),
       'modal_2_aparture'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_2_aparture',true),
       'modal_2_departure'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_2_departure',true),
       'modal_2_time_in'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_2_time_in',true),
       'modal_2_out'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_2_out',true),
       'modal_2_peoples'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_2_peoples',true),
       'modal_2_name'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_2_name',true),
       'modal_2_lastname'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_2_lastname',true),
       'modal_2_phone'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_2_phone',true),
       'modal_2_button'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_2_button',true),
       'modal_2_err'=>get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_2_err',true)
       );
    else return false;
}

function PH_get_rooms ()
{
    global $post;
    $args = array(  'category_name' => 'rooms_and_prices','posts_per_page'   => 100500, 'orderby'=>'meta_value', 'meta_key'=>'sort_order', 'order'=>'ASC' );
    $posts = get_posts( $args );

foreach ($posts as $data)
{
 ?> <option value="<?php echo $data->ID; ?>"><?php echo $data->post_title; ?></option> <?php
}
}

function PH_get_aparts ()
{
    global $post;
    $args = array(  'category_name' => 'apart','posts_per_page'   => 100500, 'orderby'=>'meta_value', 'meta_key'=>'sort_order', 'order'=>'ASC' );
    $temp_blog_id=get_current_blog_id();
    switch_to_blog(1);
    $posts = get_posts( $args );

    foreach ($posts as $data)
    {
        ?> <option value="<?php echo $data->ID; ?>"><?php echo $data->post_title; ?></option> <?php
    }
    switch_to_blog($temp_blog_id);
}

function PHGetBlog ($atts)
{
    extract( shortcode_atts( array(
        'type' => ''
    ), $atts ) );


    global $post;
    $args = array(  'category_name' => $type,'posts_per_page'   => 100500, 'orderby'=>'ID', 'order'=>'ASC' );
    $temp_blog_id=get_current_blog_id();
    switch_to_blog(1);
    $posts = get_posts( $args );

?>
    <section class="history_places" id="free_services">
        <ul>
    <?php
    foreach ($posts as $data)
    {
        ?>
        <li><a href="<?=get_permalink( $data->ID);?>">
                <img src="<?=wp_get_attachment_url(get_metadata('post',$data->ID, 'header_title', true))?>" style="width: 100%;" alt="place">
                <div>
                    <h4><?=$data->post_title?></h4>
                    <p><?=get_metadata('post',$data->ID,'short_description',true)?></p>
                </div>
            </a>
        </li>
        
        <?php
    }
    ?>
    </ul>
    </section>
    <?php
    switch_to_blog($temp_blog_id);
}
add_shortcode( 'GetBlog', 'PHGetBlog');

function PH_get_images($id,$small=0)
{
    $temp=explode(',',get_metadata('post', $id, 'gallery_hostel', true));
foreach ($temp as $data){

 ?><div><img src="<?php
    if ($small==1)echo wp_get_attachment_thumb_url($data); else
        echo wp_get_attachment_url($data); ?>"></div><?php
}

}

function PH_get_header_images($id)
{
?>
    <script>
$(document).ready(function(){
        if($(".header_slider_").length>0) {
            var images = [];

                <?php
                $temp = explode(',', get_metadata('post', $id, 'header_title', true));
                foreach ($temp as $data) {
                    echo "images.push('" . wp_get_attachment_url($data) . "');";
                }
                ?>

            if (images.length > 0) {
                var i = 0;
               // var i_l = 0;
                var i_i = 0;
                //if (images.length > 3) i_l = 2;
                for (a = 0; a < 3; a++) {
                    $('body').append("<img style='position:fixed; left:-1000000px;' src='" + images[a] + "' />");i_i=a;
                }

                setInterval(function () {
                    $('.header_slider_').animate({'opacity': '1'}, 1, function () {
                        if (i >= images.length-1) {
                            i = -1;
                        }
                       i = i + 1;
                        if (i_i >= images.length-1) {
                            i_i = -1;
                        }
                        i_i = i_i + 1;
                        
                        $('body').append("<img style='position:fixed; left:-1000000px;' src='" + images[i_i] + "' />");
                        $(this).css('background', 'url(' + images[i] + ') no-repeat center center / cover').animate({'opacity': '1'}, 1);
                    });
                }, 3000);
            }
        }
    else {
            $('body').append("<img style='position:fixed; left:-1000000px;' src='" + images[0] + "' />");
            $('.header_slider_').css('background', 'url(' + images[0] + ') no-repeat center center / cover').animate({'opacity': '1'}, 1);

        }
    });
</script>
<?

}

function PH_get_apart_images($id){
    $temp=explode(',',get_metadata('post', $id, 'gallery_hostel', true));
            ?>

        <div class="image normal">
            <img class="normal" src="<?php echo wp_get_attachment_thumb_url($temp[0]); ?>" alt="">
        </div>
        <div class="image small">
            <img class="small" src="<?php echo wp_get_attachment_thumb_url($temp[1]); ?>" alt="">
        </div>
        <div class="image small">
            <img class="small" src="<?php echo wp_get_attachment_thumb_url($temp[2]); ?>" alt="">
        </div>
        <div class="image big">
            <img class="big" src="<?php echo wp_get_attachment_thumb_url($temp[3]); ?>" alt="">
        </div>
        <?php

}

add_shortcode( 'GetRoom', 'PH_get_room_list');
function PH_get_room_list($atts)
{
   // $a = shortcode_atts( array(
   //     'type' => 'something',
   //      ), $atts );

    extract( shortcode_atts( array(
        'type' => ''
    ), $atts ) );
    $temp_blog_id=get_current_blog_id();
    switch_to_blog(1);
    global $post;
    $args = array(
        'category_name' => $type,
        'posts_per_page'   => 500, 
        'orderby'=>'meta_value', 
        'meta_key'=>'sort_order', 
        'order'=>'ASC');
    
    $posts = get_posts( $args );

    if ($type=='apart') {
        ?>

        <section id="free_services" class="">
           <?php foreach ($posts as $post) { ?>
             <div class="section_height">
                <div class="big_side">
                    <div class="img_box">
                      <?php  PH_get_apart_images($post->ID); ?>
                    </div>
                </div>
                <div class="small_side">
                    <div class="text_wrap">
                        <div>
                            <p class="apart_header"><?php echo $post->post_title; ?></p>
                            <p class="apart_description"><?php echo $post->post_content; ?></p>

                        </div>
                        <div>
                            <a href="#"
                               class="order <?php if (isset($_GET['start']) and ($_GET['start'] != '')) echo "reserv_go"; else echo "popup" ?>"><?=get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_2_button',true)?></a>
                            <input class="room_reservation_type" type="hidden" value="1">
                            <input class="room_id" type="hidden" value="<?php echo $post->ID; ?>">
                            <input class="room_title" type="hidden" value="Приватная двухместная комната с санузлом">
                            <input class="room_free" type="hidden" value="2">
                            <input class="room_room_number" type="hidden" value="1">
                        </div>
                    </div>
                </div>
            </div>
           <?php } ?>
        </section>

        <?php
    } else {
        ?>

        <section id="free_services" class="rooms">
            <ul>
                <?php
                foreach ($posts as $post) {
                    ?>
                    <li class="clearfix">
                        <style>
                            div[id=sync1_<?=$post->ID?>] .owl-item {
                                -webkit-border-radius: 3px;
                                -moz-border-radius: 3px;
                                text-align: center;
                                cursor: pointer;
                                width: 95%;
                                height: auto;
                            }

                            div[id=sync2_<?=$post->ID?>] .owl-item {
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
                            $(document).ready(function(){
                                var sync1<?=$post->ID?> = $("div[id=sync1_<?=$post->ID?>]");
                                var sync2<?=$post->ID?> = $("div[id=sync2_<?=$post->ID?>]");
                                sync1<?=$post->ID?>.owlCarousel({
                                    singleItem: true
                                    , slideSpeed: 1000
                                    , navigation: true
                                    , pagination: false
                                    , afterAction: syncPosition
                                    , responsiveRefreshRate: 200
                                    , navigation: false
                                    , });
                                sync2<?=$post->ID?>.owlCarousel({
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
                                    $("div[id=sync2_<?=$post->ID?>]").find(".owl-item").removeClass("synced").eq(current).addClass("synced")
                                    if ($("div[id=sync2_<?=$post->ID?>]").data("owlCarousel") !== undefined) {
                                        center(current)
                                    }
                                }
                                $("div[id^=sync2_<?=$post->ID?>]").on("click", ".owl-item", function (e) {
                                    e.preventDefault();
                                    var number = $(this).data("owlItem");
                                    sync1<?=$post->ID?>.trigger("owl.goTo", number);
                                });

                                function center(number) {
                                    var sync2<?=$post->ID?>visible = sync2<?=$post->ID?>.data("owlCarousel").owl.visibleItems;
                                    var num = number;
                                    var found = false;
                                    for (var i in sync2<?=$post->ID?>visible) {
                                        if (num === sync2<?=$post->ID?>visible[i]) {
                                            var found = true;
                                        }
                                    }
                                    if (found === false) {
                                        if (num > sync2<?=$post->ID?>visible[sync2<?=$post->ID?>visible.length - 1]) {
                                            sync2<?=$post->ID?>.trigger("owl.goTo", num - sync2<?=$post->ID?>visible.length + 2)
                                        }
                                        else {
                                            if (num - 1 === -1) {
                                                num = 0;
                                            }
                                            sync2<?=$post->ID?>.trigger("owl.goTo", num);
                                        }
                                    }
                                    else if (num === sync2<?=$post->ID?>visible[sync2<?=$post->ID?>visible.length - 1]) {
                                        sync2<?=$post->ID?>.trigger("owl.goTo", sync2<?=$post->ID?>visible[1])
                                    }
                                    else if (num === sync2<?=$post->ID?>visible[0]) {
                                        sync2<?=$post->ID?>.trigger("owl.goTo", num - 1)
                                    }
                                }
                            });

                        </script>
                        <div class="room_slide">
                            <div class="" id="sync1_<?php echo $post->ID; ?>" val_id="<?php echo $post->ID; ?>">

                                <?php PH_get_images($post->ID); ?>

                            </div>


                            <div id="sync2_<?php echo $post->ID; ?>" val_id="<?php echo $post->ID; ?>">
                                <?php PH_get_images($post->ID,1); ?>
                            </div>


                        </div>
                        <div class="room_about">
                            <h3><?php echo $post->post_title; ?></h3>
                            <div class="line"></div>
                            <?php echo $post->post_content; ?>
                            <a href="#"
                               class="<?php if (isset($_GET['start']) and ($_GET['start'] != '')) echo "reserv_go"; else echo "popup" ?>"><?=get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'modal_2_button',true)?></a>
                            <input class="room_reservation_type" type="hidden" value="1">
                            <input class="room_id" type="hidden" value="<?php echo $post->ID; ?>">
                            <input class="room_title" type="hidden" value="Приватная двухместная комната с санузлом">
                            <input class="room_free" type="hidden" value="2">
                            <input class="room_room_number" type="hidden" value="1">
                        </div>
                        <input type="hidden" id="sr" value="1"><p>&nbsp;</p>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </section> <?php
    }
    switch_to_blog($temp_blog_id);
}

function example_add_dashboard_widgets() {

    wp_add_dashboard_widget(
        'example_dashboard_widget',         // Widget slug.
        'інструкція для цього сайту',         // Title.
        'example_dashboard_widget_function' // Display function.
    );
}
add_action( 'wp_dashboard_setup', 'example_add_dashboard_widgets' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function example_dashboard_widget_function() {

 ?>
 
 <a href="<?=get_stylesheet_directory_uri()?>/readme.doc">Інструкція для данного сату  </a>
<?php
}
