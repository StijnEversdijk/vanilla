<?php
/**
 * Template Name: Temp Home
 */

get_header(); ?>
<?php include 'inc/masthead.php' ?>

<section class="inner">

  <h2 class="title">Blog</h2>
  <div class="divider"></div><!-- .divider -->
  <section class="blog main">

    <?php $posts = get_posts( "posts_per_page=5" ); ?>
    <?php if( $posts ) : ?>
    <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>


    <article class="article-template">
      <header>
        <h3><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h3>
        <span class="category"><?php the_category(', '); ?></span>
      </header>
      <div style="background-image: url(<?php echo the_field('cropped_image'); ?>)" class="featured-image"><a class="image-article-link" href="<?php echo get_permalink($post->ID); ?>"></a></div><!-- .featured-image -->
      <div class="excerpt">
        <?php the_excerpt(); ?>
        <br /><a class="inline-link lees-meer" href="<?php echo get_permalink($post->ID); ?>"> Lees meer</a>

      </div><!-- .excerpt -->

      <div class="social">
        <h4>Deel dit op</h4>
        <?php echo do_shortcode('[ssba]'); ?>
      </div><!-- .social -->
    </article><!-- article -->

  <?php endforeach; ?>
<?php endif; ?>

</section><!-- .blog -->
<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>
