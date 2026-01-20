</main><!-- #main-content -->

<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <!-- Brand -->
            <div class="footer-brand">
                <div class="footer-logo">
                    <span style="color: var(--color-gold);">Can</span> Quetglas
                </div>
                <p class="footer-tagline"><?php echo esc_html(get_theme_mod('hotel_slogan', 'Your home away from home in Palma de Mallorca')); ?></p>
            </div>

            <!-- Navigation -->
            <div class="footer-nav">
                <h4 class="footer-nav-title"><?php _e('Explorar', 'canquetglas'); ?></h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/el-hotel/')); ?>"><?php _e('El Hotel', 'canquetglas'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/habitaciones/')); ?>"><?php _e('Habitaciones', 'canquetglas'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/pool-bar/')); ?>"><?php _e('Pool Bar', 'canquetglas'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/galeria/')); ?>"><?php _e('Galería', 'canquetglas'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/contacto/')); ?>"><?php _e('Contacto', 'canquetglas'); ?></a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="footer-contact">
                <h4 class="footer-nav-title"><?php _e('Contacto', 'canquetglas'); ?></h4>
                <?php
                $address = get_theme_mod('hotel_address', 'El Terreno, 07014 Palma de Mallorca');
                $phone = get_theme_mod('hotel_phone', '+34 XXX XXX XXX');
                $email = get_theme_mod('hotel_email', 'info@hotelcanquetglas.com');
                ?>
                <p><?php echo esc_html($address); ?></p>
                <p><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a></p>
                <p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>

                <!-- Social -->
                <div class="footer-social">
                    <?php if ($instagram = get_theme_mod('social_instagram')) : ?>
                        <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ($facebook = get_theme_mod('social_facebook')) : ?>
                        <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener" aria-label="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
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

        <!-- Bottom -->
        <div class="footer-bottom">
            <p class="footer-copyright">
                &copy; <?php echo date('Y'); ?> Hotel Can Quetglas. <?php _e('Todos los derechos reservados.', 'canquetglas'); ?>
            </p>
        </div>
    </div>
</footer>

<!-- Booking Bar (appears on scroll) -->
<div class="booking-bar" id="booking-bar">
    <div class="booking-bar-inner">
        <span style="color: var(--color-gray); font-size: 0.9rem;"><?php _e('Reserve su estancia', 'canquetglas'); ?></span>
        <a href="<?php echo esc_url(get_theme_mod('booking_url', '#')); ?>" class="btn btn-primary" target="_blank">
            <?php _e('Reservar Ahora', 'canquetglas'); ?>
        </a>
    </div>
</div>

<!-- Lightbox -->
<div class="lightbox" id="lightbox">
    <button class="lightbox-close" aria-label="<?php _e('Cerrar', 'canquetglas'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="24" height="24">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
    <img src="" alt="" class="lightbox-image" id="lightbox-image">
</div>

<?php wp_footer(); ?>
</body>
</html>
