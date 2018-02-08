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
<header class="header_slider_" style="background:url(<?php echo wp_get_attachment_url(get_metadata('post', $post->ID, 'header_title', true)); ?>) no-repeat;background-size:cover;position: relative">
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
        <div class="title">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 style="font-size: 50px;line-height: 55px;"><?php $title_=explode(" ", $post->post_title);echo $title_[0];//.' '.$title_[1];?></h1>
                        <h2><?php $title_[0]='';//s$title_[1]='';
                            echo implode(' ',$title_); ?></h2>
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
            <a href="#free_services"><img src="<?php echo __tempurl__; ?>arrow_scroll.png" height="14" width="25" alt=""></a>
        </div>

    </div>
</header>


<section class="description_place" id="free_services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php the_content(); ?>
                <a onclick="window.history.back();"><img class="goback" src="/wp-content/uploads/img/go-back-arrow.svg"></a>
            </div>
        </div>
    </div>
</section>