<?php
    /*
    * Template Name: Default Page Layout
    * Template Post Type: post, page, product
    */
 ?>

<?php get_header(); ?>
	<div class="p-top">
		<?php 
			if(have_posts()): while(have_posts()): the_post();
			$category = get_the_category();
			$cat_slug = $category[0]->category_nicename;
			$cat_name = $category[0]->cat_name;
			$imageUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
		?>
        <div class="p-top__breadcrumb">
            <div class="container">
                <div class="c-row">
					<div class="col-lg-8 off-lg-2 content">
						<h2 class="title"><?php the_title(); ?></h2>
						<p claas="desc">
							<?php echo '<span class="category'.$cat_slug.'">'.$cat_name.'</span>'; ?>
						</p>
                    </div>
                </div>
            </div>
        </div> <!-- /.p-top__breadcrumb -->

		<div class="p-top__single-post">
			<div class="container">
				<div class="c-row">
					<?php 
						if(has_post_thumbnail()) {
							echo '<div class="col-lg-12"><div class="post-thumbs" style="background-image: url('.$imageUrl.')"></div></div>';
							//the_post_thumbnail('75-50');
						}
						else {}
					?>
					<div class="col-lg-8 off-lg-2">
						

						
						<?php //the_time('Y.m.d'); ?>
						<?php //the_title(); ?>
						
						<div class="content" id="entrybody">
							<?php the_content(); ?>
						</div>

						<?php endwhile; else: endif; ?>
					</div>

					<div class="col-lg-8 off-lg-2">
						<div class="pagination-sl">
							<ul class="page-numbers">
								<li class="prev page-numbers"><?php previous_post_link('%link', '&larr;'); ?></li>
								<li class="page-numbers"><a href="<?php bloginfo('url'); ?>/portfolio">Dự Án</a></li>
								<li class="next page-numbers"><?php next_post_link('%link', '&rarr;'); ?></li>
							</ul>
						</div>
					</div>
					<!-- pagination -->
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>