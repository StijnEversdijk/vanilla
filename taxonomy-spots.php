<?php get_header(); ?>

<?php include 'inc/masthead.php' ?>

<section class="inner">
<header class="filter-container">
  <div id="filters">
  <?php $filters = get_terms('spots');
  foreach($filters as $filter) {

  }
  ?>
  <?php
  $term = $wp_query->queried_object;
  $taxonomyName = "spots";
  //This gets top layer terms only.  This is done by setting parent to 0.
  $parent_terms = get_terms($taxonomyName, array('slug' => $term->slug, 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => false));
  echo '<div class="ui-group">'; ?>

  <?php echo '<div class="button-group" data-filter-group="spots">';
  foreach ($parent_terms as $pterm) {
      // Get the Child terms
      $terms = get_terms($taxonomyName, array('parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false));
      foreach ($terms as $term) {
          echo '<button class="button" data-filter=".' . $term->slug . '">' . $term->name . '</button>';
      }
  }

  echo '<button class="button is-checked" data-filter="*">Laat alles zien</button>';
  echo '</div>'; ?>

  <div class="filter-text">
    <h3><a href="#">Ik ben op zoek naar</a></h3>
  </div><!-- .filter-text -->

  <?php echo '</div>';


  // if(is_tax('spots','proeft')) {

  // $aanvullend = 'aanvullend';
  // $aanvullend_terms = get_terms($aanvullend, array('orderby' => 'slug', 'hide_empty' => false));

  // echo '<div class="ui-group">'; ?>

<!--   <div class="filter-text">
    <h4><a href="#">En het liefste ook</a></h4>
  </div> --><!-- .filter-text -->

  <?php
   // echo '<div id="filters" class="button-group" data-filter-group="aanvullend">';

    // foreach($aanvullend_terms as $aterm) {
      // echo '<button class="button" data-filter=".' . $aterm->slug . '">' . $aterm->name . '</button>';
    // }

  // echo '<button class="button is-checked" data-filter="*">Laat alles zien</button>';
  // echo '</div>';
  // echo '</div>';
  ?>
  </div>

  <?php
// } ?>
  <!-- <div id="filters">
    <div class="button-group js-radio-button-group" data-filter-group="color">
      <button class="button is-checked" data-filter="">any</button>
      <button class="button" data-filter=".red">red</button>
      <button class="button" data-filter=".blue">blue</button>
      <button class="button" data-filter=".yellow">yellow</button>
    </div>

    <div class="button-group js-radio-button-group" data-filter-group="shape">
      <button class="button is-checked" data-filter="">any</button>
      <button class="button" data-filter=".round">round</button>
      <button class="button" data-filter=".square">square</button>
    </div>
  </div> -->


  </header>

  <section class="loop">
    <div class="isotope">
<?php
  $term = $wp_query->queried_object;

  $args = array(
  'post_type' => 'spot',
  'orderby' => 'rand',
  'posts_per_page' => -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'spots',
      'field'    => 'slug',
      'terms'    => $term,
    ),
  ),
  );

  $the_query = new WP_Query( $args );

  // The Loop
  if ( $the_query->have_posts() ) {
      while ( $the_query->have_posts() ) {
        $the_query->the_post(); ?>

          <?php $terms = get_the_terms( $post->ID, 'spots' ); ?>
          <?php $aterms = get_the_terms( $post->ID, 'aanvullend' ); ?>

          <article class="element-item company <?php foreach( $aterms as $aterm ) { echo  $aterm->slug . ' '; } ?> <?php foreach( $terms as $term ) { echo  $term->slug . ' '; } ?>">
           <a href="<?php echo get_permalink($post->ID); ?>">
             <div class="cover-image" style="background-image: url('<?php echo the_field('foto_overzichtspagina'); ?>')"></div>
             <h3><?php echo get_the_title(); ?></h3>
              <?php $terms = get_the_terms( $post->ID, 'spots' ); ?>
              <?php $aterms = get_the_terms( $post->ID, 'aanvullend' ); ?>
             <?php the_field('korte_beschrijving'); ?>
           </a>
         </article>
    <?php }
  } else {
    // no posts found
  }

  /* Restore original Post Data */
  wp_reset_postdata();
?>



    </div><!-- .isotope -->
  </section><!-- .loop -->

</section><!-- .inner -->

<?php get_footer(); ?>