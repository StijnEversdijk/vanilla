<div class="items">
<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @return string
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

//Check if any posts were found
if ( $posts ) {
	?>
		<?php
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			?>
			<div class="agenda-item tribe-events-list-widget-events <?php tribe_events_event_classes() ?>">

				<?php do_action( 'tribe_events_list_widget_before_the_event_title' ); ?>
				<!-- Event Title -->
				<a href="<?php echo tribe_get_event_link(); ?>"><div style="background-image: url(<?php echo the_field('cover_image'); ?>);"class="featured-image"></div></a>
				<h5 class="entry-title summary">
					<a href="<?php echo tribe_get_event_link(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h5>

				<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>
				<!-- Event Time -->

				<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>

				<div class="duration">
					<?php echo tribe_events_event_schedule_details(); ?>
				</div>

				<?php do_action( 'tribe_events_list_widget_after_the_meta' ) ?>


			</div>
		<?php
		endforeach;
		?>

	<?php
	//No Events were Found
} else {
	?>
	<p><?php _e( 'There are no upcoming events at this time.', 'tribe-events-calendar' ); ?></p>
<?php
}
?>
</div>

	<p class="tribe-events-widget-link">
		<a class="inline-link" href="<?php echo tribe_get_events_link(); ?>" rel="bookmark"><?php _e( 'Bekijk de volledige agenda', 'tribe-events-calendar' ); ?></a>
	</p>


