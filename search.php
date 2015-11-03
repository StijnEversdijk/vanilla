<?php get_header(); ?>

<?php include 'inc/masthead.php' ?>

<div class="inner">

	<h3>Zoekresultaten voor &lsquo;<?php echo the_search_query(); ?>&rsquo;</h3>

	<?php
	if (have_posts()) :
		while (have_posts()) :
			the_post(); ?>

			<article class="article-template">

				<div class="text">
					<header>
						<h3><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<span class="category"><?php the_category(', '); ?></span>
					</header>
					<a href="<?php echo the_permalink(); ?>"><?php the_excerpt(); ?></a>
				</div><!-- .text -->

				<a href="<?php echo the_permalink(); ?>"><div style="background-image:url(<?php echo the_field('cover_image'); ?>)" class="afbeelding"></div></a>

			</article>

		<?php endwhile; ?>
	<?php else : ?>
		<p>Helaas, er is niets gevonden voor deze zoekterm. Is er iets dat echt niet op deze site mag ontbreken? Stuur me een <a class="inline-link" href="mailto:mail@doindordt.nl">e-mail!</a>.</p>
	<?php endif; ?>
</div>

<?php get_footer(); ?>