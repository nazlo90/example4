<?php
//get_header();
define('__tempurl__','/wp-content/uploads/misc/img/');
the_post();$modal_arr=PH_Get_Modals($post->ID);
?>

    <!-- header -->
    <header class="hostel" style="opacity: 1; background: url('<?php echo __tempurl__ ; ?>/3.jpg') center center / cover no-repeat;">
        <div class="view">
            <nav class="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <ul class="left">
                                <li><a class="hostel_h" href="<?php echo get_blog_details(1)->siteurl; ?>/<?=ICL_LANGUAGE_CODE?>/хостел">Хостел</a></li>
                                <li><a class="apart_h" href="<?php echo get_blog_details(1)->siteurl; ?>/<?=ICL_LANGUAGE_CODE?>/апартаменты">Апартаменты</a></li>
                                <li><a class="hostel_h" href="<?php echo get_blog_details(1)->siteurl; ?>/<?=ICL_LANGUAGE_CODE?>/комнаты-и-цены">Хостел: цены</a></li>
                                <li><a class="apart_h" href="<?php echo get_blog_details(2)->siteurl; ?>/<?=ICL_LANGUAGE_CODE?>">Апартаменты: цены</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <div class="logo"><a href="/<?=ICL_LANGUAGE_CODE?>"><img src="<?php echo __tempurl__ ; ?>logo.png"></a></div>
                        </div>
                        <div class="col-md-5">
                            <ul class="right">
                                <li><a href="<?php echo get_blog_details(1)->siteurl; ?>/<?=ICL_LANGUAGE_CODE?>/события-львова">События Львова</a></li>
                                <li><a href="<?php echo get_blog_details(1)->siteurl; ?>/<?=ICL_LANGUAGE_CODE?>/исторические-карты">Исторические места</a></li>
                                <li><a href="<?php echo get_blog_details(1)->siteurl; ?>/<?=ICL_LANGUAGE_CODE?>/контакты">Контакты</a></li>
                                <li><?php do_action('wpml_add_language_selector'); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav><!-- //.navigation -->
            <div class="title">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 style="font-size: 50px;line-height: 55px;"><?php $title_=explode(" ", $post->post_title);echo $title_[0].' '.$title_[1];?></h1>
                            <h2><?php $title_[0]='';$title_[1]=''; echo implode(' ',$title_); ?></h2>
                        </div>
                        <div class="col-md-4 col-md-offset-2">
                            <div class="reserv">
                                <form method="post" action="<?php echo get_admin_url(1,'admin-post.php'); ?>">
                                    <h3></h3>
                                    <div class="sandbox-container">
                                        <div class="input-daterange input-group">
                                            <label><?=$modal_arr['modal_1_data_zaizdu']?><input type="text" value="" class="input-sm form-control" name="start" readonly=""></label>
                                            <label><?=$modal_arr['modal_1_data_vyizdu']?><input type="text" value="" class="input-sm form-control" name="end" readonly=""></label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="action" value="select">
                                    <input type="hidden" name="reserv_type" value="<?=get_current_blog_id()?>">
                                    <input type="hidden" name="lang" value="<?=ICL_LANGUAGE_CODE?>">
                                    <input type="hidden" value="" class="reservation_url">
                                    <input type="submit" value="<?=$modal_arr['modal_1_show_button']?>" class="reservation_submit">
                                </form>
                                <? if (is_page(array(26,38,34))) {?><img class="saleFiveImg" src="<?php echo __tempurl__; ?>group.png"><?} else {?>
                                    <img class="saleFiveImg" src="<?php echo __tempurl__; ?>five.png"><?php }?>
                                <div class="saleFive"><p class="saleFiveText" style="color: #fff; font-size: 15px;">- 5 % discount for site booking</p></div>
                            </div><!-- //reserv -->
                        </div>
                    </div>
                </div>
            </div><!-- //title -->
            <div class="scroll">
                <a href="#free_services"><img src="<?php echo __tempurl__ ; ?>arrow_scroll.png" height="14" width="25" alt=""></a>
            </div>
        </div>
    </header>

<?php
the_content();
//get_footer();
?>