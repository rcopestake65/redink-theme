<?php if(get_field('hero')): ?>
<div class="hero__image zoom" style="background-image: url(<?php the_field('hero'); ?>)">
    <div class="container">
        <div style="background-color:<?php the_field('colour'); ?>" class="hero__overlay img-shape">
            <div class="hero__overlay__left">
                <h2><?php the_field('heading') ?></h2>
                <p><?php the_field('strapline') ?></p>
                <?php 
                    $link = get_field('button');
                    if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <div class="gsap-btn-container">
                    <a class="button heroBtn" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                            class="fa-regular fa-circle-right fa-xs"></i></a>
                </div>
                <?php endif; ?>
            </div>
            <!--hero__overlay__left-->
            <div class="hero__overlay__right">
    <?php
                    if( have_rows('screenshots') ):
                        while( have_rows('screenshots') ) : the_row();
                            $screenshot = get_sub_field('image');
                            $caption = get_sub_field('caption');
                ?>
                    <div class="screenshots">
                        <div class="screenshots__grid">
                            <?php if( $screenshot ): ?>
                                <h2 class="caption"><span><?php echo $caption; ?></span></h2>
                                <img src="<?php echo $screenshot['url'] ?>" alt="<?php echo $screenshot['alt'] ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                        endwhile;
                    endif;
                ?> 
               
</div>
            </div>
            <!--hero__overlay__right-->
        </div>
        <!--hero__overlay-->
    </div>
    <!--container-->
</div>
<!--hero__image-->
<?php endif; ?>