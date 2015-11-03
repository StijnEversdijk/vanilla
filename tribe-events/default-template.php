<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header(); ?>

<?php if(is_single()){ ?>
  <section style="background-image:url('<?php echo the_field('cropped_image'); ?>');" class="masthead big">
    <div class="inner">
      <?php the_title( '<h2 class="tribe-events-single-event-title summary entry-title">', '</h2>' ); ?>
    </div>
  </section>
<?php } else { ?>

<section class="masthead small" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/mastheads/agenda.jpg)">
  <div class="inner"><h2>Agenda</h2></div>
</section><!-- .masthead -->

<?php } ?>

	<div id="tribe-events-pg-template">
    <div class="inner">
		<?php tribe_get_view(); ?>
		<?php tribe_events_after_html(); ?>
    </div>
	</div> <!-- #tribe-events-pg-template -->
<?php get_footer(); ?>