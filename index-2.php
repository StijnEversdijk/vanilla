f<?php get_header(); ?>
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
      <div style="background-image: url(<?php echo the_field('cover_image'); ?>)" class="featured-image"><a class="image-article-link" href="<?php the_permalink(); ?>"></a></div><!-- .featured-image -->
      <div class="excerpt">
        <p><?php the_excerpt(); ?></p>
      </div><!-- .excerpt -->

      <div class="social">
        <h4>Deel dit op</h4>
        <?php echo do_shortcode('[ssba]'); ?>
        <ul>
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Pinterest</a></li>
          <li><a href="#">Foursquare</a></li>
        </ul>
      </div><!-- .social -->
    </article><!-- article -->

  <?php endforeach; ?>
<?php endif; ?>

</section><!-- .blog -->
<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>