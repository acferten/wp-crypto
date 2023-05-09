<?php

add_theme_support('post-thumbnails');
add_theme_support( 'html5', array( 
	'caption',
	'script',
	'style',
) );
add_theme_support('widgets');

add_image_size ('main-thumbnail', 780, 500);
add_image_size ('post', 940, 540, true);
add_image_size ('banner', 740, 440, true);

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}
//if ( function_exists('register_sidebar') ) {
//    register_sidebar('sidebar-1');
//}

function create_post_type() {
    register_post_type( 'faq',
        array(
            'labels' => array(
                'name' => __( 'FAQ','crypto-banking' ),
                'singular_name' => __( 'FAQ','crypto-banking' )
            ),
            'public' => true,
            'has_archive' => true,
//            'show_in_rest' => true,
            'supports' => array( 'title', 'editor'),
            'taxonomy' => false,
        )
    );
    register_post_type( 'reg',
        array(
            'labels' => array(
                'name' => __( 'Register query','crypto-banking' ),
                'singular_name' => __( 'Mail','crypto-banking' )
            ),
            'public' => true,
            'has_archive' => true,
//            'show_in_rest' => true,
            'supports' => array( 'title'),
            'taxonomy' => false,
        )
    );
    register_post_type( 'quest',
        array(
            'labels' => array(
                'name' => __( 'Quest','crypto-banking' ),
                'singular_name' => __( 'Quest','crypto-banking' )
            ),
            'public' => true,
            'has_archive' => true,
//            'show_in_rest' => true,
            'supports' => array( 'title', 'editor'),
            'taxonomy' => false,
        )
    );
    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => __( 'News','crypto-banking' ),
//                'singular_name' => __( 'News','cryptobanking' )
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'supports' => array( 'title', 'editor', 'thumbnail'),
            'taxonomy' => false,
        )
    );
}
add_action( 'init', 'create_post_type' );
load_theme_textdomain( 'crypto-banking');


add_action('after_setup_theme', 'true_load_theme_textdomain');
function true_load_theme_textdomain(){
    load_theme_textdomain( 'crypto-banking', get_template_directory() . '/languages' );
}

add_filter('jpeg_quality', function($arg){return 100;});

function remove_menus(){
  remove_menu_page( 'edit.php' );                   //Записи
}
add_action( 'admin_menu', 'remove_menus' );



function royal_custom_error_pages() {
    $htaccess_file = '.htaccess';
    $website_url = get_bloginfo('url').'/';
    $check_file = file_get_contents($htaccess_file);
    $this_string = '# BEGIN WordPress Error Pages';

    if( strpos( $check_file, $this_string ) === false) {
        $error_pages = '';
        // Setup Error page locations dynamically
        $error_pages .= PHP_EOL. PHP_EOL . '# BEGIN WordPress Error Pages'. PHP_EOL. PHP_EOL;
        $error_pages .= 'ErrorDocument 500 '.$website_url.'error500'.PHP_EOL;
        $error_pages .= PHP_EOL. '# END WordPress Error Pages'. PHP_EOL;

        // Write the error page locations to HTACCESS
        $htaccess = fopen( $htaccess_file, 'a+');
        fwrite( $htaccess, $error_pages );
        fclose($htaccess);

    }
}
//add_action('init','royal_custom_error_pages');





add_action('admin_menu', 'register_my_custom_submenu_page');

function register_my_custom_submenu_page() {
    add_options_page( __('Site settings', 'crypto-banking'), __('Site settings', 'crypto-banking'), 'manage_options', 'site-settings.php','site_settings_page_callback', 1);
    
    $structure = [
        'contacts' => [
            'name' => __('Contacts', 'crypto-banking'),
            'fields' => [
                'number' => __('Contact number', 'crypto-banking'),
                'mail' => 'E-Mail',
                'headquarter' => __('Headquarter', 'crypto-banking'),
                'headquarter-en' => __('Headquarter in english', 'crypto-banking'),
            ],
        ],
        'support' => [
            'name' => __('Support', 'crypto-banking'),
            'fields' => [
                'mail' => 'E-Mail'
            ],
        ],
        'service' => [
            'name' => __('Service', 'crypto-banking'),
            'fields' => [
                'register' => __('Register url', 'crypto-banking'),
                'login' => __('Login url', 'crypto-banking'),
                'api' => __('API url', 'crypto-banking'),
            ],
        ],
        'mobile' => [
            'name' => __('Mobile', 'crypto-banking'),
            'fields' => [
                'more-link' => __('More link on homepage', 'crypto-banking'),
                'google-play'=> 'Google play',
                'app-store' => 'App store',
//                'qr-google-play'=> 'QR Google play',
//                'qr-app-store' => 'QR App store',
            ],
        ],
        'social' => [
            'name' => __('Socials', 'crypto-banking'),
            'fields' => [
                'tg'=>__('Telegram', 'crypto-banking'),
                'ig' => __('Instagram', 'crypto-banking'),
                'vk' => __('VKontakte', 'crypto-banking')
            ],
        ],
    ];
    
    foreach ($structure as $slug => $section) {
        add_settings_section( "{$slug}-section", $section['name'], function(){echo '<hr>';}, 'site-settings' );
        foreach ($section['fields'] as $key => $field) {
            register_setting( 'site-settings',  "{$slug}-{$key}");
            add_settings_field( 
                    "{$key}_{$slug}-id", 
                    $field, 
                    'myprefix_setting_callback_function', 
                    'site-settings', 
                    "{$slug}-section", 
                    array( 
                            'id' => "{$key}_{$slug}-id", 
                            'option_name' => "{$slug}-{$key}", 
                    )
            );    
        }
    }
    //QR
    register_setting( 'site-settings',  "QR-google-play");
    add_settings_field( 
            "QR-google-play-id", 
            'QR Google play', 
            'myprefix_setting_QR_callback_function', 
            'site-settings', 
            "mobile-section", 
            array( 
                    'id' => "QR-google-play-id", 
                    'option_name' => "QR-google-play", 
            )
    );    
    register_setting( 'site-settings',  "QR-app-store");
    add_settings_field( 
            "QR-app-store-id", 
            'QR App store', 
            'myprefix_setting_QR_callback_function', 
            'site-settings', 
            "mobile-section", 
            array( 
                    'id' => "QR-app-store-id", 
                    'option_name' => "QR-app-store", 
            )
    );    
    
}
function myprefix_setting_callback_function( $val ){
	$id = $val['id'];
	$option_name = $val['option_name'];
	?>
	<input 
		type="text" 
		name="<?= $option_name ?>" 
		id="<?= $id ?>" 
		value="<?= esc_attr( get_option($option_name) ) ?>" 
	/> 
	<?php
}
function myprefix_setting_QR_callback_function( $val ){
	$id = $val['id'];
	$option_name = $val['option_name'];
        $image_id = get_option($option_name);
        
        if( $image = wp_get_attachment_image_src( $image_id ) ) {

                echo '<a href="#" id="'.$id.'" class="qr-upload"><img src="' . $image[0] . '" /></a>
                      <br><a href="#" class="qr-del">Remove image</a>
                      <input type="hidden" id="'.$id.'" name="'.$option_name.'" value="' . $image_id . '">';

        } else {

                echo '<a href="#" id="'.$id.'" class="qr-upload">Upload image</a>
                      <a href="#" class="qr-del" style="display:none">Remove image</a>
                      <input type="hidden" id="'.$id.'" name="'.$option_name.'" value="">';

        }
}

function site_settings_page_callback() {
	?>
	<div class="wrap">
		<h2><?= get_admin_page_title() ?></h2>

		<?php
		// settings_errors() не срабатывает автоматом на страницах отличных от опций
		if( get_current_screen()->parent_base !== 'options-general' )
			settings_errors('название_опции');
		?>

		<form action="options.php" method="POST">
			<?php
				settings_fields("site-settings");     // скрытые защитные поля
				do_settings_sections("site-settings"); // секции с настройками (опциями).
				submit_button();
			?>
		</form>
	</div>
	<?php
}



add_action('wp_enqueue_scripts', 'crypto_scripts');
function crypto_scripts() {
            wp_deregister_script('jquery');
            wp_enqueue_script(
                'jquery',
                get_template_directory_uri() . '/scripts/jquery-3.4.1.min.js');
	if( is_single() ) {
            wp_enqueue_script(
                'sharer',
                get_template_directory_uri() . '/scripts/sharer.js',
                ['jquery'],
                false,
                true
            );
        }
//        if(is_post_type_archive('faq') || is_page('support') || is_page('support-en')) {
//        }
        wp_enqueue_script(
            'validate',
            get_template_directory_uri() . '/scripts/jquery.validate.min.js',
            ['jquery'],
            '1.2',
            true
        );
        wp_enqueue_script(
            'validate_advance',
            get_template_directory_uri() . '/scripts/jquery.validate-advance.js',
            ['jquery'],
            '1.2',
            true
        );
        wp_enqueue_script(
            'main',
            get_template_directory_uri() . '/scripts/main.min.js',
            ['jquery'],
            '1.4',
            true
        );
        
}

add_action( 'admin_enqueue_scripts', 'misha_include_js' );
function misha_include_js() {
	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
 
 	wp_enqueue_script( 'qruploadscript', get_template_directory_uri() . '/scripts/qr_upload.js', array( 'jquery' ) );
}

function get_pll_page_uri($slug) {
    $page = get_page_by_path($slug);
    if (!$page) return '#';
    $url = get_page_uri(pll_get_post($page->ID));
    return "/$url";
}

  //manifest file
add_action( 'wp_head', 'inc_manifest_link' );

// Creates the link tag
function inc_manifest_link() {   
        echo '<link rel="icon" type="image/png" sizes="32x32" href="'.get_template_directory_uri().'/assets/favicons/favicon-32x32.png">'."\n";
	echo '<link rel="icon" type="image/png" sizes="16x16" href="'.get_template_directory_uri().'/assets/favicons/favicon-16x16.png">'."\n";
        echo '<link rel="manifest" href="'.get_template_directory_uri().'/assets/favicons/manifest.json">'."\n";
	echo '<meta name="theme-color" content="#1F1E1E">'."\n";
	echo '<meta name="apple-mobile-web-app-capable" content="no">'."\n";
	echo '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">'."\n";
	echo '<meta name="apple-mobile-web-app-title" content="CryptoBanker">'."\n";
	echo '<link rel="apple-touch-icon" href="'.get_template_directory_uri().'/assets/favicons/apple-touch-icon-152x152.png">'."\n";
	echo '<link rel="mask-icon" href="'.get_template_directory_uri().'/assets/favicons/safari-pinned-tab.svg" color="#1F1E1E">'."\n";
	echo '<meta name="msapplication-TileImage" content="'.get_template_directory_uri().'/assets/favicons/msapplication-icon-144x144.png">'."\n";
	echo '<meta name="msapplication-TileColor" content="#1F1E1E">'."\n";
}


//ajax forms
function send_form() {
    $post_id = wp_insert_post(wp_slash([
        'post_title' => $_POST['email']." - ".$_POST['name'],
        'post_content' => ': '.$_POST['question'],
        'post_type' => 'quest'
    ]));
    $result = ['success' => (is_int($post_id))];
    echo json_encode($result);
    die;
}
add_action('wp_ajax_send_form', 'send_form');
add_action('wp_ajax_nopriv_send_form', 'send_form');

function save_register_mail() {
    global $wpdb;
    $mail = $_POST['email'];
    
    $wtitlequery = "SELECT post_title FROM $wpdb->posts WHERE post_type = 'reg' AND post_title = '{$mail}' AND post_status != 'trash'";
    $wresults = $wpdb->get_results( $wtitlequery) ;
    if ( $wresults ) {
        $result = ['success' => false, 'message' => __('Email is registered', 'crypto-banking')];
        echo json_encode($result);
        die;
    }
    
    $post_id = wp_insert_post(wp_slash([
        'post_title' => $_POST['email'],
        'post_content' => '',
        'post_type' => 'reg'
    ]));
    $result = ['success' => (is_int($post_id)), 'message' => __('Thank you! We will inform you about the opening of the service.', 'crypto-banking')];
    echo json_encode($result);
    die;
}
add_action('wp_ajax_save_register_mail', 'save_register_mail');
add_action('wp_ajax_nopriv_save_register_mail', 'save_register_mail');
