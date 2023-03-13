<?php if( get_field('hero') ): ?>

<div class="hero__image"
    style="
background-image: <?php if(get_field ('image_overlay')): ?> <?php the_field('image_overlay')?>,<?php endif; ?> url(<?php the_field('hero'); ?>">

    <div class="container">

        <div style="background-color:<?php the_field('colour'); ?>" class="hero__overlay img-shape">

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
                    <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                            class="fa-regular fa-circle-right fa-xs"></i></a>
                    <?php endif; ?>
                </div>

            </div>
            <!--hero__overlay__left-->

            <div class="hero__overlay__right">
                <?php

                    // Check rows existexists.
                    if( have_rows('screen_images') ):

                    // Loop through rows.
                    while( have_rows('screen_images') ) : the_row();

                    // Load sub field value.
                    $screenshot = get_sub_field('screen');
                    $link = get_sub_field('portfolio_link');

                    // Do something...
                ?>

                <div class="screenshots">
                    <?php if( $link ): ?>
                    <a href="<?php echo esc_url($link['url']); ?>">
                        <img src="<?php echo $screenshot['url'] ?>" alt="<?php echo $screenshot['alt'] ?>" /></a>
                    <?php endif; ?>
                </div>

                <?php
                    // End loop.
                    endwhile;
                    endif;
                ?>
            </div>
            <!--hero__overlay__right-->
        </div>
        <!--hero__overlay-->
    </div>
    <!--container-->
    <!--photo credit-->
    <?php $credit = get_field('photo_credit'); ?>
    <?php
if( $credit ): 
    $credit_url = $credit['url'];
    $credit_title = $credit['title'];
    $credit_target = $credit['target'] ? $credit['target'] : '_self';
    ?>
    <div class="photo-credit-container">
        <span><i class="fa-regular fa-circle-up"></i></span>
        <div class="photo-credit">
            <a class="credit-font" href="<?php echo esc_url( $credit_url ); ?>"
                target="<?php echo esc_attr( $credit_target ); ?>"><?php echo esc_html( $credit_title ); ?></a>
        </div>
    </div>


    <?php endif; ?>
    <!--photo credit-->
</div>
<!--hero__image-->
<?php endif; ?>