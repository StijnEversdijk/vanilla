<?php
/**
 * Month View Single Day
 * This file contains one day in the month grid
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month/single-day.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
$day = tribe_events_get_current_month_day();
?>

<!-- Day Header -->
<div id="tribe-events-daynum-<?php echo $day['daynum'] ?>">

	<?php if ( $day['total_events'] > 0 && tribe_events_is_view_enabled( 'day' ) ) { ?>
		<a href="<?php echo tribe_get_day_link( $day['date'] ) ?>"><?php echo $day['daynum'] ?></a>
	<?php } else { ?>
		<?php echo $day['daynum'] ?>
	<?php } ?>

</div>

<!-- Events List -->
<div class="event-day-container">
<?php if ( $day['events']->have_posts() ) : $day['events']->the_post(); ?>
	<div class="entry-title"></div>
<?php endif; ?>
</div><!-- .event-day-container -->