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
 * 
 * Template Name: Template 5
 *
 */



get_header();
?>
<main id="primary" class="site-main template-5 templates">
    <div class="grid-page">

            <div class="first-section">
                <h1 data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-left':'fade-right';?>" data-aos-delay="400"  data-aos-duration="400"><?php echo get_field('title_template_5'); ?></h1>

                <div class="box">
                    <div class="first" data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-left':'fade-right';?>" data-aos-delay="1000"  data-aos-duration="400">
                        <div class="paragraph">
                         <?php echo get_field('paragraph_template_5'); ?>

                        </div>
                    </div>
                    <div class="second" data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-right':'fade-left';?>" data-aos-duration="400">
                        <div class="image">
                            <img src="<?php echo get_field('image_template_5'); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>   

            <div class="second-section">
                <div class="paragraph"  data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-left':'fade-right';?>" data-aos-delay="1400"  data-aos-duration="400">
                  <?php echo  get_field('paragraph_second_template_5'); ?>

                </div>

                <div class="demo <?php echo(get_field("show_button"))?'show':'';?>" data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-left':'fade-right';?>" data-aos-delay="1400"  data-aos-duration="400">
							<a href="<?php echo get_field("button_link");?>" target="_blank">
							<?php echo get_field('button_link_title'); ?>

						</a>
            </div>

            <div class="download-applications <?php echo(get_field("show_template_5"))?'show':'';?>" data-aos="fade-up"  data-aos-duration="400" data-aos-delay="1400">
           <div class="first">
                <h3><?php echo (ICL_LANGUAGE_CODE=='ar')? get_field('title_application',13) : get_field('title_application',742); ?></h3>
                <p><?php echo (ICL_LANGUAGE_CODE=='ar')? get_field('tagline_application',13): get_field('tagline_application',742); ?></p>
           </div>
           <div class="second">
                <?php if( have_rows('application_images' , 13) ): ?>
                                        <div class="applications">
                                                <?php 
                                                    while( have_rows('application_images' , 13) ) : the_row();
                                                ?>
                                                        <div class="app-image">
                                                            <a href="<?php echo get_sub_field('link'); ?>" target="_blank"> <img src="<?php echo get_sub_field('image'); ?>" alt=""></a>
                                                        </div>
                                                <?php endwhile; ?> 
                                        </div>
                <?php endif; ?>
           </div>
        </div>

    </div>


</main><!-- #main -->

  
  
<?php
get_footer();