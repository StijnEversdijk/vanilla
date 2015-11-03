<?php
/**
 * Month View Template
 * The wrapper template for month view.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php do_action( 'tribe_events_before_template' ) ?>

<?php $terms = get_terms('tribe_events_cat', array('hide_empty' => true)); ?>

<?php if (!empty($terms) && !is_wp_error($terms)): ?>

  <aside class="agenda-filter">
    <ul>
      <li class="active"><a id="all" href="<?php echo home_url(); ?>/events/">Laat alles zien</a></li>
      <?php foreach ($terms as $term): ?>
        <?php $parent = $term->parent;
          if ( $parent=='0' ){ ?>
            <li><a id="<?php echo $term->slug; ?>" href="<?php echo home_url(); ?>/events/category/<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
          <?php } ?>
      <?php endforeach; ?>
    </ul>
  </aside>
  <div class="filter-text">
    <h3><a href="#">Ik ben op zoek naar</a></h3>
  </div><!-- .filter-text -->

<?php endif; ?>


<!-- Main Events Content -->

<?php tribe_get_template_part( 'month/content' ); ?>

<?php rewind_posts(); ?>

<div class="list-view grid">

  <?php
    global $post;

    $current_month = date('M'); // This gets the current month
    $current_year = date('Y'); // This gets the current year

    $all_events = tribe_get_events(
      array(
        'start_date'     => '01 '.$current_month.' ' .$current_year,
        'end_date'       => '31 '.$current_month.' ' .$current_year,
        'eventDisplay'   => 'upcoming',
        'posts_per_page' => -1 // no no, no no no no, no no there's no limit!
        )
    );
    foreach($all_events as $post) {
      setup_postdata($post);
  ?>

  <div class="agenda-item element-item <?php tribe_events_event_classes(); ?>">

    <div id="post-<?php the_ID() ?>">
      <a class="url" href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>"><div class="cover_image" style="background-image: url('<?php the_field('foto_overzichtspagina'); ?>')"></div></a>
      <h3 class="tribe-events-list-event-title summary"><a class="url" href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>" rel="bookmark"><?php the_title(); ?></a></h3>

      <div class="time">
        <span class="event-date"><a href="<?php the_permalink(); ?>"><?php echo tribe_get_start_date($post->ID, true, 'l j F Y'); ?></a></span>
        <?php $start = tribe_get_start_time();
          if($start) { ?>
            <span class="event-time"> <?php echo tribe_get_start_time(); ?></span>
        <?php } ?>

        <?php $end = tribe_get_end_time();
          if($end) { ?>
            <span class="event-time end-time"><?php echo tribe_get_end_time(); ?></span>
        <?php } ?>

      </div><!-- .time -->

      <div class="event-excerpt">
        <a class="url" href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>"><?php echo the_field('korte_beschrijving'); ?></a>
      </div>

      <div class="event-details">
        <span><a href="<?php echo the_field('company_link'); ?>"><?php echo tribe_get_venue() ?></a>, </span>
        <span>Adres: <?php echo tribe_get_address(); ?>, </span>
        <span class="cost">Entree: <?php echo tribe_get_cost(); ?></span>
      </div>

      </div><!-- #post -->
    </div><!-- .agenda-item -->


    <?php } //endforeach ?>
          <?php wp_reset_query(); ?>
  </div>

  <div class="sidebar-extra">
    <h3><a href="#">Of kies een dag</a></h3>
    <a class="mail" href="http://www.doindordt.nl/jouwevenement">Jouw evenement toevoegen?</a>
  </div>
