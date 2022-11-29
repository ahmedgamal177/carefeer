<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package carefer
 */
global $language;

?>

<!doctype html>
<?php
        $has_class2 =  is_page(45)? 'no-scroll':''; 
    ?>
<html class="<?php echo ICL_LANGUAGE_CODE;?>">
<!-- <head>
	<meta charset="<?php //bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="<?php //echo $theme_settings['theme_url'];?>/assets/sass/main<?php echo (ICL_LANGUAGE_CODE=='ar')? '':'.ltr'; ?>.css" rel="stylesheet">

	<?php //wp_head(); ?>
</head> -->

<head>

    <meta charset="<?php echo get_bloginfo('charset'); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
        href="<?php echo get_template_directory_uri();?>/assets/sass/main<?php echo (ICL_LANGUAGE_CODE=='ar')? '':'.ltr';?>.css"
        rel="stylesheet">
    <?php wp_head(); ?>


</head>

<?php
        $has_class =  (is_page(45) || is_page(763))? 'has-class':''; 
    ?>

<body <?php body_class($has_class ); ?> data-mitch-ajax-url="<?php echo admin_url('admin-ajax.php');?>"
    data-mitch-logged-in="<?php if(is_user_logged_in()){echo 'yes';}else{echo 'no';}?>"
    data-mitch-current-lang="<?php echo ICL_LANGUAGE_CODE;?>" data-mitch-home-url="<?php echo home_url();?>">
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <!-- <a class="skip-link screen-reader-text" href="#primary"><?php //esc_html_e( 'Skip to content', 'carefer' ); ?></a> -->
        <header id="masthead" class="site-header">
            <div class="apps active">
                <div class="ios single">
                    <div class="first">
                        <span class="close-app"></span>
                        <div class="image"><img src="<?php echo get_field('image_mobile_app', 'options');?>" alt="">
                        </div>
                        <div class="text">
                            <h4><?php echo get_field('title_mobile_app', 'options');?></h4>
                            <p><?php echo get_field('sub_title_mobile_app', 'options');?></p>
                        </div>
                    </div>

                    <a
                        href="<?php echo get_field('link_ios', 'options');?>"><?php echo get_field('button_text_mobile_app', 'options');?></a>
                </div>
                <div class="android single">
                    <div class="first">

                        <span class="close-app"></span>
                        <div class="image"><img src="<?php echo get_field('image_mobile_app', 'options');?>" alt="">
                        </div>
                        <div class="text">
                            <h4><?php echo get_field('title_mobile_app', 'options');?></h4>
                            <p><?php echo get_field('sub_title_mobile_app', 'options');?></p>
                        </div>
                    </div>
                    <a
                        href="<?php echo get_field('link_android', 'options');?>"><?php echo get_field('button_text_mobile_app', 'options');?></a>
                </div>
            </div>
            <div class="top-header">
                <div class="grid-header">
                    <div class="content">
                        <div class="last-blog">
                            <p><?php echo get_field('last_blog_text', 'options'); ?> <a
                                    href="<?php echo get_the_permalink(get_field("last_blog_link", 'options')); ?>"><?php echo get_field('colored_text', 'options');?></a>
                            </p>
                        </div>

                        <div class="sec_lang">
                            <div class="switcher_lang">


                                <?php do_action('wpml_add_language_selector');?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-header mobile-top">
                <div class="grid-header">
                    <div class="content">
                        <!-- burger -->
                        <button type="button" id="burger" class="burger"></button>
                        <!--/ burger -->
                        <a href="<?php echo (ICL_LANGUAGE_CODE=='ar')? the_permalink(13) :the_permalink(742);?>"
                            class="logo">

                            <img src="<?php echo get_field('logo', 'options');?>" alt="">
                        </a>
                        <nav class="main-nav">
                            <?php if( have_rows('header_menu','options') ): ?>
                            <ul>
                                <?php 
										while( have_rows('header_menu','options') ) : the_row();
									?>
                                <li
                                    class="<?php echo(get_sub_field("has_menu"))?'has-menu':'';?> <?php echo(get_the_ID( ) == get_sub_field("title_link"))?'active':'';?>">
                                    <?php if(get_sub_field('has_link')):?>
                                    <a href="<?php echo get_the_permalink(get_sub_field("title_link")); ?>"
                                        class="point"><?php echo get_sub_field("title"); ?> </a>
                                    <?php else:?>
                                    <a class="title"><?php echo get_sub_field("title"); ?> </a>
                                    <?php endif; ?>
                                    <?php if(get_sub_field('has_menu')):?>

                                    <div class="sub-menu">
                                        <div class="features">
                                            <h3> <?php echo get_sub_field('features_title'); ?> </h3>
                                            <?php if( have_rows('features_list') ): ?>
                                            <ul class="main-nav-list">
                                                <?php 
																		while( have_rows('features_list') ) : the_row();
																	?>
                                                <li>
                                                    <a href="<?php echo get_sub_field("link"); ?>">

                                                        <div class="image">
                                                            <img src="<?php echo get_sub_field("image");?>" alt="">
                                                        </div>
                                                        <div class="text">
                                                            <p> <?php echo get_sub_field("title"); ?></p>
                                                            <p class="description">
                                                                <?php echo get_sub_field("description"); ?>
                                                            </p>
                                                        </div>
                                                    </a>

                                                </li>
                                                <?php endwhile; ?>
                                            </ul>
                                            <?php endif; ?>
                                        </div>
                                        <div class="join-us">
                                            <h3>
                                                <?php echo get_sub_field('join_us_title'); ?>
                                            </h3>

                                            <?php if( have_rows('join_us_list') ): ?>
                                            <ul class="main-nav-list">
                                                <?php 
																		while( have_rows('join_us_list') ) : the_row();
																	?>
                                                <li>
                                                    <a href="<?php echo get_sub_field("link"); ?>">
                                                        <div class="image">
                                                            <img src="<?php echo get_sub_field("image");?>" alt="">
                                                        </div>
                                                        <div class="text">
                                                            <p> <?php echo get_sub_field("title"); ?></p>
                                                            <p class="description">
                                                                <?php echo get_sub_field("description"); ?>
                                                            </p>
                                                        </div>
                                                    </a>

                                                </li>
                                                <?php endwhile; ?>
                                            </ul>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                    <?php endif; ?>

                                </li>
                                <?php endwhile; ?>
                            </ul>
                            <?php endif; ?>
                        </nav>
                        <div class="demo">
                            <a href="<?php echo get_the_permalink(get_field('schedule_link', 'options')); ?>">
                                <?php echo get_field('schedule_a_demo_title', 'options'); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile nav -->
            <nav id="mobile-nav" class="mobile-nav">
                <div class="panel">
                    <!-- <button type="button" class="close"></button> -->
                    <?php if( have_rows('header_menu','options') ): ?>
                    <ul>
                        <?php 
										while( have_rows('header_menu','options') ) : the_row();
									?>
                        <li
                            class="<?php echo(get_sub_field("has_menu"))?'has-menu':'';?> <?php echo(get_the_ID( ) == get_sub_field("title_link"))?'active':'';?>">
                            <?php if(get_sub_field('has_link')):?>
                            <a href="<?php echo get_the_permalink(get_sub_field("title_link")); ?>"
                                class="point"><?php echo get_sub_field("title"); ?> </a>
                            <?php else:?>
                            <p class="title"><?php echo get_sub_field("title"); ?> </p>
                            <?php endif; ?>
                            <?php if(get_sub_field('has_menu')):?>

                            <div class="sub-menu">
                                <div class="features box">
                                    <h3> <?php echo get_sub_field('features_title'); ?> </h3>
                                    <?php if( have_rows('features_list') ): ?>
                                    <ul class="main-nav-list">
                                        <?php 
																		while( have_rows('features_list') ) : the_row();
																	?>
                                        <li>
                                            <a href="<?php echo get_sub_field("link"); ?>">
                                                <div class="image">
                                                    <img src="<?php echo get_sub_field("image" ,'options');?>" alt="">
                                                </div>
                                                <div class="text">
                                                    <p> <?php echo get_sub_field("title"); ?></p>
                                                    <p class="description">
                                                        <?php echo get_sub_field("description"); ?>
                                                    </p>
                                                </div>
                                            </a>

                                        </li>
                                        <?php endwhile; ?>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                                <div class="join-us box">
                                    <h3>
                                        <?php echo get_sub_field('join_us_title'); ?>
                                    </h3>


                                    <?php if( have_rows('join_us_list') ): ?>
                                    <ul class="main-nav-list">
                                        <?php 
																		while( have_rows('join_us_list') ) : the_row();
																	?>
                                        <li>
                                            <a href="<?php echo get_sub_field("link"); ?>">
                                                <div class="image">
                                                    <img src="<?php echo get_sub_field("image");?>" alt="">
                                                </div>
                                                <div class="text">
                                                    <p> <?php echo get_sub_field("title"); ?></p>
                                                    <p class="description">
                                                        <?php echo get_sub_field("description"); ?>
                                                    </p>
                                                </div>
                                            </a>

                                        </li>
                                        <?php endwhile; ?>
                                    </ul>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <?php endif; ?>

                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>


                    <div class="demo">
                        <a href="<?php echo get_the_permalink(get_field('schedule_link', 'options')); ?>">
                            <?php echo get_field('schedule_a_demo_title', 'options'); ?>

                        </a>

                    </div>
            </nav>
            <!-- mobile nav -->

        </header><!-- #masthead -->