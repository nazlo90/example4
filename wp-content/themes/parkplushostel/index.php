<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Park_plus_hostel
 * @since Park_plus_hostel 1.0
 */
if (is_404()){wp_redirect('/');
	exit;}
if (get_current_blog_id()==1) {


	if (is_front_page() && is_home()) {
		//get_header('home');
		//echo "Hello world";
		// Default homepage
		//get_template_part( 'content', 'none' );
	} elseif (is_front_page()) {
		// static homepage
		get_header();
		get_template_part('template-parts/front', 'page');
	} elseif (is_home()) {
		//============================================================================
		//echo "home";
		//get_template_part( 'template-parts/next', 'page' );
	} elseif (is_page()) {
		if (is_page(array(26,38,34))) {get_header();
			get_template_part('template-parts/next', 'apart');}
		else
			if (is_page(WPML_HR(36,ICL_LANGUAGE_CODE))) {get_header();
				get_template_part('template-parts/next', 'apart-apart1');}
		else {get_header('hostel');
			get_template_part('template-parts/next', 'apart');}
		//else

			////get_template_part( 'template-parts/front', 'page' );
			//get_template_part('template-parts/next', 'page');
		//everything else
	} else {
		get_header();
		get_template_part('template-parts/next', 'blog');
	}
	//get_sidebar();
	get_footer();
}
else if (get_current_blog_id()==2)
{ 
	get_header('apart');
	get_template_part('template-parts/next', 'apart-apart');
	get_footer();
}
?>
