<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Park_plus_hostel
 * @since Park_plus_hostel 1.0
 */
$temp_blog_id=get_current_blog_id();
switch_to_blog(1); $modal_arr=PH_Get_Modals(2); switch_to_blog($temp_blog);
?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="social">
					<a href="https://www.facebook.com/parkplushostel/?fref=ts"><img src="/wp-content/uploads/img/facebook.png.pagespeed.ce.Cgn4TaUqJR.png" alt=""></a>
					<a href="https://www.instagram.com/parkplus_hostel/"><img src="/wp-content/uploads/img/instagram.png.pagespeed.ce.Zpm3MkL-QX.png" alt=""></a>
					<a href="https://vk.com/hostelparkplus"><img src="/wp-content/uploads/img/vk.png.pagespeed.ce.jE0YHOtn6p.png" alt=""></a>
					<a><img src="/wp-content/uploads/img/google.png.pagespeed.ce.1tvKPFRsLV.png" alt=""></a>
				</div>
				<p>2015 - <?php switch_to_blog(1); echo date("Y"); ?> <?=get_option('blogname')?>.<?=get_metadata('post',WPML_HR(2,ICL_LANGUAGE_CODE),'footer_copyright_line',true)?><?php switch_to_blog($temp_blog_id)?></p>
			</div>
		</div>
	</div>
</footer>
<!-- modal -->
<div id="reserv_form">
	<span id="reserv_close">X</span>
	<div class="reserv">
		<h3></h3>
		<div class="reserv_data_area">
			<div class="sandbox-container">
				<form method="POST" action="<?php echo get_admin_url(1,'admin-post.php'); ?>" class="reserv_form">
					<div class="error" style="color:#F5B31D">
						<span><?=$modal_arr['modal_2_err']?></span>
					</div>
					<div>
						<span class="field_name_column"><?=$modal_arr['modal_2_room_type']?></span>
						<div class="field_value_column">
							<select>
								<?php
								if (get_current_blog_id()==1)
								PH_get_rooms(); else {echo "aparts";PH_get_aparts();}
								?>
							</select>
						</div>
					</div>
					<div class="clr"></div>
					<div class="field_date_column">
						<span><?=$modal_arr['modal_2_aparture']?> <input type="text" value="<?php if ( isset($_GET['start']) and strtotime($_GET['start'])) echo $_GET['start']; ?>" class="input-sm form-control" name="start" readonly></span><br/>
						<span><?=$modal_arr['modal_2_departure']?> <input type="text" value="<?php if ( isset($_GET['end']) and strtotime($_GET['end'])) echo $_GET['end']; ?>" class="input-sm form-control" name="end" readonly></span><br/>
					</div>
					<div class="field_time_column">
						<span><?=$modal_arr['modal_2_time_in']?> <input type="text" name="time_start" class="time_start" value=""/></span><br/>
						<span><?=$modal_arr['modal_2_out']?> <input type="text" name="time_end" class="time_end" value=""/></span><br/>
					</div>
					<div class="clr"></div>
					<div class="reverse">
						<span class="field_name_column"><?=$modal_arr['modal_2_peoples']?></span>
						<div class="field_value_column">
							<input class="field_value_column count_people" type="text" name="count_people" value=""/>
						</div>
						<span class="field_name_column"><?=$modal_arr['modal_2_name']?></span>
						<div class="field_value_column">
							<input class="field_value_column name" type="text" name="name" value=""/>
						</div>
						<span class="field_name_column"><?=$modal_arr['modal_2_lastname']?></span>
						<div class="field_value_column">
							<input class="field_value_column email" type="text" name="email" value=""/>
						</div>
						<span class="field_name_column"><?=$modal_arr['modal_2_phone']?></span>
						<div class="field_value_column">
							<input class="field_value_column phone" type="text" name="phone" value=""/>
						</div>
					</div>
					<div style="clear: both;"></div>
					<div class="reverse">
						<input class="reserv_room_type" name="reserv_room_type" type="hidden" value=""/>
						<input class="reserv_room_id" name="reserv_room_id" type="hidden" value=""/>
						<input class="reserv_room_title" name="reserv_room_title" type="hidden" value=""/>
						<input class="reserv_room_free" name="reserv_room_free" type="hidden" value=""/>
						<input class="reserv_room_number" name="reserv_room_number" type="hidden" value=""/>
						<input type="hidden" name="action" value="reserve">
						<div id="reservation_form_submit_conteiner" style="position: relative;height: 55px;margin: 30px 0;">
							<input type="submit" class="reservation_form_submit button_overlay" style="margin-top: 0px;" name="reservation_form_submit" value="<?=$modal_arr['modal_2_button']?>">
						</div>
					</div>
					<div style="clear: both;"></div>
					<input type="hidden" name="lang" value="<?=ICL_LANGUAGE_CODE?>">
				</form>
			</div>
		</div>
	</div><!-- //reserv -->
</div>
<div id="overlay_reserv"></div>
<!-- Scripts -->
<script src='/wp-content/uploads/misc/js/bootstrap-datepicker.js'></script>
<script src='/wp-content/uploads/misc/js/bootstrap-datepicker.ru.min.js'></script>
<script type="text/javascript">$('.sandbox-container .input-daterange').datepicker({language:"ru",orientation:"bottom auto",autoclose:true,todayHighlight:true,format:'dd-mm-yyyy',toggleActive:true,startDate:'0d'});</script>
<script src='/wp-content/uploads/misc/slick/slick.min.js'></script>
<!--<script src='/wp-content/uploads/misc/js/common.js' type="text/javascript"></script>-->
<?php wp_footer(); ?>
</body>
</html>

