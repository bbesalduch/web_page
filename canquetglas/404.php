<?php
/**
 * 404 Page Template
 *
 * @package CanQuetglas
 */

get_header();
?>

<section class="section" style="min-height: 60vh; display: flex; align-items: center;">
    <div class="container text-center">
        <div class="fade-in">
            <span class="section-subtitle"><?php _e('Error 404', 'canquetglas'); ?></span>
            <h1 class="section-title" style="font-size: 6rem; margin-bottom: var(--spacing-sm);">404</h1>
            <div class="section-divider"></div>
            <p class="section-description" style="margin-bottom: var(--spacing-lg);">
                <?php _e('Lo sentimos, la página que busca no existe o ha sido movida.', 'canquetglas'); ?>
            </p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                <?php _e('Volver al Inicio', 'canquetglas'); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
