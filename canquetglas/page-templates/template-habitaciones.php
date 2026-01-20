<?php
/**
 * Template Name: Habitaciones
 *
 * @package CanQuetglas
 */

get_header();
?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="hero-media">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('hero'); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/rooms-hero.jpg'); ?>" alt="Habitaciones">
        <?php endif; ?>
    </div>
    <div class="hero-overlay"></div>
    <div class="page-hero-content">
        <span class="hero-subtitle"><?php _e('Alojamiento', 'canquetglas'); ?></span>
        <h1 class="page-hero-title"><?php _e('Habitaciones', 'canquetglas'); ?></h1>
    </div>
</section>

<!-- Intro -->
<section class="section">
    <div class="container container-narrow text-center">
        <div class="fade-in">
            <p style="font-size: 1.3rem; color: var(--color-light-gray); font-family: var(--font-heading); font-style: italic;">
                <?php _e('9 habitaciones únicas, cada una con su propia personalidad. Ninguna es igual a otra, porque creemos que cada estancia debe ser tan especial como usted.', 'canquetglas'); ?>
            </p>
        </div>
    </div>
</section>

<!-- Rooms Grid -->
<section class="section section-dark">
    <div class="container">
        <div class="rooms-grid" style="gap: var(--spacing-lg);">
            <?php
            $rooms = new WP_Query(array(
                'post_type'      => 'room',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ));

            if ($rooms->have_posts()) :
                while ($rooms->have_posts()) : $rooms->the_post();
                    $size = get_post_meta(get_the_ID(), '_room_size', true);
                    $capacity = get_post_meta(get_the_ID(), '_room_capacity', true);
                    $bed_type = get_post_meta(get_the_ID(), '_room_bed_type', true);
                    $price = get_post_meta(get_the_ID(), '_room_price', true);
                    $features = canquetglas_get_room_features(get_the_ID());
            ?>
                <article class="room-card fade-in" style="aspect-ratio: 16/10;">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('room-card'); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/room-placeholder.jpg'); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                        <div class="room-card-overlay" style="padding: var(--spacing-xl) var(--spacing-md);">
                            <h3 class="room-card-title" style="font-size: 1.75rem;"><?php the_title(); ?></h3>
                            <div style="margin: var(--spacing-sm) 0;">
                                <?php if ($size) : ?>
                                    <span style="color: var(--color-gray); font-size: 0.9rem;"><?php echo esc_html($size); ?></span>
                                <?php endif; ?>
                                <?php if ($size && $bed_type) : ?>
                                    <span style="color: var(--color-gold);"> &middot; </span>
                                <?php endif; ?>
                                <?php if ($bed_type) : ?>
                                    <span style="color: var(--color-gray); font-size: 0.9rem;"><?php echo esc_html($bed_type); ?></span>
                                <?php endif; ?>
                            </div>
                            <?php if ($price) : ?>
                                <p style="color: var(--color-gold); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em;">
                                    <?php printf(__('Desde %s€/noche', 'canquetglas'), $price); ?>
                                </p>
                            <?php endif; ?>
                            <span class="btn btn-outline" style="margin-top: var(--spacing-sm); padding: 0.75rem 1.5rem; font-size: 0.7rem;">
                                <?php _e('Ver Detalles', 'canquetglas'); ?>
                            </span>
                        </div>
                    </a>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Placeholder rooms
                $placeholder_rooms = array(
                    array('name' => 'Suite Can Quetglas', 'size' => '35 m²', 'bed' => 'King Size'),
                    array('name' => 'Habitación Modernista', 'size' => '28 m²', 'bed' => 'King Size'),
                    array('name' => 'Habitación Jardín', 'size' => '25 m²', 'bed' => 'Queen Size'),
                    array('name' => 'Habitación Terraza', 'size' => '22 m²', 'bed' => 'Queen Size'),
                    array('name' => 'Habitación Bohemia', 'size' => '24 m²', 'bed' => 'King Size'),
                    array('name' => 'Habitación El Terreno', 'size' => '20 m²', 'bed' => 'Double'),
                    array('name' => 'Habitación Artista', 'size' => '22 m²', 'bed' => 'Double'),
                    array('name' => 'Habitación Poeta', 'size' => '18 m²', 'bed' => 'Double'),
                    array('name' => 'Habitación Músico', 'size' => '18 m²', 'bed' => 'Double'),
                );
                foreach ($placeholder_rooms as $room) :
            ?>
                <article class="room-card fade-in" style="aspect-ratio: 16/10;">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/room-placeholder.jpg'); ?>" alt="<?php echo esc_attr($room['name']); ?>">
                    <div class="room-card-overlay" style="padding: var(--spacing-xl) var(--spacing-md);">
                        <h3 class="room-card-title" style="font-size: 1.75rem;"><?php echo esc_html($room['name']); ?></h3>
                        <div style="margin: var(--spacing-sm) 0;">
                            <span style="color: var(--color-gray); font-size: 0.9rem;"><?php echo esc_html($room['size']); ?></span>
                            <span style="color: var(--color-gold);"> &middot; </span>
                            <span style="color: var(--color-gray); font-size: 0.9rem;"><?php echo esc_html($room['bed']); ?></span>
                        </div>
                    </div>
                </article>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Amenities -->
<section class="section">
    <div class="container">
        <div class="text-center fade-in">
            <span class="section-subtitle"><?php _e('Comodidades', 'canquetglas'); ?></span>
            <h2 class="section-title"><?php _e('En Todas las Habitaciones', 'canquetglas'); ?></h2>
            <div class="section-divider"></div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--spacing-md); margin-top: var(--spacing-xl); max-width: 1000px; margin-left: auto; margin-right: auto;">
            <?php
            $amenities = array(
                array('icon' => 'wifi', 'name' => __('WiFi de alta velocidad', 'canquetglas')),
                array('icon' => 'tv', 'name' => __('Smart TV', 'canquetglas')),
                array('icon' => 'snowflake', 'name' => __('Aire acondicionado', 'canquetglas')),
                array('icon' => 'coffee', 'name' => __('Cafetera Nespresso', 'canquetglas')),
                array('icon' => 'box', 'name' => __('Caja fuerte', 'canquetglas')),
                array('icon' => 'droplet', 'name' => __('Amenities premium', 'canquetglas')),
                array('icon' => 'wind', 'name' => __('Secador de pelo', 'canquetglas')),
                array('icon' => 'moon', 'name' => __('Ropa de cama de lujo', 'canquetglas')),
            );

            foreach ($amenities as $amenity) :
            ?>
                <div class="fade-in" style="display: flex; align-items: center; gap: var(--spacing-sm); color: var(--color-gray);">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="20" height="20">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span><?php echo esc_html($amenity['name']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section section-dark text-center">
    <div class="container container-narrow fade-in">
        <span class="section-subtitle"><?php _e('Reserve ya', 'canquetglas'); ?></span>
        <h2 class="section-title"><?php _e('Encuentre su habitación ideal', 'canquetglas'); ?></h2>
        <div class="section-divider"></div>
        <p class="section-description" style="margin-bottom: var(--spacing-lg);">
            <?php _e('Consulte disponibilidad y reserve directamente para obtener el mejor precio garantizado.', 'canquetglas'); ?>
        </p>
        <a href="<?php echo esc_url(get_theme_mod('booking_url', '#')); ?>" class="btn btn-primary" target="_blank">
            <?php _e('Reservar Ahora', 'canquetglas'); ?>
        </a>
    </div>
</section>

<?php get_footer(); ?>
