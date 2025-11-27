<?php get_header(); ?>

<main class="main">
	<div class="inner">
		<div class="content">
			<h1 class="section_title">News</h1>

			<div class="news_archive">
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'post_type'      => 'news',
					'posts_per_page' => 10,
					'paged'          => $paged,
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
				);
				$the_query = new WP_Query($args);
				if ($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post();
				?>
						<div class="news_item">
							<a href="<?php the_permalink(); ?>" class="news_link">
								<time class="news_date" datetime="<?php the_time('Y.m.d'); ?>"><?php the_time('Y.m.d'); ?></time>
								<p class="news_text"><?php the_title(); ?></p>
							</a>
						</div>
					<?php
					endwhile;
					?>
			</div>

			<div class="pagination">
			<?php
					echo paginate_links(array(
						'base'    => get_pagenum_link(1) . '%_%/page/%#%',
						'format'  => '?paged=%#%',
						'current' => max(1, $paged),
						'total'   => $the_query->max_num_pages
					));
					wp_reset_postdata();
				else :
			?>
				<p>お知らせはありません。</p>
			<?php endif; ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
