<?php get_header(); ?>


<div class="p-page">

    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

    <div class="p-top__breadcrumb">
        <div class="container">
            <div class="c-row">
                <div class="col-lg-12 content">
                    <h2 class="title"><?php the_title(); ?></h2>
                    <p claas="desc">
                        <?php echo '<span class="category'.$cat_slug.'">'.$cat_name.'</span>'; ?>
                    </p>
                </div>
            </div>
        </div>
    </div> <!-- /.p-top__breadcrumb -->

<div class="post">
    <div class="container">
        
        <?php the_content(); ?>
    </div>
</div><!-- /.post -->

<?php endwhile; ?>

<?php else : ?>
<?php endif; ?>

</div><!-- /.p-page -->


<?php get_footer(); ?>