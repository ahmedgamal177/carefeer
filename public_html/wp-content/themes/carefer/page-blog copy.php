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
global $language;

get_header();
?>

	<main id="primary" class="site-main blog">
		<div class="grid-page">
            <div class="content">
                <div class="top-text">
                    <h1><?php echo ($language=="ar")? get_field('title_blog_ar') : get_field('title_blog'); ?></h1>
                    <p class="tagline"><?php echo ($language=="ar")? get_field('tagline_blog_ar') : get_field('tagline_blog'); ?></p>
                    <div class="box">
                        <a href="<?php echo get_the_permalink(get_field('chosen_blog')); echo($language == 'ar')? '':'?lang=en';?>">
                            <div class="text">
                                <span class="category">
                                <?php echo ($language=="ar")?  get_field('ar_title' , get_the_terms(get_field('chosen_blog'), 'category' )[0]) : get_the_terms(get_field('chosen_blog'), 'category' )[0]->name; ?>
                            </span>
                                <h3><?php echo($language=='ar')? get_field('ar_title', get_field('chosen_blog')) : get_the_title(get_field('chosen_blog'));?></h3>
                                <div>
                                    <?php echo($language=='ar')? get_field('excerpt_ar', get_field('chosen_blog')) : get_the_excerpt(get_field('chosen_blog'));?>
                                 </div>
                                 <?php 
                                 $date = get_the_date('M d, Y', get_field('chosen_blog') );
                                 if($language == 'ar'){
                                 $date = get_month_arabic($date);
                                    $western_arabic = array('0','1','2','3','4','5','6','7','8','9');
                                    $eastern_arabic = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');
                                    $date = str_replace($western_arabic, $eastern_arabic, $date);
                                 }
                                 ?>
                                <span class="date"><?php echo $date ;?></span>
                            </div>
                                <div class="image">
                                        <img src="<?php echo get_field('hero_image_blog' , get_field('chosen_blog')); ?>" alt="">
                                </div>
                        </a>
                    </div>
                </div>
                

                <div class="list">
                  <h3><?php echo ($language=="ar")? get_field('title_list_ar') : get_field('title_list'); ?></h3>
                  <p class="tagline"><?php echo ($language=="ar")? get_field('tagline_list_ar') : get_field('tagline_list'); ?></p>

                  <div class="listing">
                    <div class="menu">
                        <h4><?php echo ($language=="ar")? 'المواضيع' : ' Topics' ; ?></h4>

                        <label class="custom-switch">
                                <input type="checkbox" name="type">
                                <div data-target="all" class="option all active"> <?php echo ($language=="ar")? 'الكــل' : 'All'; ?> </div>
                                <?php
                                $terms = get_terms('category' , array('hide_empty' => true) );
                                if($terms):
                                    foreach($terms as $term):
                                ?>
                                <div data-target="<?php echo $term->slug;?>" class="option <?php echo $term->slug;?>">
                                <?php echo ($language=="ar")?  get_field('ar_title' ,$term) : $term->name; ?>
                            </div>
                                <?php endforeach; endif;?>
                       </label>
                    </div>
                    <div class="blogs">

                    <div class=" form-row all show" id="all">
                        <?php
                            $blogs_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => -1,
                                'post_status' => 'publish',
                                'suppress_filters' => false,
                                'orderby' => 'date' ,  
                                'order' => 'asc',
                                );
                                        $blogs = get_posts($blogs_args);
                                        if ( $blogs ) : 
                                            foreach ( $blogs as $post ) : setup_postdata( $post );
                                            ?>
                                        
                                                        <a class="single-blog product_widget" href="<?php echo get_the_permalink(); echo($language == 'ar')? '':'?lang=en'; ?>">
                                                            <div class="image <?php echo get_field('style');?>">
                                                                <img src="<?php echo get_the_post_thumbnail_url();?>">
                                                            </div>
                                                            <div class="bottom">
                                                                <div class="text">
                                                                <span class="category"><?php echo ($language == 'ar')? get_field('ar_title', get_the_terms(get_the_ID( ), 'category' )[0] ) : get_the_terms(get_the_ID( ), 'category' )[0]->name;?></span>
                                                                    <h3><?php echo ($language=='ar')?get_field('ar_title') :get_the_title();?></h3>
                                                                    <span>
                                                                         <?php echo($language=='ar')? get_field('excerpt_ar') : get_the_excerpt();?>
                                                                     </span>
                                                                    <p>
                                                                    <?php 
                                                                        echo $date
                                                                    ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            
                                                        </a>
                                                                
                        <?php endforeach; wp_reset_postdata(); endif;?>
                    </div>
                    <?php
                    if($terms):
                        foreach($terms as $term):
                    ?>
                        <div class="form-row <?php echo $term->slug;?>" id="<?php echo $term->slug;?>">
                                <?php
                                $blogs_args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => -1,
                                    'post_status' => 'publish',
                                    'suppress_filters' => false,
                                    'tax_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'category',
                                            'field' => 'slug',
                                            'terms' => array($term->slug),
                                        ),
                                    ),

                                    );
                                $blogs = get_posts($blogs_args);
                                if ( $blogs ) : 
                                foreach ( $blogs as $post ) : setup_postdata( $post );
                                ?>
                                    <a class="single-blog product_widget" href="<?php echo get_the_permalink(); echo($language == 'ar')? '':'?lang=en';?>">
                                                                <div class="image <?php echo get_field('style');?>">
                                                                    <img src="<?php echo get_the_post_thumbnail_url();?>">
                                                                </div>
                                                                <div class="bottom">
                                                                    <div class="text">
                                                                        <span class="category">
                                                                        <?php echo ($language == 'ar')? get_field('ar_title', get_the_terms(get_the_ID( ), 'category' )[0] ) : get_the_terms(get_the_ID( ), 'category' )[0]->name;?>
                                                                        </span>
                                                                        <h3> <?php echo($language=='ar')?get_field('ar_title'):get_the_title(); ?> </h3>
                                                                        <span> <?php echo($language=='ar')? get_field('excerpt_ar') : get_the_excerpt();?></span>
                                                                        <p>
                                                                        <?php 
                                                                        echo $date
                                                                         ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                
                                    </a>
                                <?php endforeach; wp_reset_postdata(); endif;?>              
                        </div>
                    <?php endforeach;endif;?>
                    </div>
                  </div>
                    
                </div>
            </div>
        </div>
	</main><!-- #main -->

<?php
get_footer();
