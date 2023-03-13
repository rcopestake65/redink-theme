<section>
    <h2 class="brand">Some of our services</h2>
    <div class="services-grid">
        <?php

// Check rows existexists.
if( have_rows('modals') ):

    // Loop through rows.
    while( have_rows('modals') ) : the_row();

        // Load sub field value.
        $service = get_sub_field('service_heading');
        $text = get_sub_field('text');
        $icon = get_sub_field('icon');
        $class = get_sub_field('class');

     // Do something...
?>
        <div class="services-item <?php echo $class; ?>">
            <p id="icon" class="<?php echo $class; ?>">
                <?php echo $icon ?>
            </p>

            <h2><?php echo $service ?></h2>
            <button data-filter="open" id="services-button" class="<?php echo $class; ?>">Read more</button>
        </div>
        <div class="modal-overlay <?php echo $class; ?>">
            <div class="modal-container">
                <h2><?php echo $service ?></h2>
                <p><?php echo $text ?>
                </p>
                <p class="icon"><?php echo $icon ?></p>
                <button class="close-modal"><i class="fa-solid fa-x"></i></button>
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
        <div class="gsap-btn-container">
            <a class="button mt2" href="/services">All services<i class="fa-regular fa-circle-right fa-xs"></i>
            </a>
        </div>
    </div>
    <!--services-grid-->

</section>