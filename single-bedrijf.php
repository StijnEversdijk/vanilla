<?php get_header(); ?>
<?php
if (have_posts()) :
  while (have_posts()) :
    the_post(); ?>

  <?php include 'inc/masthead.php' ?>

  <?php $terms = get_the_terms( $post->ID, 'bedrijfstype' ); ?>
  <section class="inner<?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">
    <article class="main">
      <?php the_content(); ?>
    </article>

    <aside class="sidebar">

      <?php if (!has_term('dordt-design', 'bedrijfstype')) { ?>

      <section class="texture skewed drop-shadow box">
        <div>
          <?php if( get_field('adres') ): ?>
          <h3>Adres</h3>
          <p><?php the_field('adres'); ?></p>
        <?php endif; ?>
      </div>

      <div>
        <?php
        if( have_rows('check_in/out') ): ?>
        <h3>Tijden</h3>
        <table>
          <?php while ( have_rows('check_in/out') ) : the_row(); ?>
          <tr>
            <td><strong>
              <?php the_sub_field('label'); ?>
            </strong></td>
            <td>
              <?php the_sub_field('tijdsperiode'); ?>
            </td>
          </tr>
          <?php endwhile;
          endif;
          ?>
        </table>
      </div>

      <div>
        <?php
        if( have_rows('openingstijden') ): ?>
        <h3>Openingstijden</h3>
        <table>
          <?php while ( have_rows('openingstijden') ) : the_row(); ?>
          <tr>
            <td>
              <?php the_sub_field('dag'); ?>
            </td>
            <td>
              <?php the_sub_field('tijd'); ?>
            </td>
          </tr>
          <?php endwhile;
          endif;
          ?>
        </table>
      </div>
    </section><!-- .texture .skewed .drop-shadow -->

    <?php } ?>

    <div class="website">
      <?php if( have_rows('website') ): ?>
        <h3>Website</h3>
          <?php while ( have_rows('website') ) : the_row(); ?>
            <?php $site = get_sub_field('webadres');
            $site = str_replace(array('http://', 'https://'), '', $site);
            $site = rtrim($site, '/');
            ?>
            <a href="<?php echo the_sub_field('webadres'); ?>">
              <?php echo $site; ?>
            </a><br />
          <?php endwhile;
        endif;
      ?>
    </div>

    <div class="email">
      <?php if( get_field('e-mail') ): ?>
      <h3>E-mail</h3>
      <?php $mail = get_field('e-mail');
      $mail = str_replace(' ', '', $mail);
      ?>
      <a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a>
    <?php endif; ?>
  </div>

  <div class="social">

    <?php
    if( have_rows('social_media') ): ?>
    <h3>Social Media</h3>
    <ul>
      <?php while ( have_rows('social_media') ) : the_row(); ?>
      <?php if( get_sub_field('facebook') ): ?>
      <li class="facebook"><a target="_blank" href="<?php the_sub_field('facebook'); ?>">Facebook</a></li>
    <?php endif; ?>
    <?php if( get_sub_field('twitter') ): ?>
    <li class="twitter"><a target="_blank" href="<?php the_sub_field('twitter'); ?>">Twitter</a></li>
  <?php endif; ?>
  <?php if( get_sub_field('foursquare') ): ?>
  <li class="foursquare"><a target="_blank" href="<?php the_sub_field('foursquare'); ?>">Foursquare</a></li>
<?php endif; ?>
<?php if( get_sub_field('pinterest') ): ?>
  <li class="pinterest"><a target="_blank" href="<?php the_sub_field('pinterest'); ?>">Pinterest</a></li>
<?php endif; ?>
<?php if( get_sub_field('instagram') ): ?>
  <li class="instagram"><a target="_blank" href="<?php the_sub_field('instagram'); ?>">Instagram</a></li>
<?php endif; ?>

<?php endwhile; ?>
</ul>
<?php endif; ?>
</div>

</aside><!-- aside -->
</section><!-- .inner -->

<section class="image-gallery">

  <?php if( have_rows('image_gallery') ): ?>
  <?php while ( have_rows('image_gallery') ) : the_row();

  $image = get_sub_field('image');
  $width = get_sub_field('width');
  ?>

  <div data-image="<?php echo $image; ?>" style="background-image: url(<?php echo $image; ?>)" class="<?php echo $width; ?> image"></div>

<?php endwhile; ?>
<?php endif; ?>

</section><!-- .image gallery -->

<section class="maps">
  <?php if( get_field('map') ): ?>
  <div class="inner">
    <h3>Locatie</h3>
  </div>
<?php endif; ?>

<?php
$location = get_field('map');
if( !empty($location) ):
  ?>

<div class="acf-map">
  <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
</div>
<?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>

</section>

<?php get_footer(); ?>
