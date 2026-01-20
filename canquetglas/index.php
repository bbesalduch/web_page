<?php
/**
 * Main template file
 *
 * @package CanQuetglas
 */

get_header();
?>

<section class="page-hero" style="height: 40vh; min-height: 300px;">
    <div class="hero-media">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-placeholder.jpg'); ?>" alt="Hotel Can Quetglas">
    </div>
    <div class="hero-overlay"></div>
    <div class="page-hero-content">
        <h1 class="page-hero-title"><?php single_post_title(); ?></h1>
    </div>
</section>

<section class="section">
    <div class="container container-narrow">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('fade-in'); ?>>
                    <div class="entry-content" style="color: var(--color-gray);">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>

            <?php the_posts_navigation(); ?>
        <?php else : ?>
            <p style="color: var(--color-gray); text-align: center;">
                <?php _e('No se encontró contenido.', 'canquetglas'); ?>
            </p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
