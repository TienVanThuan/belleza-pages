<?php get_header(); ?>


<div class="p-page">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post">
    <div class="container">
        <?php the_title() ?>

        <?php the_content(); ?>
    </div>
</div><!-- /.post -->

<?php endwhile; ?>

<?php else : ?>
<?php endif; ?>

</div><!-- /.p-page -->


<?php get_footer(); ?>