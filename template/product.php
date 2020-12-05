<?php
/*
 * Template Name: Product
 */
 ?>

<?php get_header(); ?>


<div class="p-top">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post">

<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
<?php the_time('Y年m月d日') ?>
<?php the_category(', ') ?>
<?php the_tags('', ', '); ?>

<?php the_content('続きを読む'); ?>
</div><!-- /.post -->

<?php endwhile; ?>

<?php else : ?>

<p>投稿がありません</p>
<?php endif; ?>

</div><!-- /.p-top -->


<?php get_footer(); ?>