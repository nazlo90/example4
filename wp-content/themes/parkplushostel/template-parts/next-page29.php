<?php
//get_header();
define('__tempurl__','/wp-content/uploads/misc/img/');
?>

    <!-- header -->
    <header class="main contact maps" style="opacity: 1; background: url('<?php echo __tempurl__ ; ?>/3.jpg') center center / cover no-repeat;">
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
            <div class="title_main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Контакты</h1>
                            <!-- .header -->
                            <div class="header">
                                <p>ул. Соломии Крушельницкой, 3, г.Львов , Украина</p>
                                <div class="contact">
                                    <span>+38(050) 606 60 16;</span>
                                    <span>+38(063) 507 49 94;</span>
                                    <span>+38(098) 712 30 30</span>
                                </div>
                            </div>
                            <!-- .//header -->
                            <div class="links">
                                <a href="/">Комнаты и цены</a>
                                <a class="popup" href="">Забронировать</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- //title -->

        </div>
    </header>

<?php
the_post();
the_content();
//get_footer();
?>