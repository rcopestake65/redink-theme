<?php get_template_part('template-parts/section','small-hero'); ?>


<div class="container">
    <div class="posts-container">
        <div class="posts-main img-shape">
            <?php $credit = get_field('hero_image_credit'); ?>
            <?php
if( $credit ): 
    $credit_url = $credit['url'];
    $credit_title = $credit['title'];
    $credit_target = $credit['target'] ? $credit['target'] : '_self';
    ?>
            <div class="posts-hero-photo-credit"><a class="credit-font" href="<?php echo esc_url( $credit_url ); ?>"
                    target="<?php echo esc_attr( $credit_target ); ?>"><?php echo esc_html( $credit_title ); ?></a>
            </div><?php endif ?>

            <h2><?php the_title(); ?></h2>
<!--             <p><?php the_time('F jS, Y'); ?></p> -->
            <?php
            $featured = get_field('featured_image');
            if($featured):
                $url = &$featured ['url'];
                $alt = $featured['alt'];

?>
            <img class="img-shape" loading="lazy" src="<?php echo esc_url($url); ?>" alt="<?php echo $alt ?>" />
            <?php endif ?>
            <?php $credit = get_field('featured_image_credit'); ?>
            <?php
if( $credit ): 
    $credit_url = $credit['url'];
    $credit_title = $credit['title'];
    $credit_target = $credit['target'] ? $credit['target'] : '_self';
    ?>

            <a class="credit-font" href="<?php echo esc_url( $credit_url ); ?>"
                target="<?php echo esc_attr( $credit_target ); ?>"><?php echo esc_html( $credit_title ); ?></a>


            <?php endif ?>

            <div class="posts-written-content">
                <?php if('introduction'): ?>
                <div class="posts-written-content__introduction img-shape">
                    <h3>Introduction</h3>
                    <p><?php the_field('introduction') ?></p>
                    <?php endif ?>
                </div>




                <?php

// Check rows existexists.
if( have_rows('content') ):

    // Loop through rows.
    while( have_rows('content') ) : the_row();

        // Load sub field value.
        $header = get_sub_field('header');
        $section = get_sub_field('section');
        $image = get_sub_field('image');
        // Do something...
?>
                <div class="posts-written-content">
                    <div class="posts-writtent-content__item__text">
                        <h3><?php echo $header ?></h3>
                        <?php echo $section ?>
                    </div>
                    <?php
if( !empty( $image ) ): 
    $url = $image['url'];
    $alt = $image['alt'];
    ?>
                    <div class="posts-writtent-content__item__img">
                        <img class="img-shape" src="<?php echo $url; ?>" alt="<?php echo $alt ?>" />
                    </div>
                    <?php endif; ?>
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

        </div>
        <!--.posts-main-->
        <div class="posts-sidebar">
            <h2>Recent Articles</h2>

            <?php 
// Define our WP Query Parameters
$the_query = new WP_Query(array(
    'post__not_in' => array($post->ID),
));
?>

            <?php 
// Start our WP Query
while ($the_query -> have_posts()) : $the_query -> the_post(); 
// Display the Post Title with Hyperlink
?>
            <div class="recent-posts-grid img-shape">
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
                    </a>
                </div>

            </div>
            <?php 
// Repeat the process and reset once it hits the limit
endwhile;
wp_reset_postdata();
?>

        </div>
        <!--.posts-sidebar-->
    </div>