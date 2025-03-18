<?php get_template_part('template-parts/section','small-hero'); ?>
<div class="container">
    <?php if(have_posts()): while(have_posts()): the_post();?>
    <section>
        <h2 id="who" class="brand what"><?php the_field('heading_what') ?></h2>
        <h3><?php the_field('whatwecando_introduction'); ?></h3>
        <div class="whatwecando-grid">
            <?php

// Check rows existexists.
if( have_rows('what_we_can_do_items') ):

    // Loop through rows.
    while( have_rows('what_we_can_do_items') ) : the_row();

        // Load sub field value.
        $header = get_sub_field('item_header');
        $content = get_sub_field('item_content')
        // Do something...?>
            <div class="whatwecando-grid__item">
                <h4> <?php echo $header; ?></h4>
                <p><?php echo $content; ?></p>
            </div>
            <!--.whatwecando-grid__item-->
            <?php
    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
    ?>
        </div>
        <!--.whatwecando-grid-->
    </section>

    <?php endwhile; else: endif;?>

</div>
<!--.container-->