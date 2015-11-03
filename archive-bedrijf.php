<?php get_header(); ?>

<?php include 'inc/masthead.php' ?>

<section class="inner">

  <section class="loop">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article class="company">
          <a href="<?php the_permalink(); ?>">
            <div class="cover_image"></div>
            <h3><?php the_title(); ?></h3>
            <?php the_excerpt(); ?>
          </a>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>
  </section><!-- .loop -->

</section><!-- .inner -->

<?php get_footer(); ?>