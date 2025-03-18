<?php get_header();?>

<?php

if( have_posts() ) :
    while ( have_posts() ) :
        the_post(); ?>


<?php //the_content(); 
    
    get_template_part( 'template-parts/section', 'single' );

    ?>


<?php endwhile;
    endif;
    ?>

<?php get_footer();?>