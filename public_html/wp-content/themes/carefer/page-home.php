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

<main id="primary" class="site-main home-page">
    <div class="hero-box">
        <div class="grid-page">
            <div class="hero">
                <div class="text" data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-left':'fade-right';?>"
                    data-aos-delay="200" data-aos-duration="400">
                    <div class="top">
                        <h1><?php echo get_field('title_hero'); ?></h1>
                        <p class="tagline"><?php echo get_field('tagline_hero'); ?></p>
                        <div class="description"><?php echo get_field('description_hero'); ?></div>
                    </div>
                    <div class="bottom">
                        <a href="<?php echo get_field('button_link'); ?>"><?php echo get_field('button_text'); ?></a>
                        <div class="rating">
                            <div class="stars">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <p class="stars-p">
                                <?php echo get_field('stars'); ?>
                            </p>
                        </div>
                        <div class="clients">
                            <?php if( have_rows('clients_images', 45) ): ?>
                            <div class="image">
                                <?php 
													while( have_rows('clients_images', 45) ) : the_row();
								?>
                                <img src="<?php echo get_sub_field('image');?>" alt="">
                                <?php endwhile; ?>

                            </div>
                            <?php endif; ?>
                        </div>
                    </div>


                </div>
                <div class="image-hero" data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-right':'fade-left';?>">
                    <img src=" <?php echo get_field('hero_image'); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="steps">
        <div class="grid-page">
            <div class="content">
                <div class="text">
                    <h3><?php echo get_field('title_steps'); ?></h3>
                    <div><?php echo get_field('description_steps'); ?></div>
                </div>
                <div class="image">
                    <img class="desktop" src="<?php echo get_field('image_steps'); ?>" alt="">
                    <img class="mobile" src="<?php echo get_field('image_steps_mobile'); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="boxes">
        <div class="grid-page">
            <?php if( have_rows('container') ): $count=100  ;  $count2 = 200?>

            <div class="content">
                <?php 
                         while( have_rows('container') ) : the_row();
                        ?>
                <div class="single-box">

                    <div class="image mobile">
                        <img src="<?php echo get_sub_field('image'); ?>" alt="">
                    </div>
                    <h3><?php echo get_sub_field('title'); ?></h3>
                    <div class="details">
                        <div class="image desktop"
                            data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-left':'fade-right';?>"
                            data-aos-delay="<?php echo $count; ?>" data-aos-offset="300">
                            <img src="<?php echo get_sub_field('image'); ?>" alt="">
                        </div>
                        <div class="text" data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-right':'fade-left';?>"
                            data-aos-delay="<?php echo $count2; ?>" data-aos-offset="300">
                            <p class="tagline"><?php echo get_sub_field('tagline'); ?></p>
                            <div class="list">
                                <?php echo get_sub_field('list'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $count+=20; $count2 +=20; endwhile; ?>

            </div>
            <?php endif; ?>


        </div>
    </div>
    <div class="fleet-features">
        <div class="grid-page">
            <div class="content">
                <div class="box-title">
                    <h2><?php echo get_field('title_fleet_features'); ?></h2>
                    <p><?php echo get_field('tagline_fleet_features'); ?></p>
                </div>
                <div class="top desktop">
                    <div class="first">
                        <?php if( have_rows('first_list') ): $count=100;?>
                        <ul class="text">
                            <?php 
								while( have_rows('first_list') ) : the_row();
								?>
                            <li data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-left':'fade-right';?>"
                                data-aos-delay="<?php echo $count; ?>">
                                <?php echo get_sub_field('text'); ?>
                            </li>
                            <?php $count+=20;endwhile; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <div class="middle">
                        <div class="image">
                            <img src="<?php echo get_field('image_fleet_features'); ?>" alt="">
                        </div>
                    </div>
                    <div class="last">
                        <?php if( have_rows('last_list') ): $count=220; ?>
                        <ul class="text">
                            <?php 
								while( have_rows('last_list') ) : the_row();
								?>
                            <li data-aos="<?php echo(ICL_LANGUAGE_CODE=='ar')?'fade-right':'fade-left';?>"
                                data-aos-delay="<?php echo $count; ?>">
                                <?php echo get_sub_field('text'); ?>
                            </li>
                            <?php $count+=20; endwhile; ?>
                        </ul>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="mobile">
                    <div class="top">
                        <div class="middle">
                            <div class="image">
                                <img src="<?php echo get_field('image_fleet_features'); ?>" alt="">
                            </div>
                        </div>
                        <div class="first">
                            <?php if( have_rows('first_list') ): ?>
                            <ul class="text">
                                <?php 
											while( have_rows('first_list') ) : the_row();
											?>
                                <li>
                                    <?php echo get_sub_field('text'); ?>
                                </li>
                                <?php  endwhile; ?>
                            </ul>
                            <?php endif; ?>
                        </div>

                        <div class="last">
                            <?php if( have_rows('last_list') ):  ?>
                            <ul class="text">
                                <?php 
											while( have_rows('last_list') ) : the_row();
											?>
                                <li>
                                    <?php echo get_sub_field('text'); ?>
                                </li>
                                <?php  endwhile; ?>
                            </ul>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="bottom">
                        <div class="list">
                            <?php if( have_rows('bottom_list') ):?>
                            <ul class="text">
                                <?php 
										while( have_rows('bottom_list') ) : the_row();
										?>
                                <li>
                                    <?php echo get_sub_field('text'); ?>
                                </li>
                                <?php  endwhile; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="bottom desktop">
                    <div class="list">
                        <?php if( have_rows('bottom_list') ): $count=180;?>
                        <ul class="text">
                            <?php 
								while( have_rows('bottom_list') ) : the_row();
								?>
                            <li data-aos="fade-up" data-aos-delay="<?php echo $count; ?>">
                                <?php echo get_sub_field('text'); ?>
                            </li>
                            <?php $count+=20; endwhile; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="application-box desktop">
        <div class="grid-page">
            <div class="content">
                <div class="text">
                    <h3><?php echo get_field('title_application'); ?></h3>
                    <p><?php echo get_field('tagline_application'); ?></p>
                    <?php if( have_rows('application_images') ): ?>
                    <div class="applications">
                        <?php 
												while( have_rows('application_images') ) : the_row();
												?>
                        <div class="app-image">
                            <a href="<?php echo get_sub_field('link'); ?>" target="_blank"> <img
                                    src="<?php echo get_sub_field('image'); ?>" alt=""></a>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="image">
                    <img src="<?php echo get_field('main_image_applcation'); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="reviews">
        <div class="grid-page">
            <div class="content">
                <h2><?php echo get_field('title_application'); ?></h2>
                <p class="tagline"><?php echo get_field('tagline_review'); ?></p>
                <div class="list">
                    <?php if( have_rows('review-list') ): ?>
                    <div class="review-list">
                        <?php 
                                            while( have_rows('review-list') ) : the_row();
                                        ?>
                        <div class="single-review "
                            style="background-color:<?php the_sub_field('background_color');?> ">
                            <div class="top">
                                <div class="paragraph"><?php the_sub_field('paragraph');?></div>
                            </div>
                            <div class="bottom">
                                <div class="image">
                                    <img src="<?php the_sub_field('image');?>" alt="">
                                </div>
                                <div class="text">
                                    <p><?php the_sub_field('name');?></p>
                                    <span><?php the_sub_field('postion');?></span>
                                </div>
                            </div>

                        </div>


                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</main><!-- #main -->

<?php
get_footer();