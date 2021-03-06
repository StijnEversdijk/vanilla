<?php
/**
 * Day View Single Event
 * This file contains one event in the day view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/day/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php

$venue_details = array();

if ( $venue_name = tribe_get_meta( 'tribe_event_venue_name' ) ) {
	$venue_details[] = $venue_name;
}

if ( $venue_address = tribe_get_meta( 'tribe_event_venue_address' ) ) {
	$venue_details[] = $venue_address;
}
// Venue microformats
$has_venue = ( $venue_details ) ? ' vcard' : '';
$has_venue_address = ( $venue_address ) ? ' location' : '';
?>

<!-- Event Title -->
<?php do_action( 'tribe_events_before_the_event_title' ) ?>
<a class="url" href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>" rel="bookmark">
	<div class="cover_image" style="background-image: url('<?php echo the_field('foto_overzichtspagina'); ?>')"></div>
</a>
<h3 class="tribe-events-list-event-title summary">
	<a class="url" href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>" rel="bookmark"><?php the_title() ?><a class="url" href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>" rel="bookmark">
</h3>
<?php do_action( 'tribe_events_after_the_event_title' ) ?>

<!-- Event Meta -->
<?php do_action( 'tribe_events_before_the_meta' ) ?>
<div class="tribe-events-event-meta

	<?php echo $has_venue . $has_venue_address; ?>">

	<!-- Schedule & Recurrence Details -->
	<div class="updated published time-details">
		<?php
		// echo tribe_events_event_schedule_details();
		?>
	</div>

	<?php if ( $venue_details ) : ?>
		<!-- Venue Display Info -->
		<!-- <div class="tribe-events-venue-details"> -->
			<?php
			 // echo implode( ', ', $venue_details );
			?>
		<!-- </div> .tribe-events-venue-details -->
	<?php endif; ?>

</div><!-- .tribe-events-event-meta -->
<?php do_action( 'tribe_events_after_the_meta' ) ?>

<!-- Event Image -->
<?php echo tribe_event_featured_image( null, 'medium' ) ?>

<!-- Event Content -->
<?php do_action( 'tribe_events_before_the_content' ) ?>
<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
	<?php echo the_field('korte_beschrijving'); ?>
	<a href="<?php echo tribe_get_event_link() ?>" class="tribe-events-read-more" rel="bookmark"><?php _e( 'Lees verder', 'tribe-events-calendar' ) ?></a>
</div><!-- .tribe-events-list-event-description -->
<?php do_action( 'tribe_events_after_the_content' ) ?>
