<?php
/**
 * carefer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package carefer
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function carefer_setup() {
	/*
	
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on carefer, use a find and replace
		* to change 'carefer' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'carefer', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );


	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'carefer' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'carefer_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'carefer_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function carefer_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'carefer_content_width', 640 );
}
add_action( 'after_setup_theme', 'carefer_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function carefer_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'carefer' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'carefer' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'carefer_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function carefer_scripts() {
	wp_enqueue_style( 'carefer-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'carefer-style', 'rtl', 'replace' );

	wp_enqueue_script( 'carefer-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'carefer_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{

	// Check function exists.
	if (function_exists('acf_add_options_page')) {

		// Register options page.
		acf_add_options_page(array(
			'page_title'    => __('Store Settings'),
			'menu_title'    => __('Store Settings'),
			'menu_slug'     => 'theme-general-settings',
			'capability'    => 'edit_posts',
			'redirect'      => false
		));
	
}
}

global $language;


if (ICL_LANGUAGE_CODE == 'en') {
	$language = 'en';
} else {
    $language = 'ar';
}
// add class to body tag
function my_plugin_body_class($classes) {
	global $language;
    if($language == 'ar') {
		if (($key = array_search('ltr', $classes)) !== false) {
			unset($classes[$key]);  
		}
		$classes[] = 'rtl';
	} else {
		$classes[] = 'ltr';
	}
    return $classes;
} 
add_filter('body_class', 'my_plugin_body_class');

$theme_settings = mitch_theme_settings();
function mitch_get_number_name($number)
{
	$numbers_names_list = array('zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten');
	return $numbers_names_list[$number];
}

function mitch_theme_settings()
{
	// if($currency_symbol == 'ر.ق'){
	//   $currency_symbol = 'QAR';
	// }
	return array(
		'site_url'                => site_url(),
		'theme_url'               => get_template_directory_uri(),
		'theme_abs_url'           => preg_replace('/wp-content.*$/', '', __DIR__) . 'wp-content/themes/carefer/',
		'theme_logo'              => get_field('logo', 'options'),
		'theme_favicon'           => get_field('fav_icon', 'options'),
		'theme_favicon_black'     => get_field('fav_icon_black', 'options'),
		'current_lang'            => 'ar',
		'default_country_code'    => 'EG',
		'default_country_name'    => 'Egypt',
		'default_shipping_method' => 'filters_by_cities_shipping_method',
	);
}

function get_month_arabic($date)
{
	if (strpos($date, 'Sep') !== false) {
		//echo 'gowaa';
		$date = str_replace("Sep", "سبتمبر", $date);
	} elseif (strpos($date, 'Jan') !== false) {
		//echo 'gowaa';
		$date = str_replace("Jan", "يناير", $date);
	} elseif (strpos($date, 'Feb') !== false) {
		//echo 'gowaa';
		$date = str_replace("Feb", "فبراير", $date);
	} elseif (strpos($date, 'Apr') !== false) {
		//echo 'gowaa';
		$date = str_replace("Apr", "ابريل", $date);
	} elseif (strpos($date, 'Mar') !== false) {
		//echo 'gowaa';
		$date = str_replace("Mar", "مارس", $date);
	} elseif (strpos($date, 'May') !== false) {
		//echo 'gowaa';
		$date = str_replace("May", "مايو", $date);
	} elseif (strpos($date, 'Jun') !== false) {
		//echo 'gowaa';
		$date = str_replace("Jun", "يونيو", $date);
	} elseif (strpos($date, 'Jul') !== false) {
		//echo 'gowaa';
		$date = str_replace("Jul", "يوليو", $date);
	} elseif (strpos($date, 'Aug') !== false) {
		//echo 'gowaa';
		$date = str_replace("Aug", "أغسطس", $date);
	} elseif (strpos($date, 'Oct') !== false) {
		//echo 'gowaa';
		$date = str_replace("Oct", "أكتوبر", $date);
	} elseif (strpos($date, 'Nov') !== false) {
		//echo 'gowaa';
		$date = str_replace("Nov", "نوفمبر", $date);
	} elseif (strpos($date, 'Dec') !== false) {
		//echo 'gowaa';
		$date = str_replace("Dec", "ديسمبر", $date);
	}
	return $date;
}

// load more products
add_action( 'wp_ajax_nopriv_get_products_ajax', 'get_products_ajax' );
add_action( 'wp_ajax_get_products_ajax', 'get_products_ajax' );
function get_products_ajax(){
	global $language;
	$action = sanitize_text_field($_POST['fn_action']);
	$count    = intval($_POST['count']);
	$page     = intval($_POST['page']);
	$offset   = ($page) * $count;
	$order    = sanitize_text_field($_POST['order']);
	$cat = sanitize_text_field($_POST['cat']);
	$language = str_replace("`", "", $_POST['lang']);
	// var_dump($language);
	// exit;
	$ajaxArgs = array(
		"post_type" => 'post',
		'post_status' => 'publish',
    	"fields" => 'ids',
		"suppress_filters" => false,
		);
	// if($search !=""){
	// 	$ajaxArgs["s"] = $search;
	// }
	if($action == "loadmore"){
		$ajaxArgs["offset"] = $offset;
		$ajaxArgs["posts_per_page"] = $count;
	}else{
		$ajaxArgs["posts_per_page"] = $offset;
	}
	if($order =='date'){
		$ajaxArgs['orderby'] ='date';
		$ajaxArgs['order'] = 'desc';
	}
	if($cat){
		$ajaxArgs['tax_query'][]= array(
			'taxonomy'=>'category',
			'field' => 'slug',
			'terms' => $cat,
			);
	}
	$products_ids =  get_posts($ajaxArgs);
  if(!empty($products_ids)){
    foreach($products_ids as $product_id){
		?>
<a class="single-blog product_widget"
    href="<?php echo get_the_permalink($product_id);?>">
    <div class="image <?php echo get_field('style',$product_id);?>">
        <img src="<?php echo get_the_post_thumbnail_url($product_id);?>">
    </div>
    <div class="bottom">
        <div class="text">
            <span
                class="category"><?php echo get_the_terms($product_id, 'category' )[0]->name;?></span>
            <h3><?php echo get_the_title($product_id);?></h3>
            <span>
                <?php echo get_the_excerpt($product_id);?>
            </span>
            <p>
                <?php 
																	 $date = get_the_date('M d, Y', $product_id);
																	 if($language == 'ar'){
																	 $date = get_month_arabic($date);
																		$western_arabic = array('0','1','2','3','4','5','6','7','8','9');
																		$eastern_arabic = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');
																		$date = str_replace($western_arabic, $eastern_arabic, $date);
																	 }
                                                                        echo $date
                                                                    ?>
            </p>
        </div>
    </div>

</a>
<?php
    }
  }
wp_die();
}

// load more products
add_action( 'wp_ajax_nopriv_get_products_ajax_count', 'get_products_ajax_count' );
add_action( 'wp_ajax_get_products_ajax_count', 'get_products_ajax_count' );

function get_products_ajax_count(){
	global $language;
	$count    = intval($_POST['count']);
	$page     = intval($_POST['page']);
	$offset   = ($page) * $count;
	$order    = sanitize_text_field($_POST['order']);
	$cat = sanitize_text_field($_POST['cat']);
	$language = $_POST['lang'];
	$ajaxArgs = array(
		"post_type" => 'post',
		"posts_per_page"=> -1 ,
    	"fields" => 'ids',
		'post_status' => 'publish',
		"suppress_filters" => false,
		"offset" =>$offset,
	);
	if($order =='date'){
		$ajaxArgs['orderby'] ='date';
		$ajaxArgs['order'] = 'desc';
	}
	else{
		$ajaxArgs['orderby'] ='date';
		$ajaxArgs['order'] = 'desc';
	}
	
	if($cat){
		$ajaxArgs['tax_query'][]= array(
			'taxonomy'=>'category',
			'field' => 'slug',
			'terms' => $cat,
			);
	}
	$ajaxQuery =  get_posts($ajaxArgs);
		if($ajaxQuery){
			echo count($ajaxQuery);
		}else{
			echo "0";
		}
	wp_die();
}

// add_action('rank_math/frontend/description', function ($description) {
// 	global $language;
// 	if ($language == 'ar') {
// 		$product_full_description =  get_field('seo_description', get_the_ID());
// 		return $product_full_description;
// 	}
// 	return $description;
// });
// add_action('rank_math/opengraph/facebook/og_description', function ($description) {
// 	global $language;
// 	if ($language == 'ar') {
// 		$product_full_description =  get_field('facebook_description', get_the_ID());
// 		return $product_full_description;
// 	}
// 	return $description;
// });
// add_action('rank_math/opengraph/twitter/twitter_description', function ($description) {
// 	global $language;
// 	if ($language == 'ar') {
// 		$product_full_description =  get_field('twitter_description', get_the_ID());
// 		return $product_full_description;
// 	}
// 	return $description;
// });
// add_action('rank_math/frontend/title', function ($description) {
// 	global $language;
// 	if ($language == 'ar') {
// 		$product_full_description = get_field('seo_title', get_the_ID());
// 		return $product_full_description;
// 	}
// 	return $description;
// });
// add_action('rank_math/opengraph/facebook/og_title', function ($description) {
// 	global $language;
// 	if ($language == 'ar') {
// 		$product_full_description =  get_field('facebook_title', get_the_ID());
// 		return $product_full_description;
// 	}
// 	return $description;
// });
// add_action('rank_math/opengraph/twitter/twitter_title', function ($description) {
// 	global $language;
// 	if ($language == 'ar') {
// 		$product_full_description =  get_field('twitter_title', get_the_ID());
// 		return $product_full_description;
// 	}
// 	return $description;
// });