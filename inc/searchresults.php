<?php get_header(); ?>

    <?php if ( have_posts() ) : ?>

      <section class="articles search">

        <div class="item">
          <h2>Gezocht op: <?php echo $_GET['s']; ?></h2>
        </div>
        <!-- end .item -->

        <?php while ( have_posts() ) : the_post(); ?>

          <div class="item">

            <?php
            $article_image = get_field('afbeelding');
            if(is_array($article_image)) {
              $article_image_url = $article_image['sizes']['thumbnail'];
            }
            ?>

            <?php if($article_image_url) { ?>
            <a class="image-link" href="<?php the_permalink(); ?>">
              <img src="<?php echo $article_image_url; ?>" alt="<?php the_title(); ?>" />
            </a>
            <?php } ?>

            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <div class="content">

              <ul class="meta">

                <?php include('inc/article-meta.php'); ?>

              </ul>
              <!-- end .meta -->

              <div class="excerpt">

                <p>
                  <?php the_field('inleiding'); ?>
                </p>

              </div>
              <!-- end .excerpt -->

            </div>
            <!-- end .content -->

            <a class="go-to" href="<?php the_permalink(); ?>">Lees verder</a>

          </div>
          <!-- end .item -->

        <?php endwhile; ?>

      </section>
      <!-- end .articles -->

      <?php
      $prev_link = get_previous_posts_link('Vorige');
      $next_link = get_next_posts_link('Volgende');

      if($prev_link || $next_link) {
      ?>

      <div class="archive-pagination">

          <span class="left"><?= $prev_link ?></span>
          <span class="divider"></span>
          <span class="right"><?= $next_link ?></span>

      </div>
      <!-- end .archive-pagination -->

       <?php } ?>

    <?php else : ?>

      <section class="articles">

        <div class="item">

          <h2>Geen resultaten</h2>

        </div>
        <!-- end .item -->

      </section>
      <!-- end .articles -->

    <?php endif; ?>

    <?php include('inc/read-more.php'); ?>
    <?php include('inc/banner/screenings.php'); ?>

<?php get_footer(); ?>