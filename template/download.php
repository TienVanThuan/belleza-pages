<?php
/*
 Template Name: Download Company Profile
 */
 ?>

<?php get_header(); ?>


<div class="p-top">
    
    <div class="p-top__download">
        <div class="container">
            <div class="c-row download-row">
                
                <div class="col-lg-6 off-lg-3">
                    <?php 
                        if(have_posts()): while(have_posts()): the_post();
                        the_content();
                        endwhile; else: endif; 
                    ?>
                </div>
            </div>
        </div>
    </div><!-- ./p-top__download -->
    

</div><!-- /.p-top -->

<?php get_footer(); ?>