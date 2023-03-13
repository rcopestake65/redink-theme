<div class="container">
    <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            get_template_part( 'content', get_post_format() );
 ?>
    <h2><?php the_title(); ?></h2>
    <div class="portfolio-grid">
        <div class="portfolio-grid__left">
            <img src="<?php the_field('image'); ?>" />
        </div>
        <div class="portfolio-grid__right">


            <p class="portfolio_grid__copy"><?php the_field('copy'); ?></p>
            <?php $clientURL = get_field('client_url'); ?>
            <div class="portfolio-grid__right__inner">
                <p>Client:</p>
                <p>
                    <?php if( $clientURL ): ?>
                    <a class="button" href="<?php echo esc_url( $clientURL ); ?>">
                        <?php endif; ?>
                        <?php the_field('client'); ?></a>
                </p>
                <?php $agencyURL = get_field('agency_url'); ?>

                <?php if( $agencyURL ): ?>
                <p>Agency:</p>
                <p>
                    <a class="button" href="<?php echo esc_url( $agencyURL ); ?>">

                        <?php the_field('agency'); ?></a>
                </p>
                <?php endif; ?>
                <?php 
$categories = get_field('categories');
if( $categories ): ?>
                <p>Categories:</p>
                <ul>
                    <?php foreach( $categories as $category ): ?>
                    <li>
                        <?php echo esc_html( $category->name ); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <?php 
$link = get_field('website');

if( $link ): ?><p>Website:</p>
                <a href="<?php echo esc_url( $link ); ?>"><?php echo $link ?></a>
                <?php endif; ?>


            </div>
            <!--portfolio-grid__right__inner-->
            <?php                
                $extra = get_field('extra_content');
                if($extra): 
                ?>
            <div class="extra-content">
                <?php echo $extra ?>
            </div>
            <?php endif; ?>
        </div>
        <!--.portfolio-grid__right-->

    </div>
    <!--.portfolio-grid-->

    <div class="portfolio-images-grid">
        <?php
    
// Check rows existexists.
if( have_rows('portfolio_images') ):

    // Loop through rows.
    while( have_rows('portfolio_images') ) : the_row();

        // Load sub field value.
        $image = get_sub_field('image');
        $picture = $image['sizes']['large']; //no idea why I need this - but nothing displays otherwise!!
        // Do something...

        ?>

        <img src="<?php echo $picture;?>" />

        <?php
// End loop.
    endwhile;
   
// No value.
else :
// Do something...
endif;
// End the loop.
endwhile;
?>
    </div>
    <!--.portfolio-images-grid-->
</div>
<!--.container-->