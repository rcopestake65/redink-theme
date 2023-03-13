<?php if( get_field('hero') ): ?>

<div class="hero__image" style="background-image: url(<?php the_field('hero'); ?>">
    <?php endif; ?>
    <div class="container">
        <div class="hero__overlay">

            <div class="hero__overlay__left">
                <h2><?php the_field('heading') ?></h2>
                <p><?php the_field('strapline') ?></p>
                <?php 
$link = get_field('button');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <div class="gsap-btn-container">
                    <a class="button heroBtn" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                            class="fa-regular fa-circle-right fa-xs"></i></a>
                    <?php endif; ?>
                </div>

            </div>


            <div class="hero__overlay__right">
                <?php

// Check rows existexists.
if( have_rows('screenshots') ):

// Loop through rows.
while( have_rows('screenshots') ) : the_row();

// Load sub field value.
$screenshot = get_sub_field('screenshot');
$link = get_sub_field('link');

// Do something...
?>
                <div class="screenshots">

                    <?php if( $link ): ?>

                    <a href="<?php echo esc_url($link['url']); ?>"> <img src="<?php echo $screenshot['url'] ?>"
                            alt="<?php echo $screenshot['alt'] ?>" /></a>
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
    </div>




</div>