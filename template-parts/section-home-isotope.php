<section>
    <h2 class="brand work">Some of our work</h2>
    <div class="button-group">
        <button data-filter="all" class="all" type="button">All</button>
        <?php 
//         $categories = get_categories();
//         foreach($categories as $category){
    
//     echo '<button data-filter="'.$category->slug.'" class="'.$category->slug.'" type="button">'.$category->name. '</button>';
// }
    ?>
        <?php 
 $parent_cat_id = 8;           
 $subcategories = get_terms( array(
    'taxonomy' => 'category',
    'parent' => $parent_cat_id,
    'hide_empty' => false,
) );
if ( ! empty( $subcategories ) && ! is_wp_error( $subcategories ) ) {
    foreach ( $subcategories as $subcategory ) {
        echo '<button data-filter="'.$subcategory->slug.'" class="'.$subcategory->slug.'" type="button">'.$subcategory->name. '</button>';
    }
}
    ?>
    </div>

    <div class="isotope-grid">
        <?php 
$args = array(
    'post_type' => 'portfolio',
    'orderby' => 'rand',
    'order' => 'rand',
    'posts_per_page' => '15'
    );
    $portfolio = new WP_Query($args);
    if($portfolio->have_posts()) : while($portfolio->have_posts()) : $portfolio->the_post(); 
                // Loop output goes here ?>


        <div class="isotope-container__item img-zoom <?php
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
    <div class="gsap-more-work-btn-container mt1">
        <a class="button" href="/our-work/">More work<i class="fa-regular fa-circle-right fa-xs"></i></a>
    </div>
</section>