<?php
/**
 * Template Name: Galería
 *
 * @package CanQuetglas
 */

get_header();
?>

<!-- Page Hero -->
<section class="page-hero" style="height: 50vh; min-height: 350px;">
    <div class="hero-media">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('hero'); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/gallery-hero.jpg'); ?>" alt="Galería">
        <?php endif; ?>
    </div>
    <div class="hero-overlay"></div>
    <div class="page-hero-content">
        <span class="hero-subtitle"><?php _e('Imágenes', 'canquetglas'); ?></span>
        <h1 class="page-hero-title"><?php _e('Galería', 'canquetglas'); ?></h1>
    </div>
</section>

<!-- Gallery Filter -->
<section class="section" style="padding-bottom: 0;">
    <div class="container text-center">
        <?php
        $categories = get_terms(array(
            'taxonomy'   => 'gallery_category',
            'hide_empty' => true,
        ));

        if (!empty($categories) && !is_wp_error($categories)) :
        ?>
        <div class="gallery-filter fade-in" style="display: flex; justify-content: center; flex-wrap: wrap; gap: var(--spacing-sm);">
            <button class="gallery-filter-btn active" data-filter="all" style="background: none; border: 1px solid var(--color-gold); color: var(--color-gold); padding: 0.5rem 1.5rem; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; cursor: pointer; transition: all 0.3s ease;">
                <?php _e('Todo', 'canquetglas'); ?>
            </button>
            <?php foreach ($categories as $cat) : ?>
                <button class="gallery-filter-btn" data-filter="<?php echo esc_attr($cat->slug); ?>" style="background: none; border: 1px solid var(--color-dark-gray); color: var(--color-gray); padding: 0.5rem 1.5rem; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; cursor: pointer; transition: all 0.3s ease;">
                    <?php echo esc_html($cat->name); ?>
                </button>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Gallery Grid -->
<section class="section">
    <div class="container container-wide">
        <div class="gallery-grid" id="gallery-grid" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: var(--spacing-xs);">
            <?php
            $gallery = new WP_Query(array(
                'post_type'      => 'gallery',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));

            if ($gallery->have_posts()) :
                while ($gallery->have_posts()) : $gallery->the_post();
                    $categories = get_the_terms(get_the_ID(), 'gallery_category');
                    $cat_slugs = $categories ? implode(' ', wp_list_pluck($categories, 'slug')) : '';
                    $large_url = get_the_post_thumbnail_url(get_the_ID(), 'gallery-large');
            ?>
                <div class="gallery-item fade-in" data-category="<?php echo esc_attr($cat_slugs); ?>" data-large="<?php echo esc_url($large_url); ?>">
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
                $placeholders = array(
                    'hotel' => __('Hotel', 'canquetglas'),
                    'rooms' => __('Habitaciones', 'canquetglas'),
                    'pool' => __('Piscina', 'canquetglas'),
                    'garden' => __('Jardín', 'canquetglas'),
                );

                for ($i = 1; $i <= 16; $i++) :
                    $cat = array_rand($placeholders);
            ?>
                <div class="gallery-item fade-in" data-category="<?php echo esc_attr($cat); ?>">
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
    </div>
</section>

<!-- Instagram CTA -->
<section class="section section-dark text-center">
    <div class="container container-narrow fade-in">
        <span class="section-subtitle"><?php _e('Síganos', 'canquetglas'); ?></span>
        <h2 class="section-title"><?php _e('@hotelcanquetglas', 'canquetglas'); ?></h2>
        <div class="section-divider"></div>
        <p class="section-description" style="margin-bottom: var(--spacing-lg);">
            <?php _e('Descubra más momentos de Can Quetglas en Instagram. Comparta su experiencia con nosotros usando #CanQuetglas', 'canquetglas'); ?>
        </p>
        <?php if ($instagram = get_theme_mod('social_instagram')) : ?>
            <a href="<?php echo esc_url($instagram); ?>" class="btn btn-outline-gold" target="_blank" rel="noopener">
                <?php _e('Seguir en Instagram', 'canquetglas'); ?>
            </a>
        <?php endif; ?>
    </div>
</section>

<style>
.gallery-filter-btn:hover,
.gallery-filter-btn.active {
    background-color: var(--color-gold) !important;
    border-color: var(--color-gold) !important;
    color: var(--color-black) !important;
}
</style>

<?php get_footer(); ?>
