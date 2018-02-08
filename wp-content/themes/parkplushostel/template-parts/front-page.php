<?php
//get_header();
define('__tempurl__','/wp-content/uploads/misc/img/');
$temp_blog_id=get_current_blog_id();
//if (get_the_ID()!=2) switch_to_blog(1);

the_post();$modal_arr=PH_Get_Modals($post->ID);
PH_get_header_images($post->ID);
if (ICL_LANGUAGE_CODE!='ru')
    $lang='/'.ICL_LANGUAGE_CODE;
?>

    <!-- header -->
    <header class="main">
        <video autoplay="" loop="" muted="" class="bgvideo" id="bgvideo">
            <source src="/wp-content/uploads/misc/video_bg.mp4" type="video/mp4">
        </video>
        <div class="view">
            <nav class="navigation">
                <div class="container">
                    <div class="row">
                     <?php  if (get_current_blog_id()==1) {
                         $temp=str_replace('<?=$lang?>',ICL_LANGUAGE_CODE,get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'menu_s',true));
                         echo str_replace('<?php echo __tempurl__ ; ?>',__tempurl__,$temp);} else
                     {   switch_to_blog(1);
                         $temp=get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'menu_s',true);
                         $temp=str_replace('<?php echo __tempurl__ ; ?>',__tempurl__,$temp);
                         $temp=str_replace('logo.png','logo.png',$temp);
                         echo str_replace('class="logo"','class="logo apart"',$temp);
                         switch_to_blog(2);
                     } ?>
                    </div>
                </div>
            </nav><!-- //.navigation -->
            <div class="title_main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 style="font-size: 50px;line-height: 55px;"><?php $title_=explode(" ", get_the_title());echo $title_[0].$title_[1];?></h1>
                            <h2><?php $title_[0]='';$title_[1]=''; echo implode(' ',$title_); ?></h2>
                            <div class="links">
                                <a href="<?php echo get_blog_details(2)->siteurl; ?>/<?=ICL_LANGUAGE_CODE?>">Апартаменты</a>
                                <a style="background: #f7c44e; color: #000"
                                   onmouseover="this.style='background: #2c5286; color: #fff';"
                                   onmouseout="this.style='background: #f7c44e; color: #000';"
                                   href="<?php echo get_blog_details(1)->siteurl; ?>/<?=ICL_LANGUAGE_CODE?>/комнаты-и-цены">Комнаты и цены</a>
                                <a class="popup" href=""><?=$modal_arr['modal_2_button']?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- //title -->
        </div><!-- //view -->
    </header><!-- //header -->
    <div class="top"></div>
<?php
//get_footer();
?>