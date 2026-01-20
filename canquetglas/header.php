<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="description" content="<?php echo esc_attr(get_theme_mod('hotel_slogan', 'Your home away from home in Palma de Mallorca')); ?> - Hotel boutique en un edificio modernista de 1908">
    <meta name="theme-color" content="#0a0a0a">

    <!-- Open Graph -->
    <meta property="og:title" content="<?php bloginfo('name'); ?>">
    <meta property="og:description" content="<?php echo esc_attr(get_theme_mod('hotel_slogan')); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">

    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Mobile Navigation Overlay -->
<nav class="mobile-nav" id="mobile-nav" aria-hidden="true">
    <ul>
        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Inicio', 'canquetglas'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/el-hotel/')); ?>"><?php _e('El Hotel', 'canquetglas'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/habitaciones/')); ?>"><?php _e('Habitaciones', 'canquetglas'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/pool-bar/')); ?>"><?php _e('Pool Bar', 'canquetglas'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/galeria/')); ?>"><?php _e('Galería', 'canquetglas'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/contacto/')); ?>"><?php _e('Contacto', 'canquetglas'); ?></a></li>
    </ul>
    <a href="<?php echo esc_url(get_theme_mod('booking_url', '#')); ?>" class="btn btn-primary" target="_blank">
        <?php _e('Reservar', 'canquetglas'); ?>
    </a>
</nav>

<!-- Site Header -->
<header class="site-header" id="site-header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <span class="site-logo-text">
                        <span>Can</span> Quetglas
                    </span>
                <?php endif; ?>
            </a>

            <!-- Main Navigation -->
            <nav class="main-nav" role="navigation" aria-label="<?php _e('Main navigation', 'canquetglas'); ?>">
                <ul>
                    <li>
                        <a href="<?php echo esc_url(home_url('/el-hotel/')); ?>" <?php echo is_page('el-hotel') ? 'class="active"' : ''; ?>>
                            <?php _e('El Hotel', 'canquetglas'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/habitaciones/')); ?>" <?php echo (is_page('habitaciones') || is_singular('room')) ? 'class="active"' : ''; ?>>
                            <?php _e('Habitaciones', 'canquetglas'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/pool-bar/')); ?>" <?php echo is_page('pool-bar') ? 'class="active"' : ''; ?>>
                            <?php _e('Pool Bar', 'canquetglas'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/galeria/')); ?>" <?php echo is_page('galeria') ? 'class="active"' : ''; ?>>
                            <?php _e('Galería', 'canquetglas'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/contacto/')); ?>" <?php echo is_page('contacto') ? 'class="active"' : ''; ?>>
                            <?php _e('Contacto', 'canquetglas'); ?>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Header CTA -->
            <div class="header-cta">
                <a href="<?php echo esc_url(get_theme_mod('booking_url', '#')); ?>" class="btn btn-outline-gold" target="_blank">
                    <?php _e('Reservar', 'canquetglas'); ?>
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="menu-toggle" id="menu-toggle" aria-label="<?php _e('Toggle menu', 'canquetglas'); ?>" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>

<main id="main-content" class="site-main">
