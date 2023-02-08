<?php get_header(); ?>
    <?php if(have_posts()){
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile; // End of the loop.
    } ?>
<?php  get_footer();?>