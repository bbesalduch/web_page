<?php
/**
 * Default Page Template
 *
 * @package CanQuetglas
 */

get_header();
?>

<section class="page-hero" style="height: 50vh; min-height: 350px;">
    <div class="hero-media">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('hero'); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-placeholder.jpg'); ?>" alt="<?php the_title_attribute(); ?>">
        <?php endif; ?>
    </div>
    <div class="hero-overlay"></div>
    <div class="page-hero-content">
        <h1 class="page-hero-title"><?php the_title(); ?></h1>
    </div>
</section>

<section class="section">
    <div class="container container-narrow">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('fade-in'); ?>>
                <div class="entry-content" style="color: var(--color-gray);">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
