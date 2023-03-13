<section>
    <h2 class="brand">Our Services</h2>
    <div class="services-main-grid">

        <?php

// Check rows existexists.
if( have_rows('services_main') ):

// Loop through rows.
while( have_rows('services_main') ) : the_row();

// Load sub field value.
//just the colour background as a variable - the other content goes straight in

$bg = get_sub_field('background_colour');
// Do something...

?>

        <div style="background: <?php echo($bg) ;?>" class="services-main-grid__item img-shape">
            <div class="services-main-grid__item__icon">
                <?php the_sub_field('icon'); ?>
            </div>
            <div class="services-main-grid__item__text">
                <h3 class="services-main-grid__item__header">
                    <?php the_sub_field('heading');?>
                </h3>
                <p class="services-main-grid__item__copy"><?php the_sub_field('copy');?></p>
            </div>
        </div>


        <?php
// End loop.
endwhile;
endif;
?>
    </div>


</section>