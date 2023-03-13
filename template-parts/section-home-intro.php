<?php if(have_posts()): while(have_posts()): the_post();?>
<?php get_template_part('template-parts/section','slider'); ?>
<section>
    <h2 class="brand who"><?php the_field('heading') ?></h2>
    <div class="home-grid">
        <div class="home-grid__left">
            <div class="intro"> <?php the_field('main_copy');?></div>
        </div>

        <div class="home-grid__right">

            <?php
    // Check rows existexists.
if( have_rows('decorative_images') ):
    // Loop through rows.
    while( have_rows('decorative_images') ) : the_row();
        // Load sub field value.
        $image = get_sub_field('images');
        $credit = get_sub_field('credit');
        ?>
            <div class="home-slider">
                <img class="img-shape" loading="lazy" src="<?php echo $image ?>" alt="" />

                <?php
if( $credit ): 
    $credit_url = $credit['url'];
    $credit_title = $credit['title'];
    $credit_target = $credit['target'] ? $credit['target'] : '_self';
    ?>
                <a class="credit-font" href="<?php echo esc_url( $credit_url ); ?>"
                    target="<?php echo esc_attr( $credit_target ); ?>"><?php echo esc_html( $credit_title ); ?></a>
                <?php endif; ?>

            </div>
            <?php

// End loop.
endwhile;
// No value.
else :
// Do something...
endif;
?>
        </div>

    </div>

</section>


<?php endwhile; else: endif;?>