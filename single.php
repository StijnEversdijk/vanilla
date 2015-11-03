<?php get_header(); ?>
    <?php
    if (have_posts()) :
      while (have_posts()) :
        the_post(); ?>
        <?php include 'inc/masthead.php' ?>
        <section class="inner">
          <article class="article-template">
            <h3><?php the_title(); ?></h3>
            <p><?php the_content(); ?></p>
          </article>
        </section><!-- .inner -->

        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>
