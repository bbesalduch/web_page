<?php
/**
 * Single Room Template
 *
 * @package CanQuetglas
 */

get_header();

while (have_posts()) : the_post();
    $size = get_post_meta(get_the_ID(), '_room_size', true);
    $capacity = get_post_meta(get_the_ID(), '_room_capacity', true);
    $bed_type = get_post_meta(get_the_ID(), '_room_bed_type', true);
    $price = get_post_meta(get_the_ID(), '_room_price', true);
    $features = canquetglas_get_room_features(get_the_ID());
?>

<!-- Room Hero -->
<section class="page-hero" style="height: 70vh;">
    <div class="hero-media">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('hero'); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/room-placeholder.jpg'); ?>" alt="<?php the_title_attribute(); ?>">
        <?php endif; ?>
    </div>
    <div class="hero-overlay"></div>
    <div class="page-hero-content">
        <span class="hero-subtitle"><?php _e('Habitación', 'canquetglas'); ?></span>
        <h1 class="page-hero-title"><?php the_title(); ?></h1>
        <?php if ($size || $bed_type) : ?>
            <p style="color: var(--color-gray); margin-top: var(--spacing-sm);">
                <?php echo esc_html($size); ?><?php echo ($size && $bed_type) ? ' &middot; ' : ''; ?><?php echo esc_html($bed_type); ?>
            </p>
        <?php endif; ?>
    </div>
</section>

<!-- Room Content -->
<section class="section">
    <div class="container">
        <div class="poolbar-content" style="gap: var(--spacing-xxl);">
            <!-- Room Description -->
            <div class="fade-in-left">
                <span class="section-subtitle"><?php _e('Descripción', 'canquetglas'); ?></span>
                <h2 class="section-title" style="text-align: left; font-size: 2rem;"><?php the_title(); ?></h2>
                <div class="section-divider" style="margin: 0 0 var(--spacing-md);"></div>

                <div style="color: var(--color-gray);">
                    <?php the_content(); ?>
                </div>

                <?php if (!empty($features)) : ?>
                    <div style="margin-top: var(--spacing-lg);">
                        <h4 style="color: var(--color-gold); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.15em; margin-bottom: var(--spacing-md);">
                            <?php _e('Características', 'canquetglas'); ?>
                        </h4>
                        <div class="room-features">
                            <?php foreach ($features as $feature) : ?>
                                <div class="room-feature">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <span><?php echo esc_html($feature); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Room Details -->
            <div class="fade-in-right">
                <div style="background-color: var(--color-dark); padding: var(--spacing-lg); position: sticky; top: 100px;">
                    <h3 style="color: var(--color-white); margin-bottom: var(--spacing-md);"><?php _e('Detalles', 'canquetglas'); ?></h3>

                    <?php if ($size) : ?>
                        <div style="display: flex; justify-content: space-between; padding: var(--spacing-sm) 0; border-bottom: 1px solid var(--color-dark-gray);">
                            <span style="color: var(--color-gray);"><?php _e('Tamaño', 'canquetglas'); ?></span>
                            <span style="color: var(--color-white);"><?php echo esc_html($size); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ($capacity) : ?>
                        <div style="display: flex; justify-content: space-between; padding: var(--spacing-sm) 0; border-bottom: 1px solid var(--color-dark-gray);">
                            <span style="color: var(--color-gray);"><?php _e('Capacidad', 'canquetglas'); ?></span>
                            <span style="color: var(--color-white);"><?php echo esc_html($capacity); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ($bed_type) : ?>
                        <div style="display: flex; justify-content: space-between; padding: var(--spacing-sm) 0; border-bottom: 1px solid var(--color-dark-gray);">
                            <span style="color: var(--color-gray);"><?php _e('Cama', 'canquetglas'); ?></span>
                            <span style="color: var(--color-white);"><?php echo esc_html($bed_type); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ($price) : ?>
                        <div style="margin-top: var(--spacing-lg); text-align: center;">
                            <span style="color: var(--color-gray); font-size: 0.85rem; display: block;"><?php _e('Desde', 'canquetglas'); ?></span>
                            <span style="color: var(--color-gold); font-size: 2.5rem; font-family: var(--font-heading);"><?php echo esc_html($price); ?>€</span>
                            <span style="color: var(--color-gray); font-size: 0.85rem; display: block;"><?php _e('por noche', 'canquetglas'); ?></span>
                        </div>
                    <?php endif; ?>

                    <a href="<?php echo esc_url(get_theme_mod('booking_url', '#')); ?>" class="btn btn-primary" style="width: 100%; margin-top: var(--spacing-lg); text-align: center;" target="_blank">
                        <?php _e('Reservar Esta Habitación', 'canquetglas'); ?>
                    </a>

                    <a href="<?php echo esc_url(home_url('/contacto/')); ?>" class="btn btn-outline-gold" style="width: 100%; margin-top: var(--spacing-sm); text-align: center;">
                        <?php _e('Consultar Disponibilidad', 'canquetglas'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Other Rooms -->
<section class="section section-dark">
    <div class="container">
        <div class="text-center fade-in">
            <span class="section-subtitle"><?php _e('Más opciones', 'canquetglas'); ?></span>
            <h2 class="section-title"><?php _e('Otras Habitaciones', 'canquetglas'); ?></h2>
            <div class="section-divider"></div>
        </div>

        <div class="rooms-grid" style="margin-top: var(--spacing-xl);">
            <?php
            $other_rooms = new WP_Query(array(
                'post_type'      => 'room',
                'posts_per_page' => 3,
                'post__not_in'   => array(get_the_ID()),
                'orderby'        => 'rand',
            ));

            if ($other_rooms->have_posts()) :
                while ($other_rooms->have_posts()) : $other_rooms->the_post();
                    $room_size = get_post_meta(get_the_ID(), '_room_size', true);
                    $room_bed = get_post_meta(get_the_ID(), '_room_bed_type', true);
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
                            <?php if ($room_size || $room_bed) : ?>
                                <span class="room-card-subtitle">
                                    <?php echo esc_html($room_size); ?><?php echo ($room_size && $room_bed) ? ' &middot; ' : ''; ?><?php echo esc_html($room_bed); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </a>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <div class="text-center" style="margin-top: var(--spacing-xl);">
            <a href="<?php echo esc_url(home_url('/habitaciones/')); ?>" class="btn btn-outline-gold">
                <?php _e('Ver Todas las Habitaciones', 'canquetglas'); ?>
            </a>
        </div>
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
