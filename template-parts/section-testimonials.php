<!--Testimonials Slider-->
</div>
<!--break the container div for full width bg image-->
<div class="testimonial-full-width">
    <div class="container">
        <section>
            <h2 class="brand testimonial">Testimonials</h2>
            <div class="testimonial-container">
                <div class="testimonial-btn-container">
                    <div class="testimonial-btn-container__inner">
                        <button type="button" aria-label="scroll to previous testimonials"
                            class="testimonial-prevBtn"><i class="fa-regular fa-circle-left fa-xl"></i></button>
                        <button type="button" aria-label="scroll to next testimonials" class="testimonial-nextBtn"><i
                                class="fa-regular fa-circle-right fa-xl"></i></button>
                    </div>
                </div>
                <div class="testimonial-slider">


                    <div class="testimonial-slider-container">

                        <?php 
$args = array(
    'post_type' => 'testimonials',
    'order' => 'ASC',
    'posts_per_page' => 9,
    'orderby' => 'rand',

    );
    $testimonials = new WP_Query($args);
    if($testimonials->have_posts()) : while($testimonials->have_posts()) : $testimonials->the_post(); 
                // Loop output goes here ?>
                        <div class="testimonial-slide">
                            <div class="testimonial-slide__1">

                                <?php
                            $clientImage = get_field('client_image')
                                
                                ?>
                                <?php
                                if($clientImage): 
                                $url = $clientImage['url'];
                                $alt = $clientImage['alt'];
                                ?>
                                <img alt="<?php echo ($alt); ?>" src="<?php echo esc_url($url); ?>" />
                                <?php endif; ?>

                            </div>
                            <div class="testimonial-slide__2">
                                <h3><?php the_field('client_name'); ?></h3>
                                <?php if( get_field('position') ): ?>
                                <p> <?php the_field('position'); ?></p>
                                <?php endif; ?>


                                <?php 
                                $link = get_field('website');
                                if($link): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <p> <a class="button testimonial" href="<?php echo esc_url( $link_url ); ?>"
                                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                </p>
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
                </div>
                <!--.testimonials-slider-->
            </div>

        </section>
    </div>
    <!--container-->
</div>
<!--full width-->