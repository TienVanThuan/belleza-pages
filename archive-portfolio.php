<?php
/*
 * Template Name: Portfolio Archives Page Layout
 */

	get_header(); 

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array('post_type'=>'portfolio', 'posts_per_page' => 8, 'paged'=> $paged, 'order' => 'DESC');
	$query = new WP_Query($args);
?>


<div class="p-top">
	<div class="p-top__breadcrumb">
		<div class="container">
			<div class="c-row">
				
			</div>
		</div>
	</div> <!-- /.p-top__breadcrumb -->

	<div class="p-top__our-project">
		<div class="container">
			
			<div class="c-row portfolio-ct">
			<?php if ($query->have_posts() ) : while ($query->have_posts() ) : $query->the_post(); ?>

				<div class="col-md-3 col-sm-6 items">
					<a class="item" href="<?php the_permalink();?>">
						<div class="thumb">
							<?php 
								if(has_post_thumbnail()) {
									echo the_post_thumbnail('default_post_thumb');
								} else {
									echo '<img src="http://bellezalocal.com/images/noimage.png" alt="'.get_the_title().'">';
								}
							?>
						</div>
						<h4 class="title"><?php the_title();?></h4>
					</a>
				</div>
			<?php endwhile; ?>
			</div>
			
			
			
			<div class="c-row portfolio-bt">
				<div class="pagination">
					<?php 
						$total_pages = $query->max_num_pages;
						if ($total_pages > 1){
							$current_page = max(1, get_query_var('paged'));
							echo paginate_links( array(
								'base'         => get_pagenum_link(1) . '%_%',
								'format'       => '/page/%#%',
								'add_args'     => false,
								'current'      => $current_page,
								'total'        => $total_pages,
								'prev_text'    => '&larr;',
								'next_text'    => '&rarr;',
								'type'         => 'list',
								'end_size'     => 3,
								'mid_size'     => 3,
							) );
						}
					?>
				</div>
				
			</div>
			<?php else:?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
		</div>
	</div>

	<div class="p-top__contact">
        <div class="container">
            <div class="c-row">
                
                <div class="col-lg-8">
                    <ul class="ct">
                        <li class="info-v1 phone"></li>
                        <li class="info-v1 email"></li>
                        <li class="info-v2 address"></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <div class="bt bt-v1">
                        <h6>Tải hồ sơ</h6>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="bt bt-v2">
                        <h6>Liên hệ</h6>
                    </div>
                </div>
            </div>
        </div>
	</div><!-- /.p-top__contact -->


</div><!-- /.p-top -->


<?php get_footer(); ?>