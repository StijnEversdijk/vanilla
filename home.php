<?php get_header(); ?>

<?php include 'inc/masthead.php' ?>

<section class="inner">

  <?php

    $authors = get_users('who=authors');
    foreach ($authors as $author) {
      echo '<span>' . esc_html( $author->user_nicename ) . '</span>';
    }

  ?>

  <!-- <section class="author-filter">
    <img src="img/filter-text.png" srcset="img/filter-text.png 1x, img/filter-text@2x.png 2x" />

    <a class="delete-filter" href="#">Verwijder Filter</a>

    <div class="author do">
      <h3>Dominique</h3>
      <div class="tooltip">
        <p>
          Dominique is 28, werkt als productontwikkelaar en blogt vooral over leuke shops.
        </p>
      </div><!-- .tooltip
    </div><!-- .author

  </section><!-- .author-filter -->

  <section class="loop">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article class="article-template">
      <header>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <span class="category"><?php the_category(', '); ?></span>
      </header>

      <div style="background-image: url(<?php echo the_field('cropped_image'); ?>)" class="featured-image"><a class="image-article-link" href="<?php the_permalink(); ?>"></a></div><!-- .featured-image -->

      <div class="excerpt">
        <?php the_excerpt(); ?>
        <br /><a class="inline-link lees-meer" href="<?php echo get_permalink($post->ID); ?>"> Lees meer</a>
      </div><!-- .excerpt -->

      <div class="social">
        <h4>Deel dit op</h4>
          <?php echo do_shortcode('[ssba]'); ?>
      </div><!-- .social -->

    </article><!-- article -->
    <?php endwhile; ?>
    <?php wpex_pagination(); ?>
  <?php endif; ?>
  </section><!-- .loop -->
</section><!-- .inner -->

<?php get_footer(); ?>