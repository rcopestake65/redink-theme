<section>
    <h2 class="brand price">Price guide</h2>
    <p><?php the_field('intro')?></p>

    <div class="services-price-grid">

        <?php

// Check rows existexists.
if( have_rows('price_items') ):

// Loop through rows.
while( have_rows('price_items') ) : the_row();

// Load sub field value.
//just the colour background as a variable - the other content goes straight in

$header = get_sub_field('header');
$strapline = get_sub_field('strapline');
$price = get_sub_field('price');
$content = get_sub_field('content');
// Do something...

?>
        <div class="services-price-grid__item">
            <h3 class="services-price-grid__item__header"><?php echo $header ?></h3>
            <p class="services-price-grid__item__strapline"><?php echo $strapline ?></p>
            <h4 class="services-price-grid__item__price"><?php echo $price ?></h4>
            <p class="services-price-grid__item__content"><?php echo $content ?></p>
        </div>

        <!--.sercices-price-grid-->
        <?php
       
// End loop.
endwhile;
endif;
?>
    </div>
</section>