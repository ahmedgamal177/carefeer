<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package carefer
 */
global $language;
global $post;
$author_id = $post->post_author;
$size = 'thumbnail';
$imgURL='';



get_header();
?>

<main id="primary" class="site-main single-blog">

    <div class="grid-page">
        <div class="content">
            <div class="share-icons desktop">
                <h3><?php echo (ICL_LANGUAGE_CODE=='ar')? 'شارك': 'Share'; ?></h3>
                <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { 
							ADDTOANY_SHARE_SAVE_KIT( array( 
								'buttons' => array( 'facebook', 'twitter', 'linkedin' ),
							) );
						} ?>
            </div>
            <div class="main-content">
                <div class="top">
                    <div class="breadcrumb">
                        <p>
                            <a href="<?php echo (ICL_LANGUAGE_CODE=='ar')? the_permalink(13) :the_permalink(742);?>">
                                <?php echo (ICL_LANGUAGE_CODE=='ar')? 'كاريفر':'Carefer '; ?>
                            </a>
                            /
                            <a href="<?php echo (ICL_LANGUAGE_CODE=='ar')? the_permalink(382) :the_permalink(774);?>">
                                <?php echo (ICL_LANGUAGE_CODE=='ar')? 'المدونة':'Blog'; ?>

                            </a>
                            /
                            <span>
                                <?php echo get_the_title();?>
                            </span>
                        </p>
                    </div>
                    <span
                        class="category desktop"><?php echo get_the_terms(get_the_ID( ), 'category' )[0]->name;?></span>
                    <div class="list-mob mobile">
                        <span
                            class="category "><?php echo get_the_terms(get_the_ID( ), 'category' )[0]->name;?></span>
                        <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { 
									ADDTOANY_SHARE_SAVE_KIT( array( 
										'buttons' => array( 'facebook', 'twitter', 'linkedin' ),
									) );
								} ?>
                    </div>
                    <h1><?php echo get_the_title();?> </h1>
                    <div class="boxes">
                        <div class="clock"><?php echo get_field('time'); ?>
                        </div>
                        <div class="name">
                        <?php echo ($language == 'ar')? get_the_author_meta('name_ar', $author_id): get_the_author_meta('display_name', $author_id); ?>
                        </div>
                        <div class="date">
                            <?php 
                                 $date = get_the_date('d F, Y' );
                                 if($language == 'ar'){
                                 $date = get_month_arabic($date);
                                    $western_arabic = array('0','1','2','3','4','5','6','7','8','9');
                                    $eastern_arabic = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');
                                    $date = str_replace($western_arabic, $eastern_arabic, $date);
                                 }
                                 ?>
                            <p><?php echo (ICL_LANGUAGE_CODE=='ar')? 'تاريخ النشر ':' Published on '; ?>
                                <span><?php echo $date ;?> </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="<?php echo get_field('hero_image_blog'); ?>" alt="">
                </div>
                <div class="middle">
                    <?php echo the_content(); ?>
                </div>
                <div class="bottom">
                    <div class="image">
                        <?php	
					 if (function_exists('get_wpupa_url'))  
					 $imgURL = get_wpupa_url($author_id, ['size' => $size]);
					 echo '<img src="'. $imgURL .'" alt="'. $authorname .'">'; ?>
                        <!-- <img src="<?php //echo get_field('image_author'); ?>" alt=""> -->
                    </div>
                    <div class="text">
                        <p><?php echo ($language == 'ar')? get_the_author_meta('name_ar', $author_id): get_the_author_meta('display_name', $author_id); ?>
                        </p>
                        <span><?php echo ($language == 'ar')? get_the_author_meta('role_ar',$author_id): get_the_author_meta('role',$author_id); ?></span>
                    </div>
                </div>

            </div>
        </div>
        <?php
								$current_poost_cateegoris = wp_get_post_categories(get_the_ID(),array('fields' => 'ids'));
                                $blogs_args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    'post_status' => 'publish',
									'post__not_in' => array(get_the_ID( )),
                                    'suppress_filters' => false,
                                    'tax_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'category',
                                            'field' => 'term_id',
                                            'terms' => $current_poost_cateegoris,
                                        ),
                                    ),

                                    );
                                $blogs = get_posts($blogs_args);
                                if ( $blogs ) : ?>
       <div class="related-blogs">
            <p class="tagline">
                <?php echo (ICL_LANGUAGE_CODE=='ar')? get_field('tagline_related_r',382): get_field('tagline_related',774); ?>
            </p>
            <h3 class="title">
                <?php echo (ICL_LANGUAGE_CODE=='ar')? get_field('title_related',382): get_field('title_related',774); ?>
            </h3>
            <span
                class="top-para"><?php echo (ICL_LANGUAGE_CODE=='ar')? get_field('paragraph_related',382): get_field('paragraph_related',774); ?>
            </span>
            <a class="btn-single" href="<?php echo (ICL_LANGUAGE_CODE=='ar')? the_permalink(382) :the_permalink(774);?>">
                <?php echo (ICL_LANGUAGE_CODE=='ar')? get_field('button_text',382): get_field('button_text',774); ?></a>
            <div class="blogs">
                <?php
														foreach ( $blogs as $post ) : setup_postdata( $post );
														?>
                <a class="single-blog" href="<?php echo get_the_permalink();?>">
                    <div class="image <?php echo get_field('style');?>">
                        <img src="<?php echo get_the_post_thumbnail_url();?>">
                    </div>
                    <div class="bottom">
                        <div class="text">
                            <span class="category">
                                <?php echo  get_the_terms(get_the_ID( ), 'category' )[0]->name;?></span>
                            <h3><?php echo get_the_title(); ?></h3>
                            <span> <?php echo get_the_excerpt();?></span>
                            <p>
                                <?php 
																									echo $date
																								?>
                            </p>
                        </div>
                    </div>

                </a>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
        <?php endif;?>
    </div>

</main><!-- #main -->

<?php
get_footer();