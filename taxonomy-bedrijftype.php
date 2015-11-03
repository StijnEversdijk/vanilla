<?php get_header(); ?>

<?php include 'inc/masthead.php' ?>

<section class="inner">

<!--   <section class="filters">
    <div data-toggle="buttons" class="btn-group">
    <label class="btn btn-default">
      <input type="checkbox" value="Matematica" >
      Matematica
    </label>
    <label class="btn btn-default">
      <input type="checkbox" value="Scienza" >
      Scienza
    </label>
    <label class="btn btn-default">
      <input type="checkbox" value="Letteratura" >
      Letteratura
    </label>
  </div>
  <div data-toggle="buttons" class="btn-group">
    <label class="btn btn-default">
      <input type="checkbox" value="mine" >
      Mine
    </label>
  </div>
  </section> -->

  <section class="loop">

   <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>

        <article class="company">
          <a href="<?php the_permalink(); ?>">
            <div class="cover-image" style="background-image: url('<?php echo the_field('foto_overzichtspagina'); ?>')"></div>
            <h3><?php the_title(); ?></h3>
            <?php the_field('korte_beschrijving'); ?>
          </a>
        </article>

      <?php endwhile; ?>
    <?php endif; ?>

  </section><!-- .loop -->

</section><!-- .inner -->

<?php get_footer(); ?>