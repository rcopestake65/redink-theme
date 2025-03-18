<section>
    <h2 class="brand work">Some more of our work</h2>


    <div class="isotope-grid">
        <?php 
$args = array(
    'post_type' => 'portfolio',
    'orderby' => 'rand',
    'order' => 'rand',
    'posts_per_page' => '3'
    );
    $portfolio = new WP_Query($args);
    if($portfolio->have_posts()) : while($portfolio->have_posts()) : $portfolio->the_post(); 
                // Loop output goes here ?>


        <div class="isotope-container__item <?php
$categories = get_the_category(get_the_id());
foreach ($categories as $category){
    echo $category->slug.' ';
}
?>">
            <img loading="lazy" alt="<?php the_field('client'); ?>" src="<?php the_field('image'); ?>" />

            <a href="<?php the_permalink(); ?>">
                <div class="isotope-container__overlay">
                    <h2><?php the_title(); ?></h2>
                    <p>Read more</p>
                </div>
            </a>
        </div>



        <?php endwhile; ?>
        <!-- reset global post variable. After this point, we are back to the Main Query object -->
        <?php wp_reset_postdata(); ?>
        <?php endif;?>
    </div>
</section>