<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package carefer
 */
get_header();

?>

<main id="scheduale-page" class="site-main ">
    <div class="top-page">
        <div class="top">
            <a href="<?php echo (ICL_LANGUAGE_CODE=='ar')? the_permalink(13) :the_permalink(742);?>" class="image">
                <img src="<?php echo get_field('logo_icon');?>" alt="">
            </a>

        </div>
        <div class="conetnt">
            <div class="text" data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-left':'fade-right';?>" data-aos-delay="200"
                data-aos-duration="400">
                <p class="tagline">
                    <?php echo get_field('tagline_schedule'); ?>
                </p>
                <h1><?php echo get_field('title_schedule'); ?></h1>
                <div class="description">
                    <?php echo get_field('description'); ?>
                </div>
                <div class="image-footer">
                    <img src=" <?php echo get_field('image_schedule');?>" alt="">
                </div>
            </div>
            <div class="calendly desktop" data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-right':'fade-left';?>"
                data-aos-delay="600" data-aos-duration="400">

                <!-- Calendly inline widget begin -->
                <?php echo get_field('calendly_code');?>
                <!-- Calendly inline widget end -->
            </div>
        </div>
    </div>
    <div class="mobile-section mobile">
        <div class="calendly " data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-right':'fade-left';?>" data-aos-delay="600"
            data-aos-duration="400">

            <!-- Calendly inline widget begin -->
            <?php echo get_field('calendly_code');?>
            <!-- Calendly inline widget end -->
        </div>
    </div>

    <div class="bottom-page">
        <div class="footer-schedule">
            <?php if( have_rows('clients_images') ): ?>

            <div class="image">
                <?php 
                                            while( have_rows('clients_images') ) : the_row();
                        ?>
                <img src="<?php the_sub_field('image');?>" alt="">
                <?php endwhile; ?>

            </div>
            <?php endif; ?>

        </div>

    </div>

</main><!-- #main -->

<?php
get_footer();