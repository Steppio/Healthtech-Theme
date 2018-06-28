<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}
function sm_custom_meta() {
    add_meta_box( 'sm_meta', __( 'Featured Posts', 'sm-textdomain' ), 'sm_meta_callback', 'post' );
}
function sm_meta_callback( $post ) {
    $featured = get_post_meta( $post->ID );
    ?>

  <p>
    <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Featured this post', 'sm-textdomain' )?>
        </label>

    </div>
</p>

    <?php
}
add_action( 'add_meta_boxes', 'sm_custom_meta' );

/**
 * Saves the custom meta input
 */
function sm_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

 // Checks for input and saves
if( isset( $_POST[ 'meta-checkbox' ] ) ) {
    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'meta-checkbox', '' );
}

}
add_action( 'save_post', 'sm_meta_save' );

function get_excerpt(){

$permalink = get_permalink();

$excerpt = get_the_content();
$excerpt = preg_replace(" ([.*?])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 100);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/s+/', ' ', $excerpt));
$excerpt = $excerpt.'... <a class="excerpt_readmore" href="'.$permalink.'">Read more &#187;</a>';
return $excerpt;
}

/**
 * Enables a 'reverse' option for wp_nav_menu to reverse the order of menu
 * items. Usage:
 *
 *   wp_nav_menu(array('reverse' => TRUE, ...));
 */
function my_reverse_nav_menu($menu, $args) {
  if (isset($args->reverse) && $args->reverse) {
    return array_reverse($menu);
  }
  return $menu;
}
add_filter('wp_nav_menu_objects', 'my_reverse_nav_menu', 10, 2);

add_theme_support( 'post-thumbnails' );

/**
 * Used by hook: 'customize_preview_init'
 *
 * @see add_action('customize_preview_init',$func)
 */
function mytheme_customizer_live_preview()
{
    wp_enqueue_script(
          'mytheme-themecustomizer',            //Give the script an ID
          get_template_directory_uri().'/js/theme-customizer.js',//Point to file
          array( 'jquery','customize-preview' ),    //Define dependencies
          '',                       //Define a version (optional)
          true                      //Put script in footer?
    );
}
add_action( 'customize_preview_init', 'mytheme_customizer_live_preview' );


add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {
 
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
 
}

// COMPONENTS
// require('inc/class-tgm-plugin-activation.php');
require('inc/components/nova-slider/nova_slider.php');
require('inc/components/nova-video/nova_video.php');

// INCLUDE OUR REQUIRED / RECOMMENDED PLUGINS
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'nova_require_register_required_plugins' );

function nova_require_register_required_plugins() {
  $plugins = array(
    // REQUIRED
    array(
      'name'      => 'Contact Form 7',
      'slug'      => 'contact-form-7',
      'required'  => true,
    ),
    array(
      'name'      => 'MailChimp for WordPress',
      'slug'      => 'mailchimp-for-wp',
      'required'  => true,
    ),
    array(
      'name'      => 'Page Builder by SiteOrigin',
      'slug'      => 'siteorigin-panels',
      'required'  => true,
    ),
    array(
      'name'      => 'SiteOrigin Widgets Bundle',
      'slug'      => 'so-widgets-bundle',
      'required'  => true,
    ),   
    array(
      'name'      => 'WP Video Lightbox',
      'slug'      => 'wp-video-lightbox',
      'required'  => true,
    ),  
    array(
      'name'      => 'Cookie Consent',
      'slug'      => 'uk-cookie-consent',
      'required'  => true,
    ),
    array(
      'name'      => 'Page Speed Optimisation',
      'slug'      => 'above-the-fold-optimization',
      'required'  => true,
      'source'    => get_template_directory() . '/inc/plugins/above-the-fold-optimization.zip',
    ),
    array(
      'name'      => 'Nova Social',
      'slug'      => 'nova-social',
      'required'  => true,
      'source'    => get_template_directory() . '/inc/plugins/nova-social.zip',
    ),
    array(
      'name'      => 'Nova Footer Settings',
      'slug'      => 'nova_footer_settings',
      'required'  => true,
      'source'    => get_template_directory() . '/inc/plugins/nova_footer_settings.zip',
    ),
    array(
      'name'      => 'Nova Header Settings',
      'slug'      => 'nova_header_settings',
      'required'  => true,
      'source'    => get_template_directory() . '/inc/plugins/nova_header_settings.zip',
    ),

    //add in on page optimisation
    // RECOMMENDED
    array(
      'name'      => 'Easy Google Fonts',
      'slug'      => 'easy-google-fonts',
      'required'  => false,
    ),
    array(
      'name'      => 'Better Search Replace',
      'slug'      => 'better-search-replace',
      'required'  => false,
    ),
    array(
      'name'      => 'Yoast SEO',
      'slug'      => 'wordpress-seo',
      'required'  => false,
    ),
    array(
      'name'      => 'W3 Total Cache',
      'slug'      => 'w3-total-cache',
      'required'  => false,
    )    
  );



  /*
   * Array of configuration settings. Amend each line as needed.
   *
   * TGMPA will start providing localized text strings soon. If you already have translations of our standard
   * strings available, please help us make TGMPA even better by giving us access to these translations or by
   * sending in a pull-request with .po file(s) with the translations.
   *
   * Only uncomment the strings in the config array if you want to customize the strings.
   */
  $config = array(
  );

  tgmpa( $plugins, $config );


}