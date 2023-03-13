<div class="home-hero-slider">
    <?php
    // Check rows existexists.
if( have_rows('slider') ):

    // Loop through rows.
    while( have_rows('slider') ) : the_row();

        // Load sub field value.
        $image = get_sub_field('image');
        $heading = get_sub_field('heading');
        $class = get_sub_field('class');
     
        // Do something...
        ?>
    <div class="slide slide__<?php echo $class; ?>" style="background-image: url(<?php echo $image; ?>);">
        <div class="slide__content">
            <div class="slide__icon"></div>
            <h2 class="slide__heading"><?php echo $heading; ?></h2>

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
    <button class="prev-btn"><i class="fa-regular fa-circle-right fa-xl"></i></button>
    <button class="next-btn"><i class="fa-regular fa-circle-left fa-xl"></i></button>
</div>
<div class="container">