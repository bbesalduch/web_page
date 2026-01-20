<?php
/**
 * Hotel Can Quetglas - Theme Functions
 *
 * @package CanQuetglas
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function canquetglas_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary'   => __('Primary Menu', 'canquetglas'),
        'footer'    => __('Footer Menu', 'canquetglas'),
    ));

    // Add image sizes
    add_image_size('hero', 1920, 1080, true);
    add_image_size('room-card', 800, 600, true);
    add_image_size('gallery-thumb', 600, 600, true);
    add_image_size('gallery-large', 1200, 900, true);
}
add_action('after_setup_theme', 'canquetglas_setup');

/**
 * Enqueue Scripts and Styles
 */
function canquetglas_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'canquetglas-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500&family=Montserrat:wght@300;400;500;600&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'canquetglas-style',
        get_stylesheet_uri(),
        array('canquetglas-fonts'),
        wp_get_theme()->get('Version')
    );

    // Main JavaScript
    wp_enqueue_script(
        'canquetglas-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );

    // Localize script
    wp_localize_script('canquetglas-main', 'canquetglasData', array(
        'ajaxUrl'   => admin_url('admin-ajax.php'),
        'nonce'     => wp_create_nonce('canquetglas_nonce'),
        'siteUrl'   => home_url('/'),
    ));
}
add_action('wp_enqueue_scripts', 'canquetglas_scripts');

/**
 * Register Custom Post Types
 */
function canquetglas_register_post_types() {
    // Habitaciones / Rooms
    register_post_type('room', array(
        'labels' => array(
            'name'               => __('Habitaciones', 'canquetglas'),
            'singular_name'      => __('Habitación', 'canquetglas'),
            'add_new'            => __('Añadir nueva', 'canquetglas'),
            'add_new_item'       => __('Añadir nueva habitación', 'canquetglas'),
            'edit_item'          => __('Editar habitación', 'canquetglas'),
            'view_item'          => __('Ver habitación', 'canquetglas'),
            'all_items'          => __('Todas las habitaciones', 'canquetglas'),
            'search_items'       => __('Buscar habitaciones', 'canquetglas'),
            'not_found'          => __('No se encontraron habitaciones', 'canquetglas'),
        ),
        'public'              => true,
        'has_archive'         => false,
        'menu_icon'           => 'dashicons-admin-home',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'             => array('slug' => 'habitaciones'),
        'show_in_rest'        => true,
    ));

    // Galería / Gallery
    register_post_type('gallery', array(
        'labels' => array(
            'name'               => __('Galería', 'canquetglas'),
            'singular_name'      => __('Imagen', 'canquetglas'),
            'add_new'            => __('Añadir imagen', 'canquetglas'),
            'add_new_item'       => __('Añadir nueva imagen', 'canquetglas'),
            'edit_item'          => __('Editar imagen', 'canquetglas'),
            'view_item'          => __('Ver imagen', 'canquetglas'),
            'all_items'          => __('Todas las imágenes', 'canquetglas'),
        ),
        'public'              => true,
        'has_archive'         => false,
        'menu_icon'           => 'dashicons-format-gallery',
        'supports'            => array('title', 'thumbnail'),
        'show_in_rest'        => true,
    ));
}
add_action('init', 'canquetglas_register_post_types');

/**
 * Register Custom Taxonomies
 */
function canquetglas_register_taxonomies() {
    // Categoría de galería
    register_taxonomy('gallery_category', 'gallery', array(
        'labels' => array(
            'name'          => __('Categorías de galería', 'canquetglas'),
            'singular_name' => __('Categoría', 'canquetglas'),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
    ));
}
add_action('init', 'canquetglas_register_taxonomies');

/**
 * Add Room Meta Boxes
 */
function canquetglas_add_room_meta_boxes() {
    add_meta_box(
        'room_details',
        __('Detalles de la habitación', 'canquetglas'),
        'canquetglas_room_meta_box_callback',
        'room',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'canquetglas_add_room_meta_boxes');

function canquetglas_room_meta_box_callback($post) {
    wp_nonce_field('canquetglas_room_meta', 'canquetglas_room_meta_nonce');

    $size = get_post_meta($post->ID, '_room_size', true);
    $capacity = get_post_meta($post->ID, '_room_capacity', true);
    $bed_type = get_post_meta($post->ID, '_room_bed_type', true);
    $price = get_post_meta($post->ID, '_room_price', true);
    $features = get_post_meta($post->ID, '_room_features', true);
    ?>
    <style>
        .room-meta-field { margin-bottom: 15px; }
        .room-meta-field label { display: block; font-weight: 600; margin-bottom: 5px; }
        .room-meta-field input[type="text"],
        .room-meta-field input[type="number"],
        .room-meta-field textarea { width: 100%; }
    </style>
    <div class="room-meta-field">
        <label for="room_size"><?php _e('Tamaño (m²)', 'canquetglas'); ?></label>
        <input type="text" id="room_size" name="room_size" value="<?php echo esc_attr($size); ?>" placeholder="25 m²">
    </div>
    <div class="room-meta-field">
        <label for="room_capacity"><?php _e('Capacidad', 'canquetglas'); ?></label>
        <input type="text" id="room_capacity" name="room_capacity" value="<?php echo esc_attr($capacity); ?>" placeholder="2 personas">
    </div>
    <div class="room-meta-field">
        <label for="room_bed_type"><?php _e('Tipo de cama', 'canquetglas'); ?></label>
        <input type="text" id="room_bed_type" name="room_bed_type" value="<?php echo esc_attr($bed_type); ?>" placeholder="King size">
    </div>
    <div class="room-meta-field">
        <label for="room_price"><?php _e('Precio desde (€/noche)', 'canquetglas'); ?></label>
        <input type="text" id="room_price" name="room_price" value="<?php echo esc_attr($price); ?>" placeholder="150">
    </div>
    <div class="room-meta-field">
        <label for="room_features"><?php _e('Características (una por línea)', 'canquetglas'); ?></label>
        <textarea id="room_features" name="room_features" rows="5" placeholder="Aire acondicionado&#10;WiFi gratuito&#10;TV Smart&#10;Minibar"><?php echo esc_textarea($features); ?></textarea>
    </div>
    <?php
}

function canquetglas_save_room_meta($post_id) {
    if (!isset($_POST['canquetglas_room_meta_nonce']) ||
        !wp_verify_nonce($_POST['canquetglas_room_meta_nonce'], 'canquetglas_room_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array('room_size', 'room_capacity', 'room_bed_type', 'room_price', 'room_features');
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_textarea_field($_POST[$field]));
        }
    }
}
add_action('save_post_room', 'canquetglas_save_room_meta');

/**
 * Theme Customizer
 */
function canquetglas_customize_register($wp_customize) {
    // Hotel Info Section
    $wp_customize->add_section('hotel_info', array(
        'title'    => __('Información del Hotel', 'canquetglas'),
        'priority' => 30,
    ));

    // Slogan
    $wp_customize->add_setting('hotel_slogan', array(
        'default'           => 'Your home away from home in Palma de Mallorca',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hotel_slogan', array(
        'label'   => __('Slogan', 'canquetglas'),
        'section' => 'hotel_info',
        'type'    => 'text',
    ));

    // Phone
    $wp_customize->add_setting('hotel_phone', array(
        'default'           => '+34 XXX XXX XXX',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hotel_phone', array(
        'label'   => __('Teléfono', 'canquetglas'),
        'section' => 'hotel_info',
        'type'    => 'text',
    ));

    // Email
    $wp_customize->add_setting('hotel_email', array(
        'default'           => 'info@hotelcanquetglas.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('hotel_email', array(
        'label'   => __('Email', 'canquetglas'),
        'section' => 'hotel_info',
        'type'    => 'email',
    ));

    // Address
    $wp_customize->add_setting('hotel_address', array(
        'default'           => 'El Terreno, 07014 Palma de Mallorca',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hotel_address', array(
        'label'   => __('Dirección', 'canquetglas'),
        'section' => 'hotel_info',
        'type'    => 'textarea',
    ));

    // Booking URL
    $wp_customize->add_setting('booking_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('booking_url', array(
        'label'   => __('URL de Reservas', 'canquetglas'),
        'section' => 'hotel_info',
        'type'    => 'url',
    ));

    // Social Media Section
    $wp_customize->add_section('social_media', array(
        'title'    => __('Redes Sociales', 'canquetglas'),
        'priority' => 35,
    ));

    $social_networks = array('instagram', 'facebook', 'tripadvisor');
    foreach ($social_networks as $network) {
        $wp_customize->add_setting('social_' . $network, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('social_' . $network, array(
            'label'   => ucfirst($network),
            'section' => 'social_media',
            'type'    => 'url',
        ));
    }

    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Hero (Portada)', 'canquetglas'),
        'priority' => 40,
    ));

    // Hero Image
    $wp_customize->add_setting('hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label'   => __('Imagen Hero', 'canquetglas'),
        'section' => 'hero_section',
    )));

    // Hero Video
    $wp_customize->add_setting('hero_video', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hero_video', array(
        'label'       => __('URL Video Hero (opcional)', 'canquetglas'),
        'description' => __('Si añades un video, se usará en lugar de la imagen', 'canquetglas'),
        'section'     => 'hero_section',
        'type'        => 'url',
    ));

    // Google Maps
    $wp_customize->add_section('map_section', array(
        'title'    => __('Google Maps', 'canquetglas'),
        'priority' => 45,
    ));

    $wp_customize->add_setting('google_maps_embed', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('google_maps_embed', array(
        'label'       => __('Código embed de Google Maps', 'canquetglas'),
        'description' => __('Pega el código iframe de Google Maps', 'canquetglas'),
        'section'     => 'map_section',
        'type'        => 'textarea',
    ));
}
add_action('customize_register', 'canquetglas_customize_register');

/**
 * Contact Form Handler
 */
function canquetglas_handle_contact_form() {
    if (!wp_verify_nonce($_POST['contact_nonce'], 'canquetglas_contact')) {
        wp_send_json_error(array('message' => 'Error de seguridad'));
    }

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $message = sanitize_textarea_field($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(array('message' => 'Por favor, complete todos los campos requeridos'));
    }

    $to = get_theme_mod('hotel_email', get_option('admin_email'));
    $subject = sprintf('[Hotel Can Quetglas] Nuevo mensaje de %s', $name);
    $body = sprintf(
        "Nombre: %s\nEmail: %s\nTeléfono: %s\n\nMensaje:\n%s",
        $name,
        $email,
        $phone,
        $message
    );
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $email,
    );

    if (wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_success(array('message' => 'Gracias por su mensaje. Le contactaremos pronto.'));
    } else {
        wp_send_json_error(array('message' => 'Error al enviar el mensaje. Por favor, inténtelo de nuevo.'));
    }
}
add_action('wp_ajax_canquetglas_contact', 'canquetglas_handle_contact_form');
add_action('wp_ajax_nopriv_canquetglas_contact', 'canquetglas_handle_contact_form');

/**
 * Helper Functions
 */
function canquetglas_get_room_features($post_id) {
    $features = get_post_meta($post_id, '_room_features', true);
    if (empty($features)) return array();
    return array_filter(array_map('trim', explode("\n", $features)));
}

/**
 * Widgets
 */
function canquetglas_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'canquetglas'),
        'id'            => 'footer-widgets',
        'description'   => __('Widgets del pie de página', 'canquetglas'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'canquetglas_widgets_init');

/**
 * Admin Notice for Theme Setup
 */
function canquetglas_admin_notice() {
    $screen = get_current_screen();
    if ($screen->id !== 'themes') return;

    // Check if pages exist
    $pages_to_create = array(
        'el-hotel'      => 'El Hotel',
        'habitaciones'  => 'Habitaciones',
        'pool-bar'      => 'Pool Bar',
        'galeria'       => 'Galería',
        'contacto'      => 'Contacto',
    );

    $missing_pages = array();
    foreach ($pages_to_create as $slug => $title) {
        $page = get_page_by_path($slug);
        if (!$page) {
            $missing_pages[] = $title;
        }
    }

    if (!empty($missing_pages)) {
        ?>
        <div class="notice notice-info is-dismissible">
            <p><strong>Hotel Can Quetglas:</strong> <?php _e('Para completar la configuración del tema, crea las siguientes páginas:', 'canquetglas'); ?></p>
            <ul style="list-style: disc; margin-left: 20px;">
                <?php foreach ($missing_pages as $page) : ?>
                    <li><?php echo esc_html($page); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }
}
add_action('admin_notices', 'canquetglas_admin_notice');

/**
 * Remove WordPress emoji scripts
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Clean up wp_head
 */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
