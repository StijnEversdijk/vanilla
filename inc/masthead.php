<?php
if ( is_front_page() ) { ?>
  <section class="masthead big" style="background-image: url(<?php echo the_field('masthead_tax', 'option'); ?>)">
  </section><!-- .masthead -->
<?php } elseif ( is_home() ) { ?>
  <section class="masthead small" style="background-image: url(<?php echo the_field('blog_masthead', 'option'); ?>)">
    <div class="inner"><h2>Blog</h2></div>
  </section><!-- .masthead -->
  <?php } elseif ( is_search() ) { ?>
  <section class="masthead search small">
    <div class="inner"><h2>Zoeken</h2></div>
  </section><!-- .masthead -->
<?php } elseif ( is_page( 'over-do' ) ) { ?>
  <section class="masthead big" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/mastheads/over-do.jpg)"><div class="inner"><h2><?php echo the_title(); ?></h2></div></section>
<?php } elseif ( is_singular( 'post' ) ) { ?>
  <section class="masthead big" style="background-image: url(<?php echo the_field('cropped_image'); ?>)"><div class="inner"><h2><?php echo the_title(); ?></h2></div></section>
<?php } elseif ( is_page_template( 'page-fulltext.php' ) ) { ?>
  <section class="masthead big" style="background-image: url(<?php echo the_field('cropped_image'); ?>)"><div class="inner"><h2><?php echo the_title(); ?></h2></div></section>
<?php } elseif ( is_tax( 'spots', 'do-proeft') ) { ?>
  <section class="masthead big" style="background-image: url(<?php echo the_field('do_proeft_masthead', 'option'); ?>)"><div class="inner"><h2>Do Proeft</h2></div></section>
<?php } elseif ( is_tax( 'spots', 'do-shopt') ) { ?>
  <section class="masthead big" style="background-image: url(<?php echo the_field('do_shopt_masthead', 'option'); ?>)"><div class="inner"><h2>Do Shopt</h2></div></section>
<?php } elseif ( is_tax( 'spots', 'dordt-design') ) { ?>
  <section class="masthead big" style="background-image: url(<?php echo the_field('dordt_design_masthead', 'option'); ?>)"><div class="inner"><h2>Dordt Design</h2></div></section>
<?php } elseif ( is_tax( 'spots', 'do-ontdekt') ) { ?>
  <section class="masthead big" style="background-image: url(<?php echo the_field('do_ontdekt_masthead', 'option'); ?>)"><div class="inner"><h2>Do Ontdekt</h2></div></section>
<?php } elseif ( is_tax( 'spots', 'do-slaapt') ) { ?>
  <section class="masthead big" style="background-image: url(<?php echo the_field('do_slaapt_masthead', 'option'); ?>)"><div class="inner"><h2>Do Slaapt</h2></div></section>
<?php } elseif ( is_singular( 'spot' ) ) { ?>
  <section class="masthead huge" style="background-image: url(<?php echo the_field('cropped_image'); ?>)">
    <div class="inner">
      <h2><?php the_title(); ?></h2>
    </div>
</section>
<?php } ?>