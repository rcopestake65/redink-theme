<div class="hero__image zoom" style="
background-image: <?php if(get_field ('image_overlay')): ?> <?php the_field('image_overlay')?>,<?php endif; ?> ">

    <div class="container">

        <div style="background-color:<?php the_field('colour'); ?>" class="hero__overlay img-shape">

            <div class="hero__overlay__left">
                <h2><?php the_field('heading') ?></h2>
                <p><?php the_field('strapline') ?></p>

            </div>
            <!--hero__overlay__left-->
            <div class="hero__overlay__right">
                <?php the_field('contact_form_shortcode') ?>
            </div>




            <!--hero__overlay__right-->
        </div>
        <!--hero__overlay-->
    </div>
    <!--container-->
    <!--start of photo credit-->
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