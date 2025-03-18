<?php get_template_part('template-parts/section','small-hero-cta'); ?>
<div class="container">
    <?php if(have_posts()): while(have_posts()): the_post();?>
    <section>
        <h2 class="brand"><?php the_field('heading_what') ?></h3>
            <?php if(get_field('whatwecando_introduction')): ?>
            <p><?php the_field('whatwecando_introduction'); ?></p>
            <?php endif; ?>



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
                <div class="whatwecando-grid__item img-shape item-<?php echo get_row_index(); ?>">
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
            <?php
$design = get_field('design');
if($design): ?>

            <div class="design-grid">
                <div class="design-grid__item copy img-shape">
                    <h4><?php echo $design['header']; ?></h4>
                    <?php echo $design['copy']; ?>
                </div>
                <div class="design-grid__item img img-shape">

                    <img src="<?php echo esc_url( $design['mock_ups']['url'] ); ?>"
                        alt="<?php echo esc_attr( $design['mock_ups']['alt'] ); ?>" />
                </div>
            </div>
            <?php endif; ?>
    </section>

    <?php endwhile; else: endif;?>

</div>
<!--.container-->