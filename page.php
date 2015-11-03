<?php get_header(); ?>

<?php include 'inc/masthead.php' ?>

<section class="inner">

  <section class="full-page">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <header>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <span class="category"><?php the_category(', '); ?></span>
      </header>

      <div class="content">
        <p><?php the_content(); ?></p>
      </div><!-- .content -->

    <?php endwhile; ?>
  <?php endif; ?>
  </section><!-- .full-page -->
</section><!-- .inner -->

<?php get_footer(); ?>