<?php
/**
 * Template Name: El Hotel
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
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hotel-hero.jpg'); ?>" alt="El Hotel">
        <?php endif; ?>
    </div>
    <div class="hero-overlay"></div>
    <div class="page-hero-content">
        <span class="hero-subtitle"><?php _e('Descubra', 'canquetglas'); ?></span>
        <h1 class="page-hero-title"><?php _e('El Hotel', 'canquetglas'); ?></h1>
    </div>
</section>

<!-- History Section -->
<section class="section">
    <div class="container container-narrow">
        <div class="text-center fade-in">
            <span class="section-subtitle"><?php _e('Nuestra Historia', 'canquetglas'); ?></span>
            <h2 class="section-title"><?php _e('Un Legado Modernista', 'canquetglas'); ?></h2>
            <div class="section-divider"></div>
        </div>

        <div class="fade-in" style="margin-top: var(--spacing-lg);">
            <p style="font-size: 1.2rem; color: var(--color-light-gray); text-align: center; font-family: var(--font-heading); font-style: italic; margin-bottom: var(--spacing-lg);">
                <?php _e('En 1908, un discípulo de Gaudí dio vida a este palacete modernista que hoy se ha convertido en Hotel Can Quetglas.', 'canquetglas'); ?>
            </p>

            <p style="color: var(--color-gray);">
                <?php _e('El edificio, con sus características formas orgánicas y detalles ornamentales típicos del modernismo catalán, fue testigo de la vida cultural del Palma de principios del siglo XX. Sus paredes han visto pasar generaciones, guardando historias de una época dorada.', 'canquetglas'); ?>
            </p>

            <p style="color: var(--color-gray);">
                <?php _e('Situado en El Terreno, el barrio que en los años 60 se convirtió en el epicentro de la vida bohemia de Mallorca, donde artistas, escritores, cantantes e intelectuales de todo el mundo encontraban su inspiración. Hoy, ese espíritu de creatividad y libertad pervive en cada rincón del hotel.', 'canquetglas'); ?>
            </p>

            <p style="color: var(--color-gray);">
                <?php _e('La cuidadosa restauración ha preservado la esencia arquitectónica original mientras incorpora todas las comodidades contemporáneas, creando un espacio donde el pasado y el presente conviven en perfecta armonía.', 'canquetglas'); ?>
            </p>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section section-dark">
    <div class="container">
        <div class="text-center fade-in">
            <span class="section-subtitle"><?php _e('Experiencia', 'canquetglas'); ?></span>
            <h2 class="section-title"><?php _e('Lo que nos hace únicos', 'canquetglas'); ?></h2>
            <div class="section-divider"></div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--spacing-lg); margin-top: var(--spacing-xl);">
            <!-- Feature 1 -->
            <div class="fade-in text-center">
                <div style="color: var(--color-gold); margin-bottom: var(--spacing-md);">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="48" height="48" style="display: inline-block;">
                        <path d="M3 21h18"></path>
                        <path d="M9 8h1"></path>
                        <path d="M9 12h1"></path>
                        <path d="M9 16h1"></path>
                        <path d="M14 8h1"></path>
                        <path d="M14 12h1"></path>
                        <path d="M14 16h1"></path>
                        <path d="M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16"></path>
                    </svg>
                </div>
                <h3 style="color: var(--color-white); margin-bottom: var(--spacing-sm);"><?php _e('Arquitectura Modernista', 'canquetglas'); ?></h3>
                <p style="color: var(--color-gray);"><?php _e('Un edificio de 1908 diseñado por un discípulo de Gaudí, con detalles ornamentales únicos que han sido cuidadosamente preservados.', 'canquetglas'); ?></p>
            </div>

            <!-- Feature 2 -->
            <div class="fade-in text-center">
                <div style="color: var(--color-gold); margin-bottom: var(--spacing-md);">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="48" height="48" style="display: inline-block;">
                        <path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"></path>
                        <path d="M17 18h1"></path>
                        <path d="M12 18h1"></path>
                        <path d="M7 18h1"></path>
                    </svg>
                </div>
                <h3 style="color: var(--color-white); margin-bottom: var(--spacing-sm);"><?php _e('Piscina de Agua Salada', 'canquetglas'); ?></h3>
                <p style="color: var(--color-gray);"><?php _e('Refrésquese en nuestra piscina de agua salada, más suave y natural para la piel, rodeada de un exuberante jardín mediterráneo.', 'canquetglas'); ?></p>
            </div>

            <!-- Feature 3 -->
            <div class="fade-in text-center">
                <div style="color: var(--color-gold); margin-bottom: var(--spacing-md);">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="48" height="48" style="display: inline-block;">
                        <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                        <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                        <line x1="6" y1="1" x2="6" y2="4"></line>
                        <line x1="10" y1="1" x2="10" y2="4"></line>
                        <line x1="14" y1="1" x2="14" y2="4"></line>
                    </svg>
                </div>
                <h3 style="color: var(--color-white); margin-bottom: var(--spacing-sm);"><?php _e('Adults Only +16', 'canquetglas'); ?></h3>
                <p style="color: var(--color-gray);"><?php _e('Un ambiente tranquilo y sofisticado pensado para adultos que buscan una escapada relajante lejos del bullicio.', 'canquetglas'); ?></p>
            </div>

            <!-- Feature 4 -->
            <div class="fade-in text-center">
                <div style="color: var(--color-gold); margin-bottom: var(--spacing-md);">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="48" height="48" style="display: inline-block;">
                        <path d="M3 11v3a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-3"></path>
                        <path d="M12 19H4a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-3.83"></path>
                        <path d="m3 11 7.77-6.04a2 2 0 0 1 2.46 0L21 11H3Z"></path>
                        <path d="M12.97 19.77 14 22h-4l1.03-2.23"></path>
                    </svg>
                </div>
                <h3 style="color: var(--color-white); margin-bottom: var(--spacing-sm);"><?php _e('9 Habitaciones Únicas', 'canquetglas'); ?></h3>
                <p style="color: var(--color-gray);"><?php _e('Cada habitación tiene su propia personalidad y encanto, ninguna es igual a otra. Una experiencia boutique auténtica.', 'canquetglas'); ?></p>
            </div>

            <!-- Feature 5 -->
            <div class="fade-in text-center">
                <div style="color: var(--color-gold); margin-bottom: var(--spacing-md);">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="48" height="48" style="display: inline-block;">
                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                    </svg>
                </div>
                <h3 style="color: var(--color-white); margin-bottom: var(--spacing-sm);"><?php _e('Jardín Mediterráneo', 'canquetglas'); ?></h3>
                <p style="color: var(--color-gray);"><?php _e('Un oasis verde con plantas autóctonas donde relajarse bajo la sombra de los árboles, disfrutando de la brisa marina.', 'canquetglas'); ?></p>
            </div>

            <!-- Feature 6 -->
            <div class="fade-in text-center">
                <div style="color: var(--color-gold); margin-bottom: var(--spacing-md);">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="48" height="48" style="display: inline-block;">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </div>
                <h3 style="color: var(--color-white); margin-bottom: var(--spacing-sm);"><?php _e('Ubicación Privilegiada', 'canquetglas'); ?></h3>
                <p style="color: var(--color-gray);"><?php _e('En el corazón de El Terreno, a minutos del centro histórico, el Castillo de Bellver y las mejores playas de Palma.', 'canquetglas'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Philosophy Section -->
<section class="section">
    <div class="container">
        <div class="poolbar-content">
            <div class="poolbar-text fade-in-left">
                <span class="section-subtitle"><?php _e('Nuestra Filosofía', 'canquetglas'); ?></span>
                <h2 class="section-title" style="text-align: left;"><?php _e('Your Home Away From Home', 'canquetglas'); ?></h2>
                <div class="section-divider" style="margin: 0 0 var(--spacing-md);"></div>
                <p style="color: var(--color-gray);">
                    <?php _e('En Can Quetglas creemos que viajar es más que visitar un lugar; es sentirse como en casa mientras descubres algo nuevo. Por eso, nos esforzamos en crear un ambiente cálido y personal donde cada huésped se sienta parte de nuestra familia.', 'canquetglas'); ?>
                </p>
                <p style="color: var(--color-gray);">
                    <?php _e('Nuestro equipo está dedicado a hacer de su estancia una experiencia memorable, ofreciendo recomendaciones personalizadas y atención a cada detalle. Queremos que descubra la Mallorca auténtica, la que conocemos y amamos.', 'canquetglas'); ?>
                </p>
                <p style="color: var(--color-gray);">
                    <?php _e('Desayunos con productos locales, consejos de rutas secretas, reservas en los mejores restaurantes... estamos aquí para hacer de su visita algo especial.', 'canquetglas'); ?>
                </p>
            </div>
            <div class="poolbar-image fade-in-right">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/philosophy.jpg'); ?>" alt="Nuestra filosofía" style="height: 500px;">
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section section-dark text-center">
    <div class="container container-narrow fade-in">
        <span class="section-subtitle"><?php _e('Experiencia Can Quetglas', 'canquetglas'); ?></span>
        <h2 class="section-title"><?php _e('Descubra Nuestras Habitaciones', 'canquetglas'); ?></h2>
        <div class="section-divider"></div>
        <p class="section-description" style="margin-bottom: var(--spacing-lg);">
            <?php _e('9 habitaciones únicas, cada una con su propia personalidad y encanto, esperando para ofrecerle el descanso que merece.', 'canquetglas'); ?>
        </p>
        <a href="<?php echo esc_url(home_url('/habitaciones/')); ?>" class="btn btn-primary">
            <?php _e('Ver Habitaciones', 'canquetglas'); ?>
        </a>
    </div>
</section>

<?php get_footer(); ?>
