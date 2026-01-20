<?php
/**
 * Template Name: Pool Bar
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
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/poolbar-hero.jpg'); ?>" alt="Pool Bar">
        <?php endif; ?>
    </div>
    <div class="hero-overlay"></div>
    <div class="page-hero-content">
        <span class="hero-subtitle"><?php _e('Gastronomía', 'canquetglas'); ?></span>
        <h1 class="page-hero-title"><?php _e('Pool Bar', 'canquetglas'); ?></h1>
    </div>
</section>

<!-- Intro -->
<section class="section">
    <div class="container">
        <div class="poolbar-content">
            <div class="poolbar-text fade-in-left">
                <span class="section-subtitle"><?php _e('Sabores al Sol', 'canquetglas'); ?></span>
                <h2 class="section-title" style="text-align: left;"><?php _e('El Placer de lo Simple', 'canquetglas'); ?></h2>
                <div class="section-divider" style="margin: 0 0 var(--spacing-md);"></div>
                <p style="color: var(--color-gray);">
                    <?php _e('Junto a nuestra piscina de agua salada, rodeado del exuberante jardín mediterráneo, nuestro Pool Bar es el lugar perfecto para disfrutar de los sabores auténticos de Mallorca.', 'canquetglas'); ?>
                </p>
                <p style="color: var(--color-gray);">
                    <?php _e('Desde un refrescante aperitivo hasta una comida ligera bajo el sol, ofrecemos una selección cuidada de tapas y snacks preparados con los mejores productos locales.', 'canquetglas'); ?>
                </p>
                <p style="color: var(--color-gold); font-style: italic; margin-top: var(--spacing-md);">
                    <?php _e('Abierto de 10:00 a 20:00 para huéspedes del hotel', 'canquetglas'); ?>
                </p>
            </div>
            <div class="poolbar-image fade-in-right">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/poolbar-1.jpg'); ?>" alt="Pool Bar" style="height: 500px;">
            </div>
        </div>
    </div>
</section>

<!-- Menu Section -->
<section class="section section-dark">
    <div class="container container-narrow">
        <div class="text-center fade-in">
            <span class="section-subtitle"><?php _e('Nuestra Carta', 'canquetglas'); ?></span>
            <h2 class="section-title"><?php _e('Sabores Mediterráneos', 'canquetglas'); ?></h2>
            <div class="section-divider"></div>
        </div>

        <div style="margin-top: var(--spacing-xl);">
            <!-- Tapas -->
            <div class="fade-in" style="margin-bottom: var(--spacing-xl);">
                <h3 style="color: var(--color-gold); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.2em; margin-bottom: var(--spacing-md); padding-bottom: var(--spacing-sm); border-bottom: 1px solid var(--color-dark-gray);">
                    <?php _e('Tapas', 'canquetglas'); ?>
                </h3>
                <div style="display: grid; gap: var(--spacing-md);">
                    <div style="display: flex; justify-content: space-between; align-items: baseline; color: var(--color-gray);">
                        <div>
                            <span style="color: var(--color-white);"><?php _e('Tabla de Quesos Artesanos', 'canquetglas'); ?></span>
                            <p style="font-size: 0.9rem; margin-top: 4px;"><?php _e('Selección de quesos mallorquines con membrillo y tostadas', 'canquetglas'); ?></p>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: baseline; color: var(--color-gray);">
                        <div>
                            <span style="color: var(--color-white);"><?php _e('Jamón Ibérico de Bellota', 'canquetglas'); ?></span>
                            <p style="font-size: 0.9rem; margin-top: 4px;"><?php _e('Cortado a mano, con pan con tomate', 'canquetglas'); ?></p>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: baseline; color: var(--color-gray);">
                        <div>
                            <span style="color: var(--color-white);"><?php _e('Nachos con Guacamole', 'canquetglas'); ?></span>
                            <p style="font-size: 0.9rem; margin-top: 4px;"><?php _e('Tortilla chips con guacamole casero, pico de gallo y crema agria', 'canquetglas'); ?></p>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: baseline; color: var(--color-gray);">
                        <div>
                            <span style="color: var(--color-white);"><?php _e('Aceitunas Mallorquinas', 'canquetglas'); ?></span>
                            <p style="font-size: 0.9rem; margin-top: 4px;"><?php _e('Variedad de aceitunas locales aliñadas', 'canquetglas'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Snacks -->
            <div class="fade-in" style="margin-bottom: var(--spacing-xl);">
                <h3 style="color: var(--color-gold); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.2em; margin-bottom: var(--spacing-md); padding-bottom: var(--spacing-sm); border-bottom: 1px solid var(--color-dark-gray);">
                    <?php _e('Snacks & Principales', 'canquetglas'); ?>
                </h3>
                <div style="display: grid; gap: var(--spacing-md);">
                    <div style="display: flex; justify-content: space-between; align-items: baseline; color: var(--color-gray);">
                        <div>
                            <span style="color: var(--color-white);"><?php _e('Pizzas Caseras', 'canquetglas'); ?></span>
                            <p style="font-size: 0.9rem; margin-top: 4px;"><?php _e('Margherita, Prosciutto, Vegetariana - masa fina y crujiente', 'canquetglas'); ?></p>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: baseline; color: var(--color-gray);">
                        <div>
                            <span style="color: var(--color-white);"><?php _e('Sandwiches Gourmet', 'canquetglas'); ?></span>
                            <p style="font-size: 0.9rem; margin-top: 4px;"><?php _e('Club, Vegetal, Jamón y Queso - con pan de masa madre', 'canquetglas'); ?></p>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: baseline; color: var(--color-gray);">
                        <div>
                            <span style="color: var(--color-white);"><?php _e('Ensalada Mediterránea', 'canquetglas'); ?></span>
                            <p style="font-size: 0.9rem; margin-top: 4px;"><?php _e('Productos frescos de temporada con aceite de oliva virgen extra', 'canquetglas'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bebidas -->
            <div class="fade-in">
                <h3 style="color: var(--color-gold); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.2em; margin-bottom: var(--spacing-md); padding-bottom: var(--spacing-sm); border-bottom: 1px solid var(--color-dark-gray);">
                    <?php _e('Bebidas', 'canquetglas'); ?>
                </h3>
                <div style="display: grid; gap: var(--spacing-md);">
                    <div style="color: var(--color-gray);">
                        <span style="color: var(--color-white);"><?php _e('Vinos Mallorquines', 'canquetglas'); ?></span>
                        <p style="font-size: 0.9rem; margin-top: 4px;"><?php _e('Selección de D.O. Binissalem y Pla i Llevant', 'canquetglas'); ?></p>
                    </div>
                    <div style="color: var(--color-gray);">
                        <span style="color: var(--color-white);"><?php _e('Cócteles Refrescantes', 'canquetglas'); ?></span>
                        <p style="font-size: 0.9rem; margin-top: 4px;"><?php _e('Sangría, Gin Tonic, Aperol Spritz, Mojito', 'canquetglas'); ?></p>
                    </div>
                    <div style="color: var(--color-gray);">
                        <span style="color: var(--color-white);"><?php _e('Cervezas & Refrescos', 'canquetglas'); ?></span>
                        <p style="font-size: 0.9rem; margin-top: 4px;"><?php _e('Cerveza artesanal local, refrescos, zumos naturales', 'canquetglas'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <p style="text-align: center; color: var(--color-gray); font-size: 0.85rem; margin-top: var(--spacing-xl); font-style: italic;">
            <?php _e('* Consulte con nuestro personal para opciones sin gluten y alérgenos', 'canquetglas'); ?>
        </p>
    </div>
</section>

<!-- Pool Section -->
<section class="section">
    <div class="container">
        <div class="poolbar-content" style="grid-template-columns: 1fr 1fr;">
            <div class="poolbar-image fade-in-left" style="order: 2;">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/pool.jpg'); ?>" alt="Piscina" style="height: 450px;">
            </div>
            <div class="poolbar-text fade-in-right" style="order: 1;">
                <span class="section-subtitle"><?php _e('Relax', 'canquetglas'); ?></span>
                <h2 class="section-title" style="text-align: left;"><?php _e('Piscina de Agua Salada', 'canquetglas'); ?></h2>
                <div class="section-divider" style="margin: 0 0 var(--spacing-md);"></div>
                <p style="color: var(--color-gray);">
                    <?php _e('Nuestra piscina de agua salada ofrece una experiencia de baño más natural y suave para la piel. Sin cloro, sin irritaciones, solo el placer de refrescarse bajo el sol mediterráneo.', 'canquetglas'); ?>
                </p>
                <p style="color: var(--color-gray);">
                    <?php _e('Rodeada de tumbonas confortables y sombrillas, es el lugar ideal para pasar una tarde relajante leyendo un libro o simplemente disfrutando del silencio y la brisa.', 'canquetglas'); ?>
                </p>
                <ul style="color: var(--color-gray); margin-top: var(--spacing-md); list-style: none;">
                    <li style="display: flex; align-items: center; gap: var(--spacing-sm); margin-bottom: var(--spacing-xs);">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2" width="16" height="16"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <?php _e('Agua salada natural', 'canquetglas'); ?>
                    </li>
                    <li style="display: flex; align-items: center; gap: var(--spacing-sm); margin-bottom: var(--spacing-xs);">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2" width="16" height="16"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <?php _e('Tumbonas y sombrillas incluidas', 'canquetglas'); ?>
                    </li>
                    <li style="display: flex; align-items: center; gap: var(--spacing-sm); margin-bottom: var(--spacing-xs);">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2" width="16" height="16"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <?php _e('Toallas de piscina disponibles', 'canquetglas'); ?>
                    </li>
                    <li style="display: flex; align-items: center; gap: var(--spacing-sm);">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2" width="16" height="16"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <?php _e('Servicio de bar en la piscina', 'canquetglas'); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
