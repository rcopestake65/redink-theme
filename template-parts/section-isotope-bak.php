<div class="button-group filter-button-group">
    <button data-filter="all" class="all" type="button">show all</button>
    <?php 
        $categories = get_categories();
        foreach($categories as $category){
    
    echo '<button data-filter="'.$category->slug.'" class="'.$category->slug.'" type="button">'.$category->name. '</button>';
}
    ?>

</div>
<div class="isotope-grid">
    <?php 
$args = array(
    'post_type' => 'portfolio',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page' => '12'
    );
    $portfolio = new WP_Query($args);
    if($portfolio->have_posts()) : while($portfolio->have_posts()) : $portfolio->the_post(); 
                // Loop output goes here ?>

    <div class="grid-item <?php
$categories = get_the_category(get_the_id());
foreach ($categories as $category){
    echo $category->slug.' ';
}
?>">

        <img src="<?php the_field('image'); ?>" />

        <a href="<?php the_permalink(); ?>">
            <div class="grid-item__overlay">
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