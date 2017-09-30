<?php
function voyageuw_setup() {
    $defaults = array(
	'default-image'          => '',
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );
    add_theme_support( 'post-thumbnails' );
    register_nav_menu( 'menu-primary', __( 'Primary Menu', 'voyageuw' ) );
}
add_action( 'after_setup_theme', 'voyageuw_setup' );


function voyageuw_content_width() {
	$content_width = 1200;

	$GLOBALS['content_width'] = apply_filters( 'voyageuw_content_width', $content_width );
}
add_action( 'after_setup_theme', 'voyageuw_content_width', 0 );


// Register the voyageuw_sponsor custom post type
function create_post_type() {
  register_post_type( 'voyageuw_sponsor',
    array(
      'labels' => array(
        'name' => __( 'Home - Sponsors' ),
        'singular_name' => __( 'Sponsor' ),
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'thumbnail'),
    )
  );

  register_post_type( 'voyageuw_issue',
    array(
      'labels' => array(
        'name' => __( 'Home - Issues' ),
        'singular_name' => __( 'Issue' ),
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'thumbnail' ),
    )
  );

  register_post_type( 'voyageuw_member',
    array(
      'labels' => array(
        'name' => __( 'Team - Team Members' ),
        'singular_name' => __( 'Team Member' ),
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'thumbnail'),
    )
  );

  register_post_type( 'voyageuw_slide',
    array(
      'labels' => array(
        'name' => __( 'Home - Slides' ),
        'singular_name' => __( 'Home - Slide' ),
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'thumbnail'),
    )
  );
}

add_action( 'init', 'create_post_type' );

function page_add_meta_boxes( $post ) {
    if ( $post->ID != get_option( 'page_on_front' ) ) {
        add_meta_box('voyageuw_page_meta_box', 'Extra information', 'page_build_meta_box', 'page', 'normal', 'low');
    }
}
add_action('add_meta_boxes_page', 'page_add_meta_boxes');

function page_build_meta_box( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'voyageuw_page_meta_box_nonce' );
    $description = get_post_meta( $post->ID, '_voyageuw_page_description', true );
    $link = get_post_meta( $post->ID, '_voyageuw_page_link', true );
    $prompt = get_post_meta( $post->ID, '_voyageuw_page_prompt', true );
    ?>
    <h3>Page Description</h3>
    <input type="text" name="description" value="<?php echo $description; ?>" />
    <h3>Link</h3>
    <input type="text" name="link" value="<?php echo $link; ?>" />
    <h3>Prompt</h3>
    <input type="text" name="prompt" value="<?php echo $prompt; ?>" />
    <?php
}

function page_save_meta_box_data ( $post_id ) {
	if ( !isset( $_POST['voyageuw_page_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['voyageuw_page_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
    if ( isset( $_REQUEST['description'] ) ) {
        update_post_meta( $post_id, '_voyageuw_page_description', sanitize_text_field( $_POST['description'] ) );
    }
	if ( isset( $_REQUEST['link'] ) ) {
		update_post_meta( $post_id, '_voyageuw_page_link', sanitize_text_field( $_POST['link'] ) );
	}
    if ( isset( $_REQUEST['prompt'] ) ) {
        update_post_meta( $post_id, '_voyageuw_page_prompt', sanitize_text_field( $_POST['prompt'] ) );
    }
}
add_action( 'save_post_page', 'page_save_meta_box_data' );

function voyageuw_slide_add_meta_boxes( $post ) {
    add_meta_box('voyageuw_slide_meta_box', 'Extra information', 'voyageuw_slide_build_meta_box', 'voyageuw_slide', 'normal', 'low');
}
add_action('add_meta_boxes_voyageuw_slide', 'voyageuw_slide_add_meta_boxes');

function voyageuw_slide_build_meta_box( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'voyageuw_slide_meta_box_nonce' );
    $link = get_post_meta( $post->ID, '_voyageuw_slide_link', true );
    $prompt = get_post_meta( $post->ID, '_voyageuw_slide_prompt', true );
    ?>
    <h3>Link</h3>
    <input type="text" name="link" value="<?php echo $link; ?>" />
    <h3>Prompt</h3>
    <input type="text" name="prompt" value="<?php echo $prompt; ?>" />
    <?php
}

function voyageuw_slide_save_meta_box_data ( $post_id ) {
	if ( !isset( $_POST['voyageuw_slide_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['voyageuw_slide_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
	if ( isset( $_REQUEST['link'] ) ) {
		update_post_meta( $post_id, '_voyageuw_slide_link', sanitize_text_field( $_POST['link'] ) );
	}

    if ( isset( $_REQUEST['prompt'] ) ) {
        update_post_meta( $post_id, '_voyageuw_slide_prompt', sanitize_text_field( $_POST['prompt'] ) );
    }
}
add_action( 'save_post_voyageuw_slide', 'voyageuw_slide_save_meta_box_data' );

function voyageuw_issue_add_meta_boxes( $post ) {
    add_meta_box('voyageuw_issue_meta_box', 'Extra information', 'voyageuw_issue_build_meta_box', 'voyageuw_issue', 'normal', 'low');
}
add_action('add_meta_boxes_voyageuw_issue', 'voyageuw_issue_add_meta_boxes');

function voyageuw_issue_build_meta_box( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'voyageuw_issue_meta_box_nonce' );
    $number = get_post_meta( $post->ID, '_voyageuw_issue_number', true );
    $link = get_post_meta( $post->ID, '_voyageuw_issue_link', true );
    ?>
    <h3>Issue Number</h3>
    <input type="text" name="number" value="<?php echo $number; ?>" />
    <h3>Issue Link</h3>
    <input type="text" name="link" value="<?php echo $link; ?>" />
    <?php
}

function voyageuw_issue_save_meta_box_data ( $post_id ) {
	if ( !isset( $_POST['voyageuw_issue_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['voyageuw_issue_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
	if ( isset( $_REQUEST['number'] ) ) {
		update_post_meta( $post_id, '_voyageuw_issue_number', sanitize_text_field( $_POST['number'] ) );
	}
    if ( isset( $_REQUEST['link'] ) ) {
        update_post_meta( $post_id, '_voyageuw_issue_link', sanitize_text_field( $_POST['link'] ) );
    }
}
add_action( 'save_post_voyageuw_issue', 'voyageuw_issue_save_meta_box_data' );


function voyageuw_sponsor_add_meta_boxes( $post ) {
    add_meta_box('voyageuw_sponsor_meta_box', 'Extra information', 'voyageuw_sponsor_build_meta_box', 'voyageuw_sponsor', 'normal', 'low');
}
add_action('add_meta_boxes_voyageuw_sponsor', 'voyageuw_sponsor_add_meta_boxes');

function voyageuw_sponsor_build_meta_box( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'voyageuw_sponsor_meta_box_nonce' );
    $website = get_post_meta( $post->ID, '_voyageuw_sponsor_website', true );
    ?>
    <h3>Website</h3>
    <input type="text" name="website" value="<?php echo $website; ?>" />
    <?php
}

function voyageuw_sponsor_save_meta_box_data ( $post_id ) {
	if ( !isset( $_POST['voyageuw_sponsor_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['voyageuw_sponsor_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
	if ( isset( $_REQUEST['website'] ) ) {
		update_post_meta( $post_id, '_voyageuw_sponsor_website', sanitize_text_field( $_POST['website'] ) );
	}
}
add_action( 'save_post_voyageuw_sponsor', 'voyageuw_sponsor_save_meta_box_data' );

function voyageuw_member_add_meta_boxes( $post ) {
    add_meta_box('voyageuw_member_meta_box', 'Extra information', 'voyageuw_member_build_meta_box', 'voyageuw_member', 'normal', 'low');
}
add_action('add_meta_boxes_voyageuw_member', 'voyageuw_member_add_meta_boxes');

function voyageuw_member_build_meta_box( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'voyageuw_member_meta_box_nonce' );
    $position = get_post_meta( $post->ID, '_voyageuw_member_position', true );
    ?>
    <h3>Position</h3>
    <input type="text" name="position" value="<?php echo $position; ?>" />
    <?php
}

function voyageuw_member_save_meta_box_data ( $post_id ) {
	if ( !isset( $_POST['voyageuw_member_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['voyageuw_member_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
	if ( isset( $_REQUEST['position'] ) ) {
		update_post_meta( $post_id, '_voyageuw_member_position', sanitize_text_field( $_POST['position'] ) );
	}
}
add_action( 'save_post_voyageuw_member', 'voyageuw_member_save_meta_box_data' );

function voyageuw_scripts() {
    wp_enqueue_style( 'normalize-css', get_theme_file_uri( '/vendor/css/normalize.min.css' ) );
    wp_enqueue_style( 'voyageuw-style', get_stylesheet_uri() );
    wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/vendor/css/font-awesome.min.css' ) );
    wp_enqueue_script( 'navigation-js', get_theme_file_uri( '/js/navigation.js' ), array(), null, true );
    wp_enqueue_style( 'fluidbox-css', get_theme_file_uri( '/vendor/css/fluidbox.min.css' ) );
    wp_enqueue_script('jquery');
    wp_scripts()->add_data( 'jquery', 'group', 1 );
    wp_scripts()->add_data( 'jquery-core', 'group', 1 );
    wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
    wp_enqueue_script( 'debounce-js', get_theme_file_uri( '/vendor/js/jquery.ba-throttle-debounce.min.js' ), array(), null, true );
    wp_enqueue_script( 'fluidbox-js', get_theme_file_uri( '/vendor/js/jquery.fluidbox.min.js' ), array(), null, true );
    wp_enqueue_script( 'lightbox-js', get_theme_file_uri( '/js/lightbox.js' ), array(), null, true );

    if ( is_page_template( 'writers.php' ) || is_page_template( 'photographers.php' ) || is_page_template( 'sponsors.php' ) ) {
        wp_enqueue_script( 'multi-upload-js', get_theme_file_uri( '/js/multi-upload.js' ), array(), null, true );
        wp_enqueue_script( 'smooth-scrolling-js', get_theme_file_uri( '/js/smooth-scrolling.js' ), array(), null, true );
        wp_enqueue_script( 'fa-spinner-js', get_theme_file_uri( '/js/fa-spinner.js' ), array(), null, true );
    }
    if ( is_front_page() ) {
        wp_enqueue_script( 'slideshow-js', get_theme_file_uri( '/js/slideshow.js' ), array(), null, true );
        wp_enqueue_script( 'instafeed-js', get_theme_file_uri( '/vendor/js/instafeed.min.js' ), array(), null, true );
        wp_enqueue_script( 'instagram-js', get_theme_file_uri( '/js/instagram.js' ), array(), null, true );
    }
    if (is_singular('post')) {
        wp_enqueue_script( 'fb-share-js', get_theme_file_uri( '/js/fb-share.js' ) );
    }
}
add_action( 'wp_enqueue_scripts', 'voyageuw_scripts' );

function voyageuw_fonts() {
   wp_enqueue_script( 'voyageuw-typekit', 'https://use.typekit.net/uhf4bfo.js', array(), null, true );
   wp_add_inline_script( 'voyageuw-typekit', 'try{Typekit.load({ async: true });}catch(e){}' );
}
add_action( 'wp_enqueue_scripts', 'voyageuw_fonts' );

function custom_excerpt_length( $length ) {
	return 16;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

?>
