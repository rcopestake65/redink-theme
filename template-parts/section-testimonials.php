<!--Testimonials Slider-->
</div>
<!--break the container div for full width bg image-->
<div class="testimonial-full-width">
    <div class="container">
        <section>
            <h2 class="brand testimonial">Testimonials</h2>
            <div class="testimonial-btn-container">
                <div class="testimonial-btn-container__inner">
                    <button type="button" class="testimonial-prevBtn"><i
                            class="fa-regular fa-circle-left fa-xl"></i></button>
                    <button type="button" class="testimonial-nextBtn"><i
                            class="fa-regular fa-circle-right fa-xl"></i></button>
                </div>
            </div>
            <div class="testimonial-slider">


                <div class="testimonial-slider-container">

                    <?php 
$args = array(
    'post_type' => 'testimonials',
    'order' => 'ASC',
    'posts_per_page' => 6,
    'orderby' => 'rand',

    );
    $testimonials = new WP_Query($args);
    if($testimonials->have_posts()) : while($testimonials->have_posts()) : $testimonials->the_post(); 
                // Loop output goes here ?>
                    <div class="testimonial-slide">
                        <div class="testimonial-slide__1">
                            <?php if( get_field('client_image') ): ?>
                            <img src="<?php the_field('client_image'); ?>" />
                            <?php endif; ?>

                        </div>
                        <div class="testimonial-slide__2">
                            <h3><?php the_field('client_name'); ?></h3>
                            <?php if( get_field('position') ): ?>
                            <p> <?php the_field('position'); ?></p>
                            <?php endif; ?>
                            <?php if( get_field('website') ): ?>
                            <p> <?php the_field('website'); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="testimonial-slide__3">
                            <p><?php the_field('testimonial'); ?></p>
                        </div>



                    </div>
                    <?php endwhile; ?>
                    <!-- reset global post variable. After this point, we are back to the Main Query object -->
                    <?php wp_reset_postdata(); ?>
                    <?php endif;?>

                </div>

                <!--.testimonials-slider-container-->
                </divv>
                <!--.testimonials-slider-->
        </section>
    </div>
    <!--container-->
</div>
<!--full width-->