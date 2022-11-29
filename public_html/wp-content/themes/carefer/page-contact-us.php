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

<main id="primary" class="site-main contact-us">
    <div class="image-hero">
        <!-- <iframe width="100%" height="400" style="border:0" loading="lazy" allowfullscreen
            referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC3VExHE29EHyTO8-rX7xxuorsXhNOrbRU
    &q=Space+Needle,Seattle+WA">
        </iframe> -->
        <iframe
            src="<?php echo get_field('google_maps_link'); ?>"
            width="100%" height="400" style="border:0;" allowfullscreen loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>
    <div class="grid-page">
        <div class="content">
            <div class="text" data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-left':'fade-right';?>"
                data-aos-delay="200" data-aos-duration="400">
                <h1><?php echo get_field('title_contact_us'); ?>
                </h1>
                <p class="tagline">
                    <?php echo get_field('tagline_contact_us'); ?>
                </p>
                <div class="box">
                    <p> <?php echo (ICL_LANGUAGE_CODE=='ar')? 'إتصل بنا:' : 'Phone:'; ?> <span> <a
                                href="tel: <?php echo get_field('phone'); ?> "><?php echo get_field('phone'); ?></a></span>
                    </p>
                    <p> <?php echo (ICL_LANGUAGE_CODE=='ar')? 'راسلنــا:' : 'E-mail:'; ?> <span> <a
                                href="mailto: <?php echo get_field('e-mail'); ?> "><?php echo get_field('e-mail'); ?>
                            </a></span></p>

                </div>
                <div class="box">
                    <p><?php echo  get_field('address'); ?></p>
                </div>
            </div>
            <div class="form" data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-right':'fade-left';?>"
                data-aos-delay="700" data-aos-duration="400">

                <?php echo (ICL_LANGUAGE_CODE=='ar')? do_shortcode('[fluentform id="3"]') : do_shortcode('[fluentform id="1"]');?>

            </div>
        </div>
    </div>

</main><!-- #main -->

<?php
get_footer();