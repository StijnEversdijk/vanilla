<?php
/*
YARPP Template: Do In Dordt
Description: This template returns the related posts.
*/
?>

<?php if (have_posts()) { ?>

<section class="related-posts">
  <h3>Heb je deze al gezien?</h3>
  <ul>
    <?php while (have_posts()) : the_post(); ?>

    <?php
      $articleImageID = get_field('cover_image');
      $articleImage = wp_get_attachment_image_src( $articleImageID, 'thumbnail' );
      $articleImageURL = $articleImage[0];

      $category_id = get_cat_ID();
      $category_link = get_category_link( $category_id );
    ?>

    <li>
      <div style="background-image: url(<?php echo $articleImageID ?>)" class="related-thumb"></div>
      <!-- <span><?php $category_link ?><?php the_category(', '); ?></span> -->
      <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
  </li>
<?php endwhile; ?>
</ul>

</section><!-- related-posts -->

<?php } ?>