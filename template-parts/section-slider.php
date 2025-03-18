<div class="home-hero-slider">
    <?php
    // Check rows existexists.
if( have_rows('slider') ):

    // Loop through rows.
    while( have_rows('slider') ) : the_row();

        // Load sub field value.
        $image = get_sub_field('image');
        $heading = get_sub_field('heading');
        $strapline = get_sub_field('strapline');
        $class = get_sub_field('class');
     
        // Do something...
        ?>
    <div class="slide slide__<?php echo get_row_index(); ?>">
        <div class="container">
            <div class="slide__content">
                <div class="slide__content__left">
                    <!-- <div class="slide__icon"></div> -->
                    <h2 class="slide__heading"><?php echo $heading; ?></h2>
                </div>
                <div class="slide__content__right img-shape">
                    <h3 class="slide__strapline"><?php echo $strapline; ?></h3>
                </div>
                <div class="down-link"> <a aria-label="scroll down to the introductory section" href="#who" class=""><i
                            class="fa-regular fa-circle-down fa-xl"></i></a>
                </div>
            </div>
            <!--.slide__content-->
        </div>
        <!--.container-->

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
<div class="container">