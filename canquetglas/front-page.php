<?php
/**
 * Front Page Template
 *
 * @package CanQuetglas
 */

get_header();

$hero_image = get_theme_mod('hero_image', get_template_directory_uri() . '/assets/images/hero-placeholder.jpg');
$hero_video = get_theme_mod('hero_video', '');
$slogan = get_theme_mod('hotel_slogan', 'Your home away from home in Palma de Mallorca');
?>

<!-- Hero Section -->
<section class="hero" id="hero">
    <div class="hero-media">
        <?php if ($hero_video) : ?>
            <video autoplay muted loop playsinline poster="<?php echo esc_url($hero_image); ?>">
                <source src="<?php echo esc_url($hero_video); ?>" type="video/mp4">
            </video>
        <?php else : ?>
            <img src="<?php echo esc_url($hero_image); ?>" alt="Hotel Can Quetglas">
        <?php endif; ?>
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-subtitle"><?php _e('Boutique Hotel en Palma de Mallorca', 'canquetglas'); ?></span>
        <h1 class="hero-title">Hotel Can Quetglas</h1>
        <p class="hero-tagline"><?php echo esc_html($slogan); ?></p>
        <div class="hero-cta">
            <a href="<?php echo esc_url(get_theme_mod('booking_url', '#')); ?>" class="btn btn-primary" target="_blank">
                <?php _e('Reservar Estancia', 'canquetglas'); ?>
            </a>
            <a href="<?php echo esc_url(home_url('/el-hotel/')); ?>" class="btn btn-outline" style="margin-left: 1rem;">
                <?php _e('Descubrir', 'canquetglas'); ?>
            </a>
        </div>
    </div>
    <div class="hero-scroll">
        <span><?php _e('Scroll', 'canquetglas'); ?></span>
        <div class="hero-scroll-line"></div>
    </div>
</section>

<!-- Intro Section -->
<section class="intro section">
    <div class="container">
        <div class="intro-content">
            <div class="intro-text fade-in">
                <span class="section-subtitle"><?php _e('Bienvenidos', 'canquetglas'); ?></span>
                <p class="intro-quote">
                    <?php _e('Un palacete modernista de 1908, diseñado por un discípulo de Gaudí, convertido en un refugio de elegancia en el corazón del bohemio barrio de El Terreno', 'canquetglas'); ?>
                </p>
                <p class="intro-description">
                    <?php _e('Descubra nuestras 9 habitaciones únicas, cada una con su propia personalidad, donde la arquitectura modernista se encuentra con el confort contemporáneo. Un oasis de tranquilidad a pocos minutos del centro de Palma.', 'canquetglas'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/el-hotel/')); ?>" class="btn btn-outline-gold">
                    <?php _e('Nuestra Historia', 'canquetglas'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Rooms Preview Section -->
<section class="section section-dark">
    <div class="container">
        <div class="section-header fade-in">
            <span class="section-subtitle"><?php _e('Alojamiento', 'canquetglas'); ?></span>
            <h2 class="section-title"><?php _e('Nuestras Habitaciones', 'canquetglas'); ?></h2>
            <div class="section-divider"></div>
            <p class="section-description">
                <?php _e('9 habitaciones únicas con carácter propio, donde cada detalle ha sido cuidadosamente pensado para su confort', 'canquetglas'); ?>
            </p>
        </div>

        <div class="rooms-grid">
            <?php
            $rooms = new WP_Query(array(
                'post_type'      => 'room',
                'posts_per_page' => 6,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ));

            if ($rooms->have_posts()) :
                while ($rooms->have_posts()) : $rooms->the_post();
                    $size = get_post_meta(get_the_ID(), '_room_size', true);
                    $bed_type = get_post_meta(get_the_ID(), '_room_bed_type', true);
            ?>
                <article class="room-card fade-in">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('room-card'); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/room-placeholder.jpg'); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                        <div class="room-card-overlay">
                            <h3 class="room-card-title"><?php the_title(); ?></h3>
                            <?php if ($size || $bed_type) : ?>
                                <span class="room-card-subtitle">
                                    <?php echo esc_html($size); ?><?php echo ($size && $bed_type) ? ' &middot; ' : ''; ?><?php echo esc_html($bed_type); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </a>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <!-- Placeholder rooms if no posts yet -->
                <?php for ($i = 1; $i <= 3; $i++) : ?>
                <article class="room-card fade-in">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/room-placeholder.jpg'); ?>" alt="Habitación <?php echo $i; ?>">
                    <div class="room-card-overlay">
                        <h3 class="room-card-title"><?php printf(__('Habitación %d', 'canquetglas'), $i); ?></h3>
                        <span class="room-card-subtitle"><?php _e('Próximamente', 'canquetglas'); ?></span>
                    </div>
                </article>
                <?php endfor; ?>
            <?php endif; ?>
        </div>

        <div class="text-center" style="margin-top: var(--spacing-xl);">
            <a href="<?php echo esc_url(home_url('/habitaciones/')); ?>" class="btn btn-outline-gold">
                <?php _e('Ver Todas las Habitaciones', 'canquetglas'); ?>
            </a>
        </div>
    </div>
</section>

<!-- Pool Bar Section -->
<section class="poolbar section">
    <div class="container">
        <div class="poolbar-content">
            <div class="poolbar-image fade-in-left">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/poolbar-placeholder.jpg'); ?>" alt="Pool Bar">
            </div>
            <div class="poolbar-text fade-in-right">
                <span class="section-subtitle"><?php _e('Pool Bar', 'canquetglas'); ?></span>
                <h2 class="section-title" style="text-align: left;"><?php _e('Sabores Mediterráneos', 'canquetglas'); ?></h2>
                <div class="section-divider" style="margin: 0 0 var(--spacing-md);"></div>
                <p class="section-description" style="margin: 0 0 var(--spacing-md);">
                    <?php _e('Disfrute de nuestra selección de tapas junto a la piscina de agua salada, rodeado del exuberante jardín mediterráneo. El lugar perfecto para relajarse bajo el sol de Mallorca.', 'canquetglas'); ?>
                </p>

                <div class="menu-categories">
                    <div class="menu-category">
                        <h4 class="menu-category-title"><?php _e('Tapas', 'canquetglas'); ?></h4>
                        <p class="menu-items"><?php _e('Tabla de quesos artesanos &middot; Jamón ibérico de bellota &middot; Nachos con guacamole', 'canquetglas'); ?></p>
                    </div>
                    <div class="menu-category">
                        <h4 class="menu-category-title"><?php _e('Snacks', 'canquetglas'); ?></h4>
                        <p class="menu-items"><?php _e('Pizzas caseras &middot; Sandwiches gourmet &middot; Ensaladas frescas', 'canquetglas'); ?></p>
                    </div>
                </div>

                <a href="<?php echo esc_url(home_url('/pool-bar/')); ?>" class="btn btn-outline-gold" style="margin-top: var(--spacing-md);">
                    <?php _e('Descubrir el Pool Bar', 'canquetglas'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Preview -->
<section class="section section-dark">
    <div class="container">
        <div class="section-header fade-in">
            <span class="section-subtitle"><?php _e('Galería', 'canquetglas'); ?></span>
            <h2 class="section-title"><?php _e('Momentos en Can Quetglas', 'canquetglas'); ?></h2>
            <div class="section-divider"></div>
        </div>

        <div class="gallery-grid">
            <?php
            $gallery = new WP_Query(array(
                'post_type'      => 'gallery',
                'posts_per_page' => 8,
                'orderby'        => 'rand',
            ));

            if ($gallery->have_posts()) :
                while ($gallery->have_posts()) : $gallery->the_post();
            ?>
                <div class="gallery-item fade-in" data-large="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'gallery-large')); ?>">
                    <?php the_post_thumbnail('gallery-thumb'); ?>
                    <div class="gallery-item-overlay">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                            <path d="M11 8v6"></path>
                            <path d="M8 11h6"></path>
                        </svg>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Placeholder gallery
                for ($i = 1; $i <= 8; $i++) :
            ?>
                <div class="gallery-item fade-in">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/gallery-placeholder.jpg'); ?>" alt="Gallery <?php echo $i; ?>">
                    <div class="gallery-item-overlay">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                            <path d="M11 8v6"></path>
                            <path d="M8 11h6"></path>
                        </svg>
                    </div>
                </div>
            <?php
                endfor;
            endif;
            ?>
        </div>

        <div class="text-center" style="margin-top: var(--spacing-xl);">
            <a href="<?php echo esc_url(home_url('/galeria/')); ?>" class="btn btn-outline-gold">
                <?php _e('Ver Galería Completa', 'canquetglas'); ?>
            </a>
        </div>
    </div>
</section>

<!-- Location Section -->
<section class="location section">
    <div class="container">
        <div class="location-content">
            <div class="location-info fade-in-left">
                <span class="section-subtitle"><?php _e('Ubicación', 'canquetglas'); ?></span>
                <h2 class="section-title" style="text-align: left;"><?php _e('El Terreno, Palma', 'canquetglas'); ?></h2>
                <div class="section-divider" style="margin: 0 0 var(--spacing-md);"></div>
                <p class="section-description" style="margin: 0;">
                    <?php _e('Situado en el histórico barrio de El Terreno, donde artistas, escritores e intelectuales de la Palma bohemia de los años 60 encontraron su inspiración. A pocos minutos del centro histórico y las playas.', 'canquetglas'); ?>
                </p>

                <div class="location-details">
                    <div class="location-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <div>
                            <strong><?php _e('Dirección', 'canquetglas'); ?></strong>
                            <?php echo esc_html(get_theme_mod('hotel_address', 'El Terreno, 07014 Palma de Mallorca')); ?>
                        </div>
                    </div>
                    <div class="location-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                        <div>
                            <strong><?php _e('Desde el aeropuerto', 'canquetglas'); ?></strong>
                            <?php _e('15 km / 20 minutos', 'canquetglas'); ?>
                        </div>
                    </div>
                    <div class="location-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 7V5c0-1.1.9-2 2-2h2"></path>
                            <path d="M17 3h2c1.1 0 2 .9 2 2v2"></path>
                            <path d="M21 17v2c0 1.1-.9 2-2 2h-2"></path>
                            <path d="M7 21H5c-1.1 0-2-.9-2-2v-2"></path>
                            <rect x="7" y="7" width="10" height="10" rx="1"></rect>
                        </svg>
                        <div>
                            <strong><?php _e('Centro histórico', 'canquetglas'); ?></strong>
                            <?php _e('10 minutos en coche', 'canquetglas'); ?>
                        </div>
                    </div>
                </div>

                <a href="<?php echo esc_url(home_url('/contacto/')); ?>" class="btn btn-outline-gold" style="margin-top: var(--spacing-md);">
                    <?php _e('Cómo Llegar', 'canquetglas'); ?>
                </a>
            </div>
            <div class="location-map fade-in-right">
                <?php
                $maps_embed = get_theme_mod('google_maps_embed', '');
                if ($maps_embed) :
                    echo $maps_embed;
                else :
                ?>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3073.8!2d2.6!3d39.57!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMznCsDM0JzEyLjAiTiAywrAzNicwMC4wIkU!5e0!3m2!1ses!2ses!4v1234567890"
                        style="border:0; width: 100%; height: 100%;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section section-dark text-center">
    <div class="container container-narrow">
        <div class="fade-in">
            <span class="section-subtitle"><?php _e('Reserve su estancia', 'canquetglas'); ?></span>
            <h2 class="section-title"><?php _e('Su refugio le espera', 'canquetglas'); ?></h2>
            <div class="section-divider"></div>
            <p class="section-description" style="margin-bottom: var(--spacing-lg);">
                <?php _e('Experimente la combinación perfecta de historia, diseño y hospitalidad mediterránea en el corazón de Palma de Mallorca.', 'canquetglas'); ?>
            </p>
            <a href="<?php echo esc_url(get_theme_mod('booking_url', '#')); ?>" class="btn btn-primary" target="_blank">
                <?php _e('Reservar Ahora', 'canquetglas'); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
