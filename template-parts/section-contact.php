<?php get_template_part('template-parts/section','contact-hero'); ?>


<div class="container">
    <h2 class="brand">Our details</h2>
    <section>
        <div class="contact-grid">
            <div class="contact-grid__item">
                <h3>Address</h3>
                <i class="fa-solid fa-location-dot"></i>
                <p><?php the_field('address')?></p>
            </div>
            <div class="contact-grid__item">
                <h3>Phone Number</h3>
                <i class="fa-solid fa-phone-flip"></i>
                <p><a href="tel:<?php the_field('phone_number') ?>"><?php the_field('phone_number')?></a></p>
            </div>
            <div class="contact-grid__item">
                <h3>Email</h3>
                <i class="fa-solid fa-envelope"></i>
                <p><?php the_field('email_address')?></p>
            </div>
        </div>
    </section>






</div>
<!--.container-->
<div class="googlemap"><?php the_field('google_map')?></div>