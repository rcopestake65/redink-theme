<section>
    <h2 class="brand about"><?php the_field('heading') ?></h2>
    <div class="about-grid">
        <div class="about-grid__left">
            <div class="intro"> <?php the_field('main_copy');?></div>
            <?php
            $link = get_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <div class="gsap-btn-container">
                <a class="button mb1" href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                        class="fa-regular fa-circle-right fa-xs"></i></a>
                <?php endif; ?>
            </div>

        </div>
        <div class="about-grid__right">
            <div class="biog-imgs img-shape">
                <!--biog image and overlay RC-->
                <?php
            $biogImageOne = get_field('biog_image_one');
            if($biogImageOne):
                $url = &$biogImageOne ['url'];
                $alt = $biogImageOne['alt'];
                $caption = $biogImageOne['caption'];

?>
                <div class="biog-imgs__item">
                    <div class="biog-imgs__overlay">
                        <img class="biog-img-one img-shape" loading="lazy" src="<?php echo esc_url($url); ?>"
                            alt="<?php echo $alt ?>" />
                        <div class="biog-imgs__overlay__item img-shape">
                            <p><?php the_field('biog_one')?></p>
                            <p><a target="_blank" title="LinkdIn profile"
                                    href="https://www.linkedin.com/in/richard-copestake-10912926b/"><i
                                        class="fa-brands fa-linkedin"></i></a></p>
                        </div>
                    </div>
                    <i class="biog-arrow-one fa-solid fa-circle-info"></i>

                    <p class="caption-one"><?php echo esc_html($caption); ?></p>
                </div>


                <?php endif; ?>

                <!--biog image and overlay SM-->
                <?php
            $biogImageTwo = get_field('biog_image_two');
            if($biogImageTwo):
                $url = &$biogImageTwo ['url'];
                $alt = $biogImageTwo['alt'];
                $caption = $biogImageTwo['caption'];

?>
                <div class="biog-imgs__item">
                    <div class="biog-imgs__overlay">
                        <img class="biog-img-two img-shape" loading="lazy" src="<?php echo esc_url($url); ?>"
                            alt="<?php echo $alt ?>" />
                        <div class="biog-imgs__overlay__item img-shape">
                            <p><?php the_field('biog_two')?></p>
                            <p><a target="_blank" title="LinkdIn profile" href="https://www.linkedin.com/in/redink/"><i
                                        class="fa-brands fa-linkedin"></i></a></p>
                        </div>

                    </div>

                    <i class="biog-arrow-two fa-solid fa-circle-info"></i>
                    <p class="caption-two"><?php echo esc_html($caption); ?></p>
                </div>


                <?php endif; ?>
            </div>

            <div class="quote-slides-container">


                <?php

// Check rows existexists.
if( have_rows('quotes') ):

    // Loop through rows.
    while( have_rows('quotes') ) : the_row();

        // Load sub field value.
        $image = get_sub_field('background_image');
        $quote = get_sub_field('quote');
        $name = get_sub_field('name');
        $position = get_sub_field('position');
        // Do something...
        ?>
                <div class="quote-slides img-shape" style="background-image: url(<?php echo $image; ?>);">
                    <div class="quote-slides__overlay img-shape">
                        <blockquote class="quote"><?php echo $quote; ?></blockquote>
                        <cite><?php echo $name; ?></cite>
                        <p><?php echo $position; ?></p>
                    </div>

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

</section>