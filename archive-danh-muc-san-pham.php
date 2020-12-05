<?php
/*
 * Template Name: Product Archives Page Layout
 */
 ?>

<?php get_header(); ?>

<div class="p-top">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
    
    <a href="<?php the_permalink(); ?>">
        <?php 
            if(has_post_thumbnail()) {the_post_thumbnail('75-50');}
            else {echo '<img src="'.get_bloginfo('template_directory').'/img/common/noimage_75-50.png" width="75" height="50" alt="" />';}
        ?>
        <?php the_time('Y.m.d'); ?>
        <?php the_title(); ?>
    </a>

    <?php endwhile; else: endif; ?>


    <?php //ページネーション
    if (function_exists("pagination")) {
        pagination($additional_loop->max_num_pages);
    } ?>

</div><!-- /.p-top -->

<?php get_footer(); ?>