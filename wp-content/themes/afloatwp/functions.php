<?php

function load_scripts()
{
    //wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'), '4.4.1', true);
    //wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1', 'all');
    //wp_enqueue_style('template', get_template_directory_uri() . '/css/template.css', array(), '1.0', 'all'); //last loaded is higher importance (override)


    //css styles
    wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700,800,900&display=swap', array(), false, 'all');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/vendors/font-awesome/css/fontawesome.css', array(), false, 'all');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/vendors/magnific-popup/magnific-popup.css', array(), false, 'all');

    wp_enqueue_style('slick', get_template_directory_uri() . '/vendors/slick/slick.css', array(), false, 'all');
    wp_enqueue_style('animate', get_template_directory_uri() . '/vendors/animate.css', array(), false, 'all');
    wp_enqueue_style('air-datepicker', get_template_directory_uri() . '/vendors/air-datepicker/css/datepicker.min.css', array(), false, 'all');
    wp_enqueue_style('template', get_template_directory_uri() . '/css/style.css', array(), false, 'all');


    //js scripts
    wp_enqueue_script('jquery', get_template_directory_uri() . '/vendors/jquery.min.js', array());
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/vendors/jquery-ui/jquery-ui.min.js', array());

    wp_enqueue_script('popper', get_template_directory_uri() . '/vendors/popper/popper.js', array());
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/vendors/bootstrap/js/bootstrap.js', array());
    wp_enqueue_script('hc-sticky', get_template_directory_uri() . '/vendors/hc-sticky/hc-sticky.js', array());
    wp_enqueue_script('isotope', get_template_directory_uri() . '/vendors/isotope/isotope.pkgd.js', array());
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/vendors/magnific-popup/jquery.magnific-popup.js', array());
    wp_enqueue_script('slick', get_template_directory_uri() . '/vendors/slick/slick.js', array());
    wp_enqueue_script('waypoints', get_template_directory_uri() . '/vendors/waypoints/jquery.waypoints.js', array());
    wp_enqueue_script('air-datepicker', get_template_directory_uri() . '/vendors/air-datepicker/js/datepicker.min.js', array());
    wp_enqueue_script('air-datepicker-js', get_template_directory_uri() . '/vendors/air-datepicker/js/i18n/datepicker.en.js', array());

    wp_enqueue_script('js-app', get_template_directory_uri() . '/js/app.js', array('jquery'), false, true);
}

add_Action('wp_enqueue_scripts', 'load_scripts');



function learnwp_config()
{

    //Registering our menus
    register_nav_menus(
        array(
            'my_main_menu' => 'Main Menu',
            'footer_menu' => 'Footer Menu'
        )
    );


    //header
    $args = array(
        'height' => 225,
        'width' => 1920
    );
    add_theme_support('custom-header', $args);
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array('video', 'image'));
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'learnwp_config', 0);


/* Add custom classes to list item "li" */
function _namespace_menu_item_class($classes, $item)
{
    $classes[] = "nav-item"; // you can add multiple classes here
    return $classes;
}

add_filter('nav_menu_css_class', '_namespace_menu_item_class', 10, 2);

/* Add custom class to link in menu */
function _namespace_modify_menuclass($ulclass)
{
    return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}

add_filter('wp_nav_menu', '_namespace_modify_menuclass');

// Custom Post Type -Properties 
function create_post_type_Properties()
{
    register_post_type(
        'Properties',
        array(
            'labels' => array(
                'name' => __('Properties'),
                'singular_name' => __('Property'),
            ),
            'public' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            )
        )
    );
}
add_action('init', 'create_post_type_Properties');

// Custom Post Type - Destinations
function create_post_type_Destinations()
{
    register_post_type(
        'Destinations',
        array(
            'labels' => array(
                'name' => __('Destinations'),
                'singular_name' => __('Destination'),
            ),
            'public' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            )
        )
    );
}
add_action('init', 'create_post_type_Destinations');

// Custom Post Type - Countries
function create_post_type_Countries()
{
    register_post_type(
        'Countries',
        array(
            'labels' => array(
                'name' => __('Countries'),
                'singular_name' => __('Country'),
            ),
            'public' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            )
        )
    );
}
add_action('init', 'create_post_type_Countries');

// Custom Post Type - Styles
function create_post_type_Styles()
{
    register_post_type(
        'Styles',
        array(
            'labels' => array(
                'name' => __('Styles'),
                'singular_name' => __('Style'),
            ),
            'public' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            )
        )
    );
}
add_action('init', 'create_post_type_Styles');

// Custom Post Type - Travel
function create_post_type_Travel()
{
    register_post_type(
        'Travel',
        array(
            'labels' => array(
                'name' => __('Travel Mode'),
                'singular_name' => __('Travel Mode'),
            ),
            'public' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            )
        )
    );
}
add_action('init', 'create_post_type_Travel');

//Excerpt length
function custom_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

//custom image size for blog thumbnails
add_image_size('blog-image-crop', 510, 414, true);

//secondary image to properties
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            // Replace [YOUR THEME TEXT DOMAIN] below with the text domain of your theme (found in the theme's `style.css`).
            'label' => __('Header Image', '[YOUR THEME TEXT DOMAIN]'),
            'id' => 'secondary-image',
            'post_type' => 'properties'
        )
    );
}

//secondary image to destinations
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            // Replace [YOUR THEME TEXT DOMAIN] below with the text domain of your theme (found in the theme's `style.css`).
            'label' => __('Header Image', '[YOUR THEME TEXT DOMAIN]'),
            'id' => 'header-image',
            'post_type' => 'destinations'
        )
    );
}
//secondary image to destinations
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            // Replace [YOUR THEME TEXT DOMAIN] below with the text domain of your theme (found in the theme's `style.css`).
            'label' => __('Decoration', '[YOUR THEME TEXT DOMAIN]'),
            'id' => 'decoration-image',
            'post_type' => 'destinations'
        )
    );
}

//Sidebars
add_action('widgets_init', 'learnwp_sidebars');
function learnwp_sidebars()
{
    register_sidebar(
        array(
            'name' => 'Home Page Sidebar',
            'id' => 'sidebar-1',
            'description' => 'This is the Home Page Sidebar',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'sidebar-2',
            'description' => 'This is the Blog Sidebar',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => 'Destination 1 Large',
            'id' => 'destination-1',
            'description' => 'First destination area (large)',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',

        )
    );
    register_sidebar(
        array(
            'name' => 'Destination 2 Small',
            'id' => 'destination-2',
            'description' => 'Second destination area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => 'Destination 3 Small',
            'id' => 'destination-3',
            'description' => 'Third destination area (small)',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => 'Destination 4 Medium',
            'id' => 'destination-4',
            'description' => 'Fourth destination area (medium)',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => 'Destination 5 Large',
            'id' => 'destination-5',
            'description' => 'Fifth destination area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => 'Service 1',
            'id' => 'services-1',
            'description' => 'First service area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => 'Service 2',
            'id' => 'services-2',
            'description' => 'Second service area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => 'Service 3',
            'id' => 'services-3',
            'description' => 'Third service area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => 'Social Media Icons',
            'id' => 'social-media',
            'description' => 'Social media icons area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}


//New One
add_action('wp_ajax_searchFilter', 'search_filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_searchFilter', 'search_filter_function');

function search_filter_function()
{
    $args = array(
        'posts_per_page' => 8,
        'post_type' => 'properties',
        'orderby' => 'date', // we will sort posts by date
        'order'    => $_POST['date'] // ASC or DESC
    );

    // for price order
    if (isset($_POST['extraFilter']) && $_POST['extraFilter'])
    $args = array(
        'posts_per_page' => 8,
        'post_type' => 'properties',
        'meta_key' => 'price_from', // we will sort posts by date
        'orderby' => 'meta_value_num',
        'order' => $_POST['extraFilter'] // ASC or DESC
    );

    $args['meta_query'] = array('relation' => 'AND'); // AND means that all conditions of meta_query should be true
    // for style
    if (isset($_POST['styleFilter']) && $_POST['styleFilter'])
        $args['meta_query'][] = array(
            'key' => 'style',
            'value' => '"' . $_POST['styleFilter'] . '"',
            'compare' => 'LIKE'
        );
    // for destination
    if (isset($_POST['destinationFilter']) && $_POST['destinationFilter'])
        $args['meta_query'][] = array(
            'key' => 'destination',
            'value' => '"' . $_POST['destinationFilter'] . '"',
            'compare' => 'LIKE'
        );

    // for country
    if (isset($_POST['countryFilter']) && $_POST['countryFilter'])
        $args['meta_query'][] = array(
            'key' => 'country',
            'value' => '"' . $_POST['countryFilter'] . '"',
            'compare' => 'LIKE'
        );

    // if both minimum price and maximum price are specified we will use BETWEEN comparison
    if (isset($_POST['price_min']) && $_POST['price_min'] && isset($_POST['price_max']) && $_POST['price_max']) {
        $args['meta_query'][] = array(
            'key' => 'price_from',
            'value' => array($_POST['price_min'], $_POST['price_max']),
            'type' => 'numeric',
            'compare' => 'between'
        );
    } else {
        // if only min price is set
        if (isset($_POST['price_min']) && $_POST['price_min'])
            $args['meta_query'][] = array(
                'key' => 'price_from',
                'value' => $_POST['price_min'],
                'type' => 'numeric',
                'compare' => '>'
            );

        // if only max price is set
        if (isset($_POST['price_max']) && $_POST['price_max'])
            $args['meta_query'][] = array(
                'key' => 'price_from',
                'value' => $_POST['price_max'],
                'type' => 'numeric',
                'compare' => '<'
            );
    }



    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();

            // template part
            if($_POST['form-type'] == 'all'){
                get_template_part('template-parts/content', 'search-travel');
            }
            if($_POST['form-type'] == 'destinations'){
                get_template_part('template-parts/content', 'properties-grid');
            }
            
        //echo '<h2>' . $query->post->post_title . '</h2>';
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No posts found';
    endif;

    die();
}
