<?php
/**
 * Content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<?php
			if ( is_single() ) {
				the_title( '<h2 class="post-title">', '</h2>' );
			} else {
				the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}


		if ( 'post' === get_post_type() ) : ?>
			<div class="post-meta">

			</div>

		<?php
		endif; ?>

		<?php if ( has_post_thumbnail()): ?>
			<figure class="featured-image">
				<?php the_post_thumbnail(); ?>
			</figure>
		<?php endif; ?>

	</header>

	<div class="post-content">
		<?php the_content(); ?>
	</div>

	<footer class="post-footer">

	</footer>

	
</article>
