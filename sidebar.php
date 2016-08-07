<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chictonic
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php $my_query = new WP_Query( 'category_name = "testimonial"' ); ?>
	<?php while ($my_query->have_posts()) : $my_query->the_post();
	get_template_part( 'template-parts/content', get_post_format() );
	?>
	<?php endwhile; ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
