<div class="small-hero" style="
background-image: url(<?php the_field('background_image')?>)">
    <div class="container">
        <div class="small-hero__content">
            <div class="small-hero__content__grid">
                <div class="small-hero__content__grid__item-left">
                    <?php
$left = get_field('left_column');
if($left): ?>
                    <h2 class="brand"><?php echo $left['header']; ?></h2>
                    <p><?php echo $left['copy']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="small-hero__content__grid__item-right img-shape">
                    <?php
$right = get_field('right_column');
if($right): ?>
                    <h3><?php echo $right['header']; ?></h3>
                    <p><?php echo $right['copy']; ?></p>

                    <div class="gsap-btn-container">
                        <!-- <a class="button heroBtn"
                            href="<?php echo esc_url( $right['cta_button']['url'] ); ?>"><?php echo esc_html( $right['cta_button']['title'] ); ?><i
                                class="fa-regular fa-circle-right fa-xs"></i></a> -->
                        <button class="button" data-filter="open" id="services-button">Go<i
                                class="fa-regular fa-circle-right fa-xs"></i></button>

                    </div>


                </div>
            </div>
        </div>
        <!--.small-hero__content-->
    </div>
    <!--.container-->
</div>
<!--hero__image-->
<div class="modal-overlay">
    <div class="modal-container">
        <button class="close-modal"><i class="fa-solid fa-x"></i></button>
        <?php echo $right['form_shortcode']?>

        <?php endif; ?>
    </div>
</div>