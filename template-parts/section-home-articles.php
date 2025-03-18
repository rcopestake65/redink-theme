<section>
    <!--recent posts-->

    <h2 class="brand articles">Recent Articles</h2>
    <div class="recent-posts-grid">
        <?php 
// Define our WP Query Parameters
$the_query = new WP_Query(array(
    'post__not_in' => array($post->ID),
    'posts_per_page' => 2,
    
));
?>

        <?php 
// Start our WP Query
while ($the_query -> have_posts()) : $the_query -> the_post(); 
// Display the Post Title with Hyperlink
?>
        <div class="recent-posts-grid-item img-shape">
            <div class="recent-posts-grid__image img-zoom">
                <?php
            $featured = get_field('featured_image');
            if($featured):
                $url = &$featured ['url'];
                $alt = $featured['alt'];

?>
                <a href="<?php the_permalink() ?>"><img class="img-shape" loading="lazy"
                        src="<?php echo esc_url($url); ?>" alt="<?php echo $alt ?>" /></a>
                <?php endif ?>
            </div>
            <div class="recent-posts-grid-title">
                <a href="<?php the_permalink() ?>">
                    <h3><?php the_title(); ?></h3>
<!--                     <p><?php the_date(); ?></p> -->
                </a>
            </div>

        </div>
        <?php 
// Repeat the process and reset once it hits the limit
endwhile;
wp_reset_postdata();
?>

    </div>
    <div class="gsap-more-btn-container">
        <a class="button" href="/articles/">More articles<i class="fa-regular fa-circle-right fa-xs"></i></a>
    </div>
    <!--end of recent posts loop-->
</section>