<?php
/**
 * Template Name: Contacto
 *
 * @package CanQuetglas
 */

get_header();

$phone = get_theme_mod('hotel_phone', '+34 XXX XXX XXX');
$email = get_theme_mod('hotel_email', 'info@hotelcanquetglas.com');
$address = get_theme_mod('hotel_address', 'El Terreno, 07014 Palma de Mallorca');
?>

<!-- Page Hero -->
<section class="page-hero" style="height: 50vh; min-height: 350px;">
    <div class="hero-media">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('hero'); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/contact-hero.jpg'); ?>" alt="Contacto">
        <?php endif; ?>
    </div>
    <div class="hero-overlay"></div>
    <div class="page-hero-content">
        <span class="hero-subtitle"><?php _e('Hablemos', 'canquetglas'); ?></span>
        <h1 class="page-hero-title"><?php _e('Contacto', 'canquetglas'); ?></h1>
    </div>
</section>

<!-- Contact Section -->
<section class="section">
    <div class="container">
        <div class="contact-content">
            <!-- Contact Info -->
            <div class="fade-in-left">
                <span class="section-subtitle"><?php _e('Información', 'canquetglas'); ?></span>
                <h2 class="section-title" style="text-align: left; font-size: 2rem;"><?php _e('Estamos aquí para ayudarle', 'canquetglas'); ?></h2>
                <div class="section-divider" style="margin: 0 0 var(--spacing-md);"></div>

                <p style="color: var(--color-gray); margin-bottom: var(--spacing-lg);">
                    <?php _e('¿Tiene alguna pregunta sobre su estancia? ¿Necesita información adicional? No dude en contactarnos. Estaremos encantados de atenderle.', 'canquetglas'); ?>
                </p>

                <div class="location-details">
                    <!-- Address -->
                    <div class="location-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <div>
                            <strong><?php _e('Dirección', 'canquetglas'); ?></strong>
                            <?php echo esc_html($address); ?>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="location-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <div>
                            <strong><?php _e('Teléfono', 'canquetglas'); ?></strong>
                            <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>" style="color: var(--color-gray);"><?php echo esc_html($phone); ?></a>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="location-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                        </svg>
                        <div>
                            <strong><?php _e('Email', 'canquetglas'); ?></strong>
                            <a href="mailto:<?php echo esc_attr($email); ?>" style="color: var(--color-gray);"><?php echo esc_html($email); ?></a>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="location-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <div>
                            <strong><?php _e('Recepción', 'canquetglas'); ?></strong>
                            <?php _e('24 horas', 'canquetglas'); ?>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div style="margin-top: var(--spacing-lg);">
                    <strong style="color: var(--color-white); display: block; margin-bottom: var(--spacing-sm);"><?php _e('Síguenos', 'canquetglas'); ?></strong>
                    <div class="footer-social" style="justify-content: flex-start;">
                        <?php if ($instagram = get_theme_mod('social_instagram')) : ?>
                            <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener" aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>
                            </a>
                        <?php endif; ?>
                        <?php if ($facebook = get_theme_mod('social_facebook')) : ?>
                            <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>
                            </a>
                        <?php endif; ?>
                        <?php if ($tripadvisor = get_theme_mod('social_tripadvisor')) : ?>
                            <a href="<?php echo esc_url($tripadvisor); ?>" target="_blank" rel="noopener" aria-label="TripAdvisor">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm4-6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm2 6c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form fade-in-right">
                <h3 style="color: var(--color-white); margin-bottom: var(--spacing-md);"><?php _e('Envíenos un mensaje', 'canquetglas'); ?></h3>
                <form id="contact-form" method="post">
                    <?php wp_nonce_field('canquetglas_contact', 'contact_nonce'); ?>

                    <div class="form-group">
                        <label for="contact-name" class="form-label"><?php _e('Nombre *', 'canquetglas'); ?></label>
                        <input type="text" id="contact-name" name="name" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label for="contact-email" class="form-label"><?php _e('Email *', 'canquetglas'); ?></label>
                        <input type="email" id="contact-email" name="email" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label for="contact-phone" class="form-label"><?php _e('Teléfono', 'canquetglas'); ?></label>
                        <input type="tel" id="contact-phone" name="phone" class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="contact-message" class="form-label"><?php _e('Mensaje *', 'canquetglas'); ?></label>
                        <textarea id="contact-message" name="message" class="form-textarea" rows="5" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary form-submit">
                        <?php _e('Enviar Mensaje', 'canquetglas'); ?>
                    </button>

                    <div id="form-message" style="margin-top: var(--spacing-md); display: none;"></div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="section section-dark" style="padding-top: 0;">
    <div class="container">
        <div class="text-center fade-in" style="margin-bottom: var(--spacing-lg);">
            <span class="section-subtitle"><?php _e('Ubicación', 'canquetglas'); ?></span>
            <h2 class="section-title"><?php _e('Cómo Llegar', 'canquetglas'); ?></h2>
            <div class="section-divider"></div>
        </div>

        <div class="location-map fade-in" style="height: 450px;">
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

        <!-- Directions -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--spacing-lg); margin-top: var(--spacing-xl);">
            <div class="fade-in text-center">
                <div style="color: var(--color-gold); margin-bottom: var(--spacing-sm);">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="32" height="32" style="display: inline-block;">
                        <path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2z"></path>
                    </svg>
                </div>
                <h4 style="color: var(--color-white); margin-bottom: var(--spacing-xs);"><?php _e('Desde el Aeropuerto', 'canquetglas'); ?></h4>
                <p style="color: var(--color-gray); font-size: 0.9rem;"><?php _e('15 km / 20 minutos en coche. Taxi disponible a la salida del aeropuerto.', 'canquetglas'); ?></p>
            </div>
            <div class="fade-in text-center">
                <div style="color: var(--color-gold); margin-bottom: var(--spacing-sm);">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="32" height="32" style="display: inline-block;">
                        <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                        <circle cx="7" cy="17" r="2"></circle>
                        <circle cx="17" cy="17" r="2"></circle>
                    </svg>
                </div>
                <h4 style="color: var(--color-white); margin-bottom: var(--spacing-xs);"><?php _e('En Coche', 'canquetglas'); ?></h4>
                <p style="color: var(--color-gray); font-size: 0.9rem;"><?php _e('Parking gratuito disponible para huéspedes. GPS: El Terreno, Palma.', 'canquetglas'); ?></p>
            </div>
            <div class="fade-in text-center">
                <div style="color: var(--color-gold); margin-bottom: var(--spacing-sm);">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="32" height="32" style="display: inline-block;">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="3" y1="9" x2="21" y2="9"></line>
                        <line x1="9" y1="21" x2="9" y2="9"></line>
                    </svg>
                </div>
                <h4 style="color: var(--color-white); margin-bottom: var(--spacing-xs);"><?php _e('Centro Histórico', 'canquetglas'); ?></h4>
                <p style="color: var(--color-gray); font-size: 0.9rem;"><?php _e('10 minutos en coche o 25-30 minutos caminando hasta la Catedral.', 'canquetglas'); ?></p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
