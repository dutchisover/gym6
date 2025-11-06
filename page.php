<?php get_header(); ?>

<main class="main">
	<div class="inner">
		<div class="content">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post();
					$title = get_the_title();
					echo '<h1 class="section_title">' . $title . '</h1>';
					if (has_post_thumbnail()) {
						echo '<figure class="eyecatch">';
						the_post_thumbnail('large', array('class' => 'eyecatch_image'));
						echo '</figure>';
					}
					the_content();
				endwhile;
			endif;
			?>
		</div>
	</div>
</main>

<?php get_footer(); ?>
