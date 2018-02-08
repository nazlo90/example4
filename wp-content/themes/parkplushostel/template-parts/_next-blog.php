<?php
//get_header();
define('__tempurl__','/wp-content/uploads/misc/img/');

the_post();
?>

    <!-- header -->
    <header style="background:url(<?php echo wp_get_attachment_url(get_metadata('post', $post->ID, 'header_title', true)); ?>) no-repeat;background-size:cover;position: relative">
        <div class="view">
            <nav class="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <ul class="left">
                                <li><a href="<?php echo get_blog_details(1)->siteurl; ?>/<?=ICL_LANGUAGE_CODE?>/хостел">Хостел</a></li>
                                <li><a href="<?php echo get_blog_details(1)->siteurl; ?>/<?=ICL_LANGUAGE_CODE?>/апартаменты">Апартаменты</a></li>
                                <li><a href="<?php echo get_blog_details(1)->siteurl; ?>/<?=ICL_LANGUAGE_CODE?>/комнаты-и-цены">Хостел: цены</a></li>
                                <li><a href="<?php echo get_blog_details(2)->siteurl; ?>/<?=ICL_LANGUAGE_CODE?>">Апартаменты: цены</a></li>
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
                                    <h3>Забронировать комнату</h3>
                                    <div class="sandbox-container">
                                        <div class="input-daterange input-group">
                                            <label>Дата заезда<input type="text" value="" class="input-sm form-control" name="start" readonly=""></label>
                                            <label>Дата выезда<input type="text" value="" class="input-sm form-control" name="end" readonly=""></label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="action" value="select">
                                    <input type="hidden" name="reserv_type" value="1">
                                    <input type="hidden" value="" class="reservation_url">
                                    <input type="submit" value="показать наличие" class="reservation_submit">
                                </form>
                                <img class="saleFiveImg" src="<?php echo __tempurl__; ?>five.png">
                                <div class="saleFive"><p class="saleFiveText" style="color: #fff; font-size: 15px;">- 5 % discount for site booking</p></div>
                            </div><!-- //reserv -->
                        </div>
                    </div>
                </div>
            </div><!-- //title -->
            <div class="scroll">
                <a href="#free_services"><img src="<?php echo __tempurl__; ?>arrow_scroll.png" height="14" width="25" alt=""></a>
            </div>

        </div>
    </header>


<section class="description_place" id="free_services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php the_content(); ?>
                <a onclick="javascript:history.back();">назад</a>
            </div>
        </div>
    </div>
</section>