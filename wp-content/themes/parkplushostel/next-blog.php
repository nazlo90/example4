<?php
//get_header();
define('__tempurl__','/wp-content/uploads/misc/img/');

the_post();
?>

    <!-- header -->
    <header style="background:url(<?php echo wp_get_attachment_url(get_metadata('post', $post->ID, 'header_title', true)); ?>) no-repeat;background-size:cover;position: relative"">
        <div class="view">
            <nav class="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <ul class="left">
                                <li><a href="/хостел">Хостел</a></li>
                                <li><a href="/правила-проживания">Правила проживания</a></li>
                                <li><a href="/комнаты-и-цены">Комнаты и цены</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <div class="logo"><a href="/"><img src="<?php echo __tempurl__ ; ?>logo.png"></a></div>
                        </div>
                        <div class="col-md-5">
                            <ul class="right">
                                <li><a href="/события-львова">События Львова</a></li>
                                <li><a href="/исторические-карты">Исторические места</a></li>
                                <li><a href="/контакты">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav><!-- //.navigation -->
            <div class="title">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                           <h1><?php $title_=explode(' ', the_title());echo $title_[0]; ?></h1>

                           <h2><?php $title_[0]=''; echo implode(' ',$title_); ?></h2>

                        </div>
                        <div class="col-md-4 col-md-offset-2">
                            <div class="reserv">
                                <form method="post" action="">
                                    <h3>Забронировать комнату</h3>
                                    <div class="sandbox-container">
                                        <div class="input-daterange input-group">
                                            <label>Дата заезда<input type="text" value="" class="input-sm form-control" name="start" readonly=""></label>
                                            <label>Дата выезда<input type="text" value="" class="input-sm form-control" name="end" readonly=""></label>
                                        </div>
                                    </div>
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